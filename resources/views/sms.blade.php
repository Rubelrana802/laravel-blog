<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title>Fully featured textual message</title>
</head>
<body>
<div class="container">
    <form action="{{ url('/sms') }}" method="POST" id="send_form"
          class="form-horizontal">
        @csrf  
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="in_username" placeholder="Username" name="username" value="rubelranaadmin">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="in_password" placeholder="Password"
                               name="password" value="Rubel01775">
                    </div>
                </div>


        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="in_from" placeholder="Sender (Can be alphanumeric)"
                               name="fromInput" value="PHOENIX">
                    </div>
                </div>
                <div class="form-group">
                    <label for="in_to" class="col-sm-2 control-label">Phone number</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="in_to"
                               placeholder="Phone number in international format (example: 41793026727)" name="toInput" value="8801775034549">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="in_messageId" placeholder="Message ID"
                               name="messageIdInput" value="D01">
                    </div>
                </div>
                <div class="form-group">
                    <label for="in_text" class="col-sm-2 control-label">Message text</label>
                    <div class="col-sm-10">
                <textarea type="text" class="form-control" id="in_text" placeholder="Message text" name="textInput"
                          rows="4">I mean second layer as middleware nothing else..</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="in_notify_url" placeholder="Notify URL"
                               name="notifyUrlInput">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="in_notify_contentType"
                               placeholder="Notify content type (application/json, application/xml)"
                               name="notifyContentTypeInput">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="in_callback_data" placeholder="Callback data"
                               name="callbackDataInput">
                    </div>
                </div>
             <input class="btn btn-default btn-lg" type="submit" value="Send">
            </div>
        </div>
    </form>
    <hr>

    <?php
    if (isset($_POST['toInput'])) {
        $to = $_POST['toInput'];
        if ($to <> '') {
            $from = $_POST['fromInput'];
            $messageId = $_POST['messageIdInput'];
            $text = $_POST['textInput'];
            $notifyUrl = $_POST['notifyUrlInput'];
            $notifyContentType = $_POST['notifyContentTypeInput'];
            $callbackData = $_POST['callbackDataInput'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $postUrl = "https://api.infobip.com/sms/1/text/advanced";
            // creating an object for sending SMS
            $destination = array("messageId" => $messageId,
                "to" => $to);
            $message = array("from" => $from,
                "destinations" => array($destination),
                "text" => $text,
                "notifyUrl" => $notifyUrl,
                "notifyContentType" => $notifyContentType,
                "callbackData" => $callbackData);
            $postData = array("messages" => array($message));
            $postDataJson = json_encode($postData);
            $ch = curl_init();
            $header = array("Content-Type:application/json", "Accept:application/json");
            curl_setopt($ch, CURLOPT_URL, $postUrl);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 2);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataJson);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // response of the POST request
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $responseBody = json_decode($response);
            curl_close($ch);
            if ($httpCode >= 200 && $httpCode < 300) {
                $messages = $responseBody->messages;
                echo '<h4>Response</h4><br>';
                ?>
                <?php
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                    <b>An error occurred!</b> Reason:
                    <?php
                    //echo $responseBody->requestError->serviceException->text;
                    ?>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                <b>An error occurred!</b> Reason: Phone number is missing
            </div>
            <?php
        }
    }
    ?>
</div>
</body>
</html>
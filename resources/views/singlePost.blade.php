@extends('layouts.master')

@section('mainContant')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{asset('frontend')}}/img/post-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1>{{ $post->title }}</h1>
              <span class="meta">Posted by
                <a href="#">{{ $post->user->name }}</a>
                on {{ $post->created_at }}</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">

            {!! $post->content !!}

          </div>
        </div>

        <div class="comments">
          <hr>
          <h2>Comments</h2>
          @foreach($comments as $comment)
            <p> {{ $comment->content }} </p>
          <p><small>, on {{ $comment->created_at }}</small>
          </p>
          <hr>
          @endforeach
        </div>
      </div>
    </article>



@endsection
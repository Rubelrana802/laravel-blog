<div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                <li class="nav-title">User</li>
                    <li class="nav-item">
                        <a href="{{ route('userDashboard') }}" class="nav-link {{ Route::currentRouteName() == 'userDashboard' ? 'active' : ''}}">
                            <i class="icon icon-speedometer"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('usercomments') }}" class="nav-link {{ Route::currentRouteName() == 'usercomments' ? 'active' : ''}}">
                            <i class="icon icon-book-open"></i> Comments
                        </a>
                    </li>
                    @if(Auth::user()->author == true)
                    <li class="nav-title">author</li>
                    <li class="nav-item">
                        <a href="{{ route('authordashboard') }}" class="nav-link {{ Route::currentRouteName() == 'authordashboard' ? 'active' : ''}}">
                            <i class="icon icon-speedometer"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('authorPosts') }}" class="nav-link {{ Route::currentRouteName() == 'authorPosts' ? 'active' : ''}}">
                            <i class="icon icon-paper-clip"></i> Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('authorcomments') }}" class="nav-link {{ Route::currentRouteName() == 'authorcomments' ? 'active' : ''}}">
                            <i class="icon icon-book-open"></i> Comments
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->admin == true)
                    <li class="nav-title">admin</li>
                    <li class="nav-item">
                        <a href="{{ route('adminDashboard') }}" class="nav-link {{ Route::currentRouteName() == 'adminDashboard' ? 'active' : ''}}">
                            <i class="icon icon-speedometer"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('adminPosts') }}" class="nav-link {{ Route::currentRouteName() == 'adminPosts' ? 'active' : ''}}">
                            <i class="icon icon-paper-clip"></i> Posts
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{ route('adminComments') }}" class="nav-link {{ Route::currentRouteName() == 'adminComments' ? 'active' : ''}}">
                            <i class="icon icon-book-open"></i> Comments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('adminUsers') }}" class="nav-link {{ Route::currentRouteName() == 'adminUsers' ? 'active' : ''}}">
                            <i class="icon icon-user"></i> Users
                        </a>
                    </li>
                    @endif
                </ul>
            </nav>
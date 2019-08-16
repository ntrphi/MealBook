@if(Auth::check())
<header class="main-header">
    <!-- Logo -->
    <a href="{{route('dashboard')}}" class="logo">
        <span class="logo-lg"><b>Meal</b>Book</span>
    </a>
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
                <li class="dropdown user user-menu">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{Auth::user()->image}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{Auth::user()->image}}" class="img-circle" alt="User Image">

                            <p>
                            {{Auth::user()->name}}  - {{Auth::user()->role->name}}
                                <small>Member since {{Auth::user()->created_at->format('Y.m.d')}}</small>
                            </p>
                        </li>
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{route('userpage',Auth::user()->id)}}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
               
            </ul>
        </div>
    </nav>
</header>
@endif
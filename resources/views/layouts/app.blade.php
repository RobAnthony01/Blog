<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Stanley.css') }}" rel="stylesheet">
</head>
<body>
<!-- Static navbar -->
<div class="navbar navbar-expand-md navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/home">Rob Anthony</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/Work">Work</a></li>
                <li><a href="/About">About</a></li>
                <li><a href="/home">Blog</a></li>
                <li><a href="/Contact">Contact</a></li>
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @else
                    <li><a href="/blog/index">Blogs</a></li>
                    <li><a href="/category/index">Categories</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->print_name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container body-content">
    @yield('content')
</div>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h4>Where I'm at</h4>
                <p>
                    Bawburgh,<br/>
                    Norwich, <br/>
                    United Kingdom.
                </p>
            </div><!-- /col-lg-4 -->

            <div class="col-lg-4">
                <h4>My Links</h4>
                <p>
                    <a href="https://twitter.com/RobAnthony01">Twitter</a><br/>
                    <a href="https://www.facebook.com/RobAnthony01">Facebook</a><br/>
                    <a href="https://www.linkedin.com/in/robanthony01">LinkedIn</a><br/>
                    <a href="https://stackoverflow.com/users/8224694/rob-anthony">StackOverFlow</a><br/>
                    <a href="https://www.codewars.com/users/RobAnthony01"><img
                                src="https://www.codewars.com/users/RobAnthony01/badges/small"/></a>
                </p>
            </div><!-- /col-lg-4 -->
            <div class="col-lg-4">
                <h4>About Rob</h4>
                <p>Loves: Solving problems, helping others and doing the right thing.</p>
                <p>Hates: Ignorance, injustice and intolerance.</p>
            </div><!-- /col-lg-4 -->

        </div>

    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')

</body>
</html>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <title>
        @yield('title', 'Tech House')
    </title>
</head>

<body>

    <!-- ---------Start Navbar ------------- -->
    <section class="top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- <a class="navbar-brand" href="#"><img src="{{asset('../image/logo-1.png')}}"
                        style="width:60px; height:60px;"></a> -->
                <a class="navbar-brand navlogo" href="/">Tech House</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="/products">Products </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contactpart">Contact Us</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cart</a>
                        </li>

                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id)}}" class="img rounded-circle" style="width: 40px">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    </ul>

                </div>
            </div>
        </nav>
    </section>
    <!-- ---------End Navbar ------------- -->
    <div>
        @include('frontend.partials.messages')
        @yield('content')
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>

</html>
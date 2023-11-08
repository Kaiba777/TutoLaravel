<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <style>
        #nav1 {
            background: blue;
            height: 50px;
            margin-top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #nav1 ul {
            padding-top: 15px;
            width: 60%;
            height: 100%;
            display: flex;
            justify-content: space-around;
            list-style: none;
            color: white;
        }

        #nav1 a {
            text-decoration: none;
            color: white;
        }

        .container .alert {
            background: rgba(170, 98, 236, 0.877);
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <nav id="nav1">
        <ul>
            <li><a href="/">Blog</a></li>
            <li><a href="{{ route('blog.index') }}">Blog</a></li>
            <li>Link</li>
        </ul>
        <div>
            @auth
                {{ \Illuminate\Support\Facades\Auth::user()->name }}
                <form action="{{ route('auth.logout') }}" method="post">
                    @method('delete')
                    @csrf
                    <button>Se déconnecter</button>
                </form>
            @endauth
            @guest
                <a href="{{ route('auth.login') }}">Se connecter</a>
            @endguest
        </div>
    </nav>

   <div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @yield('content')
   </div>
    
</body>
</html>
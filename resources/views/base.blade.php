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
        }
        #nav1 ul {
            padding-top: 15px;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: space-evenly;
            list-style: none;
            color: white;
        }

        #nav1 a {
            text-decoration: none;
            color: white;
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
    </nav>

   <div class="container">
    @dump(request()->route()->getName())
    @yield('content')
   </div>
    
</body>
</html>
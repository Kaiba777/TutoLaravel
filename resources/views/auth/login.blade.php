@extends('base')

@section('content')
    
    <h1>Se connecter</h1>

    <form action="" method="post">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                {{ $message }}
            @enderror
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">
            @error('password')
                {{ $message }}
            @enderror
        </div>
        <button>Se connecter</button>
    </form>
@endsection
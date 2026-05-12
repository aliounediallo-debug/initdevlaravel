<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>

    <style>
        body {
             margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('{{ asset('images/bg1.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            background: white;
            padding: 30px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
        }

        .link {
            margin-top: 10px;
            text-align: center;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

<div class="box">
    <h2>Connexion</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
    @endif

    <form method="POST" action="/login">
        @csrf

        <input type="phone" name="telephone" placeholder="Téléphone">
        <input type="password" name="password" placeholder="Mot de passe">

        <button type="submit">Se connecter</button>
    </form>

    <div class="link">
        <p>Pas de compte ?</p>
        <a href={{ route('registerForm', ) }}>S'inscrire</a>
    </div>
</div>

</body>
</html>

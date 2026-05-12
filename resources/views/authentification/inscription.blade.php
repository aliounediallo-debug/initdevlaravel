<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>

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

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #45a049;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Créer un compte</h2>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/inscription">
    @csrf

    <label>Nom</label>
    <input type="text" name="name">

    <label>Email</label>
    <input type="email" name="email">

    <label>Téléphone</label>
    <input type="text" name="phone">

    <label>Mot de passe</label>
    <input type="password" name="password">

    <button type="submit">S'inscrire</button>
</form>
</div>

</body>
</html>

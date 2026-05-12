

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('{{ asset('images/bg1.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
        }

        .navbar-custom {
            background: #133369;
            padding: 15px;
        }

        .navbar-custom a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar-custom a:hover {
            text-decoration: underline;
        }

        .profile {
            background: #028f20;
            padding: 6px 12px;
            border-radius: 20px;
            color: white;
        }


        .container {
            margin-top: 30px;
        }

    </style>
</head>

<div class="navbar-custom d-flex align-items-center px-4">

    <!-- LOGO (gauche) -->
    <div class="logo">
        <img src="{{ asset('images/nafa_money.png') }}" alt="Logo" style="height:70px;">
    </div>

    <!-- MENU CENTRÉ -->
    <div class="menu mx-auto">
        <a href="/accueil">ACCUEIL</a>
        <a href="{{ route('send') }}">TRANSFERT</a>
        <a href="#">HISTORIQUE</a>
    </div>

    <!-- PROFIL (droite) -->
    <div class="d-flex align-items-center">
        <div class="profile me-2">
            👤 {{ auth()->user()->name ?? 'Utilisateur' }}
        </div>

        <form method="POST" action="/logout">
            @csrf
            <button class="btn btn-danger btn-sm">Déconnexion</button>
        </form>
    </div>

</div>

<div class="d-flex justify-content-center align-items-center" style="height: 80vh;">

    <div class="card p-4 shadow" style="width: 400px;">

        <h4 class="text-center mb-4">Envoyer de l'argent</h4>

        <form action="/send" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Téléphone</label>
                <input type="text" name="phone" class="form-control">
            </div>

            <div class="mb-3">
                <label>Montant</label>
                <input type="number" name="amount" class="form-control">
            </div>

            <button class="btn btn-success w-100">
                Envoyer
            </button>

        </form>

    </div>

</div>
</div>



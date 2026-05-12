<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('{{ asset('images/bg_accueil.png') }}');
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
            color: rgb(255, 255, 255);
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

<body>

<div class="navbar-custom d-flex align-items-center px-4">

    <!-- LOGO (gauche) -->
    <div class="logo">
        <img src="{{ asset('images/nafa_money.png') }}" alt="Logo" style="height:70px;">
    </div>

    <!-- MENU CENTRÉ -->
    <div class="menu mx-auto">
        <a href="/accueil">ACCUEIL</a>
        <a href="{{ route('send') }}">TRANSFERT</a>
        <a href="{{ route('historique') }}">HISTORIQUE</a>
    </div>

    <!-- PROFIL (droite) -->
    <div class="d-flex align-items-center">
        <div class="profile me-2">
            👤 {{ auth()->user()->name ?? 'User' }}
        </div>

        <form method="POST" action="/logout">
            @csrf
            <button class="btn btn-danger btn-sm">Déconnexion</button>
        </form>
    </div>

</div>


<div class="container">

    <!-- SOLDE -->
    <div class="card p-4 shadow-sm text-center">
        <h4 class="text-muted">Solde </h4>
        <h2 class="fw-bold text-success">85 600 FCFA</h2>
    </div>

    <!-- ACTIONS -->
    <div class="row mt-4 text-center">

        <div class="col">
            <a href="/deposit" class="btn btn-primary w-100">
                Dépôt
            </a>
        </div>

        <div class="col">
            <a href="/withdraw" class="btn btn-warning w-100">
                 Retrait
            </a>
        </div>

        <div class="col">
            <a href="{{ route('send') }}" class="btn btn-success w-100">
                Envoi
            </a>
        </div>

    </div>

    <!-- TABLE -->
    <div class="mt-5">

        <h5 class="mb-3">Transactions récentes</h5>

        <table class="table table-hover shadow-sm bg-white">

            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Montant</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>A Abdou</td>
                    <td>77 675 20 37</td>
                    <td class="text-danger fw-bold">-5 000 FCFA</td>
                    <td>17-02-2026</td>
                </tr>

                 <tr>
                    <td>Mame Diarra</td>
                    <td>77 123 45 67</td>
                    <td class="text-danger fw-bold">-6 000 FCFA</td>
                    <td>16-02-2026</td>
                </tr>

                <tr>
                    <td>Moussa</td>
                    <td>77 222 55 18</td>
                    <td class="text-success fw-bold">10 000 FCFA</td>
                    <td>15-02-2026</td>
                </tr>

                <tr>
                    <td>Thierno B</td>
                    <td>70 763 23 02</td>
                    <td class="text-danger fw-bold">-1 500 FCFA</td>
                    <td>14-02-2026</td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>

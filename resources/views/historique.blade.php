<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Historique</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('{{ asset('images/bg1.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .navbar-custom {
            background: #133369;
            padding: 15px;
        }

        .menu {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .menu a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .profile {
            background: #34495e;
            padding: 6px 12px;
            border-radius: 20px;
            color: white;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar-custom d-flex justify-content-between align-items-center px-4">

    <div>
        <img src="{{ asset('images/nafa_money.png') }}" style="height:70px;">
    </div>

    <div class="menu">
        <a href="/accueil">ACCUEIL</a>
        <a href="{{ route('send') }}">TRANSFERT</a>
        <a href="/historique">HISTORIQUE</a>
    </div>

    <div class="d-flex align-items-center">
        <div class="profile me-2">
            👤 {{ auth()->user()->name ?? 'Utilisateur' }}
        </div>
    </div>

</div>

<!-- CONTENU -->
<div class="container mt-5">

    <h3 class="mb-4">📜 Historique des transactions</h3>

    <table class="table table-hover shadow-sm bg-white">

        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Type</th>
                <th>Montant</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>

            <!-- Exemple statique -->
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

</body>
</html>

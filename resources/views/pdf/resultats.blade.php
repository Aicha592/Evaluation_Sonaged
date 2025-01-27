<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats des Évaluations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <!-- <img src="{{ asset('logosonaged.png') }}" alt="" width="95" height="95"> -->
    <img src="{{ $imageBase64 }}" alt="Logo" width="95" height="95">

    <h2>Résultats des Évaluations</h2>
    <div style="border: 1px solid #ddd; padding: 10px; margin-bottom: 20px;">
        <p><strong>Collaborateur :</strong> {{ $user->prenom }} {{ $user->nom }}</p>
        <p><strong>Évalué par :</strong> {{ Auth::user()->prenom }} {{ Auth::user()->nom }}</p>
        <p><strong>Date de l'Évaluation :</strong> {{ now()->format('d/m/Y') }}</p>
        <p><strong>Score Total :</strong> {{ $scoreTotal }}</p>
        <hr>
    </div>

    <table>
        <thead>
            <tr>
                <th>Rubrique</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluations as $evaluation)
                <tr>
                    <td>{{ $evaluation['type_evaluation'] }}</td>
                    <td>{{ $evaluation['score'] }}</td>
                </tr>

            @endforeach
            <tr>
                <td style="color: #456f48"><strong>Score Total</strong></td>
                <td style="color: #456f48"><strong>{{$scoreTotal}}</strong></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
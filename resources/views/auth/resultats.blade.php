<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats des Évaluations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    @include('navbar')

    <div class="container">
        <h2 class="my-4">Résultats des Évaluations</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
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
    <div class="d-flex justify-content-start mb-3">
    <a href="{{ url()->previous() }}"><button type="button" class="btn btn-outline-success" ><i class="fas fa-arrow-left"></i>Retour</button></a>
    </div>
    
    <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('export.pdf', $user->id) }}" class="btn btn-outline-success my-1">
    <i class="fas fa-file-pdf"></i> Exporter en PDF
    </a>
    </div>

    <div class="container">
        <h2 class="my-4">Résultats des Évaluations</h2>
        <div style="border: 1px solid #ddd; padding: 10px; margin-bottom: 20px;">
        @if(isset($user))
    <p><strong>Collaborateur :</strong> {{ $user->prenom }} {{ $user->nom }}</p>
@else
    <p>L'utilisateur n'a pas été trouvé.</p>
@endif
            <p><strong>Évalué par :</strong> {{ Auth::user()->prenom }} {{ Auth::user()->nom }}</p>
            <p><strong>Date de l'Évaluation :</strong> {{ now()->format('d/m/Y') }}</p>
            <p><strong>Score Total :</strong> {{ $scoreTotal }}</p>
            <hr>
        </div>
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
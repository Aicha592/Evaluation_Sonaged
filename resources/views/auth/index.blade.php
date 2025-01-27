<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


    <title>Evaluation SONAGED</title>
</head>

<body>
    @include('navbar')
    

    <div class="container d-flex justify-content-center align-items-center" style="width: 100%; min-height: 80vh;">       
        <div class="card p-4" style="width: 100%;">
            <center>
                <h5>Liste des collaborateurs</h5>
            </center>

            <div class="form-group">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Matricule</th>
                            <th>Fonction</th>
                            <th>Statut</th>
                            <th>Score Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collaborateurs as $collaborateur)
                            <tr>
                            @if ($collaborateur->collaborateur->count() > 0)
                                <td><a href="{{route('detail', $collaborateur->id)}}">{{ $collaborateur->prenom }}</a></td>
                                <td><a href="{{route('detail', $collaborateur->id)}}">{{ $collaborateur->nom }}</a></td>
                            @else
                                <td>{{ $collaborateur->prenom }}</td>
                                <td>{{ $collaborateur->nom }}</td>
                            @endif
                                <td>{{ $collaborateur->matricule }}</td>
                                <td>{{ $collaborateur->fonction }}</td>
                                <td class="text-center">
                                    @if ($collaborateur->collaborateur->count() > 0)
                                        <!-- Si l'utilisateur a été évalué -->
                                        <span class="text-success">
                                            <i class="fas fa-check-circle"></i> Évalué
                                        </span>
                                    @else
                                        <!-- Si l'utilisateur n'est pas évalué -->
                                        <span class="text-danger">
                                            <i class="fas fa-times-circle"></i> Non évalué
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($collaborateur->collaborateur->count() > 0)
                                        {{ $collaborateurScores[$collaborateur->id] ?? 0 }}
                                    @else
                                        0
                                    @endif 
                                    /100
                                </td>
                                <td class="text-center">
                                    @if ($collaborateur->collaborateur->count() === 0)
                                        <!-- Bouton "Evaluer" uniquement si l'utilisateur n'est pas évalué -->
                                        <a href="{{ route('form', ['id' => $collaborateur->id]) }}"
                                            class="btn btn-primary">Evaluer</a>
                                    @else
                                        <!-- Sinon, afficher un texte -->
                                        <!-- <span class="text-muted">Évalué</span> -->
                                        <a href="#"
                                        class="btn btn-success" onclick="confirmReevaluation(event, '{{ route('form', ['id' => $collaborateur->id]) }}')">Réévaluer</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>

    <script>
    function confirmReevaluation(event, url) {
        // Empêche le comportement par défaut du lien
        event.preventDefault();

        // Affiche la popup de confirmation
        Swal.fire({
            title: 'Confirmer la réévaluation',
            text: 'Voulez-vous vraiment réévaluer ce collaborateur ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, réévaluer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si l'utilisateur confirme, redirige vers l'URL
                window.location.href = url;
            }
        });
    }
</script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>
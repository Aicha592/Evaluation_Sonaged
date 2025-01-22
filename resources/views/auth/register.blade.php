<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    @include('navbar')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center bg-success text-white">Inscription</div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="matricule">Matricule</label>
                        <input type="text" name="matricule" id="matricule" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fonction">Fonction</label>
                        <input type="text" name="fonction" id="fonction" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="type_utilisateur">Type d'utilisateur</label>
                        <select name="type_utilisateur" id="type_utilisateur" class="form-control" required>
                            <option value="" disabled selected>Choisissez un type</option>
                            <option value="evaluateur">Evaluateur</option>
                            <option value="collaborateur">Collaborateur</option>
                        </select>
                    </div>
                    <div class="form-group" id="password-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group" id="password-confirmation-group">
                        <label for="password_confirmation">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-success btn-block">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Récupérer le champ 'type_utilisateur' et les champs mot de passe
        const typeUtilisateurSelect = document.getElementById('type_utilisateur');
        const passwordGroup = document.getElementById('password-group');
        const passwordConfirmationGroup = document.getElementById('password-confirmation-group');

        // Écouter les changements dans le champ 'type_utilisateur'
        typeUtilisateurSelect.addEventListener('change', function () {
            if (this.value === 'collaborateur') {
                // Masquer les champs mot de passe et confirmation si l'utilisateur est un collaborateur
                passwordGroup.style.display = 'none';
                passwordConfirmationGroup.style.display = 'none';
            } else {
                // Afficher les champs mot de passe et confirmation si l'utilisateur est un évaluateur
                passwordGroup.style.display = 'block';
                passwordConfirmationGroup.style.display = 'block';
            }
        });

        // Vérifier l'état initial si un type est déjà sélectionné
        if (typeUtilisateurSelect.value === 'collaborateur') {
            passwordGroup.style.display = 'none';
            passwordConfirmationGroup.style.display = 'none';
        }
    </script>
</body>

</html>
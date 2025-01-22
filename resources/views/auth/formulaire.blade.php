<!DOCTYPE html>
<html lang="fr">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Evaluation SONAGED</title>
    <style>
        table {
            width: 70%;
            margin: auto;
            border-collapse: collapse;
        }

        h3 {
            background-color: #456f48;
            color: white;
            padding: 10px;
            text-align: center;
        }

        td {
            padding: 10px;
            text-align: left;
        }

        .total {
            font-weight: bold;
        }
    </style>

</head>

<body>
    @include('navbar')
<!-- <nav class="navbar navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{route('index')}}">
      <img src="{{asset('logosonaged.png')}}" alt="" width="95" height="95">
    </a>
    <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
            <a class="navbar-brand" href="{{ route('index') }}" >Home</a>
            </li>
            <li class="nav-item">
            <a class="navbar-brand" href="{{ route('liste') }}">Liste des utilisateurs</a>
            </li>
            </ul>
    
  </div>
</nav> -->
<br>
<br>
    <form action="{{ route('resultat') }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <h4 style="text-align:center;">Formulaire d'Évaluation</h4>

        <!-- Ponctualité -->
        <table id="Ponctualite">
            <thead>
                <tr>
                    <th colspan="5">
                        <h3>Ponctualité <input type="text" name="type_evaluation1" value="Ponctualité" hidden></h3>
                    </th>
                </tr>
                <tr>
                    <th></th>
                    <th>NSP</th> 
                    <th>Insuffisant</th>
                    <th>Satisfaisant</th>
                    <th>Très bien</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Respecte les horaires de travail (retard, absence...)</td>
                    <td><input type="radio" name="question1" value="0" onchange="updateTableScore('Ponctualite')"></td>
                    <td><input type="radio" name="question1" value="1.5" onchange="updateTableScore('Ponctualite')">
                    </td>
                    <td><input type="radio" name="question1" value="2" onchange="updateTableScore('Ponctualite')"></td>
                    <td><input type="radio" name="question1" value="2.5" onchange="updateTableScore('Ponctualite')">
                    </td>
                </tr>
                <tr>
                    <td>Se présente au travail en bonne forme</td>
                    <td><input type="radio" name="question2" value="0" onchange="updateTableScore('Ponctualite')"></td>
                    <td><input type="radio" name="question2" value="1.5" onchange="updateTableScore('Ponctualite')"></td>
                    <td><input type="radio" name="question2" value="2" onchange="updateTableScore('Ponctualite')"></td>
                    <td><input type="radio" name="question2" value="2.5" onchange="updateTableScore('Ponctualite')">
                    </td>
                </tr>
                <tr>
                    <td>Arrive aux diverses rencontres et réunions à l'heure et bien préparé</td>
                    <td><input type="radio" name="question3" value="0" onchange="updateTableScore('Ponctualite')"></td>
                    <td><input type="radio" name="question3" value="1.5" onchange="updateTableScore('Ponctualite')">
                    </td>
                    <td><input type="radio" name="question3" value="2" onchange="updateTableScore('Ponctualite')"></td>
                    <td><input type="radio" name="question3" value="2.5" onchange="updateTableScore('Ponctualite')">
                    </td>
                </tr>
                <tr>
                    <td>Respecte les échéanciers convenus avec lui</td>
                    <td><input type="radio" name="question4" value="0" onchange="updateTableScore('Ponctualite')"></td>
                    <td><input type="radio" name="question4" value="1.5" onchange="updateTableScore('Ponctualite')">
                    </td>
                    <td><input type="radio" name="question4" value="2" onchange="updateTableScore('Ponctualite')"></td>
                    <td><input type="radio" name="question4" value="2.5" onchange="updateTableScore('Ponctualite')">
                    </td>
                </tr>
                <tr>
                    <td style="text_align: right"><strong>Score Total</strong></td>
                    <td colspan="4" id="totalPonctualite"><strong>0</strong></td>
                    <input type="text" id="totalPonctualiteInput" name="score1" hidden>
                </tr>
            </tbody>
        </table>

        <!-- Autonomie & Initiative -->
        <table id="AutonomieInitiative">
            <thead>
                <tr>
                    <th colspan="5">
                        <h3>Autonomie & Initiative <input type="text" name="type_evaluation2"
                                value="Autonomie & Initiative" hidden></h3>
                    </th>
                </tr>
                <tr>
                    <th></th>
                    <th>NSP</th>
                    <th>Insuffisant</th>
                    <th>Satisfaisant</th>
                    <th>Très bien</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Comprend vite les explications, directives et consignes</td>
                    <td><input type="radio" name="auto1" value="0" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto1" value="1.5" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto1" value="2" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto1" value="2.5" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                </tr>
                <tr>
                    <td>S'organise pour ne pas avoir à poser les mêmes questions</td>
                    <td><input type="radio" name="auto2" value="0" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto2" value="1.5" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto2" value="2" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto2" value="2.5" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                </tr>
                <tr>
                    <td>Organise son environnement de travail pour être efficace </td>
                    <td><input type="radio" name="auto3" value="0" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto3" value="1.5" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto3" value="2" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto3" value="2.5" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                </tr>
                <tr>
                    <td>Prend des initiatives pour s'occuper</td>
                    <td><input type="radio" name="auto4" value="0" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto4" value="1.5" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto4" value="2" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto4" value="2.5" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                </tr>
                <tr>
                    <td>Profite de chaque situation pour s'améliorer</td>
                    <td><input type="radio" name="auto5" value="0" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto5" value="1.5" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto5" value="2" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto5" value="2.5" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                </tr>
                <tr>
                    <td>Utilise toutes les ressources avant de demander de l'aide </td>

                    <td><input type="radio" name="auto6" value="0" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto6" value="1.5" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto6" value="2" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto6" value="2.5" onchange="updateTotalScore2()"></td>
                </tr>
                <tr>
                    <td>Fait preuve de créativité et d'initiative si nécessaire </td>
                    <td><input type="radio" name="auto7" value="0" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto7" value="1.5" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto7" value="2" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto7" value="2.5" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                </tr>
                <tr>
                    <td>Fait preuve de jugement et de demande de l'aide si nécessaire </td>
                    <td><input type="radio" name="auto8" value="0" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto8" value="1.5" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto8" value="2" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                    <td><input type="radio" name="auto8" value="2.5" onchange="updateTableScore('AutonomieInitiative')">
                    </td>
                </tr>
                <tr>
                    <td><strong>Score Total</strong></td>
                    <td colspan="4" id="totalAutonomieInitiative"><strong>0</strong></td>
                    <input type="text" id="totalAutonomieInitiativeInput" name="score2" hidden>
                </tr>
            </tbody>
        </table>

        <!-- Professionnalisme -->
        <table id="Professionnalisme">
            <thead>
                <tr>
                    <th colspan="5">
                        <h3>Professionnalisme <input type="text" name="type_evaluation3" value="Professionnalisme"
                                hidden></h3>
                    </th>
                </tr>
                <tr>
                    <th></th>
                    <th>NSP</th>
                    <th>Insuffisant</th>
                    <th>Satisfaisant</th>
                    <th>Très bien</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Utilise un langage conforme à sa fonction</td>
                    <td><input type="radio" name="pro1" value="0" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro1" value="1.2" onchange="updateTableScore('Professionnalisme')">
                    </td>
                    <td><input type="radio" name="pro1" value="3" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro1" value="4" onchange="updateTableScore('Professionnalisme')">
                    </td>
                </tr>
                <tr>
                    <td>Démontre de l'enthousiasme et de la courtoisie</td>
                    <td><input type="radio" name="pro2" value="0" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro2" value="1.2" onchange="updateTableScore('Professionnalisme')">
                    </td>
                    <td><input type="radio" name="pro2" value="3" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro2" value="4" onchange="updateTableScore('Professionnalisme')">
                    </td>
                </tr>
                <tr>
                    <td>Pose des questions claires et pertinentes</td>
                    <td><input type="radio" name="pro3" value="0" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro3" value="1.2" onchange="updateTableScore('Professionnalisme')">
                    </td>
                    <td><input type="radio" name="pro3" value="3" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro3" value="4" onchange="updateTableScore('Professionnalisme')">
                    </td>
                </tr>
                <tr>
                    <td>Fait un travail de qualité </td>
                    <td><input type="radio" name="pro4" value="0" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro4" value="1.2" onchange="updateTableScore('Professionnalisme')">
                    </td>
                    <td><input type="radio" name="pro4" value="3" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro4" value="4" onchange="updateTableScore('Professionnalisme')">
                    </td>
                </tr>
                <tr>
                    <td>A le sens du Service Client</td>
                    <td><input type="radio" name="pro5" value="0" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro5" value="1.2" onchange="updateTableScore('Professionnalisme')">
                    </td>
                    <td><input type="radio" name="pro5" value="3" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro5" value="4" onchange="updateTableScore('Professionnalisme')">
                    </td>
                </tr>
                <tr>
                    <td>Utilise de façon optimale son temps de travail </td>
                    <td><input type="radio" name="pro6" value="0" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro6" value="1.2" onchange="updateTableScore('Professionnalisme')">
                    </td>
                    <td><input type="radio" name="pro6" value="3" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro6" value="4" onchange="updateTableScore('Professionnalisme')">
                    </td>
                </tr>
                <tr>
                    <td>Applique avec rigueur et discernement les règles établies </td>
                    <td><input type="radio" name="pro7" value="0" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro7" value="1.2" onchange="updateTableScore('Professionnalisme')">
                    </td>
                    <td><input type="radio" name="pro7" value="3" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro7" value="4" onchange="updateTableScore('Professionnalisme')">
                    </td>
                </tr>
                <tr>
                    <td>Sollicite les retours d'info, de la hiérarchie en vue de s'améliorer</td>
                    <td><input type="radio" name="pro8" value="0" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro8" value="1.2" onchange="updateTableScore('Professionnalisme')">
                    </td>
                    <td><input type="radio" name="pro8" value="3" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro8" value="4" onchange="updateTableScore('Professionnalisme')">
                    </td>
                </tr>
                <tr>
                    <td>Informe vite sa hiérarchie de toute situation non maitrisée </td>
                    <td><input type="radio" name="pro9" value="0" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro9" value="1.2" onchange="updateTableScore('Professionnalisme')">
                    </td>
                    <td><input type="radio" name="pro9" value="3" onchange="updateTableScore('Professionnalisme')"></td>
                    <td><input type="radio" name="pro9" value="4" onchange="updateTableScore('Professionnalisme')">
                    </td>
                </tr>
                <tr>
                    <td>Fait des suggestions d'amélioration de manière constructive </td>
                    <td><input type="radio" name="pro10" value="0" onchange="updateTableScore('Professionnalisme')">
                    </td>
                    <td><input type="radio" name="pro10" value="1.2" onchange="updateTableScore('Professionnalisme')">
                    </td>
                    <td><input type="radio" name="pro10" value="3" onchange="updateTableScore('Professionnalisme')">
                    </td>
                    <td><input type="radio" name="pro10" value="4" onchange="updateTableScore('Professionnalisme')">
                    </td>
                </tr>
                <tr>
                    <td><strong>Score Total</strong></td>
                    <td colspan="4" id="totalProfessionnalisme">0</td>
                    <input type="text" id="totalProfessionnalismeInput" name="score3" hidden>
                </tr>
            </tbody>
        </table>

        <!-- Persévérance -->
        <table id="Persévérance">
            <thead>
                <tr>
                    <th colspan="5">
                        <h3>Persévérance <input type="text" name="type_evaluation4" value="Persévérance" hidden></h3>
                    </th>
                </tr>
                <tr>
                    <th></th>
                    <th>NSP</th>
                    <th>Insuffisant</th>
                    <th>Satisfaisant</th>
                    <th>Très bien</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ne se décourage pas face aux difficultés</td>
                    <td><input type="radio" name="per1" value="0" onchange="updateTableScore('Persévérance')"></td>
                    <td><input type="radio" name="per1" value="0.375" onchange="updateTableScore('Persévérance')"></td>
                    <td><input type="radio" name="per1" value="0.9375" onchange="updateTableScore('Persévérance')"></td>
                    <td><input type="radio" name="per1" value="1.25" onchange="updateTableScore('Persévérance')"></td>
                </tr>
                <tr>
                    <td>Reste calme et posé devant les difficultés</td>
                    <td><input type="radio" name="per2" value="0" onchange="updateTableScore('Persévérance')"></td>
                    <td><input type="radio" name="per2" value="0.375" onchange="updateTableScore('Persévérance')"></td>
                    <td><input type="radio" name="per2" value="0.9375" onchange="updateTableScore('Persévérance')"></td>
                    <td><input type="radio" name="per2" value="1.25" onchange="updateTableScore('Persévérance')"></td>
                </tr>
                <tr>
                    <td>Perçoit les difficultés comme étant des défis </td>
                    <td><input type="radio" name="per3" value="0" onchange="updateTableScore('Persévérance')"></td>
                    <td><input type="radio" name="per3" value="0.375" onchange="updateTableScore('Persévérance')"></td>
                    <td><input type="radio" name="per3" value="0.9375" onchange="updateTableScore('Persévérance')"></td>
                    <td><input type="radio" name="per3" value="1.25" onchange="updateTableScore('Persévérance')"></td>
                </tr>
                <tr>
                    <td>Ne se limite pas à une ou deux tentatives pour trouver une solution</td>
                    <td><input type="radio" name="per4" value="0" onchange="updateTableScore('Persévérance')"></td>
                    <td><input type="radio" name="per4" value="0.375" onchange="updateTableScore('Persévérance')"></td>
                    <td><input type="radio" name="per4" value="0.9375" onchange="updateTableScore('Persévérance')"></td>
                    <td><input type="radio" name="per4" value="1.25" onchange="updateTableScore('Persévérance')"></td>
                </tr>

                <tr>
                    <td><strong>Score Total</strong></td>
                    <td colspan="4" id="totalPersévérance"><strong>0</strong></td>
                    <input type="text" id="totalPersévéranceInput" name="score4" hidden>
                </tr>
            </tbody>
        </table>
        <!-- Adaptation & Fléxibilité -->
        <table id="AdaptationFléxibilité">
            <thead>
                <tr>
                    <th colspan="5">
                        <h3>Adaptation & Fléxibilité <input type="text" name="type_evaluation5"
                                value="Adaptation & Fléxibilité" hidden></h3>
                    </th>
                </tr>
                <tr>
                    <th></th>
                    <th>NSP</th>
                    <th>Insuffisant</th>
                    <th>Satisfaisant</th>
                    <th>Très bien</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Se conforme aux règles et procédures sans les critiquer</td>
                    <td><input type="radio" name="adap1" value="0" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                    <td><input type="radio" name="adap1" value="0.3" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                    <td><input type="radio" name="adap1" value="0.75" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                    <td><input type="radio" name="adap1" value="1" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                </tr>
                <tr>
                    <td>Fait preuve d'esprit ouverture</td>
                    <td><input type="radio" name="adap2" value="0" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                    <td><input type="radio" name="adap2" value="0.3" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                    <td><input type="radio" name="adap2" value="0.75" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                    <td><input type="radio" name="adap2" value="1" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                </tr>
                <tr>
                    <td>S'adapte à des situations qu'il ne maitrise pas (gestion du stress) </td>
                    <td><input type="radio" name="adap3" value="0" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                    <td><input type="radio" name="adap3" value="0.3" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                    <td><input type="radio" name="adap3" value="0.75" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                    <td><input type="radio" name="adap3" value="1" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                </tr>
                <tr>
                    <td>Fait preuve de souplesse en cas d'imprévus (horaires, tâches…)</td>
                    <td><input type="radio" name="adap4" value="0" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                    <td><input type="radio" name="adap4" value="0.3" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                    <td><input type="radio" name="adap4" value="0.75" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                    <td><input type="radio" name="adap4" value="1" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                </tr>
                <tr>
                    <td>Accepte les critiques et suggestions sur son travail </td>
                    <td><input type="radio" name="adap5" value="0" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                    <td><input type="radio" name="adap5" value="0.3" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                    <td><input type="radio" name="adap5" value="0.75" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                    <td><input type="radio" name="adap5" value="1" onchange="updateTableScore('AdaptationFléxibilité')">
                    </td>
                </tr>

                <tr>
                    <td><strong>Score Total</strong></td>
                    <td colspan="4" id="totalAdaptationFléxibilité"><strong>0</strong></td>
                    <input type="text" id="totalAdaptationFléxibilitéInput" name="score5" hidden>
                </tr>
            </tbody>
        </table>

        <!-- Travail d'Equipe -->
        <table id="TravailEquipe">
            <thead>
                <tr>
                    <th colspan="5">
                        <h3>Travail d'Equipe <input type="text" name="type_evaluation6" value="Travail d'Equipe" hidden>
                        </h3>
                    </th>
                </tr>
                <tr>
                    <th></th>
                    <th>NSP</th>
                    <th>Insuffisant</th>
                    <th>Satisfaisant</th>
                    <th>Très bien</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tient compte du point de vue des autres et reconsidère au besoin sa position </td>
                    <td><input type="radio" name="tra1" value="0" onchange="updateTableScore('TravailEquipe')"></td>
                    <td><input type="radio" name="tra1" value="0.75" onchange="updateTableScore('TravailEquipe')"></td>
                    <td><input type="radio" name="tra1" value="1.85" onchange="updateTableScore('TravailEquipe')"></td>
                    <td><input type="radio" name="tra1" value="2.5" onchange="updateTableScore('TravailEquipe')"></td>
                </tr>
                <tr>
                    <td>S'adapte bien aux différents types de personnalités </td>
                    <td><input type="radio" name="tra2" value="0" onchange="updateTableScore('TravailEquipe')"></td>
                    <td><input type="radio" name="tra2" value="0.75" onchange="updateTableScore('TravailEquipe')"></td>
                    <td><input type="radio" name="tra2" value="1.85" onchange="updateTableScore('TravailEquipe')"></td>
                    <td><input type="radio" name="tra2" value="2.5" onchange="updateTableScore('TravailEquipe')"></td>
                </tr>
                <tr>
                    <td>Offre sa collaboration à ses collègues de travail en cas de besoin </td>
                    <td><input type="radio" name="tra3" value="0" onchange="updateTableScore('TravailEquipe')"></td>
                    <td><input type="radio" name="tra3" value="0.75" onchange="updateTableScore('TravailEquipe')"></td>
                    <td><input type="radio" name="tra3" value="1.85" onchange="updateTableScore('TravailEquipe')"></td>
                    <td><input type="radio" name="tra3" value="2.5" onchange="updateTableScore('TravailEquipe')"></td>
                </tr>
                <tr>
                    <td>Exerce une influence positive auprès de ses collègues </td>
                    <td><input type="radio" name="tra4" value="0" onchange="updateTableScore('TravailEquipe')"></td>
                    <td><input type="radio" name="tra4" value="0.75" onchange="updateTableScore('TravailEquipe')"></td>
                    <td><input type="radio" name="tra4" value="1.85" onchange="updateTableScore('TravailEquipe')"></td>
                    <td><input type="radio" name="tra4" value="2.5" onchange="updateTableScore('TravailEquipe')"></td>
                </tr>


                <tr>
                    <td><strong>Score Total</strong></td>
                    <td colspan="4" id="totalTravailEquipe"><strong>0</strong></td>
                    <input type="text" id="totalTravailEquipeInput" name="score6" hidden>
                </tr>
            </tbody>
        </table>

        <!-- Honnêtété & Intégrité -->
        <table id="HonnêtétéIntégrité">
            <thead>
                <tr>
                    <th colspan="5">
                        <h3>Honnêtété & Intégrité <input type="text" name="type_evaluation7" value="Honnêtété et Intégrité" hidden></h3>
                    </th>
                </tr>
                <tr>
                    <th></th>
                    <th>NSP</th> 
                    <th>Insuffisant</th>
                    <th>Satisfaisant</th>
                    <th>Très bien</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Fait preuve d'honnêtété et n'hésite pas à reconnaitre ses lacunes ou erreurs </td>
                    <td><input type="radio" name="honn1" value="0" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                    <td><input type="radio" name="honn1" value="0.75" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                    <td><input type="radio" name="honn1" value="1.85" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                    <td><input type="radio" name="honn1" value="2.5" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                </tr>
                <tr>
                    <td>Utilise son temps pour le travail et non à des fins personnelles </td>
                    <td><input type="radio" name="honn2" value="0" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                    <td><input type="radio" name="honn2" value="0.75" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                    <td><input type="radio" name="honn2" value="1.85" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                    <td><input type="radio" name="honn2" value="2.5" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                </tr>
                <tr>
                    <td>Fait preuve de loyauté et de franchise envers ses collègues </td>
                    <td><input type="radio" name="honn3" value="0" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                    <td><input type="radio" name="honn3" value="0.75" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                    <td><input type="radio" name="honn3" value="1.85" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                    <td><input type="radio" name="honn3" value="2.5" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                </tr>
                <tr>
                    <td>Informe sa hiérarchie de toute situation allant à l'encontre des intérêts de l'entreprise </td>
                    <td><input type="radio" name="honn4" value="0" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                    <td><input type="radio" name="honn4" value="0.75" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                    <td><input type="radio" name="honn4" value="1.85" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                    <td><input type="radio" name="honn4" value="2.5" onchange="updateTableScore('HonnêtétéIntégrité')">
                    </td>
                </tr>



                <tr>
                    <td><strong>Score Total</strong></td>
                    <td colspan="4" id="totalHonnêtétéIntégrité"><strong>0</strong></td>
                    <input type="text" id="totalHonnêtétéIntégritéInput" name="score7" hidden>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <!-- <button type="submit" class="btn btn-success">Enregistrer</button> -->

        <input type="text" name="collaborateur_id" value="{{$collaborateur_id}}" hidden>
        <input type="text" name="evaluateur_id" value="{{auth()->user()->id}}" hidden>

        <br>
        <br>
        <center><button type="submit" class="btn btn-success">Enregistrer</button></center>

        </>
        <script>

            function updateTableScore(tableId) {
                let totalScore = 0;

                const allRadios = document.querySelectorAll(`#${tableId} input[type="radio"]:checked`);

                allRadios.forEach(radio => {
                    totalScore += parseFloat(radio.value);
                });

                const totalElement = document.getElementById(`total${tableId}`);
                const totalInputElement = document.getElementById(`total${tableId}Input`);

                if (totalElement) {
                    totalElement.textContent = totalScore.toFixed(1);
                }

                if (totalInputElement) {
                    totalInputElement.value = totalScore.toFixed(1);
                }
                console.log("Score total calculé : ", totalScore.toFixed(1));

            }

            function validateForm() {
                const tables = ['Ponctualite', 'AutonomieInitiative','Professionnalisme','Persévérance','AdaptationFléxibilité','TravailEquipe' , 'HonnêtétéIntégrité'];
                for (const table of tables) {
                    const inputs = document.querySelectorAll(`#${table} input[type="radio"]:checked`);
                    if (inputs.length < 4) { // Assurez-vous que toutes les questions ont une réponse
                        alert('Veuillez répondre à toutes les questions avant de soumettre.');
                        return false;
                    }
                }
                return true;
            }
        </script>



</body>

</html>
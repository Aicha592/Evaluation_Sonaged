<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthController extends Controller
{

    public function index()
    {
        $collaborateurs = User::all()->where("type_utilisateur", 'collaborateur');

        $collaborateurScores = [];

        foreach ($collaborateurs as $collaborateur) {
            $evaluations = $collaborateur->collaborateur;

            $scoreTotal = 0;

            if ($evaluations->count() > 0) {
                $ponctualiteScore = $evaluations[0]->score;
                $AutonomieInitiativeScore = $evaluations[1]->score;
                $ProfessionnalismeScore = $evaluations[2]->score;
                $PersévéranceScore = $evaluations[3]->score;
                $AdaptationFléxibilitéScore = $evaluations[4]->score;
                $TravailEquipeScore = $evaluations[5]->score;
                $honneteteIntegrationScore = $evaluations[6]->score;

                $scoreTotal = $ponctualiteScore + $AutonomieInitiativeScore + $AdaptationFléxibilitéScore + $honneteteIntegrationScore + $TravailEquipeScore + $ProfessionnalismeScore + $PersévéranceScore;
            }

            $collaborateurScores[$collaborateur->id] = $scoreTotal;
        }

        return view('auth.index', compact('collaborateurs', 'collaborateurScores'));
    }



    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'matricule' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {

            if (auth()->user()->type_utilisateur === 'evaluateur') {
                return redirect()->intended('index')->with('success', 'Connexion réussie');
            }

            Auth::logout();
            return back()->withErrors([
                'matricule' => 'Seuls les utilisateurs de type évaluateurs peuvent se connecter.',
            ]);
        }

        return back()->withErrors([
            'matricule' => 'Matricule ou mot de passe incorrect',
        ]);
    }


    public function formCollaborator($id)
    {
        $collaborateur_id = $id;
        return view('auth.formulaire', compact('collaborateur_id'));
    }

    public function Calcul(Request $request)
    {
        $evaluateur_id = $request->input('evaluateur_id');
        $date_evaluation = date('Y/m/d');
        $collaborateur_id = $request->input('collaborateur_id');

        $ponctualiteType = $request->input('type_evaluation1');
        $ponctualiteScore = $request->input('score1');

        $AutonomieInitiativeType = $request->input('type_evaluation2');
        $AutonomieInitiativeScore = $request->input('score2');

        $ProfessionnalismeType = $request->input('type_evaluation3');
        $ProfessionnalismeScore = $request->input('score3');

        $PersévéranceType = $request->input('type_evaluation4');
        $PersévéranceScore = $request->input('score4');

        $AdaptationFléxibilitéType = $request->input('type_evaluation5');
        $AdaptationFléxibilitéScore = $request->input('score5');

        $TravailEquipeType = $request->input('type_evaluation6');
        $TravailEquipeScore = $request->input('score6');

        $honneteteIntegrationType = $request->input('type_evaluation7');
        $honneteteIntegrationScore = $request->input('score7');

        $existingEvaluation = DB::table('evaluations')
            ->where('collaborateur_id', $collaborateur_id)
            ->where('evaluateur_id', $evaluateur_id)
            ->exists();

        if ($existingEvaluation) {
            DB::table('evaluations')
                ->where('collaborateur_id', $collaborateur_id)
                ->where('evaluateur_id', $evaluateur_id)
                ->delete();
        }

        $evaluations = [
            [
                'collaborateur_id' => $collaborateur_id,
                'evaluateur_id' => $evaluateur_id,
                'type_evaluation' => $ponctualiteType,
                'score' => $ponctualiteScore,
                'date_evaluation' => $date_evaluation,
            ],
            [
                'collaborateur_id' => $collaborateur_id,
                'evaluateur_id' => $evaluateur_id,
                'type_evaluation' => $AutonomieInitiativeType,
                'score' => $AutonomieInitiativeScore,
                'date_evaluation' => $date_evaluation,
            ],
            [
                'collaborateur_id' => $collaborateur_id,
                'evaluateur_id' => $evaluateur_id,
                'type_evaluation' => $ProfessionnalismeType,
                'score' => $ProfessionnalismeScore,
                'date_evaluation' => $date_evaluation,
            ],
            [
                'collaborateur_id' => $collaborateur_id,
                'evaluateur_id' => $evaluateur_id,
                'type_evaluation' => $PersévéranceType,
                'score' => $PersévéranceScore,
                'date_evaluation' => $date_evaluation,
            ],
            [
                'collaborateur_id' => $collaborateur_id,
                'evaluateur_id' => $evaluateur_id,
                'type_evaluation' => $AdaptationFléxibilitéType,
                'score' => $AdaptationFléxibilitéScore,
                'date_evaluation' => $date_evaluation,
            ],
            [
                'collaborateur_id' => $collaborateur_id,
                'evaluateur_id' => $evaluateur_id,
                'type_evaluation' => $TravailEquipeType,
                'score' => $TravailEquipeScore,
                'date_evaluation' => $date_evaluation,
            ],
            [
                'collaborateur_id' => $collaborateur_id,
                'evaluateur_id' => $evaluateur_id,
                'type_evaluation' => $honneteteIntegrationType,
                'score' => $honneteteIntegrationScore,
                'date_evaluation' => $date_evaluation,
            ],
        ];

        $scoreTotal = $ponctualiteScore + $AutonomieInitiativeScore + $AdaptationFléxibilitéScore + $honneteteIntegrationScore + $TravailEquipeScore + $ProfessionnalismeScore + $PersévéranceScore;

        DB::table('evaluations')->insert($evaluations);

        return view('auth.resultats', compact('evaluations', 'scoreTotal'))->with('success', 'Formulaire rempli avec succès!');
    }

    public function detail($id)
    {
        $user = User::find($id);
        $evaluations = $user->collaborateur;

        $ponctualiteType = $evaluations[0]->type_evaluation;
        $ponctualiteScore = $evaluations[0]->score;

        $AutonomieInitiativeType = $evaluations[1]->type_evaluation;
        $AutonomieInitiativeScore = $evaluations[1]->score;

        $ProfessionnalismeType = $evaluations[2]->type_evaluation;
        $ProfessionnalismeScore = $evaluations[2]->score;

        $PersévéranceType = $evaluations[3]->type_evaluation;
        $PersévéranceScore = $evaluations[3]->score;

        $AdaptationFléxibilitéType = $evaluations[4]->type_evaluation;
        $AdaptationFléxibilitéScore = $evaluations[4]->score;

        $TravailEquipeType = $evaluations[5]->type_evaluation;
        $TravailEquipeScore = $evaluations[5]->score;

        $honneteteIntegrationType = $evaluations[6]->type_evaluation;
        $honneteteIntegrationScore = $evaluations[6]->score;


        $evaluations = [
            [

                'type_evaluation' => $ponctualiteType,
                'score' => $ponctualiteScore,
            ],
            [

                'type_evaluation' => $AutonomieInitiativeType,
                'score' => $AutonomieInitiativeScore,
            ],
            [

                'type_evaluation' => $ProfessionnalismeType,
                'score' => $ProfessionnalismeScore,
            ],
            [

                'type_evaluation' => $PersévéranceType,
                'score' => $PersévéranceScore,
            ],
            [

                'type_evaluation' => $AdaptationFléxibilitéType,
                'score' => $AdaptationFléxibilitéScore,
            ],
            [

                'type_evaluation' => $TravailEquipeType,
                'score' => $TravailEquipeScore,
            ],
            [

                'type_evaluation' => $honneteteIntegrationType,
                'score' => $honneteteIntegrationScore,
            ],
        ];

        $scoreTotal = $ponctualiteScore + $AutonomieInitiativeScore + $AdaptationFléxibilitéScore + $honneteteIntegrationScore + $TravailEquipeScore + $ProfessionnalismeScore + $PersévéranceScore;

        return view('auth.resultats', compact('evaluations', 'scoreTotal'))->with('success', 'Formulaire rempli avec succès!');

    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Gérer l'inscription
    public function register(Request $request)
    {
        $rules = [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'fonction' => 'required|string|max:255',
            'matricule' => 'required|string|max:255|unique:users',
            'type_utilisateur' => 'required|in:evaluateur,collaborateur',
        ];

        if ($request->type_utilisateur !== 'collaborateur') {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userData = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'matricule' => $request->matricule,
            'fonction' => $request->fonction,
            'type_utilisateur' => $request->type_utilisateur,
        ];

        if ($request->type_utilisateur !== 'collaborateur') {
            $userData['password'] = Hash::make($request->password);
        }

        User::create($userData);

        return redirect()->route('login')->with('success', 'Inscription réussie. Connectez-vous !');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Déconnexion réussie');
    }
}

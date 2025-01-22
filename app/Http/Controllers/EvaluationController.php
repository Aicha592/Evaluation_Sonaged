<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\User;

class EvaluationController extends Controller
{

    public function index()
    {
        $collaborateurs = User::all()->where("type_utilisateur", 'collaborateur');
        // dd($collaborateurs);
        return view('index', compact('collaborateurs'));
    }

    public function formCollaborator(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'matricule' => 'required|max:255',
        ]);

        $user = new User();
        $user->nom = $validated['nom']; 
        $user->prenom = $validated['prenom']; 
        $user->matricule = $validated['matricule']; 
        $user->type_utilisateur = $request->input('type_utilisateur'); 

        // Sauvegarde de l'utilisateur dans la base de données
        $user->save();

        $evaluateurs = $request->all();
        $evaluateur_id = $user->id;

        return view('formulaire', compact('evaluateurs', 'evaluateur_id'))->with('success', 'Formulaire soumis avec succès!');
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

        $scoreTotal = $ponctualiteScore+$AutonomieInitiativeScore+$AdaptationFléxibilitéScore+$honneteteIntegrationScore+$TravailEquipeScore+$ProfessionnalismeScore+$PersévéranceScore;
    
        DB::table('evaluations')->insert($evaluations);

        return view('resultats', compact('evaluations', 'scoreTotal'))->with('success', 'Formulaire rempli avec succès!');
    }

    
}

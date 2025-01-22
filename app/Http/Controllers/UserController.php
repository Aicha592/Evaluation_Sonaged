<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function listeUtilisateurs(){
        $users = User::where('type_utilisateur','=','collaborateur')->get();
        // dd($users);
        return view('liste',compact('users'));
    }

    public function detail($id){
        $user = User::find($id);
        $evaluations= $user->collaborateur;


      

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

        $scoreTotal = $ponctualiteScore+$AutonomieInitiativeScore+$AdaptationFléxibilitéScore+$honneteteIntegrationScore+$TravailEquipeScore+$ProfessionnalismeScore+$PersévéranceScore;
    
        return view('auth.resultats', compact('evaluations', 'scoreTotal'))->with('success', 'Formulaire rempli avec succès!');

        // $evalutions= Evaluation::where('collaborateur_id','=',$user->id)->get();
        // dd($evaluations[0]->type_evaluation);
    }
}
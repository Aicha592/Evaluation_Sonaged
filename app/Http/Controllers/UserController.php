<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
class UserController extends Controller
{
    public function listeUtilisateurs()
    {
        $users = User::where('type_utilisateur', '=', 'collaborateur')->get();

        return view('liste', compact('users'));
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

        return view('auth.resultats', compact('user', 'evaluations', 'scoreTotal'))->with('success', 'Formulaire rempli avec succès!');

        // $evalutions= Evaluation::where('collaborateur_id','=',$user->id)->get();
        // dd($evaluations[0]->type_evaluation);
    }



    public function exportPDF($id)
    {
        $user = User::find($id);
        $evaluations = $user->collaborateur;

        $scoreTotal = 0;
        $formattedEvaluations = [];

        foreach ($evaluations as $evaluation) {
            $formattedEvaluations[] = [
                'type_evaluation' => $evaluation->type_evaluation,
                'score' => $evaluation->score,
            ];
            $scoreTotal += $evaluation->score;
        }


        $imagePath = public_path('logosonaged.png');
        $imageBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($imagePath));


        $data = [
            'user' => $user,
            'evaluations' => $formattedEvaluations,
            'scoreTotal' => $scoreTotal,
            'evaluateur' => auth()->user(),
            'date' => now()->format('d/m/Y'),
            'imageBase64' => $imageBase64,
        ];

        $pdf = Pdf::loadView('pdf.resultats', $data);
        return $pdf->download('resultats_evaluation.pdf');
    }


}
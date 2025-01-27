<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Récupérer tous les utilisateurs
        $users = User::all();
        $userScores = [];

        // Boucle pour calculer les scores des utilisateurs
        foreach ($users as $user) {
            $evaluations = $user->collaborateur;

            $scoreTotal = 0;

            // Vérifier si l'utilisateur a des évaluations
            if ($evaluations->count() > 0) {
                $scores = [
                    'ponctualite' => $evaluations[0]->score ?? 0,
                    'autonomie_initiative' => $evaluations[1]->score ?? 0,
                    'professionnalisme' => $evaluations[2]->score ?? 0,
                    'persévérance' => $evaluations[3]->score ?? 0,
                    'adaptation_flexibilité' => $evaluations[4]->score ?? 0,
                    'travail_equipe' => $evaluations[5]->score ?? 0,
                    'honnêteté_integration' => $evaluations[6]->score ?? 0,
                ];

                // Additionner les scores
                $scoreTotal = array_sum($scores);
            }

            // Enregistrer le score total pour cet utilisateur
            $userScores[$user->id] = $scoreTotal;
        }

        // Vérifier si l'utilisateur est un administrateur et rediriger vers la bonne vue
        if (auth()->check() && auth()->user()->type_utilisateur === 'admin') {
            return view('admin.dashboard', ['users' => $users, 'userScores' => $userScores]);
        }

        return view('auth.index', ['users' => $users, 'userScores' => $userScores]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Utilisateur;


class LoginController extends Controller
{
    

    public function connexion()
    {
        return view('connexion');
    }

    public function verifInfos(Request $request)
    {   
        $statut = 0;
        $utilisateur = DB::table('utilisateurs')
                ->where('email', '=', $request->email)
                ->where('mot_de_passe', '=', md5($request->mot_de_passe))
                ->get();
        if($utilisateur->count()>0){
            foreach ($utilisateur as $user) {
                $statut= $user->statut;
            }
            $validated = $request->validate([
                'mot_de_passe' => 'min:12',
                'email' => 'email:rfc,dns'
            ]);
            if($statut==0)
            {   
                setcookie("Connexion", 0);
                return view('modifForm', compact(['utilisateur']));
            }
        }
        else{
            return redirect('connexion')->with('status', 'Identifiants incorrects');
        }
    }

    public function connexionA()
    {
        return view('connexionA');
    }

    public function verifInfosA(Request $request)
    {   
        $statut = 0;
        $recherche = DB::table('administrateurs')
                ->where('login', '=', $request->login)
                ->where('mot_de_passe', '=', md5($request->mot_de_passe))
                ->get();
        if($recherche->count()>0){
            foreach ($recherche as $user) {
                $statut= $user->statut;
            }
            $validated = $request->validate([
                'mot_de_passe' => 'min:12'
            ]);
            if($statut==0)
            {   
                return redirect('connexion-a')->with('status', 'Non autorisé');
            }
            else{
                setcookie("Connexion", 1);
                $utilisateurs = DB::table('utilisateurs')->get();
                return view('espaceadmin', compact(['utilisateurs']));
                
            }
        }
        else{
            return redirect('connexion-a')->with('status', 'Identifiants incorrects');
        }
    }

    public function espaceAdmin(Request $request)
    {   
        if(!isset($_COOKIE['Connexion'])){
            return redirect('connexion-a')->with('status', 'Identifiants incorrects');
        }
        if(isset($_COOKIE['Connexion'])){
          if($_COOKIE['Connexion']!=1){
          return redirect('connexion-a')->with('status', 'Identifiants incorrects');
          }
        }
        $utilisateurs = DB::table('utilisateurs')->get();
        return view('espaceadmin', compact(['utilisateurs']));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Utilisateur;

class FormController extends Controller
{
    public function index()
    {   
        setcookie("Connexion", 2);
        return view('add-info-form');
    }

    public function store(Request $request)
    {
        $utilisateur = new Utilisateur;
        $utilisateur->nom = $request->nom;
        $utilisateur->prenom = $request->prenom;
        $utilisateur->email = $request->email;
        $utilisateur->telephone = $request->telephone;
        $utilisateur->adresse = $request->adresse;
        $utilisateur->codepostal = $request->codepostal;
        $utilisateur->ville = $request->ville;
        $utilisateur->mot_de_passe = md5($request->mot_de_passe);
        $utilisateur->commentaire = $request->commentaire;
        $validated = $request->validate([
            'telephone' => 'min:10|max:10',
            'mot_de_passe' => 'min:12',
            'email' => 'email:rfc,dns'
        ]);
        $utilisateur->save();
        return redirect('add-info-form')->with('status', 'Formulaire inséré');
    }

    public function storeModif(Request $request)
    {
        if($_COOKIE["Connexion"]!=1){
            $validated = $request->validate([
                'telephone' => 'min:10|max:10',
                'mot_de_passe' => 'min:12',
                'email' => 'email:rfc,dns'
            ]);
            $utilsateur = DB::update(
                'Update utilisateurs set nom = "'.$request->nom.'", prenom = "'.$request->prenom.'", email = "'.$request->email.'", telephone = "'.$request->telephone.'", adresse = "'.$request->adresse.'",
                codepostal = "'.$request->codepostal.'", ville = "'.$request->ville.'", mot_de_passe = "'.md5($request->mot_de_passe).'", commentaire = "'.$request->commentaire.'" where email = ? and mot_de_passe = ?',
                [$request->email,md5($request->mot_de_passe)]
            );
            return redirect('connexion')->with('status', 'Formulaire modifié');
        }
        else{
            $validated = $request->validate([
                'telephone' => 'min:10|max:10',
                'email' => 'email:rfc,dns'
            ]);
            $utilsateur = DB::update(
                'Update utilisateurs set nom = "'.$request->nom.'", prenom = "'.$request->prenom.'", email = "'.$request->email.'", telephone = "'.$request->telephone.'", adresse = "'.$request->adresse.'",
                codepostal = "'.$request->codepostal.'", ville = "'.$request->ville.'", commentaire = "'.$request->commentaire.'" where email = ? ',
                [$request->email]
            );
            return redirect('espaceadmin')->with('status', 'Formulaire modifié');
        }
    }


    public function modifUtilisateur(Request $request,$id)
    {
        if(!isset($_COOKIE['Connexion'])){
            return redirect('connexion-a')->with('status', 'Identifiants incorrects');
        }
        if(isset($_COOKIE['Connexion'])){
          if($_COOKIE['Connexion']!=1){
          return redirect('connexion-a')->with('status', 'Identifiants incorrects');
          }
        }
        $utilisateur = DB::select('select nom,prenom,email,telephone,adresse,codepostal,ville,statut,commentaire from utilisateurs where id = ?', [$id]);
        return view('modifUtilisateur', compact(['utilisateur']));
    }

    public function suppUtilisateur(Request $request,$id)
    {   
        if(!isset($_COOKIE['Connexion'])){
            return redirect('connexion-a')->with('status', 'Identifiants incorrects');
        }
        if(isset($_COOKIE['Connexion'])){
          if($_COOKIE['Connexion']!=1){
          return redirect('connexion-a')->with('status', 'Identifiants incorrects');
          }
        }
        $utilisateur = DB::table('utilisateurs')->where('id', '=', $id)->delete();
        return redirect('espaceadmin');
    }

}

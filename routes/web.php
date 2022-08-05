<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Formulaire de contact
Route::get('/add-info-form', [FormController::class, 'index']);
Route::post('/store-form', [FormController::class, 'store']);
// Espace connexion pour permettre à un utilisateur de modifier ses informations
Route::get('/connexion', [LoginController::class, 'connexion']);
Route::post('/verif-infos-connexion', [LoginController::class, 'verifInfos']);
Route::post('/store-modif', [FormController::class, 'storeModif']);
// Espace connexion pour l'administrateur
Route::get('/connexion-a', [LoginController::class, 'connexionA']);
Route::post('/verif-infos-connexion-a', [LoginController::class, 'verifInfosA']);
// Espace administrateur
Route::get('/espaceadmin', [LoginController::class, 'espaceAdmin']);
// Modifier/Supprimer un utilisateur
Route::get('/modifUtilisateur/{id}', [FormController::class, 'modifUtilisateur']);
Route::get('/suppUtilisateur/{id}', [FormController::class, 'suppUtilisateur']);

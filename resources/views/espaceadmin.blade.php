<!DOCTYPE html>
<html>
<head>
    <title>Espace Utilisateur : Administrateur</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <nav class='navbar navbar-expand-lg sticky-top navbar-light bg-light'>
        <a class='navbar-brand' href='#' ><img src="{{ asset('logo.png') }}" alt="Logo"/></a>
        <ul class='navbar-nav'>
            <li class='nav-item active'>
                <a href="add-info-form"  class='btn btn-light' role='button'>Deconnexion</a>
            </li>
        </ul>
  </nav>
  <div style='background-color: gray;'>
    <h1>Tous les utilisateurs</h>
  </div>
  <div class="table-responsive">
    <table id="products" class="table table-striped table-bordered table-sm"> 
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">E-mail</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Adresse</th>
                <th scope="col">Code Postal</th>
                <th scope="col">Ville</th>
                <th scope="col">Statut</th>
                <th scope="col">Commentaire</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        @foreach ( $utilisateurs as $users)
        <tbody>
        <tr>
            <td>{{$users->nom}}</td>
            <td>{{$users->prenom}}</td>
            <td>{{$users->email}}</td>
            <td>{{$users->telephone}}</td>
            <td>{{$users->adresse}}</td>
            <td>{{$users->codepostal}}</td>
            <td>{{$users->ville}}</td>
            <td>{{$users->statut}}</td>
            <td>{{$users->commentaire}}</td>
            <td><a href='modifUtilisateur/{{$users->id}}'  class='btn btn-light' role='button'>Modifier</a></td>
            <td><a href='suppUtilisateur/{{$users->id}}'  class='btn btn-light' role='button'>Supprimer</a></td>
        @endforeach
        </tr>
        </tbody>
    </table>
  </div>
</body>
</html>
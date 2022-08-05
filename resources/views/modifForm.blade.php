<!DOCTYPE html>
<html>
<head>
    <title>Formulaire : Modifiez vos informations</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<script language="javascript">
      alert("Bonjour {{$utilisateur[0]->nom}} {{$utilisateur[0]->prenom}} ,ici vous pouvez modifier les informations vous concernant");
</script>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
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
                <a href="connexion" target="_blank" class='btn btn-light' role='button'>Se connecter</a>
            </li>
            <li class='nav-item active'>
                <a href="connexion-a" target="_blank" class='btn btn-light' role='button'>Espace Admin</a>
            </li>
            <li class='nav-item'>
                <a href="add-info-form" class='btn btn-light' role='button'>Inscription</a>
            </li>
        </ul>
  </nav>
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Modifier vos informations
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-modif')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Nom</label>
          <input type="text" id="Nom" name="nom" class="form-control" required="true" value="<?php echo $utilisateur[0]->nom?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Prénom</label>
          <input type="text" id="Prenom" name="prenom" class="form-control" required="true" value="<?php echo $utilisateur[0]->prenom?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">E-mail</label>
          <input type="email" id="E-mail" name="email" class="form-control" required="true" value="<?php echo $utilisateur[0]->email?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Telephone</label>
          <input type="number" id="Telephone" name="telephone" class="form-control" required="true" minlength="10" maxlength="10" value="<?php echo $utilisateur[0]->telephone?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Adresse</label>
          <input type="text" id="Adresse" name="adresse" class="form-control" required="true" value="<?php echo ($utilisateur[0]->adresse)?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Code Postal</label>
          <input type="number" id="CodePostal" name="codepostal" class="form-control" required="true" value="<?php echo $utilisateur[0]->codepostal?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Ville</label>
          <input type="text" id="Ville" name="ville" class="form-control" required="true" value="<?php echo $utilisateur[0]->ville?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Mot de passe</label>
          <input type="password" id="Mdp" name="mot_de_passe" class="form-control" required="true">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Commentaire</label>
          <textarea name="commentaire" class="form-control" required="true" ><?php echo $utilisateur[0]->commentaire?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>
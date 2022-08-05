<!DOCTYPE html>
<html>
<head>
    <title>Espace Utilisateur : Connexion</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
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
      Connexion
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('verif-infos-connexion')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">E-mail</label>
          <input type="email" id="E-mail" name="email" class="form-control" required="true">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Mot de passe</label>
          <input type="password" id="Mdp" name="mot_de_passe" class="form-control" required="true">
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>
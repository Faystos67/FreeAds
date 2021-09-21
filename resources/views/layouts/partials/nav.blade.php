<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand text-info" href="{{ url('/') }}">FreeAds</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" style="color: #ff6e14;" href="{{ url('/adverts') }}">Annonces</a>
                </li>
            </ul>
            @guest
                <a href="{{ (url('/register')) }}" style="margin-right: 0.5em"><button class="btn btn-primary">Créer un compte</button></a>
                <a href="{{ (url('/login')) }}" style="margin-right: 1em">   <button class="btn btn-success">Connexion</button></a>
            @else
                <button class="btn btn-primary" style="display: none"><a href=""></a>Créer un compte</button>
                <button class="btn btn-success" style="display: none"><a href=""></a>connexion</button>
                <div class="dropdown me-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Bonjour {{ Auth::user()->username }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="/profil">Paramètres</a></li>
                        <li><a class="dropdown-item" href="/createAdvert" style="color: #ff6e14;">Créer une annonce</a></li>
                        <li><a class="dropdown-item" href="/myAdverts" style="color: cadetblue; border-bottom: 1px solid gray">Mes annonces</a></li>
                        <li><a class="dropdown-item" href="{{ (url('/logout')) }}" style="color: red">Déconnexion</a></li>
                    </ul>
                </div>
            @endguest
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>
        </div>
    </div>
</nav>

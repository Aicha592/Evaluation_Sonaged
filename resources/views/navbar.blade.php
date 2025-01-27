<style>
    .user-avatar {
        display: inline-block;
        width: 50px; 
        height: 50px;
        background-color: #acc95d; 
        color: white; 
        border-radius: 50%; 
        text-align: center;
        line-height: 50px; 
        font-weight: bold;
        font-size: 18px; 
    }
</style>

<nav class="navbar navbar-light" style="background-color: #456f48;">
    
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('logo.png') }}" alt="" width="95" height="95">
        </a>
        

        @auth
         <!-- Lien Liste des utilisateurs visible uniquement pour l'admin -->
     @if(auth()->user()->type_utilisateur === 'admin')
                       
                       <a class="nav-link" href="{{ route('admin.index') }}" style="color:white">
                           Liste des utilisateurs
                       </a>
                 
               @endif
            <ul class="nav nav-pills nav-fill">
                <!-- Affichage du nom d'utilisateur avec avatar -->
                <div class="d-flex justify-content-end">
                    <p class="navbar-brand">
                        <span class="user-avatar">
                            {{ strtoupper(auth()->user()->prenom[0]) . strtoupper(auth()->user()->nom[0]) }}
                        </span>
                    </p>

                   

                    <!-- Lien de déconnexion -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">
                            <i class="fas fa-sign-out-alt" style="color:white"></i>
                        </a>
                    </li>
                </div>
            </ul>
        @else
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ route('login') }}" style="color:white">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ route('register') }}" style="color:white">Inscription</a>
                </li>
            </ul>
        @endauth
    </div>
</nav>

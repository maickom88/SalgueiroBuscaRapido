<div class="menu">
    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler"style="background-color:  #00a3ee;" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i style="color:#fff; font-size: 27px; "class="fas fa-bars"></i></span>
        </button>
        <a class="navbar-brand" href="#"><img src={{asset('img/logofinal1.png')}} alt=""></a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 text-center">
        <li class="nav-item active">
        <a class="nav-link" href={{route('home')}}>inicio<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href={{route('blog.noticias')}}>Notícias</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Eventos</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href={{route('contato.home')}}>Contato</a>
        </li>
        </ul>
        <div class="login">
        <a href={{route('login.home')}}><i class="fas fa-sign-in-alt"></i>Entrar</a>
        </div>
        </div>
    </nav>
</div>
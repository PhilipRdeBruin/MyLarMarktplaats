
<?php $act_lnk = init_ActiveLinks($active_navlink) ?>

<h2 id="titel"><b><i>Mijn Marktplaats</i></b></h2>

<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav ml-auto">
        <li class="navbar-item">
            <a href="/index" class="nav-link {{ $act_lnk['homepage'] }}">Startpagina</a>
        </li>
        <li class="navbar-item">
            <a href="/plaatsen" class="nav-link {{ $act_lnk['plaatsen'] }}">Advertentie plaatsen</a>
        </li>
        <li class="navbar-item">
            <a href="/profiel" class="nav-link {{ $act_lnk['profiel'] }} disabled">Mijn Profiel</a>
        </li>	
        <li>
            <span class="col_grijs">&nbsp;&nbsp;<sub>||</sub>&nbsp;&nbsp;</span>
        </li>
        <li class="navbar-item btn-group">
                @guest
                    <a href="#" class="nav-link dropdown-toggle {{ $act_lnk['login'] }}" data-toggle="dropdown">Inloggen</a>
                    <div class="dropdown-menu">
                        <a href="/login" class="dropdown-item droplist-mpl">Inloggen</a>
                        <div class="dropdown-divider"></div>
                        <a href="/register" class="dropdown-item droplist-mpl">Registreren</a>
                    </div>
                @else
                    <div class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->gebr_naam }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
        </li>
        <li>
            <span class="col_grijs" style="margin-right:50px"></span>
        </li>				
    </ul>
</div>

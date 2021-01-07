<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('titulo-pagina')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
</head>
<body>
    @if(session()->has('msg')) 
    <div class="alert alert-danger" role="alert">
    {{session('msg')}}	
		</div>   
    @endif
    <h1 style="color: #00ff00;">@yield('header')</h1>
    @yield('conteudo')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="{{route('livros.index')}}">Livros</a>
      <a class="nav-item nav-link" href="{{route('generos.index')}}">Generos</a>
      <a class="nav-item nav-link" href="{{route('editoras.index')}}">Editoras</a>
      <a class="nav-item nav-link" href="{{route('autores.index')}}">Autores</a>
      <a class="nav-item nav-link" href="{{route('users.show')}}">Users</a>
      <a class="nav-item nav-link" href="{{route('pesquisa.index')}}">Pesquisa</a>
      @if(auth()->check()) 
      <a class="nav-item nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
      @else
      <a class="nav-item nav-link" href="{{route('home')}}">Login</a>
      @endif
    </div>
  </div>
</nav>

@if(auth()->check())
<b>Email utilizador:</b> {{Auth::user()->email}}<br>
<b>Nome utilizador:</b> {{Auth::user()->name}}<br>
@endif


</body>
</html>
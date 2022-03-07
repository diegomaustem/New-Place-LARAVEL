<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Place</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom:30px;">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">Place</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      @auth
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
          <a class="nav-link" aria-current="page" href="{{route('admin.stores.index')}}">Lojas</a>
        </li>
        <li class="nav-item @if(request()->is('admin/products*')) active @endif">
          <a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>
        </li>
        <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
            <a class="nav-link" href="{{route('admin.categories.index')}}">Categorias</a>
          </li>
      </ul>
      <div class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <span class="nav-link">{{Auth::user()->name}}</span>
                </li>
                <li class="nav-item">
                <a class="nav-link" onclick="event.preventDefault();document.querySelector('form.logout').submit();">Sair</a>
                    <form action="{{route('logout')}}" class="logout" method="post" style="display:none;">
                        @csrf
                    </form>
                </li>
            </ul>
      </div>
      @endauth
    </div>
  </div>
</nav>
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
</body>
</html>

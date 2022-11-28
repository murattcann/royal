<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route("home-page")}}">RoyalApp</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route("authors.index")}}">Authors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route("books.index")}}">Books</a>
          </li>
           
           
        </ul>
         
        <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $currentUser->first_name . " ". $currentUser->last_name }}
        </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route("logout")}}"> Logout </a>
            </div>
        </li>
    </ul>

      </div>
    </div>
  </nav>
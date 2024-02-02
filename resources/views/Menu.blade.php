




<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('imgs/logo2.webp') }}" alt="Logo" style="width: 200px; height: auto;" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">

        <li class="nav-item mx-1">
                <a class="nav-link active" href="/">Home</a>
        </li>

        <li class="nav-item mx-1">
                <a class="nav-link active" href="">About</a>
        </li>

            <li class="nav-item mx-1">
                <a class="nav-link active bb" href="/produitss/Casque">Casque</a>
            </li>

            <li class="nav-item mx-1">
                <a class="nav-link active bb" href="/produitss/Souris">Souris</a>
            </li>

            <li class="nav-item mx-1">
                <a class="nav-link active bb" href="/produitss/Clavier">Clavier</a>
            </li>


        @if(Auth::user())

            @if(Auth::user()->role === 'ADMIN')
                <li class="nav-item mx-1">
                    <a class="nav-link active" style="color: yellow; background-color: #50C878; border-radius: 10px;" href="/produits">Manage Product</a>
                </li>

                <li class="nav-item mx-1">
                    <a href="{{route('create')}}" class="nav-link bb2" >Add Product</a>
                </li>
            @endif

            @if (Auth::user()->role === 'USER')
                <li class="nav-item">
                        <a class="nav-link" href="/espaceclient">Espace Client</a>
                </li>

                <li class="nav-item">
                        <a class="nav-link" href="/Contact">Contact Us</a>
                </li>
            @endif

            <li class="nav-item mx-1">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit"  href="/logout" style="border: none; cursor: pointer; background-color: black; ">
                        <img src="{{ asset('imgs/out2.webp') }}" alt="delete" style="width: 50px; height: 50px; background-image: none;" />
                    </button>
                </form>
            </li>
        

        @else
            <li class="nav-item mx-1">
                <a class="nav-link active" style="color: blue;" href="/login">Se Connecter</a>
            </li>

            <li class="nav-item mx-1">
                <a class="nav-link active" style="color: blue;" href="/register">S'inscrire</a>
            </li>
        @endif

        <li class="nav-item">
            <a class="nav-link" href="/cart" style="background-color: grey; border-radius: 8px; padding: 8px;" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart </a>
        </li>



            

            
        </ul>
    </div>
    </nav>
    <style>
.navbar{
  background-color: rgb(0, 0, 0) !important; /* Use !important to ensure the style takes precedence */
  color: white; /* Set text color to white or any other color that suits your design */
}


.nav-link{
  margin-top: 5px ;
  color: white;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, Impact, Haettenschweiler, 'Arial Narrow Bold', 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  font-size: 13px;
  margin-right: 10px;
  font-weight: bold;
  font-size: 20px;
  
}

.nav-link:hover{
    color: red;

}

.bb{
    color: #50C878;
    font-family: Georgia, 'Times New Roman', Times, serif;
}

.bb2{
    color: white;
    border-radius: 10px;
    background-color: green;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 18px;

}
.bb2:hover{
    color: yellow;
}






</style>

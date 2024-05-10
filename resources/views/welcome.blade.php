<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>

  <!-- CSS -->
  <link rel="stylesheet" href="/welcome.css">

  <!-- Font Prompt -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
  <div class="container-fluid">

      <!-- Navbar HTML -->
      <nav class="navBar">
          <div class="logoEcobite">
              <img src="./images/Logo.png" alt="">
          </div>

          @guest
          <div class="navLinks">
            <a href="/"><b>Home</b></a>
            <a href="{{ route('register') }}">Register</a>
            <a href="{{ route('login') }}"><button>Login</button></a>
            </div> 
        @else 
            <div class="navLinks">
                <a href="/"><b>Home</b></a>
                <a href="/cartPage">Cart[{{ $totalQuantity }}]</a>
                <a href="">Log Out</a>
            </div>   
          @endguest
      </nav>

      <!-- Landing page HTML -->
      <div class="landingPageContainer">
          <div class="landingPageText">
              <h1 id="EveryBite">Every Bite</h1>
              <h1 id="Counts">Counts</h1>
          </div>
          <div class="landingPageImage">
              <img src="/assets/Landing Page Image.png" alt="">
          </div>
      </div>

      <!-- Menu Navbar HTML -->
      <div class="menuNavBarContainer">
          <div class="categories">
              <h1 id="Food">Food</h1>
              <h1 id="Drinks">Drinks</h1>
          </div>
      </div>

      <!-- Main course HTML -->
      <div class="mainCourseContainer">
          <div class="mainCourseText">
              <h2>Main Course</h2>
          </div>
          <!-- Menu untuk food -->
          <div class="FoodCourseMenu">
              @forelse ($foodMenu as $m)
                <div class="mainCourseCard">
                    <div class="image">
                        <img src="{{ asset('storage/' .$m->FotoFoodMain) }}" alt="{{ $m->FotoFoodMain }}">
                    </div>
                    <div class="keterangan">
                        <h1 class="foodTitle">{{ $m->NamaFoodMain }}</h1>
                        <h2 class="originalPrice"><del>Rp. {{ number_format($m->HargaOriFoodMain) }}</del></h2>
                        <h2 class="discountPrice">Rp. {{ number_format($m->HargaOriFoodMain/2) }}</h2>
                        <form action="{{ url('addcart', $m->id) }}" method="POST">
                            @csrf
                            <div class="buttonContainer">
                                <input type="number" value="1" min="1" class="form-control" name="cartQuantity" id="cartQuantity">
                                <input type="submit" value="Add To Cart" class="addButton">
                            </div>
                        </form>
                    </div>
                </div>
              @empty
                <p>{{ 'No product added' }}</p>
              @endforelse

          </div>
          
          <!-- Menu untuk minuman -->
          <div class="DrinkCourseMenu">
            @forelse ($drinkMenu as $d)
                <div class="mainCourseCard">
                    <div class="image">
                        <img src="storage/{{ $d->FotoFoodMain }}" alt="{{ $d->FotoFoodMain }}">
                    </div>
                    <div class="keterangan">
                        <h1 class="drinkTitle">{{ $d->NamaFoodMain }}</h1>
                        <h2 class="originalPrice"><del>{{ $d->HargaOriFoodMain }}</del></h2>
                        <h2 class="discountPrice">Rp. {{ ($d->HargaOriFoodMain)/2 }}</h2>
                        <form action="{{ url('addcart', $m->id) }}" method="POST">
                            @csrf
                            <div class="buttonContainer">
                                <input type="number" value="1" min="1" class="form-control" name="cartQuantity" id="cartQuantity">
                                <input type="submit" value="Add To Cart" class="addButton">
                            </div>
                        </form>
                    </div>
                </div>
            @empty
                <p>{{ 'No product added' }}</p>
            @endforelse
          </div> 
      </div>

      <!-- Side Course HTML -->
      <div class="SideCourseContainer">
          <div class="sideCourseText">
              <h2>Side Course</h2>
          </div>
          <div class="sideCourseMenu">
            @forelse ($sideDishMenu as $s)
                <div class="sideCourseCard">
                    <div class="image">
                        <img src="storage/{{ $s->FotoFoodMain }}" alt="{{ $s->FotoFoodMain }}">
                    </div>
                    <div class="keterangan">
                        <h1 class="foodTitle">{{ $s->NamaFoodMain }}</h1>
                        <h2 class="originalPrice"><del>{{ $s->HargaOriFoodMain }}</del></h2>
                        <h2 class="discountPrice">Rp. {{ ($s->HargaOriFoodMain)/2 }}</h2>
                        <form action="{{ url('addcart', $m->id) }}" method="POST">
                            @csrf
                            <div class="buttonContainer">
                                <input type="number" value="1" min="1" class="form-control" name="cartQuantity" id="cartQuantity">
                                <input type="submit" value="Add To Cart" class="addButton">
                            </div>
                        </form>
                    </div>
                </div>
            @empty
                <p>{{ 'No product added' }}</p>
            @endforelse
          </div>
      </div>
      
  <script src="/welcome.js"></script>
  </div>
  
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Galada&family=Nunito:wght@400;500;600;800&family=Orelega+One&family=Poppins:wght@400;500;600&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Prompt' rel='stylesheet'>
    <link rel="stylesheet" href="cartPage.css">
</head>
<body>
    <div class="navbar">
        <div class="navbar-container">
            <div class="logoBox">
                <a href="/" class="navLogo"><h1>EcoBite</h1></a>
            </div>
            
        @guest
          <div class="navLinks">
            <a href="/"><b>Home</b></a>
            <a href="{{ route('register') }}">Register</a>
            <a href="{{ route('login') }}"><button>Login</button></a>
            </div> 
        @else 
            <div class="navLinks menu">
                <a href="/"><b>Home</b></a>
                <a href="/cartPage">Cart[{{ $totalQuantity }}]</a>
                <a href="">Log Out</a>
                <div class="profile">
                    <a href="" class="profileName">{{ Auth::user()->name }}</a>
                </div>
            </div>   
          @endguest
        </div>
    </div>

    <div class="cart-container">
        <div class="cartrow">
            <div class="cart-header">
                <h3 class="product">Product</h3>
                <h3 class="UnitPrice">Unit Price</h3>
                <h3 class="Quantity">Quantity</h3>
                <h3 class="Totalprice">Total price</h3>
                <h3 class="Action">Actions</h3>
            </div>
        </div>
        <div class="content">
            @forelse ($cart as $c)
                <div class="row1">
                    <div class="productSection">
                        <input type="checkbox" name="" id="include">
                        <img src="storage/{{ $c->cartFoto }}" alt="{{ $c->cartFoto }}" class="foodimage">
                        <p class="foodname">{{ $c->product_title }}</p>
                    </div>
                    <div class="unitpriceSection">
                        <p class="foodprice">{{ number_format($c->price) }}</p>
                    </div>
                    <div class="quantitySection">
                        <button class="minus">-</button>
                        <input type="text" name="" id="quantityamount" value="{{ $c->quantity }}" maxlength="2" size="1">
                        <button class="plus">+</button>
                    </div>
                    <div class="totalpriceSection">
                        <p class="sumtopay">{{ ($c->price)*($c->quantity) }}</p>
                    </div>
                    <div class="delete">
                        <form action="/delete-cart/{{ $c->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="deletebutton" type="submit"><img src="/images/Delete.png" alt="" height="35px"></button>
                        </form>
                        
                    </div>
                </div>
            @empty
                <p>Aww your cart is empty...</p>
            @endforelse 
        </div>
    </div>

    <form action="{{ url('confirmOrder') }}" method="POST">
        @csrf
        <div class="checkout">
            <div class="finalprice">
                <p style="margin-right: 10px;">Total <span class="totalQuantity">({{ $totalQuantity }})</span>: </p>
                <p class="totalPrice"> {{ $totalPrice }}</p>
                <input type="number" name="price" id="price" style="display: none">
            </div>
            <div class="checkoutbutton-style">
                <a href="/checkout"><button class="checkoutbutton" type="submit">Checkout</button></a>
            </div> 
        </div>
    </form>
    <script src="/cartPage.js"></script>
</body>
</html>
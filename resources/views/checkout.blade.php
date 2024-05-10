<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Galada&family=Nunito:wght@400;500;600;800&family=Orelega+One&family=Poppins:wght@400;500;600&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Prompt' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    {{-- font awesome link --}}
    <script src="https://kit.fontawesome.com/c07884273f.js" crossorigin="anonymous"></script>

    {{-- link css --}}
    <link rel="stylesheet" href="checkout.css">
</head>
<body>
    <div class="navbar" id="navbar">
        <div class="navbar-container">
            <div class="logoBox">
                <a href="/" class="navLogo"><h1>EcoBite</h1></a>
            </div>
            <div class="menu" >
                <a href="/" class="home">Home</a>
                <a href="/" class="cart">Cart</a>
                <a href="/" class="location">Location</a>
                <div class="profile">
                    <a href="" class="profileName">{{ Auth::user()->name }}</a>
                </div>
            </div>
        </div>
    </div>
    <div id="scroller">
        <p class="checkout-Header" >Checkout</p>
    </div>
    <div class="delivery-address-container">
        <div class="delivery-header">
            <img src="images/Location.png" alt="" height="20px" width="20px" id="img-deliv">
            &nbsp;&nbsp;&nbsp;
            <p>Delivery Address</p>
        </div>
        <div class="deliv-content-container">
            <div class="name-number">
                <p>{{ Auth::user()->name }}</p>
                <p>{{ Auth::user()->phone }}</p>
            </div>
            <div class="custaddress">
                <p>{{ Auth::user()->address }}</p>
            </div>
            <div class="change-address">
                <a href="">Change</a>
            </div>
        </div>
    </div>

    @forelse ($orders as $o)
        <div class="row1">
            <div class="productSection">
                <img src="storage/{{ $o->orderFoto }}" alt="" class="foodimage">
                <p class="foodname">{{ $o->product_title }}</p>
            </div>
            <div class="unitpriceSection">
                <p class="foodprice">{{ $o->price }}</p>
            </div>
            <div class="quantitySection">
                <button class="minus">-</button>
                <input type="text" name="" id="quantityamount" value="{{ $o->quantity }}" maxlength="2" size="1">
                <button class="plus">+</button>
            </div>
            <div class="totalpriceSection">
                <p class="sumtopay">{{ ($o->price)*($o->quantity) }}</p>
            </div>
            <div class="delete">
                <button class="deletebutton"><img src="images/Delete.png" alt="" height="35px" ></button>
            </div>
        </div>
    @empty
        
    @endforelse
    
    <div class="row1">
        <div class="messageSection">
            <p>Message:</p> &nbsp;&nbsp;
            <div class="message-box">
                <input type="text" name="message" placeholder="(Optional) Leave a message">
            </div>
        </div>
        <div class="unitshippingsection">
            <p class="foodprice">Shipping by:</p>
        </div>
        <div class="delivery-mode">
            <select name="shippingDropdown" id="shippingDropdown">
                <option value="Gojek">Gojek</option>
                <option value="Grab">Grab</option>
                <option value="PickUp">Pick up on restaurant</option>
            </select>
        </div>
    </div>
    <div class="payment-summary">
        <div class="payment-method">
            <p>Payment Method: </p>
            &nbsp;&nbsp;&nbsp;
            <div class="radio-toolbar">
                <input type="radio" id="radio1" name="radios" value="all" checked>
                <label for="radio1">Debit</label>
              
                <input type="radio" id="radio2" name="radios" value="false">
                <label for="radio2">Credit</label>
              
                <input type="radio" id="radio3" name="radios" value="true">
                <label for="radio3">COD</label>
            </div>
        </div>
        <div class="payment-finalsum">
            <table>
                <tr>
                  <th>Merchandise Subtotal</th>
                  <td>Rp. {{ number_format($totalPrice) }}</td>
                </tr>
                <tr>
                  <th>Total Payment</th>
                  <td>Rp. {{ number_format($totalPrice) }}</td>
                </tr>
              </table>
        </div>
    </div>

    <div class="checkout">
        <div class="selectall">
           <a href="">See Our Help Center</a> 
        </div>
        <div class="checkoutbutton-style">
            <a href="#scroller">
                <button class="checkoutbutton">Complete Payment</button>
            </a>
        </div> 
       
    </div>
    <div class="darkOverlay"></div>
    <div class="popUpContainer">
        <i class="fa-solid fa-check"></i>
        <h2>Payment Successful</h2>
        <a href="/"><button>Continue</button></a>
    </div>
    <script src="/checkout.js"></script>
</body>
</html>
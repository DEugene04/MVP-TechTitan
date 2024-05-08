<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>

  <!-- Connect CSS -->
  <link rel="stylesheet" href="/edit.css">
</head>
<body>
    <div class="container-fluid">
        <div class="adminTitle">
            <h1>Edit Product</h1>
        </div>

        <!-- Popup to edit, and add menu HTML -->
        <form action="/update-menu/{{ $dataMenu->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
            <div class="popUpContainer" id="popUpContainer">
                <div class="popUpTitle">
                    <h1>EDIT</h1>
                </div>

                {{-- Input ID Field --}}
                <div id="IDContainer" class="contentContainer">
                    <label for="IDFoodMain">ID</label>
                    <input id="IDFoodMain" type="text" value="{{ $dataMenu->IDFoodMain }}" name="IDFoodMain">
                    @error('IDFoodMain')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Nama Field --}}
                <div id="NamaMakananContainer" class="contentContainer">
                    <label for="NamaFoodMain">Nama</label>
                    <input id="NamaFoodMain" type="text" value="{{ $dataMenu->NamaFoodMain }}" name="NamaFoodMain" >
                    @error('NamaFoodMain')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Jenis Field --}}
                <div id="JenisContainer" class="contentContainer">
                    <label for="JenisFoodMain">Jenis</label>
                    {{-- Dropdown Menu untuk jenis makanan --}}
                    <select name="" id="dropDown">
                        <option value="Food">Food</option>
                        <option value="Drinks">Drinks</option>
                        <option value="Side Dish">Side Dish</option>
                    </select>
                    <input id="JenisFoodMain" type="text" value="{{ $dataMenu->JenisFoodMain }}" name="JenisFoodMain">
                    @error('JenisFoodMain')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Harga Field --}}
                <div id="HargaContainer" class="contentContainer">
                    <label for="HargaOriFoodMain">Harga</label>
                    <input id="HargaOriFoodMain" type="text" value="{{ $dataMenu->HargaOriFoodMain }}" name="HargaOriFoodMain">
                    @error('HargaOriFoodMain')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input foto field --}}
                <div id="FotoContainer" class="contentContainer">
                    <label for="">Foto</label>
                    <label for="FotoFoodMain"><button class="uploadBtn">Upload</button></label>
                    <input id="FotoFoodMain" type="file" value="{{ $dataMenu->FotoFoodMain }}" name="FotoFoodMain">
                    @error('FotoFoodMain')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input deskripsi field --}}
                <div id="DeskripsiContainer" class="contentContainer">
                    <label for="DeskripsiFoodMain">Deskripsi</label>
                    <input id="DeskripsiFoodMain" type="text" value="{{ $dataMenu->DeskripsiFoodMain }}" name="DeskripsiFoodMain">
                    @error('DeskripsiFoodMain')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input quantity field --}}
                <div id="QuantityContainer" class="contentContainer">
                    <label for="">Quantity</label>
                    <div class="quantityContent">
                        <button class="minusBtn">-</button>
                        <p class="quantity">{{ $dataMenu->QuantityFoodMain }}</p>
                        <button class="plusBtn">+</button>
                        <input type="text" id="QuantityFoodMain" value="{{ $dataMenu->QuantityFoodMain }}" name="QuantityFoodMain">
                    </div>
                </div>

                {{-- Button untuk save --}}
                <div id="SaveContainer" class="contentContainer">
                    <button type="submit" class="saveBtn">Update</button>
                </div>
            </div>
        </form>

        <!-- link to javascript -->
        <script src="/edit.js"></script>
    </div>
</body>
</html>
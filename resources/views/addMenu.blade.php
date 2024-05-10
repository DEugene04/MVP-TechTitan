<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>

  {{-- font awesome link --}}
  <script src="https://kit.fontawesome.com/c07884273f.js" crossorigin="anonymous"></script>

  <!-- Connect CSS -->
  <link rel="stylesheet" href="/addMenu.css">
</head>
<body>
    <div class="container-fluid">
        <div class="adminTitle">
            <h1>Admin Dashboard</h1>
        </div>
        <hr>
        <a href="/"><h2><i class="fa-solid fa-arrow-left"></i>Home</h2></a>

      <!-- Table HTML -->
        <div class="tableContainer">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Availability</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menu as $m)
                    <tr>
                        <td>{{ $m->IDFoodMain }}</td>
                        <td>{{ $m->NamaFoodMain }}</td>
                        <td>{{ $m->JenisFoodMain }}</td>
                        <td>{{ $m->HargaOriFoodMain }}</td>
                        <td>{{ $m->QuantityFoodMain }}</td>
                        <td><a href="/edit-menu/{{ $m->id }}"><button class="editBtn">Edit</button></a></td>
                        <td><form action="/delete-menu/{{ $m->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="deleteBtn" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <p>No Items Added Just Yet</p>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Add new Menu HTML -->
        <div class="addMenuContainer">
            <button id="addMenuBtn">Add Menu</button>
        </div>

        <!-- Popup to edit, and add menu HTML -->
        <form action="/store-menu" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="popUpContainer" id="popUpContainer">
                <div class="popUpTitle">
                    <h1>Add Menu</h1>
                </div>

                {{-- Input ID field --}}
                <div id="IDContainer" class="contentContainer">
                    <label for="IDFoodMain">ID</label>
                    <input id="IDFoodMain" type="text" value="{{ old('IDFoodMain') }}" name="IDFoodMain">
                    @error('IDFoodMain')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input nama field --}}
                <div id="NamaMakananContainer" class="contentContainer">
                    <label for="NamaFoodMain">Nama</label>
                    <input id="NamaFoodMain" type="text" value="{{ old('NamaFoodMain') }}" name="NamaFoodMain" >
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
                    <input id="JenisFoodMain" type="text" value="{{ old('JenisFoodMain') }}" name="JenisFoodMain">
                    @error('JenisFoodMain')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Harga field --}}
                <div id="HargaContainer" class="contentContainer">
                    <label for="HargaOriFoodMain">Harga</label>
                    <input id="HargaOriFoodMain" type="text" value="{{ old('HargaOriFoodMain') }}" name="HargaOriFoodMain">
                    @error('HargaOriFoodMain')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Foto Container --}}
                <div id="FotoContainer" class="contentContainer">
                    <label for="">Foto</label>
                    <label for="FotoFoodMain"><button class="uploadBtn">Upload</button></label>
                    <input id="FotoFoodMain" type="file" value="{{ old('FotoFoodMain') }}" name="FotoFoodMain">
                    @error('FotoFoodMain')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Description Field --}}
                <div id="DeskripsiContainer" class="contentContainer">
                    <label for="DeskripsiFoodMain">Deskripsi</label>
                    <input id="DeskripsiFoodMain" type="text" value="{{ old('DeskripsiFoodMain') }}" name="DeskripsiFoodMain">
                    @error('DeskripsiFoodMain')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Quantity Field --}}
                <div id="QuantityContainer" class="contentContainer">
                    <label for="">Quantity</label>
                    <div class="quantityContent">
                        <button class="minusBtn">-</button>
                        <p class="quantity">1</p>
                        <button class="plusBtn">+</button>
                        <input type="text" id="QuantityFoodMain" value="{{ old('QuantityFoodMain') }}" name="QuantityFoodMain">
                    </div>
                </div>

                {{-- Save Button --}}
                <div id="SaveContainer" class="contentContainer">
                    <button type="submit" class="saveBtn">Save</button>
                </div>
            </div>
        </form>

        {{-- darkOverlay untuk pas popUp muncul --}}
        <div class="darkOverlay"></div>

        <!-- link to javascript -->
        <script src="/addMenu.js"></script>
    </div>
</body>
</html>
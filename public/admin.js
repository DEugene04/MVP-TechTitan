// biar tombol button upload bisa buat upload file
let uploadBtn = document.querySelector(".uploadBtn")
let inputFoto = document.getElementById("FotoFoodMain")
let addMenu = document.getElementById("addMenuBtn")
let popUp = document.getElementById("popUpContainer")

uploadBtn.addEventListener('click', function(e){
    e.preventDefault()
    inputFoto.click()
})

addMenu.addEventListener("click", function(){
    popUp.style.display = "block"
})

popUp.addEventListener('click', function(event){
    // Prevent closing when clicking inside the popup container
    event.stopPropagation();
});

window.addEventListener('click', function(e){
    // Allows user to exit and close the popUp easily when clicking outside the popUp Box
    if (e.target !== popUp && e.target !== addMenu) {
        popUp.style.display = 'none';
    }
})

// Biar quantitynya bisa nambah dan berkurang
let minus = document.querySelector(".minusBtn")
let quantity = document.querySelector(".quantity")
let quantityValue = parseInt(quantity.textContent)
let plus = document.querySelector(".plusBtn")
let inputQuantity = document.getElementById("QuantityFoodMain")

// to set default quantity to 1
window.addEventListener("DOMContentLoaded", function(){
    inputQuantity.value = 1;
})

minus.addEventListener('click', function(e){
    e.preventDefault()
    if (quantityValue > 0){
        quantityValue -= 1
        quantity.textContent = quantityValue
        inputQuantity.value = quantity.textContent
    } else {
        alert("The quantity has reached it's minimum limit")
        // to check if cart quantity 0 then minus will do nothing
    }
    console.log(inputQuantity.value)
})

plus.addEventListener('click', function(e){
    e.preventDefault()
    quantityValue += 1;
    quantity.textContent = quantityValue
    inputQuantity.value = quantity.textContent
    console.log(inputQuantity.value)
})

let tes = document.getElementById("DeskripsiFoodMain")

// Untuk masukin value dropdown ke input jenis makanan
let dropdown = document.getElementById('dropDown')
let inputJenis = document.getElementById('JenisFoodMain')

// to set the default jenis to food
window.addEventListener("DOMContentLoaded", function(){
    inputJenis.value = "Food";
})

dropdown.addEventListener('change', function(){
    // Get the selected option
    let selectedOption = dropdown.options[dropdown.selectedIndex]

    // Get the text of the selected option
    let selectedText = selectedOption.text

    inputJenis.value = selectedText;
})
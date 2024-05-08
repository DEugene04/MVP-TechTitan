// Untuk biar bisa ubah2 antara food dan drink
let food = document.getElementById("Food")
let drink = document.getElementById("Drinks")
let drinkMenu = document.querySelector(".DrinkCourseMenu")
let foodMenu = document.querySelector(".FoodCourseMenu")

// langsung food di show dan drink di hide ketika dom di load
window.addEventListener("DOMContentLoaded", function(){
  food.style.opacity = "1"
  drink.style.opacity = "0.5"
  foodMenu.style.display = "flex"
  drinkMenu.style.display = "none"
  foodMenu.style.opacity = "1"
  drinkMenu.style.opacity = "0"
})

// ketika food di click menu ubah ke food and tulisan food di Highlight
food.addEventListener("click", function(){
  food.style.opacity = "1"
  drink.style.opacity = "0.5"
  foodMenu.style.display = "flex"
  drinkMenu.style.display = "none"
  foodMenu.style.opacity = "1"
  drinkMenu.style.opacity = "0"
})

// ketika drink di click menu ubah ke drink and tulisan drink di Highlight
drink.addEventListener("click", function(){
  food.style.opacity = "0.5"
  drink.style.opacity = "1"
  foodMenu.style.display = "none"
  drinkMenu.style.display = "flex"
  foodMenu.style.opacity = "0"
  drinkMenu.style.opacity = "1"
})
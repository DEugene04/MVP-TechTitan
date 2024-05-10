let paymentBtn = document.querySelector('.checkoutbutton')
let popUp = document.querySelector('.popUpContainer')
let darkOverlay = document.querySelector('.darkOverlay')

paymentBtn.addEventListener('click', function(){
    popUp.style.display = "flex"
    darkOverlay.style.display = "block"
})

popUp.addEventListener('click', function(e){
    e.stopPropagation()
})

window.addEventListener('click', function(e){
    if (e.target != popUp && e.target != paymentBtn){
        popUp.style.display = "none"
        darkOverlay.style.display = "none"
    }
})
function myFunction() {
    var x = document.getElementById("typePW");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
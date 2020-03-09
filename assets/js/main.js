// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("who");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function () {
  modal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target === modal) {
    modal.style.display = "none";
  }
};


function selectCategory() {
  var select = document.getElementById("itemCategory").value;
  if (select === "toys") {
    document.getElementById("itemSubcategoryToy").style.display = "block";
    document.getElementById("itemSubcategoryVG").style.display = "none";
  }else {
    document.getElementById("itemSubcategoryToy").style.display = "none";
    document.getElementById("itemSubcategoryVG").style.display = "block";
  }
}

$(".deleteMember").on("click", function(){
$(".popup, .popup-content").addClass("active");
});

$(".close, .popup").on("click", function(){
$(".popup, .popup-content").removeClass("active");
});

var rellax = new Rellax('.rellax');

var image = document.getElementsByClassName('thumbnail');
new simpleParallax(image);
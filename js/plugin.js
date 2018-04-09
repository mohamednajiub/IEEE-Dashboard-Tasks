$( document ).ready(function() {

  // Open navbarSide when button is clicked
  $('#navbarSideButton').on('click', function() {
    $('#navbarSide').addClass('reveal');
    $('.overlay').show();
    $('.navbar-toggler').html("X");
  });
  
  // Close navbarSide when the outside of menu is clicked
  $('.overlay').on('click', function(){
    $('#navbarSide').removeClass('reveal');
    $('.overlay').hide();
    $('.navbar-toggler').html(" &#9776;");
  });
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })
  
  
});
// Preview 
function preview() {
  'use strict';
  if(this.files && this.files[0]){
    let reader = new FileReader();
    reader.onload = function (data) {
      'use strict';
      let img_preview = document.getElementById("img_preview");
      img_preview.src = data.target.result;
      img_preview.style.display = "block";
      img_preview.style.height = "200px";
    }
    reader.readAsDataURL(this.files[0]);
  }
};

// Task Deadline Count down

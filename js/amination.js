// show password
function myFunction() {
    var x = document.getElementById("myInput1");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

//Show Change_password
function myFunction1() {
    var oldPassword = document.getElementById("oldPassword");
    var newPassword = document.getElementById("newPassword");
    var confirmPassword = document.getElementById("confirmPassword");

    // Toggle the type attribute for all password fields
    if (oldPassword.type === "password") {
        oldPassword.type = "text";
        newPassword.type = "text";
        confirmPassword.type = "text";
    } else {
        oldPassword.type = "password";
        newPassword.type = "password";
        confirmPassword.type = "password";
    }
}


// password_required
$('#myInput1').on('focus', function(){
    $('.password_required').slideDown();
})
$('#myInput1').on('blur', function(){
    $('.password_required').slideUp();
})
$('#myInput1').on('keyup', function(){
    passValue = $(this).val();

    if(passValue.match(/[a-z]/g)){
        $('.lowercase').addClass('active');
    }else{
        $('.lowercase').removeClass('active');
    }

    if(passValue.match(/[A-Z]/g)){
        $('.capital').addClass('active');
    }else{
        $('.capital').removeClass('active');
    }

    if(passValue.match(/[0-9]/g)){
        $('.numberd').addClass('active');
    }else{
        $('.numberd').removeClass('active');
    }

    if(passValue.match(/[!@#$%^&*]/g)){
        $('.special').addClass('active');
    }else{
        $('.special').removeClass('active');
    }

    if(passValue.length == 8 || passValue.length > 8 ){
        $('.eight_charater').addClass('active');
    }else{
        $('.eight_charater').removeClass('active');
    }
})


//Slideshow
let slideIndex = 1;
showSlides(slideIndex);

setInterval(function() {
  plusSlides(1);
}, 6000);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides1");
  let dots = document.getElementsByClassName("dot1");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active1", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active1";
}

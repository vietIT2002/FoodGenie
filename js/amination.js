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

//product arrangement
$(document).ready(function(){
    load_data();

    function load_data(page){
        var selected=$('#sap_xep').val();
        var price_min=$('#price-min').val();
        var price_max=$('#price-max').val();
        var checkedBrand=[];
        $('.checkBrand').each(function(){
            if($(this).is(':checked')){
                checkedBrand.push('or ten_sp like "%'+$(this).val()+'%"');
            }
        });
        checkedBrand=checkedBrand.toString();
        var checkedDv=[];
        $('.checkDv').each(function(){
            if($(this).is(':checked')){
                checkedDv.push('or ten_sp like "%'+$(this).val()+'%"');
            }
        });
        checkedDv=checkedDv.toString();
        $.ajax({
            url:"frontend/ajax.php",
            method:"POST",

            data:{
                page:page,'act':'<?=$act?>',
                'id':'<?=$id?>',
                'search':'<?=$search?>',
                'selected_sort':selected,
                'price_min':price_min,
                'price_max':price_max,
                'checkedBrand':checkedBrand,
                'checkedDv':checkedDv},
            success:function(data){
                 $('#phan_trang').html(data);
            }
        })
    }
    $(document).on('click', '.phan_trang_lk',function(){
        var page=$(this).attr("id");
        load_data(page);
    });
    $('#sap_xep').change(function(){
        load_data(1);
    });
    $('#btn_gia').click(function(){
        load_data(1);
    });
    $('#chkBrand').change(function(){
        load_data(1);
    });
    $('#chkDv').change(function(){
        load_data(1);
    });
});

// member information village
    function toggleDetails(id) {
        const element = document.getElementById(id);
        if (element.style.display === 'none') {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    }

// Hide and show products
    let visibleItems = 8; 
    const allItems = document.querySelectorAll('.product-item'); 

    function loadMore() {
        for (let i = visibleItems; i < visibleItems + 4 && i < allItems.length; i++) { 
            allItems[i].style.display = 'block'; 
        }
        visibleItems += 4; 

        if (visibleItems >= allItems.length) {
            document.getElementById('load-more').style.display = 'none';
        }
    }

  
$(document).ready(function(){

    $("#selSize").change(function(){
        var idSize = $(this).val();
         $.ajax({
             type:'get',
             url:'/get-product-price',
             data:{idSize:idSize},
             success:function(resp){
                var arr = resp.split('#');
                $("#getPrice").html("NPR "+arr[0]);
                $("#price").val(arr[0]);
             },error:function(){
                alert("Error");
             }
        });

    });

    $('#billtoship').on('click',function(){

  if(this.checked){
          $("#shipping_name").val($("#billing_name").val()); 
          $("#shipping_address").val($("#billing_address").val());     
          $("#shipping_city").val($("#billing_city").val());    
          $("#shipping_state").val($("#billing_state").val());    
          $("#shipping_country").val($("#billing_country").val());    
          $("#shipping_pincode").val($("#billing_pincode").val());    
          $("#shipping_mobile").val($("#billing_mobile").val());    
          


          }

          else{

          $("#shipping_name").val(''); 
          $("#shipping_address").val('');     
          $("#shipping_city").val('');    
          $("#shipping_state").val('');    
          $("#shipping_country").val('');    
          $("#shipping_pincode").val('');    
          $("#shipping_mobile").val('');   

          }

});





});


function selectPaymentMethod(){
  if($('#Paypal').is(':checked')  ||  $('#COD').is(':checked')){
    
  }
  else{
    alert("Please select your preferred payment method");
      return false;
  }

}







  $(document).ready(function(){
          // Add smooth scrolling to all links
          $("a").on('click', function(event) {
        
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
              // Prevent default anchor click behavior
              event.preventDefault();
        
              // Store hash
              var hash = this.hash;
        
              // Using jQuery's animate() method to add smooth page scroll
              // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
              $('html, body').animate({
                scrollTop: $(hash).offset().top
              }, 800, function(){
           
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
              });
            } // End if
          });
        });
  
  

 let navbar = $(".first-nav");

$(window).scroll(function(){

  let oTop = $(".headline-dark").offset().top-window.innerHeight;
  if($(window).scrollTop() > oTop){
      navbar.addClass("sticky");
  }
  else{
      navbar.removeClass("sticky");
  }
   
});


const selectElement = function (element) {
    return document.querySelector(element);

};

let menuToggler =selectElement('.menu-toggle');
let body = selectElement('body');

menuToggler.addEventListener('click', function() {

body.classList.toggle('open');

});


/*Scroll Reveal*/
window.sr = ScrollReveal();

sr.reveal('.animate-left',{
     origin: 'left',
     duration: 1000,
     distance: '25rem',
     delay: 300
});

sr.reveal('.animate-right',{
    origin: 'right',
    duration: 1000,
    distance: '25rem',
    delay: 300
});

sr.reveal('.animate-top',{
    origin: 'top',
    duration: 1000,
    distance: '25rem',
    delay: 300
});

sr.reveal('.animate-bottom',{
    origin: 'bottom',
    duration: 1000,
    distance: '25rem',
    delay: 300
});






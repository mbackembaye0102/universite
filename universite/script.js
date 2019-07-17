
//les radio buttons

// var nonboursier= document.getElementById('nonboursier');
// var boursier= document.getElementById('bousier');
// var loger= document.getElementById('loger');

// //les champs

// var adresse =document.getElementById('adresse');

// //test

// if (nonboursier.checked==true){
//     adresse.style.display="block";
//     boursier.style.display="none";
//     loger.style.display="none";

// }
// else{
//     adresse.style.display="none";

// }


// nonboursier.addEventListener('change', function(){
//     if(nonboursier.style.display == "none"){
//         boursier.style.display="none";
//         adresse.style.display="block";       }

// }
// );





$(function() {

    $("#nonboursier").click(function() {
       
        $("#adresse").show();
        $("#id_type").hide();
        $("#id_chambre").hide();

    });
    $("#boursier").click(function() {
        $("#adresse").hide();
        $("#id_type").show();
        $("#id_chambre").hide();

    });
    $("#loger").click(function() {
        $("#adresse").hide();
        $("#id_type").show();
        $("#id_chambre").show();

    });

});

$(document).ready(function(){
    $('.slider').slider();
  });

  var instance = M.Carousel.init({
    fullWidth: true,
    indicators: true
  });

  // Or with jQuery

  $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  });
       
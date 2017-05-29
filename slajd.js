var numer = Math.floor(Math.random()*5)+1;
function schowaj()
{
    $("#pole_tekstowe").fadeOut(500);
    
}
function zmien_slajd()
{
    numer ++; if(numer>8) numer=1;
   
    
    var plik = "<img src=\"zdjecia/makijaz" + numer +".jpg\" />";
     document.getElementById("pole_tekstowe").innerHTML= plik;
     $("#pole_tekstowe").fadeIn(500);
     
     setTimeout("zmien_slajd()",5000);
     setTimeout("schowaj()",4500);
}
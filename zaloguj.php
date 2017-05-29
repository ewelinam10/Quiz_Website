<?php
session_start();
if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany'])==true) 
{
    header('Location:zalogowany.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl"> <!Mowi przegladarce ze ta strona jest w jezyku polskim, jezeli ktos ja odtworzy za granica to wyswietli mu sie komunikat czy przetlumaczyc ta strone :)  >
    <head>
        <meta charset="UTF-8"> <!kodowanie znakow ,znaki polskie >
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <!zeby nie psulo sie w innych przegladarkach>
        <title>Makijaże</title> <!tytul ktory pojawi sie w pasku narzedzi> 
        <meta name="description" content="Pielęgnacja,makijaż,trendy - nastaw wodę na kawę i zrelaksuj się pogłebiając swoją wiedzę na temat trików urodowych."/> 
        <!jak bedzie strona wyszukiwana w googlach to pojawi sie do tego taki opis>
        <meta name="keywords" content="makijaże, makijaż, makeup, uroda, triki urodowe, diy, trendy, pielęgnacja"/>
        <!cos w stylu hasztagow , po wpisaniu takic slow w wyszukiwarke ta strona moze sie 
            poajwic>
        <link rel="Stylesheet" type="text/css" href="style.css" /> <!zalaczenie pliku css do tego>
        <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
        
        <script type="text/javascript" src="zegar.js"> </script>
    </head>
    <body onload="odliczaj();">
        <div id="container">
            
            <div id="naglowek">
                <img src="images/naglowek.jpg" alt="naglowek_zAP"/>
            </div>
            
            
            
            <div id="menu">
                <ol> 
                    <li> <a href="index.php" > Strona główna </a> </li>
                    <li><a href="galeria.php" > Galeria  </a> </li>
                    <li> <a href="zaloguj.php" > Twoje konto </a>  
                    <ul>
                            
                            <li><a href="zaloguj.php"> Zaloguj </a></li>
                            <li><a href="rejestracja.php"> Rejestracja </a></li>
                            
                    </ul> </li>
                    <li><a href="index.html" > Inne </a> 
                    <ul>
                        <li><a href="kontakt.php"> Kontakt</a> </li>
                        <li><a href="quiz.php"> Quiz </a></li>
                    </ul> </li>
                </ol>
               
            </div>
            
            <div id="pole_tekstowe">
                        <form method="post" action="logowanie.php">

                            Login : <br/> <input type="text" name="login"> <br/>
                            Hasło : <br/> <input type="password" name="haslo"> <br/> <br/>

                            <input type="submit" value="Zaloguj się"/>
                            
                                <?php
                                    if(isset($_SESSION['blad'])) echo "".$_SESSION['blad'];
                                    unset($_SESSION['blad']);
                                ?>
                        </form>

            </div>
           <div id="stopka">
               
                <div id="zegar">  </div>
                ® Wykonanie : Ewelina Mysiak
               
  </div>
        </div>
     
    </body>
</html>

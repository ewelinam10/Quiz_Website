<?php
session_start();


if(!isset($_SESSION['zalogowany']))
{
    header('Location:zaloguj.php');
    exit();
}


if(isset($_POST['makijaz1']))
{
        if(isset($_POST['makijaz1']) && ($_POST['makijaz2']) && $_POST['makijaz3'] && $_POST['makijaz4'] )
        {
            $wybor1=$_POST['makijaz1'];
        $wybor2=$_POST['makijaz2'];
        $wybor3=$_POST['makijaz3'];
        $wybor4=$_POST['makijaz4'];

            $punkty=0;
            if($wybor1 == "smoky") {
                $punkty++;
            }
            if($wybor2 == "dzienny") {
                $punkty++;
            }
            if ($wybor3 == "francuski") {
                $punkty++;
            }
            if ($wybor4 == "no_makeup") {
                $punkty++;
            }
            
            require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);

   try
   {
       $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
       
            if($polaczenie -> connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
                      else 
                    {
                          $id_user=$_SESSION['id_user'];
                    $polaczenie->query("UPDATE uzytkownicy set punkty='$punkty' WHERE id='$id_user'  ");
                        
                     
                    }
        $polaczenie->close();
   }
   
   catch (Exception $ex) 
   {
        echo '<span style="color:red;"> Błąd serwera ! Spróbuj ponownie później </span>';
        echo '</br>Informacja developerska'.$ex;
   }

        $_SESSION['koniec']="Quiz zakonczony powodzeniem, Twój wynik to : ".$punkty ; 
        
        }
           else
            {
                $_SESSION['koniec']="Odpowiedz na wszystkie pytania ! ";
            }
      
}
else
            {
                $_SESSION['koniec']="Odpowiedz na wszystkie pytania ! ";
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
        
        
        
    </head>
    
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
            
            <form method="post">
            <div id="pole_tekstowe">
                <div id="test">
                    </br> </br>
                    1.Jaki to rodzaj makijażu? </br></br>
                  <div style="float:right;"> 
                        <input type="radio" name="makijaz1" value="smoky"/> SMOKY </br>
                        <input type="radio" name="makijaz1" value="francuski"/> FRANCUSKI </br>
                        <input type="radio" name="makijaz1" value="no_makeup"/> MAKEUP NO-MAKEUP </br>
                        <input type="radio" name="makijaz1" value="dzienny"/> DZIENNY </br>
                        <input type="radio" name="makijaz1" value="pawie_oko"/> PAWIE OKO </br>
                    </div> 
                    <img src="images/smoky.jpg" alt="smoky" style="float:right;" width="250" height="150"/> </br>
                 <div style="clear:both;"> </div>
                 
                    2.Jaki to rodzaj makijażu? </br>
                    <div style="float:right;"> 
                       <input type="radio" name="makijaz2" value="smoky"/> SMOKY </br>
                        <input type="radio" name="makijaz2" value="francuski"/> FRANCUSKI </br>
                        <input type="radio" name="makijaz2" value="no_makeup"/> MAKEUP NO-MAKEUP </br>
                        <input type="radio" name="makijaz2" value="dzienny"/> DZIENNY </br>
                        <input type="radio" name="makijaz2" value="pawie_oko"/> PAWIE OKO </br>
                    </div> 
                    <img src="images/dzienny.jpg" alt="dzienny" style="float:right;" width="250" height="150"/> </br>
                 <div style="clear:both;"> </div>
                    3.Jaki to rodzaj makijażu? </br>
                    <div style="float:right;"> 
                       <input type="radio" name="makijaz3" value="smoky"/> SMOKY </br>
                        <input type="radio" name="makijaz3" value="francuski"/> FRANCUSKI </br>
                        <input type="radio" name="makijaz3" value="no_makeup"/> MAKEUP NO-MAKEUP </br>
                        <input type="radio" name="makijaz3" value="dzienny"/> DZIENNY </br>
                        <input type="radio" name="makijaz3" value="pawie_oko"/> PAWIE OKO </br>
                    </div> 
                    <img src="images/francuski.jpg" alt="francuski" style="float:right;" width="250" height="150"/> </br>
                 <div style="clear:both;"> </div>
                    4.Jaki to rodzaj makijażu? </br>
                    <div style="float:right;"> 
                     <input type="radio" name="makijaz4" value="smoky"/> SMOKY </br>
                        <input type="radio" name="makijaz4" value="francuski"/> FRANCUSKI </br>
                        <input type="radio" name="makijaz4" value="no_makeup"/> MAKEUP NO-MAKEUP </br>
                        <input type="radio" name="makijaz4" value="dzienny"/> DZIENNY </br>
                        <input type="radio" name="makijaz4" value="pawie_oko"/> PAWIE OKO </br>
                    </div> 
                    <img src="images/nomakeup.jpg" alt="nomakeup" style="float:right;" width="250" height="150"/> </br>
                 <div style="clear:both;"> </div>
                    </div>
                    </br> 
                    <input type="submit" value="Sprawdź"/>
                    </br>
                    </br>
                    <?php
                                if(isset($_SESSION['koniec']))
                                    {
                                        echo"".$_SESSION['koniec'] ;
                                        unset($_SESSION['koniec']);
                                    }
                                ?>
               
            </div>
                </form>

            </div>
            
           
            
            
           <div id="stopka">
                <div id="zegar">  </div>
                ® Wykonanie : Ewelina Mysiak
               
  </div>
     
    </body>
</html>

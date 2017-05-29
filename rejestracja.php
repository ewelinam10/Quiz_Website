<?php
session_start();

if(isset($_POST['email']))
{
    $flaga_testu=true;
    
    $imie=$_POST['imie'];
    if((strlen($imie))<3  || (strlen($imie))>20 )
    {
        $flaga_testu=false;
        $_SESSION['e_imie']="Podaj prawidłowe imię !";
    }
    
     $nazwisko=$_POST['nazwisko'];
    if((strlen($nazwisko))<3  || (strlen($nazwisko))>20 )
    {
        $flaga_testu=false;
        $_SESSION['e_nazwisko']="Podaj prawidłowe nazwisko !";
    }
    
    $login=$_POST['login'];
    if((strlen($login))<3 || (strlen($login))>20 )
    {
        $flaga_testu=false;
        $_SESSION['e_login']="Nick musi zawierać od 3 do 20 znaków";
    }
    
    $email=$_POST['email'];
    $email_verify=  filter_var($email,FILTER_SANITIZE_EMAIL);
    if((filter_var($email_verify,FILTER_VALIDATE_EMAIL)==false) || ($email_verify!=$email) )
    {
        $flaga_testu=false;
        $_SESSION['e_email']="Nieprawdiłowy e-mail!";
    }
    
    $haslo1=$_POST['haslo1'];
    $haslo2=$_POST['haslo2'];
    if((strlen($haslo1)<6) || (strlen($haslo1)>20) )
    {
         $flaga_testu=false;
        $_SESSION['e_haslo']="Hasło powinno zawierać od 6 do 20 znaków.";
    }
    if($haslo1!=$haslo2)
    {
        $flaga_testu=false;
        $_SESSION['e_haslo']="Hasła nie zgadzają się.";
    }
    $haslo_hash=password_hash($haslo1,PASSWORD_DEFAULT);
    
   if(!(isset($_POST['regulamin'])))
   {
       $flaga_testu=false;
       $_SESSION['e_regulamin']="Potwierdź zgodne na regulamin!";
   }
   ///RECAPTCHA:
   $sekret="6LeXbg4UAAAAABv4Xge3HMVK9jblWyk82FT0wo9A";
   $sprawdz=  file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
   $odpowiedz=json_decode($sprawdz);
   if($odpowiedz->success==false)
   {
       $flaga_testu=false;
       $_SESSION['e_recaptcha']="Potwierdź że jesteś człowiekiem :) ";
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
                          //czy mail juz istnieje?
                          $rezultat=$polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
                          
                          if(!($rezultat))                              throw new Exception($polaczenie->error);
                          
                          $ile_maili=$rezultat->num_rows;
                          if($ile_maili>0)
                          {
                              $flaga_testu=false;
                              $_SESSION['e_email']="Istnieje konto o podanym e-mailu.";
                          }
                          
                          //czy nick juz istnieje?
                          $rezultat=$polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$login'");
                          
                          if(!($rezultat))                              throw new Exception($polaczenie->error);
                          
                          $ile_userow=$rezultat->num_rows;
                          if($ile_userow>0)
                          {
                              $flaga_testu=false;
                              $_SESSION['e_login']="Istnieje konto o podanym loginie Wybierz inny.";
                          }
                          
                    if($flaga_testu==true)
                    {
                        if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL,'$login','$haslo_hash','$email','$imie','$nazwisko',NULL)"))
                        {
                            $_SESSION['udana_rejestracja']=true;
                            
                            header('Location:witamy.php');
                            
                            
                        }
                        else 
                        {
                                throw new Exception($polaczenie->error);
                        }
                    }
                          
                          $polaczenie->close();

                    }
       
   } 
   
   
   catch (Exception $ex) 
   {
        echo '<span style="color:red;"> Błąd serwera ! Spróbuj ponownie później </span>';
        echo '</br>Informacja developerska'.$ex;
   }
   
   
   
   
}

?>

<!DOCTYPE html>
<html lang="pl"> <!Mowi przegladarce ze ta strona jest w jezyku polskim, jezeli ktos ja odtworzy za granica to wyswietli mu sie komunikat czy przetlumaczyc ta strone :)  >
    <head>
        <meta charset="UTF-8"> <!kodowanie znakow ,znaki polskie >
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <!zeby nie psulo sie w innych przegladarkach>
        <title>Makijaże - Formularz</title> <!tytul ktory pojawi sie w pasku narzedzi> 
        <meta name="description" content="Pielęgnacja,makijaż,trendy - nastaw wodę na kawę i zrelaksuj się pogłebiając swoją wiedzę na temat trików urodowych."/> 
        <!jak bedzie strona wyszukiwana w googlach to pojawi sie do tego taki opis>
        <meta name="keywords" content="makijaże, makijaż, makeup, uroda, triki urodowe, diy, trendy, pielęgnacja"/>
        <!cos w stylu hasztagow , po wpisaniu takic slow w wyszukiwarke ta strona moze sie 
            poajwic>
        <link rel="Stylesheet" type="text/css" href="style.css" /> <!zalaczenie pliku css do tego>
        <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="zegar.js"> </script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
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
                 <style>
            .error
            {
                color: red;
                margin-top: 10px;
                margin-bottom: 10px;
            }
        .g-recaptcha
            {
                width: 305px;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
                
                <form method="post">
                    <h2>Nie masz jeszcze konta? Zarejestruj się ! </h2>
                    
                    Imie :  
                    <input type="text" name="imie"/>
                    </br>                     </br>

                    Nazwisko :  
                    <input type="text" name="nazwisko"/>
                    </br>                    </br>

                    Adres e-mail :  
                    <input type="text" name="email" />
                                        <?php
                                            if(isset($_SESSION['e_email']))
                                            {
                                                echo'<span class="error"></br>'.$_SESSION['e_email'].'</span>';
                                                unset($_SESSION['e_email']);
                                            }
                                       ?>
                    </br>                    </br>                            

                    Login:
                    <input type="text" name="login" />
                                <?php
                                    if(isset($_SESSION['e_login']))
                                    {

                                        echo'<span class="error"></br>'.$_SESSION['e_login'].'</span>';
                                        unset($_SESSION['e_login']);
                                    }
                               ?>
                    </br>                    </br>
                    
                    Hasło:
                    <input type="text" name="haslo1" />
                                <?php
                                    if(isset($_SESSION['e_haslo']))
                                    {
                                        echo'<span class="error"></br>'.$_SESSION['e_haslo'].'</span>';
                                        unset($_SESSION['e_haslo']);
                                    }
                                ?>
                    </br>                    </br>
                    
                    Powtórz hasło:
                    <input type="text" name="haslo2" />
                    </br>                    </br>
                    
                    
        <label>
            <input type="checkbox" name="regulamin"> Akceptuję regulamin <br/>
        </label>
                               <?php
                                    if(isset($_SESSION['e_regulamin']))
                                     {
                                         echo'<div class="error"></br>'.$_SESSION['e_regulamin'].'</div>';
                                         unset($_SESSION['e_regulamin']);
                                     }
                               ?>
                    </br>
                   <div class="g-recaptcha" data-sitekey="6LeXbg4UAAAAAI7wOAungqx9MgX67ouQFZdeRkiX"></div>
                                <?php
                                if(isset($_SESSION['e_recaptcha']))
                                    {
                                        echo'<div class="error">'.$_SESSION['e_recaptcha'].'</div>';
                                        unset($_SESSION['e_recaptcha']);
                                    }
                                ?>
                   </br>
                     <input type="submit" value="Zarejestruj się"/>
                    
                   
                   
               </form>

                    
            
            </div>
     
           <div id="stopka">
                ® Wykonanie : Ewelina Mysiak
  </div>
               </div>
        
    </body>
</html>
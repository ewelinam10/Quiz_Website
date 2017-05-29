<?php
session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
        header('Location : zaloguj.php');
        exit();
}


require_once "connect.php"; 
//wymagaj pliku w kodzie,zatrzyma skrypt jesli baza bedzie nie prawidłowa (przy include bedzie skrypt dzialal dalej i wyskoczy tylko blad)
$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name); //utworzenie polaczenia z baza danych przy pomocy utworzenia obiektu,instacji klasy mysqli
//operator @ sprawi ze nie zostana wyswietlone bledy gdyz nasza kontrola bledow znajduje sie ponizej :

if($polaczenie -> connect_errno!=0)
{
    echo " Error : ".$polaczenie->connect_errno ; // Opis: ".$polaczenie->connect_error;
}
else
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $login = htmlentities($login, ENT_QUOTES , "UTF-8");


if($rezultat=@$polaczenie->query(
        sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",
        mysqli_real_escape_string($polaczenie,$login))))
                
{
    $ilu_userow=$rezultat->num_rows;
    
    if($ilu_userow>0)
    {
        $wiersz=$rezultat->fetch_assoc();
        
        if(password_verify($haslo,$wiersz['pass']))
        {
        
            $_SESSION['zalogowany']=true;

            $_SESSION['user']=$wiersz['user'];
            $_SESSION['pass']=$wiersz['pass'];
            $_SESSION['id_user']=$wiersz['id'];
            $_SESSION['email']=$wiersz['email'];
            

            unset($_SESSION['blad']);
            $rezultat->free_result();
            header('Location:index.php');
        
        }
        else
        {
            $_SESSION['blad']='<span style="color:red"> <br/> Nieprawdiłowe haslo </span>';
            header('Location:zaloguj.php');
            
        }
    }
    else
    {
        $_SESSION['blad']='<span style="color:red"> <br/> Nieprawdiłowy login lub hasło </span>';
        header('Location:zaloguj.php');
        
    }
}
    
$polaczenie->close();
}


?>


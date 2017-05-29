<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
    header('Location:zaloguj.php');
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
            Makijaż (fr. maquiller: fałszować, szminkować) znany również jako ang. make-up – kosmetyki upiększające nałożone na skórę (szczególnie twarzy). Termin ten może oznaczać również samo nakładanie kosmetyków.
Słowem makijaż oznacza się zarówno preparaty, efekt jak i czynności polegające na kosmetycznym upiększaniu twarzy poprzez malowanie, szminkowanie czy pudrowanie.
Makijaż pomaga wyeksponować urodę, podkreślić jej subtelność, zamaskować niedoskonałości cery. W pewnym stopniu, w określonych warunkach, także wyraża osobowość. Dzięki jego rozmaitym technikom można upozorować twarz na idealną i zdrową. Pożądanym efektem makijażu jest jak najdoskonalsze zbliżenie wyglądu do aktualnie obowiązującego kanonu piękna i urody.
Makijaż na przełomie wieków stale się zmieniał, dostosowując się do obowiązujących kanonów piękna. Malowali się zarówno mężczyźni jak i kobiety, a sztuka ta uznana została za jedną z najstarszych na świecie. Sztuka malowania ciała znana była już człowiekowi pierwotnemu, stosowana jest do dziś przez plemiona i ludy całego świata jako część obrządków rytualnych. Wywodzi się z niej również współczesny bodypainting oraz tatuaż.
W starożytnym Egipcie kobiety malowały powieki barwnikiem ze sproszkowanych minerałów, używały ponadto szminki, pudru, różu do policzków, czernidła do rzęs, farb do włosów i lakierów do paznokci (zachowane dzieła sztuki z tamtego okresu ukazują szeroki asortyment przyborów kosmetycznych stosowanych podczas toalety). Starożytna Grecja wprowadzając sztukę teatralną korzystała z możliwości poprawienia rysów twarzy aktorów grających w amfiteatrach. Wojownicy malowali twarze w tzw. barwy wojenne.
Wiadomości z dziedziny najdawniejszej wschodniej kosmetyki są bardzo skąpe, często bowiem należały do wiedzy tajemnej, pilnie strzeżonej przez kapłanów. Na przykład w starożytnej Japonii makijaż był bardzo zaawansowaną sztuką, ale o bliższe szczegóły trudno. Do naszych czasów dotarły tylko informacje, że malowanie się Japonek, szczególnie gejsz, przypominało niemal charakteryzację, a japońskie łaźnie są starsze od słynnych łaźni rzymskich o wiele stuleci.
Szczególny okres nasilenia makijażu w rejonie Europy przypada na okres baroku i klasycyzmu, kiedy to Wersal wyznaczał kanony mody europejskiej, a we Francji lekarze zakazywali mycia się, sądząc, że sprzyja ono szerzeniu się chorób. Mężczyźni i kobiety nierzadko ograniczali wtedy poranną toaletę do nakładania grubych warstw pudru, stylizując się na aktorów starożytnej Grecji.
Obecnie z makijażem kojarzy się głównie kobiety i modelki, jak również członków subkultur - przede wszystkim punkowej i gotyckiej. Powrót tego typu makijażu zainspirował m.in. rockowy zespół KISS, którego członkowie występowali w latach 70. i 80. z całkowicie zamalowanymi twarzami.
</BR>
 <img src="images/mari.jpg" alt="mari"/>
            </div>
            
            
            </div>
           <div id="stopka">
                <div id="zegar">  </div>
                ® Wykonanie : Ewelina Mysiak
               
  </div>
     
    </body>
</html>

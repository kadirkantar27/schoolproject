<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

      
    <link rel="stylesheet" href="styleAnket.css">
    <link rel="stylesheet" href="styleCheckbox.css">


    <title>Anket</title> 
</head>
<body>

    <nav class="navbar">
        <div class="logo">
            <h1 class="logo-text"><a href="http://localhost/SchoolProject/homepage.php"><b>KEBBS</b></a></h1>
        </div>
        <div class="logout">
            <a href="http://localhost/SchoolProject/index.html" class=logout-btn><i
                    class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </nav>


    <div class="container">
        <div class="anket_container">

        
        
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Formdan gelen verileri al
        $soru = isset($_POST["soru"]) ? $_POST["soru"] : "Soru belirtilmedi";
        $secenek_sayisi = isset($_POST["secenek_sayisi"]) ? $_POST["secenek_sayisi"] : 0;
        $secenekler = array();
        $cevaplar = array();
        $sayi = count($_POST);

        // Seçenekleri ve cevapları al
        for ($i = 1; $i < $sayi; $i = $i + 2) {
            $secenek_1 = isset($_POST["secenek_" . $i]) ? $_POST["secenek_" . $i] : "";
            $secenek_2 = isset($_POST["secenek_" . ($i + 1)]) ? $_POST["secenek_" . ($i + 1)] : "";
        
            $secenek = $secenek_1 ." | ". $secenek_2;
        
            array_push($secenekler, $secenek);
        
            // İlgili checkbox işaretlenmişse, cevap olarak ekleyelim
            if (isset($_POST["cevap_" . $i])) {
                array_push($cevaplar, $secenek);
            }
        }

        // Anket sonuçlarını göster
        echo "<h2 class='poll-header'>Anket Oylama</h2>";
        echo "<br>";
        echo "<p class='form-soru'>$soru</p>";
        echo "<br>";
        if ($soru != "Soru belirtilmedi") {
            if (!empty($secenekler)) {
                // echo "<p>Seçenekler:</p>";
                echo "<br>";
                echo "<div>";
                foreach ($secenekler as $secenek) {
                    echo "<label class='form-control'><input type='checkbox' class='checkInput' value='$secenek'>$secenek</label>";
                    echo "<br>";
                }
                echo "</div>";
            } else {
                echo "<p>Cevaplar: Cevap verilmedi</p>";
            }
        } else {
            echo "<p>Cevaplar: Soru belirtilmedi</p>";
        }
    } else {
        // Doğrudan erişim engelleme
        echo "Bu sayfaya doğrudan erişim izni yok.";
    }
?>

        <input type="submit">
        </div>
    </div>



    

    <script src="https://kit.fontawesome.com/98c0038808.js" crossorigin="anonymous"></script>
    
</body>
</html>

<script>
    // Sayfa yüklendiğinde çalışacak JavaScript kodu
    document.addEventListener("DOMContentLoaded", function () {
    var cevaplarListesi = document.getElementById("cevaplarListesi");

    if (cevaplarListesi) { // Önce cevaplarListesi'nin var olduğunu kontrol et
        var cevapElemanlari = cevaplarListesi.getElementsByTagName("li");

        // Her bir seçeneği checkbox'a dönüştür
        for (var i = 0; i < cevapElemanlari.length; i++) {
            var checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.name = "cevap_" + (i + 1);
            checkbox.value = cevapElemanlari[i].textContent;
            checkbox.checked = true;
            checkbox.disabled = true;

            var label = document.createElement("label");
            label.appendChild(checkbox);
            label.appendChild(document.createTextNode(cevapElemanlari[i].textContent));

            cevapElemanlari[i].innerHTML = "";
            cevapElemanlari[i].appendChild(label);
        }
    }
});
</script>
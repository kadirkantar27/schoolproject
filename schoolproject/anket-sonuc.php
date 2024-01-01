<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri al
    $soru = $_POST["soru"];
    $secenek_sayisi = $_POST["secenek_sayisi"];
    $secenekler = array();
    $cevaplar = array();

    // Seçenekleri ve cevapları al
    for ($i = 1; $i <= $secenek_sayisi; $i++) {
        $secenek = $_POST["secenek_" . $i];
        array_push($secenekler, $secenek);

        // İlgili checkbox işaretlenmişse, cevap olarak ekleyelim
        if (isset($_POST["cevap_" . $i])) {
            array_push($cevaplar, $secenek);
        }
    }

    // Anket sonuçlarını göster
    echo "<h2>Anket Sonuçları</h2>";
    echo "<p>Soru: $soru</p>";
    echo "<form id='anketSonuc' action='' method='post'>";
    echo "<p>Seçenekler:</p>";
    echo "<ul id='cevaplarListesi'>";
    foreach ($secenekler as $index => $secenek) {
        echo "<li>$secenek</li>";
    }
    echo "</ul>";
    echo "</form>";
} else {
    // Doğrudan erişim engelleme
    echo "Bu sayfaya doğrudan erişim izni yok.";
}
?>

<script>
    // Sayfa yüklendiğinde çalışacak JavaScript kodu
    document.addEventListener("DOMContentLoaded", function () {
        var cevaplarListesi = document.getElementById("cevaplarListesi");
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
    });
</script>
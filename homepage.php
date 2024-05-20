<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ANASAYFA</title>
    <link rel="stylesheet" href="styleHome01.css">
    <link rel="stylesheet" href="styleAnket01.css">
    <link rel="stylesheet" href="scrollbar.css">
    <script src="scriptHome01.js" defer></script>
    <script src="scriptAnket.js" defer></script>
    <script src="scriptDayClicked.js"defer></script>
</head>
<body>

    <nav class="navbar">
        <div class="logo">
            <h1 class="logo-text"><b>KEBBS</b></h1>
        </div>
        <div class="logout">
            <a href="http://localhost/SchoolProject/index.html" class=logout-btn><i
                    class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </nav>
    <div class="contianer">
        <div class="calendar">
            <div class="calendar-header">
                <span class="month-picker" id="month-picker"> May </span>
                <div class="year-picker" id="year-picker">
                    <span class="year-change" id="pre-year">
                        <pre><</pre>
                    </span>
                    <span id="year">2023 </span>
                    <span class="year-change" id="next-year">
                        <pre>></pre>
                    </span>
                </div>
            </div>

            <div class="calendar-body">
                <div class="calendar-week-days">
                    <div>Paz</div>
                    <div>Pzt</div>
                    <div>Sal</div>
                    <div>Çar</div>
                    <div>Per</div>
                    <div>Cum</div>
                    <div>Cmt</div>
                </div>
                <div class="calendar-days">
                </div>
            </div>
            <div class="calendar-footer">
            </div>
            <div class="date-time-formate">
                <div class="day-text-formate">BUGÜN</div>
                <div class="date-time-value">
                    <div class="time-formate">02:51:20</div>
                    <div class="date-formate">23 - Temmuz - 2022</div>
                </div>
            </div>
            <div class="month-list"></div>
        </div>


        <!-- Anket Oluşturma -->
        <div class="container-poll">
            <div class="poll-header">
                <h3>Anket Oluşturma</h3>
            </div>

            <div class="wrapper">
                <div class="anketForm">
                    <form id="anketForm" action="anket-sonuc.php" method="post">
                    <div class="soruSeceneklerContainer">
                        <div class="soruSecenek">
                            <label for="soru">Toplantı İsmi:</label>
                            <input type="text" id="soru" name="soru" required>
                        </div>

                        <div class="soruSecenek">
                            <label for="secenek_sayisi">Seçenek Sayısı:</label>
                            <input type="number" id="secenek_sayisi" name="secenek_sayisi" min="2" max="10" required oninput="updateSecenekler(this.value)">
                        </div>
                    </div>
                        

                        <!-- Seçeneklerin dinamik olarak ekleneceği alan -->
                        <fieldset>
                            <legend>Seçenekler:</legend>

                            <div id="secenekAlanlari">
                                <!-- Seçenek alanları burada dinamik olarak eklenecek -->
                                
                               



                            </div>

                        </fieldset>

                        <br>
                        <!-- Anketi hazır hale getirme ve gösterme butonu -->
                        <button type="button" onclick="hazirlaVeGoster()">Anketi Hazır Hale Getir ve Göster</button>
                    </form>
                </div>
                
                
                <div id="anketSonuc" class="scrollbarDiv" style="display: none;">
                <br>
                    <h2>Anket Formu</h2>
                    
                    <form id="cevapForm" action="anket-sonuc.php" method="post">
                        <!-- Soru gösterme alanı -->
                        <div id="soruGoster"></div>

                        <!-- Cevap alanları burada dinamik olarak eklenecek -->
                        <div id="cevapAlanlari"></div>

                        
                        <!-- Formu gönderme butonu -->
                        <input type="submit" value="Anketi Gönder">
                        <!-- <button>Anketi Gönder</button> -->
                    </form>
                </div>

            </div>
            

            
        </div>
    </div>
 
    <script src="https://kit.fontawesome.com/98c0038808.js" crossorigin="anonymous"></script>

<script>
    var soruSayisi = 2;

    function soruEkle() {
        soruSayisi++;

        var sorularContainer = document.getElementById("sorularContainer");

        var div = document.createElement("div");
        div.innerHTML = `
        <div class="days">
        <label for="opt-${soruSayisi}" class="opt-${soruSayisi}">
            <div class="row">
            <div class="column">
                <span class="circle"></span>
                <span class="text">Gün Seçiniz</span>
            </div>
            </div>
        </label>
        </div>
        `;
        sorularContainer.appendChild(div);
    }
</script>


<script>
    // Seçenek sayısının değiştiğinde çağrılan fonksiyon
    function updateSecenekler(secenekSayisi) {
        var secenekAlanlariDiv = document.getElementById("secenekAlanlari");
        secenekAlanlariDiv.innerHTML = ""; // Önceki seçenek alanlarını temizle

        // Yeni seçenek alanlarını oluştur
        for (var i = 1; i <= secenekSayisi; i++) {
            var label = document.createElement("label");
            label.setAttribute("for", "secenek_" + i);
            label.textContent = "Seçenek " + i + ":";

            var input = document.createElement("input");
            input.setAttribute("type", "date");
            input.setAttribute("id", "secenek_" + i);
            input.setAttribute("name", "secenek_" + i);
            input.setAttribute("min", "<?php echo date('Y-m-d'); ?>")
            input.setAttribute("required", "required");

            var input1 = document.createElement("input");
            input1.setAttribute("type", "time");
            input1.setAttribute("id", "secenek_" + i);
            input1.setAttribute("name", "secenek_" + i);
            input1.setAttribute("required", "required");

            var br = document.createElement("br");

            // Oluşturulan seçenek alanlarını sayfaya ekle
            secenekAlanlariDiv.appendChild(label);
            secenekAlanlariDiv.appendChild(input);
            secenekAlanlariDiv.appendChild(input1);
            secenekAlanlariDiv.appendChild(br);
        }
    }

    // Anketi hazır hale getirme ve gösterme fonksiyonu
    function hazirlaVeGoster() {
        var secenekAlanlariDiv = document.getElementById("secenekAlanlari");

        // Seçenek alanlarındaki inputları checkbox'a çevir
        var inputs = secenekAlanlariDiv.querySelectorAll("input[type=date], input[type=time]");
        var anketHTML = "";



        // Soruyu gösterme alanını güncelle
        // var soruGoster = document.getElementById("soruGoster");
        // soruGoster.setAttribute("name", "soru");
        // soruGoster.textContent = "Soru: " + document.getElementById("soru").value;

        var soruDiv =document.getElementById("soruGoster");
        soruDiv.innerHTML = "";

        var labelSoru = document.createElement("label");
        labelSoru.textContent = "Soru: " + document.getElementById("soru").value;
        var soruGoster = document.createElement("input");

        soruGoster.setAttribute("type", "hidden");
        soruGoster.setAttribute("name", "soru");
        soruGoster.setAttribute("value", document.getElementById("soru").value);
        
        soruDiv.appendChild(labelSoru);
        soruDiv.appendChild(soruGoster);


        // Cevap alanlarını oluştur
        var cevapAlanlariDiv = document.getElementById("cevapAlanlari");
        cevapAlanlariDiv.innerHTML = ""; // Önceki cevap alanlarını temizle

        inputs.forEach(function (input, index) {
            var label = document.createElement("label");
            label.textContent = input.value;

            var checkbox = document.createElement("input");
            checkbox.setAttribute("type", "checkbox");
            checkbox.setAttribute("name", "cevap_" + (index + 1));

            var hiddenInput = document.createElement("input");
            hiddenInput.setAttribute("type", "hidden");
            hiddenInput.setAttribute("name", "secenek_" + (index + 1));
            hiddenInput.setAttribute("value", input.value);

            var br = document.createElement("br");

            // Oluşturulan cevap alanlarını sayfaya ekle
            cevapAlanlariDiv.appendChild(label);
            cevapAlanlariDiv.appendChild(checkbox);
            cevapAlanlariDiv.appendChild(hiddenInput);
            cevapAlanlariDiv.appendChild(br);
        });

        // Gösterilecek sayfayı görünür yap
        document.getElementById("anketSonuc").style.display = "block";
    }
</script>

</body>

</html>
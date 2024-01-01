<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ANASAYFA</title>
    <link rel="stylesheet" href="styleHome.css">
    <link rel="stylesheet" href="styleAnket.css">
    <script src="scriptHome.js" defer></script>
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
                <header>Toplantı Ne Zaman Olsun?</header>
                <form id="anketForm">
                    <div class="poll-area">
                    <input type="checkbox" name="poll" id="opt-1">
                    <input type="checkbox" name="poll" id="opt-2">
                    <input type="checkbox" name="poll" id="opt-3">
                    <input type="checkbox" name="poll" id="opt-4">
                    <input type="checkbox" name="poll" id="opt-5">
                    <input type="checkbox" name="poll" id="opt-6">
                    <input type="checkbox" name="poll" id="opt-7">
                    <input type="checkbox" name="poll" id="opt-8">

                    <div>
                        <label for="opt-1" class="opt-1">
                            <div class="row">
                                <div class="column">
                                    <span class="circle"></span>
                                    <span class="text">Gün Seçiniz</span>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div>
                        <label for="opt-2" class="opt-2">
                            <div class="row">
                                <div class="column">
                                    <span class="circle"></span>
                                    <span class="text">Gün Seçiniz</span>
                                </div>
                            </div>
                        </label>
                        
                    </div>             
                    <div id="sorularContainer">
                    <!-- Kullanıcı buraya soru ekleyebilir -->
                    </div>
                    <button type="button" id="addDays" class="ekle-btn" onclick="soruEkle()">Gün Ekle</button>
                </form>              
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

</body>

</html>
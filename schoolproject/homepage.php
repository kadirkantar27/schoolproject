<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ANASAYFA</title>
    <link rel="stylesheet" href="styleHome.css">
    <script src="scriptHome.js" defer></script>
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <h1 class="logo-text"><b>KEBBS</b></h1>
        </div>
        <div class="logout">
            <a href="http://localhost:8012/schoolproject/index.html" class=logout-btn><i
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
    </div>

    <script src="https://kit.fontawesome.com/98c0038808.js" crossorigin="anonymous"></script>

</body>

</html>
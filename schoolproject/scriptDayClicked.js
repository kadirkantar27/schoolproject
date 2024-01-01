var clickableDivs = document.querySelectorAll(".calendar-days div");

clickableDivs.forEach(function (div) {
    div.addEventListener("click", function () {
        var textElement = document.querySelector(".text");
        
        // Tıklanan günün metnini al
        var dayText = div.innerText.trim();
        
        // Şu anki tarihi al
        var currentDate = new Date();
        
        
        // Tıklanan günün tarihini oluştur
        var clickedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), parseInt(dayText));
        
        // Tarih formatını ayarla
        var formattedDate = clickedDate.getDate() + '-' + (clickedDate.getMonth() + 1) + '-' + clickedDate.getFullYear();

        // İsterseniz içeriği değiştirebilirsiniz
        textElement.innerHTML = formattedDate;
    });
});

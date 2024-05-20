var clickableDivs = document.querySelectorAll(".current-date");

clickableDivs.forEach(function(div) {
    div.addEventListener("click", function() {
        var textElement = document.querySelector(".text");
        var textContent = document.querySelector(".date-formate")
            
        var content = textContent.innerHTML

        // İsterseniz içeriği değiştirebilirsiniz
        textElement.innerHTML = content;
    });
});

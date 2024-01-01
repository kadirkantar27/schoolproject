function soruEkle() {
    // Şık numarasını otomatik olarak artırabilirsiniz
    var sikNumarasi = options.length + 1;

    var sorularContainer = document.getElementById("sorularContainer");

    var div = document.createElement("div");
    div.innerHTML = `
        <div class="days">
            <label for="opt-${sikNumarasi}" class="opt-${sikNumarasi}">
                <div class="row">
                    <div class="column">
                        <span class="circle"></span>
                        <span class="text">Yeni Şık</span>
                    </div>
                </div>
            </label>
        </div>
    `;
    sorularContainer.appendChild(div);

    let addedCheckbox = div.querySelector(`label[for="opt-${sikNumarasi}"]`);
    addedCheckbox.addEventListener('click', function () {
        if (addedCheckbox.checked) {
            console.log(`Yeni Şık tıklandı ve şu an aktif durumda!`);
            // Yapılacak işlemleri ekleyin
        } else {
            console.log(`Yeni Şık tıklandı ve şu an pasif durumda!`);
            // Yapılacak işlemleri ekleyin
        }
    });

    if (addedCheckbox.checked) {
        console.log(`Yeni Şık başlangıçta aktif durumda!`);
        // Yapılacak işlemleri ekleyin
    } else {
        console.log(`Yeni Şık başlangıçta pasif durumda!`);
        // Yapılacak işlemleri ekleyin
    }
}



// Tüm label elementlerini seç
let options = document.querySelectorAll('label');

// Her bir label elementi için bir döngü başlat
for (let i = 0; i < options.length; i++) {

    // Her bir label elementine tıklanma olayı ekleyen bir fonksiyon
    options[i].addEventListener("click", () => {
        // Seçili olan diğer label elementlerinden "selected" sınıfını kaldır
        for (let j = 0; j < options.length; j++) {
            if (options[j].classList.contains("selected")) {
                options[j].classList.remove("selected");
            }
        }

        // Tıklanan label elementine "selected" sınıfını ekle
        options[i].classList.add("selected");

        // Tüm label elementlerine "selectall" sınıfını ekle
        for (let k = 0; k < options.length; k++) {
            options[k].classList.add("selectall");
        }

        // Tıklanan label elementinin "for" özelliğini al
        let forVal = options[i].getAttribute("for");

        // "for" özelliğine sahip input elementini seç
        let selectInput = document.querySelector("#" + forVal);

        // Seçilen input elementinin tipini al
        let getAtt = selectInput.getAttribute("type");

        // Eğer seçili input bir checkbox ise, tipini radio yap
        if (getAtt == "checkbox") {
            selectInput.setAttribute("type", "radio");
        } 
        // Eğer seçili input checked ise, "selected" sınıfını kaldır ve tipini checkbox yap
        else if (selectInput.checked == true) {
            options[i].classList.remove("selected");
            selectInput.setAttribute("type", "checkbox");
        }

        // Seçili olan label elementlerini takip etmek için bir dizi oluştur
        let array = [];

        // Tüm label elementlerini kontrol et
        for (let l = 0; l < options.length; l++) {
            // Eğer label elementi "selected" sınıfını içeriyorsa, diziyi güncelle
            if (options[l].classList.contains("selected")) {
                array.push(l);
            }
        }

        // Eğer hiçbir label elementi seçili değilse, tüm label elementlerinden sınıfları kaldır
        if (array.length == 0) {
            for (let m = 0; m < options.length; m++) {
                options[m].removeAttribute("class");
            }
        }
    });
}

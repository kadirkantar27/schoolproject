<?php
$servername = "localhost"; //Hosting'de çalışacaksa localhost olarak kalsın.
$username = "root"; // Burası eğer cihazınızda çalışıyorsa root, değilse kullanıcı adı olarak değiştirilmelidir.
$password = "12345"; // Cihazda çalışacaksa boş, değilse parola girilmeli
$dbname = "kadirdb"; // DB adı.

// Ben burada kodları test ederken XAMPP kullanarak localhost phpmyadmin kullandım. Siz de öyle yapacaksanız yukarıdaki kısımları aynı bırakın.
// Aksi halde hostingdeki bilgileriniz ile doldurun.

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// OPERASYON: Tek dosyada hangi işlemi yapacağınızı tanımlar.
$operation = $_GET['operation'];


// KAYIT İŞLEMİ
if ($operation == 'register') {
    $names = $_GET['name'];
    $emails = $_GET['email'];
    $passwords = $_GET['password'];
    $sql = "INSERT INTO register (name, email, password) VALUES ('$names', '$emails', '$passwords')";

    if ($conn->query($sql) === TRUE) {
        echo "Kullanıcı Kaydedildi: $names";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
    // KULLANICI SİLMEK
} elseif ($operation == 'delete') {
    $names = $_GET['name'];
    $emails = $_GET['email'];
    $passwords = $_GET['password'];
    $sql = "DELETE FROM register WHERE name = '$names' AND email = '$emails' AND password = '$passwords'";

    if ($conn->query($sql) === TRUE) {
        echo "Başarıyla silindi: $names";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

    // GİRİŞ İŞLEMİ $operation == 'login'
} elseif ($operation == 'login') {
    $email = $_GET['email'];
    $password = $_GET['password'];

    // Parola hatalı girişleri önlemek için SQL enjeksiyonu saldırılarına karşı koruma
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    $sql = "SELECT * FROM register WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $storedPassword = $user['password'];

            // Parolayı kontrol et
            if ($password == $storedPassword) {
                echo "ok"; // Kullanıcı bulundu ve parola doğru
                //$homePageURL = "homepage.html";
                //header("Location: " . $homePageURL);
                //exit(); // Kodun devam etmemesi için
            } else {
                echo "Parola Hatalı";
            }
        } else {
            echo "Kullanıcı bulunamadı";
        }
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

//DB Kapat.
$conn->close();
?>
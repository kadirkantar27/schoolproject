<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>Giriş Sayfası</title>
</head>
<body>

    <h2>KEBBS</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="post" action="index.php">
			<h1>Hesap Oluştur</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>kayıt için email de kullanabilirsin</span>
			<input type="text" placeholder="İsim" name="userName"/>
			<input type="email" placeholder="Email"/>
			<input type="password" placeholder="Parola"/>
			<button>ÜYE OL</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="post" action="index.php">
			<h1>Giriş Yap</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>başka hesabını kullanabilirsin</span>
			<input type="email" placeholder="Email" name="eMail"/>
			<input type="password" placeholder="Parola" name="password"/>
			<a href="#">Parolanı mı unuttun?</a>
			<button name="login_btn">GİRİŞ YAP</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Tekrar Hoşgeldin</h1>
				<p>Eğer daha önce kayıt olduysan kişisel bilgilerinle giriş yapabilirsin</p>
				<button class="ghost" id="signIn">GİRİŞ YAP</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Merhaba, Hoşgeldin</h1>
				<p>Kişisel bilgilerinle üye olarak dünyamıza giriş yapabilirsin</p>
				<button class="ghost" id="signUp">ÜYE OL</button>
			</div>
		</div>
	</div>
</div>

<script src="script.js"></script>
<script src="https://kit.fontawesome.com/c2da3199bf.js" crossorigin="anonymous"></script>

</body>
</html>
<?php
// Veritabanı bağlantısı
$conn = mysqli_connect("localhost", "root", "12345", "usersDB");

// Bağlantı hatası kontrolü
if (!$conn) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}

// Giriş butonu kontrolü
if (isset($_POST['login_btn'])) {
    // POST verilerini alma
    $eMail = $_POST['eMail'];
    $password = $_POST['password'];

    // Güvenli SQL sorgusu
    $sql = "SELECT * FROM usersDB.Users WHERE eMail = '$eMail'";
    $result = mysqli_query($conn, $sql);

    // Kullanıcı bilgilerini kontrol etme
    while ($row = mysqli_fetch_assoc($result)) {
        $resultPassword = $row["password"];

        // Parola doğrulama
        if ($password == $resultPassword) {
            header("Location: index.html");
            exit(); // Kodun devam etmemesi için
        } else {
            echo "<script>alert('Giriş Başarısız');</script>";
        }
    }
}

// Veritabanı bağlantısını kapat
mysqli_close($conn);
?>
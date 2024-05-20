<?php
class GirisKontrol {
    private $databaseConnectionError = false;

    // Veritabanı bağlantı durumunu kontrol eder
    public function setDatabaseConnectionError($value) {
        $this->databaseConnectionError = $value;
    }

    // Giriş bilgilerini kontrol eder
    public function checkCredentials($username, $password) {

        if ($this->databaseConnectionError) {
            return "Hata: SQL hatası";
        } else {
            // Örnek bir kullanıcı adı ve parola
            $storedUsername = "kullanici_adı";
            $storedPassword = "dogru_parola";

            // Kullanıcı adı ve parolayı kontrol et
            if ($username == $storedUsername && $password == $storedPassword) {
                return "ok"; 
            } elseif ($username == $storedUsername && $password != $storedPassword) {
                return "Parola Hatalı";
            } else {
                return "Kullanıcı bulunamadı";
            }
        }
    }
}
?>
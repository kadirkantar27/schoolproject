<?php
require_once 'giris_kontrol.php'; 

use PHPUnit\Framework\TestCase;

class GirisKontrolTest extends TestCase {
    public function testDogruKullaniciParola() {
        $girisKontrol = new GirisKontrol();

        // Doğru kullanıcı adı ve parola ile giriş yapma senaryosu
        $result = $girisKontrol->checkCredentials("kullanici_adı", "dogru_parola");
        $this->assertEquals("okey", $result);
    }
    public function testYanlisParola() {
        $girisKontrol = new GirisKontrol();

        // Yanlış parola ile giriş yapma senaryosu
        $result = $girisKontrol->checkCredentials("kullanici_adı", "yanlis_parola");
        $this->assertEquals("Parola Hatalı", $result);
    }
    public function testKullaniciBulunamadi() {
        $girisKontrol = new GirisKontrol();

        // Kullanıcı bulunamama senaryosu
        $result = $girisKontrol->checkCredentials("olmayan_kullanici_adı", "herhangi_bir_parola");
        $this->assertEquals("Kullanıcı bulunamadı", $result);
    }
    public function testVeritabaniHatasi() {
        $girisKontrol = new GirisKontrol();

        // Veritabanı hatası senaryosu
        $girisKontrol->setDatabaseConnectionError(true);
        $result = $girisKontrol->checkCredentials("kullanici_adı", "dogru_parola");
        $this->assertEquals("Hata: SQL hatası", $result);
    }
}
?>


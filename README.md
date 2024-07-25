## Tentang Aplikasi
  
Ini adalah sebuah web aplikasi sistem manajemen barang yang sangat sederhana, dimana user dapat menambah data barang dan kategori serta mengelolanya.

Terdapat dua jenis user yakni `admin` dan `non-admin`. User admin dapat melakukan manajemen barang, kategori, serta manajemen user seperti menambah user baru atau mengubah data user. User non-admin hanya bisa melakukan manajemen barang dan kategori. 
  
Aplikasi ini dibuat menggunakan [Laravel 8](https://laravel.com) dengan template [Tabler](https://tabler.io).  

## Prasyarat Sistem
- PHP 7 (diinstal melalui XAMPP atau Laragon atau menginstal manual apabila menggunakan Linux atau MacOS).
- MySQL 5.7
- Composer versi 2.

## Instalasi
Tentukan direktori untuk menyimpan aplikasi ini (apabila menggunakan **XAMPP** bisa masuk ke dalam folder `htdocs`, apabila menggunakan **Laragon** bisa masuk ke dalam folder `www`) kemudian lakukan clone pada repository ini dengan cara:  
```
git clone https://github.com/dhanyg/laravel8-manajemen-barang.git
```
  
Ubah nama direktori hasil clone menjadi `sembarang`.  
```
mv laravel8-manajemen-barang sembarang
```

Kemudian masuk ke dalam direktori tersebut.  
```
cd sembarang
```

Lakukan instalasi Laravel beserta dependensi-dependensi yang dibutuhkan dengan menggunakan composer.  
```
composer install
```
  
Konfigurasi file `.env` dengan mengcopy file `.env.example`
```
cp .env.example .env
```  
  
Ubah beberapa konfigurasi berikut:  
- `APP_NAME`, isi dengan nama aplikasi yang ingin digunakan, misalnya "Sistem Manajemen Barang".
- `APP_ENV`, ubah nilainya menjadi `production` apabila aplikasi siap untuk di-deploy atau biarkan bernilai `local` apabila aplikasi masih dalam proses pengembangan.
- `APP_URL`, isi dengan url atau nama domain yang akan digunakan.
- `DB_DATABASE`, isi dengan nama database yang akan digunakan, jadi pastikan sudah membuat databasenya terlebih dahulu.
- `DB_USERNAME`, isi dengan username yang akan digunakan untuk login ke database (nilai defaultnya adalah user _root_).
- `DB_PASSWORD`, isi dengan password yang digunakan untuk login ke database (nilai defaultnya adalah kosong atau tanpa password).
  
Selanjutnya _generate key_ dengan perintah:
```
php artisan key:generate
```
  
Lakukan link _storage_ untuk kebutuhan menyimpan gambar barang.  
```
php artisan storage:link
```
  
Pindahkan file `nopicture.jpg` yang ada di dalam direktori **public** ke dalam direktori **public/storage**.  
  
Selanjutnya lakukan _database migration_.
```
php artisan migrate --seed
```
 
Apabila tidak terjadi error maka proses instalasi dan konfigurasi telah selesai dan aplikasi siap untuk dijalankan.  
  
## Menjalankan Aplikasi
Ada dua cara untuk menjalankan aplikasi berbasis laravel ini.  
  
Pertama, apabila lokasi direktori aplikasi sudah berada di dalam `htdocs` atau `www` maka untuk mengaksesnya menggunakan url berikut:
```
http://localhost/sembarang/public
```
Diasumsikan bahwa nama direktori telah diubah menjadi `sembarang` dan aplikasi diletakkan di dalam direktori `htdocs` pada XAMPP atau `www` pada Laragon.  
  
Cara kedua adalah dengan menggunakan perintah artisan.
```
php artisan serve
```
Kemudian akses ke url:
```
http://127.0.0.1:8000
atau
http://localhost:8000
```
  
Login menggunakan username `root` dan password `toor`.  
  
Selesai.

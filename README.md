# Booking Lapangan

Booking Lapangan adalah aplikasi berbasis web yang memungkinkan pengguna untuk memesan lapangan olahraga secara online dengan mudah dan cepat. Aplikasi ini menyediakan fitur pencarian lapangan berdasarkan kategori dan tanggal, serta sistem pembayaran yang aman dan terpercaya.

## Fitur

- **Pencarian Lapangan**: Temukan lapangan olahraga favorit Anda berdasarkan kategori dan tanggal yang diinginkan.
- **Booking 24/7**: Lakukan pemesanan kapan saja dan di mana saja.
- **Pembayaran Aman**: Sistem pembayaran yang aman.
- **Kualitas Terjamin**: Semua lapangan telah melalui seleksi ketat untuk memastikan kualitas terbaik.
- **Customer Support**: Layanan pelanggan tersedia 24/7 untuk membantu Anda.

## Instalasi

1. Buat database di phpMyAdmin dengan nama `booking-lapangan`.
2. Import file `database/booking-lapangan.sql` ke dalam database `booking-lapangan`.
3. Jalankan perintah berikut untuk menjalankan aplikasi:
   ```bash
   php artisan serve
   ```
4. Buka browser dan akses alamat [http://localhost:8000/](http://localhost:8000/).
5. Login dengan username dan password yang telah ditentukan:
   - **Username**: admin@gmail.com
   - **Password**: admin123

## Teknologi

- **Backend**: Laravel
- **Frontend**: Blade Templates, Bootstrap
- **Database**: MySQL
- **Authentication**: Laravel Sanctum

## Pengembangan

Untuk berkontribusi pada proyek ini, Anda dapat melakukan fork pada repository dan membuat pull request dengan perubahan yang diusulkan.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).


# Aplikasi Sistem Akademik Sederhana
Link aplikasi: [tubes-siakad](http://tubes-siakad.site.je/)
#### Akses Admin
- email: admin@kampus.ac.id
- password: 12345
#### Akses Mahasiswa
- email: mahasiswa@kampus.ac.id
- password: 12345
***
## Deskripsi Aplikasi
Aplikasi ini dibuat untuk memenuhi penilaian mata kuliah PWL. Aplikasi merupakan Sistem Akademik yang sederhana dimana data dosen, mahasiswa, matakuliah, jadwal dan krs dapat ditampilkan, ditambahkan, diubah dan dihapus. Hanya admin yang dapat mengakses data-data dosen, mahasiswa, matakuliah dan jadwal sedangkan mahasiswa hanya dapat mengakses krs sesuai akun yang dimiliki.
***
### Autentikasi Pengguna (Login)
Halaman gerbang utama sistem yang berfungsi memvalidasi identitas pengguna menggunakan kredensial berupa email dan kata sandi. Sistem dibekali fitur deteksi hak akses (role-based access control) untuk mengarahkan pengguna secara otomatis ke antarmuka yang sesuai, baik sebagai Admin maupun Mahasiswa.
***
### Dashboard
Pusat informasi dinamis yang menyajikan ringkasan data kontekstual setelah proses autentikasi berhasil.
- Sisi Admin: Menampilkan metrik agregat penentu seperti total dosen aktif, jumlah mahasiswa, dan kuantitas program mata kuliah berjalan.
- Sisi Mahasiswa: Menyajikan visualisasi ringkas mengenai status akademik terkini dan kontrak Kartu Rencana Studi (KRS) pada semester aktif.
***
### Manajemen Dosen (Admin)
Fasilitas khusus administrator untuk melakukan operasi Create, Read, Update, Delete (CRUD) pada entitas dosen. Setiap data profil wajib memuat Nomor Induk Dosen Nasional (NIDN) dan nama lengkap, yang secara sistemis terintegrasi sebagai relasi utama dalam penyusunan jadwal perkuliahan.
***
### Manajemen Mahasiswa (Admin)
Pusat kendali administratif untuk mengelola basis data mahasiswa secara komprehensif (tambah, ubah, dan hapus). Entitas dalam halaman ini terikat langsung dengan tabel pengguna (users) untuk otorisasi log masuk sistem sekaligus validasi hak pengambilan KRS.
***
### Manajemen Mata Kuliah (Admin)
Antarmuka pengelolaan direktori mata kuliah yang ditawarkan institusi. Administrator memegang kontrol penuh untuk menginput kode unik kurikulum, nomenklatur mata kuliah, serta bobot Satuan Kredit Semester (SKS) yang menjadi acuan dasar dalam pembagian beban akademik.
***
### Manajemen Jadwal (Admin)
Sistem konfigurasi waktu dan ruang untuk menyusun kalender perkuliahan mingguan. Melalui relasi foreign key, administrator dapat mengawinkan data mata kuliah, ketersediaan dosen pengampu, ruang kelas, serta alokasi hari dan jam dinding secara presisi guna menghindari bentrok jadwal.
***
### Administrasi KRS (Mahasiswa)
Ruang konsolidasi rencana studi yang beroperasi dengan dua tingkat instruksi:
Menu mandiri untuk memilih (take) atau membatalkan (drop) mata kuliah yang tersedia. Halaman ini juga dilengkapi dengan modul generator PDF untuk kebutuhan cetak fisik kartu studi.
***
### Jadwal Kuliah (Admin dan Mahasiswa)
Halaman repositori personal bagi admin dan mahasiswa untuk memantau komitmen akademik mereka. Sistem menyajikan tabulasi data komparatif yang memuat nama mata kuliah, identitas dosen pengajar, ruang kelas, serta detail waktu pelaksanaan kuliah secara real-time.
***
## Screenshots
Screenshots halaman-halaman aplikasi: [screenshots](https://github.com/jematara/tubes-siakad-ifc2024-5520124077-jasmine/tree/main/screenshots)

# ERD, DFD, dan Flowchart

Berikut adalah diagram alur (Flowchart) dan diagram sistem yang mungkin kamu butuhkan jika ditanya asesor. Diagram ini digenerate menggunakan sintaks Mermaid. Kamu dapat menggunakan ekstensi VSCode seperti "Markdown Preview Mermaid Support" atau website seperti `mermaid.live` untuk melihat gambarnya.

## 1. Entity Relationship Diagram (ERD)
Sesuai soal, hanya ada satu tabel.

```mermaid
erDiagram
    MAHASISWA {
        string nim PK "Nomor Induk Mahasiswa"
        string nama "Nama Lengkap"
        text alamat "Alamat Domisili"
        string jenis_kelamin "L atau P"
        string password "Enkripsi SHA1"
    }
```

## 2. Flowchart Login System

```mermaid
graph TD
    A([Mulai]) --> B[Buka Aplikasi]
    B --> C{Cek Session Login?}
    C -->|Sudah Login| D[Masuk ke Halaman Utama / index.php]
    C -->|Belum Login| E[Tampil form_login.php]
    E --> F[/Input NIM dan Password/]
    F --> G[Submit Form]
    G --> H{Apakah NIM dan Password valid di DB?}
    H -->|Tidak Valid| I[Tampilkan Pesan Error Merah Berkedip]
    I --> E
    H -->|Valid| J[Buat Session NIM]
    J --> D
    D --> K([Selesai])
```

## 3. Flowchart Ubah Password

```mermaid
graph TD
    A([Mulai dari index.php]) --> B[Klik Edit / Ubah Password]
    B --> C[Tampil form ubah_pass.php]
    C --> D[/Input Pass Lama, Pass Baru, Konfirmasi/]
    D --> E[Submit Form]
    E --> F{Pass Lama Sesuai dengan Database?}
    F -->|Tidak Sesuai| G[Gagal: Password Lama Salah]
    G --> C
    F -->|Sesuai| H{Pass Baru == Konfirmasi?}
    H -->|Tidak Sama| I[Gagal: Konfirmasi tidak cocok]
    I --> C
    H -->|Sama| J[Update Password ke DB dengan SHA1]
    J --> K[Berhasil: Tampil pesan sukses]
    K --> L([Kembali ke index.php])
```

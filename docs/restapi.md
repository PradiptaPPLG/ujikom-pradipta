# Penjelasan Singkat Tentang REST API (Untuk Awam)

Jika asesor atau penguji menanyakan soal "REST API" atau kamu diminta untuk menjelaskannya dalam presentasi, berikut adalah penjelasan yang menggunakan perumpamaan yang mudah dipahami:

## Apa itu REST API?
**API** singkatan dari *Application Programming Interface*.
**REST** singkatan dari *REpresentational State Transfer*.

Sederhananya, API adalah **Pelayan di sebuah restoran**, sedangkan REST adalah **Cara si pelayan itu bekerja sesuai standar restoran (sopan, tidak mengingat pelanggan sebelumnya, bawa nampan standar)**.

### Perumpamaan di Restoran:
1. **Kamu (Klien/Aplikasi Mobile/Frontend)** duduk di meja dan ingin memesan makanan (data).
2. **Dapur (Server/Database)** adalah tempat makanan (data) dibuat dan disimpan. Tapi kamu tidak boleh masuk ke dapur sembarangan.
3. **Pelayan (API)** adalah perantara. Kamu memberikan daftar pesanan (Request) ke pelayan, pelayan memberikannya ke dapur. Setelah makanan siap, pelayan membawa makanan itu (Response) kembali ke meja kamu.

### Bagaimana dengan "REST"?
REST API adalah pelayan yang bekerja dengan "aturan baku":
1. **Stateless (Tidak Ingat-Ingat)**: Setiap kali kamu pesan sesuatu, kamu harus sebutkan nomor meja lagi. Pelayan tidak mengingat pesananmu 5 menit yang lalu. Di dunia IT, setiap Request harus membawa data lengkap (misal: token login) agar server paham siapa yang minta.
2. **Pakai Nampan Standar (Format Data)**: Pelayan selalu membawa makanan dengan nampan standar restoran tersebut. Di dunia IT, format nampannya biasanya menggunakan bentuk data **JSON** (JavaScript Object Notation), yang bentuknya gampang dibaca oleh komputer maupun manusia.

### Operasi Dasar REST API (Metode HTTP)
Pelayan ini paham beberapa jenis tugas yang mirip dengan CRUD (Create, Read, Update, Delete):
- **GET (Read)** : "Tolong ambilkan daftar menu" (Mengambil data dari server).
- **POST (Create)** : "Tolong pesankan nasi goreng ini ke dapur" (Mengirim data baru ke server).
- **PUT / PATCH (Update)** : "Tolong ganti pesanan nasi goreng saya jadi mie goreng" (Mengubah data di server).
- **DELETE (Delete)** : "Tolong batalkan pesanan minuman saya" (Menghapus data di server).

### Apakah Aplikasi Ujikom Kita Pakai REST API?
**TIDAK.**
Aplikasi yang kita bangun di ujikom ini menggunakan konsep **Server-Side Rendering (SSR)**. Kita tidak pakai API, karena logika PHP (dapur) dan tampilan HTML (meja makan) berada di satu tempat yang sama dan disajikan dalam bentuk Halaman Web utuh, bukan data mentah (JSON). REST API biasanya digunakan jika frontend-nya pakai framework modern seperti React/Vue/Android, dan backend-nya terpisah.

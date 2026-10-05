<?php
// Memulai session
session_start();

// Menghapus dan menghancurkan semua data session (Logout)
session_unset();
session_destroy();

// Mengarahkan kembali ke halaman login
header("Location: form_login.php");
exit();
?>

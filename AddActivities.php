<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $Activity = $_POST["Activity"];  // Konsisten menggunakan 'Activity'
    $Priority = $_POST["Priority"];
    
    // Buat array user
    $user = [
        "Activity" => $Activity,
        "Priority" => $Priority
    ];

    // Cek apakah session 'users' sudah ada
    if(!isset($_SESSION['users'])){
        $_SESSION['users'] = [];  // Inisialisasi session 'users' sebagai array
    }
    
    // Tambahkan data activity ke session
    $_SESSION['users'][] = $user; 
    $_SESSION['Type'] = 'success';
    $_SESSION['Message'] = "Activity berhasil ditambahkan";
    
    
    header("Location: index.php");      
    exit();
} else {
    $_SESSION['Type'] = 'error';
    $_SESSION['Message'] = 'Data gagal ditambahkan';
    
    header("Location: index.php");
    exit();
}
?>

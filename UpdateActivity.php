<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $activity = $_POST['Activity'];
    $priority = $_POST['Priority'];

    // Jika ada index yang di-edit
    if (isset($_POST['edit_index'])) {
        $index = $_POST['edit_index'];
        // Update aktivitas yang sudah ada
        $_SESSION['users'][$index]['Activity'] = $activity;
        $_SESSION['users'][$index]['Priority'] = $priority;

        $_SESSION['Message'] = "Activity successfully updated!";
        $_SESSION['Type'] = "success";
    } else {
        // Tambah aktivitas baru
        $_SESSION['users'][] = ['Activity' => $activity, 'Priority' => $priority];

        $_SESSION['Message'] = "Activity successfully added!";
        $_SESSION['Type'] = "success";
    }

    header("Location: index.php");
    exit();
}

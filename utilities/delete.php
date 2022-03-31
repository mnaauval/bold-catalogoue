<?php
    session_start();
    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require('../utilities/functions.php');
    if(!isset($_GET['id'])) {
        header("Location: ../pages/dashboard.php");
    }
    $id_product = $_GET['id'];
    if (hapus($id_product) > 0) {
        echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = '../pages/dashboard.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus!');
            </script>
        ";
    }
?>
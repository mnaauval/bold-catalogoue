<?php
    require('../utilities/functions.php');
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
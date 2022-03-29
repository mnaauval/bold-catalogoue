<?php
    $conn = mysqli_connect('localhost','root','','bold_shop');
    // $conn = mysqli_connect('sql304.epizy.com','epiz_31396805','aoeiukls4195','epiz_31396805_bold_shop');
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }
    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
    function tambah($data) {
        global $conn;
        $name = htmlspecialchars($data['nama']);
        $price = $data['harga'];
        $category = $data['kategori'];
        $color = $data['warna'];
        $description = htmlspecialchars($data['deskripsi']);
        $image = $data['gambar'];
        $sold = $data['sold'];
        $featured = $data['featured'];
        $special = $data['special'];
        $query = "INSERT INTO products VALUES ('', '$name', '$price', '$category', '$color', '$description', '$image', '$sold', '$featured', '$special')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    function edit($data) {
        global $conn;
        $id = $data['id_product'];
        $name = htmlspecialchars($data['nama']);
        $price = $data['harga'];
        $category = $data['kategori'];
        $color = $data['warna'];
        $description = htmlspecialchars($data['deskripsi']);
        $image = $data['gambar'];
        $sold = $data['sold'];
        $featured = $data['featured'];
        $special = $data['special'];
        $query = "UPDATE products SET `id_product`='$id',`nama`='$name',`harga`='$price',`id_kategori`='$category',`id_warna`='$color',`deskripsi`='$description',`gambar`='$image',`sold`='$sold',`id_featured`='$featured',`id_special`='$special' WHERE `id_product`='$id'";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    function hapus($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM products WHERE id_product = $id");
        return mysqli_affected_rows($conn);
    }
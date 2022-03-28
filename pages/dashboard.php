<?php
    require('../utilities/functions.php');
    $num = 1;
    $all = query("SELECT * FROM products");
    $category = query("SELECT COUNT(*) as total_category FROM kategori")[0]['total_category'];
    $sales = query("SELECT SUM(sold) as total_sold FROM products")[0]['total_sold'];
    $avg_sales = query("SELECT AVG(sold) as avg_sold FROM products")[0]['avg_sold'];
    $income = query("SELECT SUM(harga*sold) as income FROM products")[0]['income'];

    $sort_value = "products.nama";
    $sort_value_print = "Nama Produk";

    $sort_order = "ASC";
    $sort_order_print = "Ascending";

    $all = query("SELECT id_product, products.nama as nama_product, harga, kategori.nama as nama_kategori, warna, sold, gambar FROM products 
    LEFT JOIN kategori ON products.id_kategori = kategori.id_kategori
    LEFT JOIN warna ON products.id_warna = warna.id_warna
    ORDER BY $sort_value $sort_order");

    if (isset($_POST["submit"])) {
        $sort_value = $_POST["sort_name"];
        switch ($sort_value) {
            case ($sort_value == "harga"):
                $sort_value_print = "Harga";
                break;
            case ($sort_value == "kategori.nama"):
                $sort_value_print = "Kategori";
                break;
            case ($sort_value == "warna"):
                $sort_value_print = "Warna";
                break;
            case ($sort_value == "sold"):
                $sort_value_print = "Produk Terjual";
                break;
            default:
                $sort_value_print = "Nama Produk";
                break;
        }

        $sort_order = $_POST["sort_index"];       
        switch ($sort_order) {
            case ($sort_order == "DESC"):
                $sort_order_print = "Descending";
                break;
            default:
                $sort_order_print = "Ascending";
                break;
        } 

        $all = query("SELECT id_product, products.nama as nama_product, harga, kategori.nama as nama_kategori, warna, sold, gambar FROM products 
        LEFT JOIN kategori ON products.id_kategori = kategori.id_kategori
        LEFT JOIN warna ON products.id_warna = warna.id_warna
        ORDER BY $sort_value $sort_order");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/4ce69e75c1877262e96a94524eade57d.jpg" />
    <link href="../css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2af2ecb3a0.js" crossorigin="anonymous"></script>
    <title>Bold. - Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: #6777EF;">
        <div class="container">
            <a class="navbar-brand mx-auto text-white" href="../index.php">Bold<span>.</span> Dashboard</a>       
        </div>
    </nav>

    <!-- Data box -->
    <section id="data-box">
        <div class="container-fluid mt-5">
            <div class="row justify-content-evenly">
                <div class="col-lg-3 col-md-5 mb-5">
                    <div class="card shadow-sm">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text">TOTAL PRODUK</p>
                                    <h5 class="card-title"><?= sizeof($all) ?> jenis produk</h5>
                                    <p class="card-text"><small class="text-muted">Dengan <?= $category ?> kategori</small></p>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-box"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 mb-5">
                    <div class="card shadow-sm">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text">PENJUALAN PRODUK</p>
                                    <h5 class="card-title"><?= $sales ?> produk terjual</h5>
                                    <p class="card-text"><small class="text-muted">Avg <?= ceil($avg_sales) ?> terjual per produk</small></p>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 mb-5">
                    <div class="card shadow-sm">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text">PENDAPATAN</p>
                                    <h5 class="card-title">$<?= $income ?>.00</h5>
                                    <p class="card-text"><small class="text-muted">Dalam 3 bulan</small></p>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-coins"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sort -->
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-12">
                <form method="post" class="d-flex w-auto bg-primary" style="border: none; padding: none;">
                    <select class="form-select" aria-label="Default select example" required name="sort_name">
                        <option value="products.nama">Nama Produk</option>
                        <option value="harga">Harga</option>
                        <option value="kategori.nama">Kategori</option>
                        <option value="warna">Warna</option>
                        <option value="sold">Terjual</option>
                    </select>
                    <select class="form-select" aria-label="Default select example" required name="sort_index">
                        <option value="ASC">Ascending</option>
                        <option value="DESC">Descending</option>
                    </select>
                    <button class="btn btn-warning px-5" type="submit" required name="submit">Sort</button>
                </form>
            </div>

            <!-- <div class="col-md-5">
                <form method="post" class="d-flex w-auto bg-primary" style="border: none; padding: none;">
                    <select class="form-select" aria-label="Default select example" required name="sort_index">
                        <option value="ASC">Ascending</option>
                        <option value="DESC">Descending</option>
                    </select>
                    <button class="btn btn-warning px-5" type="submit" required name="submit">Sort</button>
                </form>
            </div> -->
        </div>
    </div>

    <!-- Data table -->
    <section id="data-table">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="add.php" class="text-white">
                            <button class="btn btn-primary mb-3">
                                <i class="fa-solid fa-plus"></i>
                                Tambah Produk
                            </button>
                        </a>
                        <h4>Sort by <?= $sort_value_print ?> (<?= $sort_order_print ?>)</h4>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-warning">
                                <td>No</td>
                                <td>Nama Produk</td>
                                <td>Harga</td>
                                <td>Kategori</td>
                                <td>Warna</td>
                                <td>Terjual</td>
                                <td>Gambar</td>
                                <td>Edit</td>
                            </tr>
                        </thead>
                            <?php foreach($all as $product) : ?>
                                <tr>
                                    <td class="bg-primary text-white text-center" width="50"><?= $num++ ?></td>
                                    <td><?= $product['nama_product'] ?></td>
                                    <td>$<?= $product['harga'] ?>.00</td>
                                    <td><?= $product['nama_kategori'] ?></td>
                                    <td><?= $product['warna'] ?></td>
                                    <td><?= $product['sold'] ?></td>
                                    <td><img width="100" height="auto" src="<?= $product['gambar'] ?>" alt="<?= $product['nama_product'] ?>"></td>
                                    <td width="150">
                                        <div class="d-flex justify-content-evenly align-items-center">
                                            <a href="edit.php?id=<?= $product['id_product'] ?>" class="text-white">
                                                <button class="btn btn-warning">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </button>
                                            </a>
                                            <a href="../utilities/delete.php?id=<?= $product['id_product'] ?>" class="text-white" onclick="return confirm('Anda yakin ingin menghapus data?');">
                                                <button class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
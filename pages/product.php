<?php
    require('../utilities/functions.php');
    $id_product = $_GET['id'];
    $product = query("SELECT id_product, products.nama as nama_product, harga, warna, gambar, deskripsi, kategori.nama as nama_kategori, kategori.id_kategori as kategori_id, special, featured FROM products
    LEFT JOIN kategori ON products.id_kategori = kategori.id_kategori
    LEFT JOIN special ON products.id_special = special.id_special
    LEFT JOIN featured ON products.id_featured = featured.id_featured
    LEFT JOIN warna ON products.id_warna = warna.id_warna
    WHERE id_product = $id_product");

    $featured = query("SELECT id_product, products.nama as nama_product, harga, gambar, kategori.nama as nama_kategori, special, featured FROM products 
    LEFT JOIN kategori ON products.id_kategori = kategori.id_kategori
    LEFT JOIN special ON products.id_special = special.id_special
    LEFT JOIN featured ON products.id_featured = featured.id_featured
    WHERE featured = 'YES'");

    $special = query("SELECT id_product, products.nama as nama_product, harga, gambar, kategori.nama as nama_kategori, special, featured FROM products 
    LEFT JOIN kategori ON products.id_kategori = kategori.id_kategori
    LEFT JOIN special ON products.id_special = special.id_special
    LEFT JOIN featured ON products.id_featured = featured.id_featured
    WHERE special = 'YES'");

    $new = query("SELECT id_product, products.nama as nama_product, harga, gambar, kategori.nama as nama_kategori, special, featured FROM products 
    LEFT JOIN kategori ON products.id_kategori = kategori.id_kategori
    LEFT JOIN special ON products.id_special = special.id_special
    LEFT JOIN featured ON products.id_featured = featured.id_featured
    ORDER BY id_product");

    $top_sold = query("SELECT id_product, products.nama as nama_product, harga, gambar, kategori.nama as nama_kategori, special, featured FROM products 
    LEFT JOIN kategori ON products.id_kategori = kategori.id_kategori
    LEFT JOIN special ON products.id_special = special.id_special
    LEFT JOIN featured ON products.id_featured = featured.id_featured
    ORDER BY sold");

    $sliced_featured = array_slice($featured, 0, 4);
    $sliced_special = array_slice($special, 0, 4);
    $sliced_new = array_slice($new, 0, 4);
    $sliced_top_sold = array_slice($top_sold, 0, 4);
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
    <title>Bold. - Products</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../index.php">Bold<span>.</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="productslist.php">Products</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="login.php">Dashboard</a>
                    </li>
                </ul>
            </div>        
        </div>
    </nav>

    <section id="product">
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="card mb-3" style="border: none;">
                    <div class="row g-0">
                        <?php foreach($product as $item) : ?>
                            <div class="col-md-7">
                                <img src="<?= $item['gambar'] ?>" class="img-fluid rounded-start" alt="<?= $item['nama_product'] ?>">
                            </div>
                            <div class="col-md-5">
                                <div class="card-body">
                                    <h3 class="card-title mb-5"><?= $item['nama_product'] ?></h3>
                                    <h3 class="card-text mb-3" style="color: #ed4700">$<?= $item['harga'].".00" ?></h3>
                                    <p class="mb-5"><?= $item['deskripsi'] ?></p>
                                    <p style="font-size: 1.1rem"><b>Color :</b> <?= $item['warna'] ?></p>
                                    <p style="font-size: 1.1rem"><b>Category :</b> <?= $item['nama_kategori'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
        </div>
    </section>

    <!-- Many Products -->
    <div class="container-fluid bg-light">
        <div class="container py-5">
            <div class="row justify-content-center gap-3">
                <div class="col-lg-3 col-md-5 mb-5">
                    <h5>FEATURED</h5>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <?php foreach($sliced_featured as $product) : ?>
                                <div class="col-md-4 col-2 mb-2">
                                    <a href="product.php?id=<?= $product['id_product'] ?>">
                                        <img src="<?= $product['gambar'] ?>" class="img-fluid rounded-start" alt="<?= $product['nama_product'] ?>">
                                    </a>
                                </div>
                                <div class="col-md-8 col-10">
                                    <div class="card-body">
                                        <a href="product.php?id=<?= $product['id_product'] ?>">
                                            <h5 class="card-title"><?= $product['nama_product'] ?></h5>
                                        </a>
                                        <p class="card-text text-end">$<?= $product['harga']."."."00" ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 mb-5">
                    <h5>NEW!</h5>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <?php foreach($sliced_new as $product) : ?>
                                <div class="col-md-4 col-2 mb-2">
                                    <a href="product.php?id=<?= $product['id_product'] ?>">
                                        <img src="<?= $product['gambar'] ?>" class="img-fluid rounded-start" alt="<?= $product['nama_product'] ?>">
                                    </a>
                                </div>
                                <div class="col-md-8 col-10">
                                    <div class="card-body">
                                        <a href="product.php?id=<?= $product['id_product'] ?>">
                                            <h5 class="card-title"><?= $product['nama_product'] ?></h5>
                                        </a>
                                        <p class="card-text text-end">$<?= $product['harga']."."."00" ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 mb-5">
                    <h5>TOP SELLER</h5>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <?php foreach($sliced_top_sold as $product) : ?>
                                <div class="col-md-4 col-2 mb-2">
                                    <a href="product.php?id=<?= $product['id_product'] ?>">
                                        <img src="<?= $product['gambar'] ?>" class="img-fluid rounded-start" alt="<?= $product['nama_product'] ?>">
                                    </a>
                                </div>
                                <div class="col-md-8 col-10">
                                    <div class="card-body">
                                        <a href="product.php?id=<?= $product['id_product'] ?>">
                                            <h5 class="card-title"><?= $product['nama_product'] ?></h5>
                                        </a>
                                        <p class="card-text text-end">$<?= $product['harga']."."."00" ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- <script>
    $(function() {
        $("#navbar-placeholder").load("../components/navbar.php");
        $("#list").load("../components/suggestion.php");
    });
</script> -->
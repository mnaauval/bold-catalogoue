<?php
    require('./utilities/functions.php');
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

    $furniture = query("SELECT id_product, products.nama as nama_product, harga, gambar, kategori.nama as nama_kategori, special, featured FROM products 
    LEFT JOIN kategori ON products.id_kategori = kategori.id_kategori
    LEFT JOIN special ON products.id_special = special.id_special
    LEFT JOIN featured ON products.id_featured = featured.id_featured
    WHERE kategori.nama = 'Furniture'");

    $kitchen = query("SELECT id_product, products.nama as nama_product, harga, gambar, kategori.nama as nama_kategori, special, featured FROM products 
    LEFT JOIN kategori ON products.id_kategori = kategori.id_kategori
    LEFT JOIN special ON products.id_special = special.id_special
    LEFT JOIN featured ON products.id_featured = featured.id_featured
    WHERE kategori.nama = 'Kitchen'");

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
    $sliced_furniture = array_slice($furniture, 0, 4);
    $sliced_kitchen = array_slice($kitchen, 0, 4);
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
    <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2af2ecb3a0.js" crossorigin="anonymous"></script>
    <title>Bold. - Furniture Catalogue</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="">Bold<span>.</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link active" aria-current="page" href="">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="./pages/productslist.php">Products</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="./pages/contact.php">Contact</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="./pages/login.php">Dashboard</a>
                    </li>
                </ul>
            </div>        
        </div>
    </nav>

    <!-- Slider -->
    <section id="slider">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="first-slider">
                        <div class="caption-slider">
                            <h2>Green Light</h2>
                            <p>Bring color and style to your room</p>
                            <a href="" class="btn btn-outline-dark">See more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="second-slider">
                        <div class="caption-slider">
                            <h2>Prints</h2>
                            <p>Bring color and style to your room</p>
                            <a href="" class="btn btn-outline-dark">See more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Product -->
    <section id="special">
        <div class="container mt-5">
            <h3 class="text-center">FEATURED PRODUCTS</h3>
            <div class="row justify-content-center mt-4">
                <?php foreach($sliced_featured as $product) : ?>
                    <div class="col-lg-4 col-md-5 mb-3">
                        <a href="./pages/product.php?id=<?= $product['id_product'] ?>" class="card">
                            <img src="<?= $product['gambar'] ?>" class="card-img-top" alt="<?= $product['nama_product'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['nama_product'] ?></h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-text text-category"><?= $product['nama_kategori'] ?></h5>
                                    <h4 class="card-text text-warning">$<?= $product['harga']."."."00" ?></h4>
                                </div>
                            </div>
                            <div class="up">
                                <h5>SALE</h5>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <hr class="mt-5">

    <!-- Special Offer -->
    <section id="speical">
        <div class="container mt-5">
            <h3 class="text-center">SPECIAL OFFER</h3>
            <div class="row justify-content-center mt-4">
                <?php foreach($sliced_special as $product) : ?>
                    <div class="col-lg-4 col-md-5 mb-3">
                        <a href="./pages/product.php?id=<?= $product['id_product'] ?>" class="card">
                            <img src="<?= $product['gambar'] ?>" class="card-img-top" alt="<?= $product['nama_product'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['nama_product'] ?></h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-text text-category"><?= $product['nama_kategori'] ?></h5>
                                    <h4 class="card-text text-warning">$<?= $product['harga']."."."00" ?></h4>
                                </div>
                            </div>
                            <div class="up">
                                <h5>SALE</h5>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    </section>

    <!-- Free Shipping -->
    <div class="container-fluid bg-dark text-white text-center mt-5 py-5">
        <h2 class="mb-5">Free shipping</h2>
        <p>We offer free shipping for all orders over $99</p>
    </div>

    <!-- Furniture -->
    <section id="speical">
        <div class="container mt-5">
            <h3 class="text-center">FURNITURE</h3>
            <div class="row justify-content-center mt-4">
                <?php foreach($sliced_furniture as $product) : ?>
                    <div class="col-lg-4 col-md-5 mb-3">
                        <a href="./pages/product.php?id=<?= $product['id_product'] ?>" class="card">
                            <img src="<?= $product['gambar'] ?>" class="card-img-top" alt="<?= $product['nama_product'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['nama_product'] ?></h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-text text-category"><?= $product['nama_kategori'] ?></h5>
                                    <h4 class="card-text text-warning">$<?= $product['harga']."."."00" ?></h4>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    </div>

    <!-- Kitchen -->
    <section id="speical">
        <div class="container mt-5">
            <h3 class="text-center">FOR YOU KITCHEN</h3>
            <div class="row justify-content-center mt-4">
                <?php foreach($sliced_kitchen as $product) : ?>
                    <div class="col-lg-4 col-md-5 mb-3">
                        <a href="./pages/product.php?id=<?= $product['id_product'] ?>" class="card">
                            <img src="<?= $product['gambar'] ?>" class="card-img-top" alt="<?= $product['nama_product'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['nama_product'] ?></h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-text text-category"><?= $product['nama_kategori'] ?></h5>
                                    <h4 class="card-text text-warning">$<?= $product['harga']."."."00" ?></h4>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
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
                                    <a href="./pages/product.php?id=<?= $product['id_product'] ?>">
                                        <img src="<?= $product['gambar'] ?>" class="img-fluid rounded-start" alt="<?= $product['nama_product'] ?>">
                                    </a>
                                </div>
                                <div class="col-md-8 col-10">
                                    <div class="card-body">
                                        <a href="./pages/product.php?id=<?= $product['id_product'] ?>">
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
                                    <a href="./pages/product.php?id=<?= $product['id_product'] ?>">
                                        <img src="<?= $product['gambar'] ?>" class="img-fluid rounded-start" alt="<?= $product['nama_product'] ?>">
                                    </a>
                                </div>
                                <div class="col-md-8 col-10">
                                    <div class="card-body">
                                        <a href="./pages/product.php?id=<?= $product['id_product'] ?>">
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
                                    <a href="./pages/product.php?id=<?= $product['id_product'] ?>">
                                        <img src="<?= $product['gambar'] ?>" class="img-fluid rounded-start" alt="<?= $product['nama_product'] ?>">
                                    </a>
                                </div>
                                <div class="col-md-8 col-10">
                                    <div class="card-body">
                                        <a href="./pages/product.php?id=<?= $product['id_product'] ?>">
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
        $("#navbar-placeholder").load("./components/navbar.php");
        $("#list").load("./components/suggestion.php");
    });
</script> -->
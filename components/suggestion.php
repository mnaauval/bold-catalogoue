<?php
    require('../utilities/functions.php');
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
<div class="container-fluid bg-light">
    <div class="container py-5">
        <div class="row justify-content-center gap-3">
            <div class="col-lg-3 col-md-5 mb-5">
                <h5>FEATURED</h5>
                <div class="card mb-3">
                    <div class="row g-0">
                        <?php foreach($sliced_featured as $product) : ?>
                            <div class="col-md-4 col-2 mb-2">
                                <a href="../pages/product.php?id=<?= $product['id_product'] ?>">
                                    <img src="<?= $product['gambar'] ?>" class="img-fluid rounded-start" alt="<?= $product['nama_product'] ?>">
                                </a>
                            </div>
                            <div class="col-md-8 col-10">
                                <div class="card-body">
                                    <a href="../pages/product.php?id=<?= $product['id_product'] ?>">
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
                                <a href="../pages/product.php?id=<?= $product['id_product'] ?>">
                                    <img src="<?= $product['gambar'] ?>" class="img-fluid rounded-start" alt="<?= $product['nama_product'] ?>">
                                </a>
                            </div>
                            <div class="col-md-8 col-10">
                                <div class="card-body">
                                    <a href="../pages/product.php?id=<?= $product['id_product'] ?>">
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
                                <a href="../pages/product.php?id=<?= $product['id_product'] ?>">
                                    <img src="<?= $product['gambar'] ?>" class="img-fluid rounded-start" alt="<?= $product['nama_product'] ?>">
                                </a>
                            </div>
                            <div class="col-md-8 col-10">
                                <div class="card-body">
                                    <a href="../pages/product.php?id=<?= $product['id_product'] ?>">
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
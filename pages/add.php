<?php
    require('../utilities/functions.php');
    $num = 1;
    $categpries = query("SELECT * FROM kategori");
    $colors = query("SELECT * FROM warna");
    $features = query("SELECT * FROM featured");
    $specials = query("SELECT * FROM special");

    if (isset($_POST["submit"])) {
        if (tambah($_POST) > 0) {
            echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'dashboard.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal ditambahkan!');
                    document.location.href = 'add.php';
                </script>
            ";
        }
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
    <div class="container">
        <h2 class="mb-3">Form Produk</h2>
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" name="form_add">
                    <div class="mb-4 row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama Produk</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" required name="nama">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="harga" required name="harga">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                        <div class="col-sm-8">
                            <select class="form-select" aria-label="Default select example" required name="kategori">
                                <?php foreach($categpries as $category) : ?>
                                    <?= "<option value=".$category['id_kategori'].">".$category['nama']."</option>" ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="warna" class="col-sm-4 col-form-label">Warna</label>
                        <div class="col-sm-8">
                            <select class="form-select" aria-label="Default select example" name="warna">
                                <?php foreach($colors as $color) : ?>
                                    <?= "<option value=".$color['id_warna'].">".$color['warna']."</option>" ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="deskripsi" required name="deskripsi">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="gambar" class="col-sm-4 col-form-label">Gambar (URL)</label>
                        <div class="col-sm-8">
                            <input type="url" class="form-control" id="gambar" required name="gambar">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="sold" class="col-sm-4 col-form-label">Sold (default 0)</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="sold" name="sold">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="featured" class="col-sm-4 col-form-label">Featured Product</label>
                        <div class="col-sm-8">
                            <select class="form-select" aria-label="Default select example" required name="featured">
                                <?php foreach($features as $featured) : ?>
                                    <?= "<option value=".$featured['id_featured'].">".$featured['featured']."</option>" ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="special" class="col-sm-4 col-form-label">Special Offer</label>
                        <div class="col-sm-8">
                            <select class="form-select" aria-label="Default select example" required name="special">
                                <?php foreach($specials as $special) : ?>
                                    <?= "<option value=".$special['id_special'].">".$special['special']."</option>" ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit" required name="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-2">
            <a href="dashboard.php" class="text-white">
                <button class="btn btn-primary">
                    <i class="fa-solid fa-arrow-left" style="font-size: 1rem;"></i>
                    Kembali
                </button>
            </a>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
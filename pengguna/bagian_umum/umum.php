<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">



    <!--Fontaswome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Custom css-->
    <link rel="stylesheet" href="./css/style.css">

    <title>Website Sekolah</title>
</head>

<body>

    <?php include 'fitur/header.php'; ?>
    <?php include 'fitur/navbar.php'; ?>

    <!-- Berita Section -->
    <section id="berita" class="my-5 bg-light">
        <br><br>
        <div class="container">
            <h2 class="text-center fw-bold">Berita Umum</h2>
            <p class="text-center mb-4">Berita Umum terbaru dari SMA Negeri 1 Abad</p>
            <div id="load_data">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body text-center">
                                    <!-- Search Form -->
                                    <form method="GET" action="">
                                        <div class="input-group mt-3">
                                            <input type="text" class="form-control" placeholder="Cari berita..."
                                                name="search"
                                                value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section">
                    <div class="row align-items-start">
                        <?php
                        include '../../keamanan/koneksi.php';

                        // Pagination variables
                        $limit = 6; // Jumlah item per halaman
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $offset = ($page - 1) * $limit;

                        // Searching
                        $search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';

                        // Query to count total records with type = 'umum'
                        $total_result = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM berita WHERE type = 'umum' AND nama LIKE '%$search%'");
                        $total_row = mysqli_fetch_assoc($total_result);
                        $total_items = $total_row['total'];
                        $total_pages = ceil($total_items / $limit);

                        // Query to fetch limited records with type = 'umum' and search
                        $result = mysqli_query($koneksi, "SELECT * FROM berita WHERE type = 'umum' AND nama LIKE '%$search%' LIMIT $limit OFFSET $offset");

                        if (mysqli_num_rows($result) > 0) {
                            // Looping data berita
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id_berita = $row['id_berita'];
                                $nama = $row['nama'];
                                $waktu = $row['waktu'];
                                $deskripsi = $row['deskripsi'];
                                $gambar = $row['gambar'];
                                $type = $row['type'];
                        ?>
                                <div class="col-lg-4 mt-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- Title -->
                                            <h5 class="card-title text-center" style="font-size: 1.7rem;">
                                                <?php echo $nama; ?></h5>

                                            <!-- Carousel -->
                                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="../../assets/img/berita/<?php echo $gambar; ?>"
                                                            class="d-block w-100" alt="<?php echo $nama; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Description -->
                                            <p class="text-center mt-2"
                                                style="font-size: 12px; justify-content: end; align-items: end; display: flex">
                                                "<?php echo $waktu; ?>"
                                            </p>
                                            <hr>
                                            <p class="text-center">"<?php echo $deskripsi; ?>"</p>
                                            <hr>
                                            <a href="berita_detail.php?id_berita=<?php echo $id_berita; ?>"
                                                class="btn btn-primary text-center justify-content-center">Read More</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "<div class='col-12'><p class='text-center'>Tidak ada data berita 😖.</p></div>";
                        }
                        ?>
                    </div>
                </section>

                <section class="section mb-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body text-center">
                                    <!-- Pagination with icons -->
                                    <nav aria-label="Page navigation example" style="margin-top: 2.2rem;">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item <?php if ($page <= 1) {
                                                                        echo 'disabled';
                                                                    } ?>">
                                                <a class="page-link" href="<?php if ($page > 1) {
                                                                                echo "?page=" . ($page - 1) . "&search=" . $search;
                                                                            } ?>" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                                <li class="page-item <?php if ($i == $page) {
                                                                            echo 'active';
                                                                        } ?>">
                                                    <a class="page-link"
                                                        href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>"><?php echo $i; ?></a>
                                                </li>
                                            <?php } ?>
                                            <li class="page-item <?php if ($page >= $total_pages) {
                                                                        echo 'disabled';
                                                                    } ?>">
                                                <a class="page-link" href="<?php if ($page < $total_pages) {
                                                                                echo "?page=" . ($page + 1) . "&search=" . $search;
                                                                            } ?>" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <!-- End Pagination with icons -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>


    <?php include 'fitur/footer.php'; ?>

</body>

</html>

</html>
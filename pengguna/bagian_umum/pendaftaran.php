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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Fontaswome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Custom css-->
    <link rel="stylesheet" href="./css/style.css">

    <title>Website Sekolah</title>
</head>

<body>

    <?php include 'fitur/header.php'; ?>
    <?php include 'fitur/navbar.php'; ?>




    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <div id="load_data">

                            <section class="section">
                                <h2 class="text-center fw-bold">Pendaftaran Calon Siswa</h2>
                                <p class="text-center mb-4">Silakan lihat data Pendaftaran disini, anda bisa melihat
                                    lulus atau tidak anda di sekolah abad 1</p>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <!-- Search Form -->
                                                <form method="POST" action="">
                                                    <div class="input-group mt-3">
                                                        <input type="text" class="form-control"
                                                            placeholder="Masukkan NISN, NIS, atau Nama..."
                                                            name="search_term">
                                                        <button class="btn btn-outline-secondary"
                                                            type="submit">Cari</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="section">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card shadow-sm">
                                            <div class="card-body text-center">
                                                <h2 class="section-title">Hasil Pendaftaran</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <?php
                            include '../../keamanan/koneksi.php';

                            // Cek apakah form disubmit
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $search_term = $_POST['search_term'];

                                // Query untuk mencari data pendaftar
                                $query = "SELECT * FROM pendaftar WHERE nisn = ? OR nik = ? OR nama LIKE ?";
                                $stmt = $koneksi->prepare($query);
                                $like_search = "%$search_term%"; // Untuk pencarian dengan LIKE
                                $stmt->bind_param("sss", $search_term, $search_term, $like_search);
                                $stmt->execute();
                                $result = $stmt->get_result();
                            ?>

                                <section class="section">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card shadow-lg">
                                                <div class="card-body">
                                                    <div style="overflow-x: auto;">
                                                        <?php if ($result->num_rows > 0): ?>
                                                            <?php while ($row = $result->fetch_assoc()): ?>
                                                                <div
                                                                    class="alert alert-<?php echo ($row['status'] == 'lulus') ? 'info' : (($row['status'] == 'tidak_lulus') ? 'danger' : 'warning'); ?> text-center status-message">
                                                                    <?php
                                                                    if ($row['status'] == 'lulus') {
                                                                        echo '<h3 class="status-title success"><i class="fas fa-check-circle"></i> Selamat Anda Lulus!</h3>';
                                                                        echo '<p><i class="fas fa-user-graduate"></i> Selamat ' . $row['nama'] . ' menjadi bagian dari sekolah kami.</p>';
                                                                    } elseif ($row['status'] == 'tidak_lulus') {
                                                                        echo '<h3 class="status-title failed"><i class="fas fa-times-circle"></i> Maaf ' . $row['nama'] . ' Anda Tidak Lulus.</h3>';
                                                                        echo '<p><i class="fas fa-thumbs-up"></i> Tetap semangat dan coba lagi tahun depan.</p>';
                                                                    } else {
                                                                        echo '<h3 class="status-title validation"><i class="fas fa-clock"></i> Data Masih Divalidasi</h3>';
                                                                        echo '<p><i class="fas fa-spinner fa-spin"></i> Silakan tunggu sementara kami memproses pendaftaran Anda.</p>';
                                                                    }
                                                                    ?>
                                                                </div>

                                                            <?php endwhile; ?>
                                                        <?php else: ?>
                                                            <div class="alert alert-warning text-center status-message">
                                                                <h3 class="status-title validation"><i class="fas fa-clock"></i>
                                                                    Data Tidak Ditemukan</h3>
                                                                <p><i class="fas fa-exclamation-circle"></i> Silakan coba NISN,
                                                                    NIS, atau nama yang lain.</p>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            <?php
                            } // Akhir dari cek form disubmit
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->

    <?php include 'fitur/footer.php'; ?>

</body>

</html>

</html>
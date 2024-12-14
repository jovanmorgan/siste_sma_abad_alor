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


    <?php
    include '../../keamanan/koneksi.php'; // Koneksi ke database

    // Mengambil ID berita dari URL
    $id_berita = isset($_GET['id_berita']) ? (int)$_GET['id_berita'] : 0;

    // Query untuk mengambil detail berita berdasarkan ID
    $query = "SELECT * FROM berita WHERE id_berita = $id_berita";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $waktu = $row['waktu'];
        $deskripsi = $row['deskripsi'];
        $gambar = $row['gambar'];
    } else {
        // Jika berita tidak ditemukan
        echo "<script>alert('Berita tidak ditemukan!'); window.location.href='berita.php';</script>";
        exit;
    }
    ?>

    <section id="detail-berita" class="py-5">
        <div class="container">
            <!-- Judul Berita -->
            <h1 class="judul-berita"><?php echo htmlspecialchars($nama); ?></h1>

            <!-- Informasi Penulis dan Tanggal -->
            <div class="info-berita">
                <span class="tanggal">Tanggal: <strong><?php echo htmlspecialchars($waktu); ?></strong></span>
            </div>

            <!-- Gambar Utama Berita -->
            <div class="gambar-berita my-4">
                <img src="../../assets/img/berita/<?php echo htmlspecialchars($gambar); ?>"
                    alt="<?php echo htmlspecialchars($nama); ?>" class="img-fluid rounded">
            </div>

            <!-- Konten Berita -->
            <div class="konten-berita">
                <p><?php echo nl2br(htmlspecialchars($deskripsi)); ?></p>
            </div>
        </div>
    </section>

    <!-- CSS untuk Halaman Detail Berita -->
    <style>
        #detail-berita {
            background-color: #f8f9fa;
            color: #333;
        }

        .judul-berita {
            font-size: 2rem;
            color: #007bff;
            font-weight: bold;
        }

        .info-berita {
            display: flex;
            flex-wrap: wrap;
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 10px;
        }

        .info-berita span {
            margin-right: 20px;
        }

        .gambar-berita img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .konten-berita {
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
        }

        .konten-berita p {
            margin-bottom: 1rem;
            text-align: justify;
        }
    </style>

    <!-- JavaScript untuk Menampilkan Tanggal -->
    <script>
        // Fungsi untuk menampilkan tanggal berita
        document.addEventListener("DOMContentLoaded", () => {
            const tanggalBerita = new Date().toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            document.getElementById("tanggal-berita").innerText = tanggalBerita;
        });
    </script>


    <?php include 'fitur/footer.php'; ?>

</body>

</html>

</html>
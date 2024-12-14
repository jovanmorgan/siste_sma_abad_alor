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

    <!-- Bagian Sejarah Singkat -->
    <section id="sejarah-singkat" class="py-5">
        <div class="container">
            <!-- Judul Bagian -->
            <h2 class="judul-sejarah">Sejarah Singkat</h2>

            <!-- Deskripsi Sejarah -->
            <p class="deskripsi-sejarah">
                SMA Negeri 1 ABAD merupakan jenjang sekolah atas yang didirikan pada tanggal <strong>1 Juni
                    2003</strong>
                (telah terakreditasi dengan predikat B). Sekolah ini memiliki satu buah Lab Komputer, Lab Biologi, Lab
                Fisika,
                18 ruang belajar, perpustakaan, dan fasilitas lainnya.
            </p>

            <!-- Pengembangan Jurusan -->
            <h3 class="subjudul">Pengembangan Jurusan Intra:</h3>
            <ul class="daftar-jurusan">
                <li>1. Jurusan Ilmu Pengetahuan Alam</li>
                <li>2. Jurusan Ilmu Pengetahuan Sosial</li>
                <li>3. Jurusan Ilmu Bahasa</li>
            </ul>

            <!-- Pengembangan Ekstrakurikuler -->
            <h3 class="subjudul">Pengembangan Belajar Ekstra:</h3>
            <ul class="daftar-ekstra">
                <li>1. Pembinaan Pramuka</li>
                <li>2. Pembinaan PMR</li>
                <li>3. Pembinaan Atlet Olahraga</li>
                <li>4. Belajar Komputer (Aplikasi dan Editing)</li>
            </ul>
        </div>
    </section>

    <!-- CSS untuk Sejarah Singkat -->
    <style>
        #sejarah-singkat {
            background-color: #f5f5f5;
            color: #333;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .judul-sejarah {
            font-size: 2rem;
            color: #007bff;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .deskripsi-sejarah {
            font-size: 1rem;
            line-height: 1.6;
            text-align: justify;
            color: #555;
        }

        .subjudul {
            font-size: 1.25rem;
            color: #0056b3;
            margin-top: 1.5rem;
        }

        .daftar-jurusan,
        .daftar-ekstra {
            margin-left: 1.5rem;
            font-size: 1rem;
            color: #333;
        }

        .daftar-jurusan li,
        .daftar-ekstra li {
            margin-bottom: 0.5rem;
        }
    </style>


    <?php include 'fitur/footer.php'; ?>

</body>

</html>

</html>
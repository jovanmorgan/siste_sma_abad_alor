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

    <!-- Bagian Struktur Organisasi -->
    <section id="struktur-organisasi" class="py-5">
        <div class="container">
            <!-- Judul Bagian -->
            <h2 class="judul-struktur">Struktur Organisasi</h2>

            <!-- Diagram Struktur Organisasi -->
            <div class="diagram-struktur">
                <div class="jabatan kepala-sekolah">
                    <h3>Kepala Sekolah</h3>
                    <p>Bapak Drs. Ahmad Setiawan</p>
                </div>

                <div class="container-jabatan">
                    <!-- Wakil Kepala Sekolah -->
                    <div class="jabatan wakil-kepala">
                        <h4>Wakil Kepala Sekolah</h4>
                        <p>Ibu Hj. Siti Aminah, S.Pd.</p>
                    </div>

                    <!-- Kepala Bagian -->
                    <div class="jabatan kepala-bagian">
                        <h4>Kepala Bagian Kurikulum</h4>
                        <p>Pak Budi Santoso, M.Pd.</p>
                    </div>

                    <div class="jabatan kepala-bagian">
                        <h4>Kepala Bagian Kesiswaan</h4>
                        <p>Ibu Rina Rahmawati, S.Pd.</p>
                    </div>

                    <div class="jabatan kepala-bagian">
                        <h4>Kepala Bagian Sarpras</h4>
                        <p>Pak Joko Surtono, S.Kom.</p>
                    </div>

                    <div class="jabatan kepala-bagian">
                        <h4>Kepala Bagian Humas</h4>
                        <p>Ibu Lina Marlina, S.Pd.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CSS untuk Struktur Organisasi -->
    <style>
        #struktur-organisasi {
            background-color: #f5f5f5;
            color: #333;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .judul-struktur {
            font-size: 2rem;
            color: #007bff;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .diagram-struktur {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
        }

        .jabatan {
            text-align: center;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            width: 80%;
            background-color: #fff;
        }

        .kepala-sekolah {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        .container-jabatan {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }

        .jabatan h3,
        .jabatan h4 {
            margin: 0;
            font-size: 1.2rem;
        }

        .jabatan p {
            margin: 0.5rem 0 0;
            font-size: 1rem;
        }

        .wakil-kepala,
        .kepala-bagian {
            background-color: #e9ecef;
        }
    </style>


    <?php include 'fitur/footer.php'; ?>

</body>

</html>

</html>
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

    <!--carousel start-->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="h-100 w-100 " src="../../assets/img/galery/dl.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-md-block">
                    <h2><span>SMA NEGERI 1 ABAD</span></h2>
                    <p></p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="h-100 w-100" src="../../assets/img/galery/dl22.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block">
                    <h2><span></span></h2>
                    <p> </p>
                </div>
            </div>
            <div class="carousel-item">
                <img classs="h-100 w-100" src="../../assets/img/galery/dl19.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block">
                    <h2><span></span></h2>
                    <p></p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Galeri Section -->
    <section id="gallery" class="my-5">
        <div class="container">
            <h2 class="text-center fw-bold">Galeri</h2>
            <p class="text-center mb-4">Berikut adalah gambaran tentang beberapa tempat di SMA Negeri 1 Abad</p>
            <div id="load_data">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body text-center">
                                    <!-- Search Form -->
                                    <form method="GET" action="">
                                        <div class="input-group mt-3">
                                            <input type="text" class="form-control" placeholder="Cari galery..."
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

                        // Query to count total records
                        $total_result = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM galery WHERE nama LIKE '%$search%'");
                        $total_row = mysqli_fetch_assoc($total_result);
                        $total_items = $total_row['total'];
                        $total_pages = ceil($total_items / $limit);

                        // Query to fetch limited records with search
                        $result = mysqli_query($koneksi, "SELECT * FROM galery WHERE nama LIKE '%$search%' LIMIT $limit OFFSET $offset");

                        if (mysqli_num_rows($result) > 0) {
                            // Looping data galery
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id_galery = $row['id_galery'];
                                $nama = $row['nama'];
                                $waktu = $row['waktu'];
                                $deskripsi = $row['deskripsi'];
                                $gambar = $row['gambar'];
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
                                                <img src="../../assets/img/galery/<?php echo $gambar; ?>"
                                                    class="d-block w-100" alt="<?php echo $nama; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <p class="text-center mt-2"
                                        style="font-size: 12px; justify-content: end; align-items: end; display: flex">
                                        "<?php echo $waktu; ?>"
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        } else {
                            echo "<div class='col-12'><p class='text-center'>Tidak ada data galery 😖.</p></div>";
                        }
                        ?>
                    </div>
                </section>

                <section class="section">
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

    <!-- Berita Section -->
    <section id="berita" class="my-5 bg-light">
        <br><br>
        <div class="container">
            <h2 class="text-center fw-bold">Berita</h2>
            <p class="text-center mb-4">Berita terbaru dari SMA Negeri 1 Abad</p>
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

                        // Query to count total records
                        $total_result = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM berita WHERE nama LIKE '%$search%'");
                        $total_row = mysqli_fetch_assoc($total_result);
                        $total_items = $total_row['total'];
                        $total_pages = ceil($total_items / $limit);

                        // Query to fetch limited records with search
                        $result = mysqli_query($koneksi, "SELECT * FROM berita WHERE nama LIKE '%$search%' LIMIT $limit OFFSET $offset");

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
                                        class="btn btn-primary">Read More</a>
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

    <!-- Kalender Akademik -->
    <section id="kalender-akademik" class="py-5 text-center">
        <div class="container">
            <!-- Tanggal dan Waktu Saat Ini -->
            <div id="current-date" class="mb-4">
                <h2 class="fw-bold" id="date-display"></h2>
                <h4 id="time-display"></h4>
            </div>

            <!-- Heading Kalender -->
            <h3 class="text-center fw-bold mb-3">Kalender Akademik</h3>

            <!-- Kalender -->
            <div class="calendar-container">
                <div id="calendar" class="calendar"></div>
            </div>
        </div>
    </section>

    <!-- CSS untuk Kalender -->
    <style>
    #kalender-akademik {
        background-color: #f7f9fc;
        color: #333;
    }

    #current-date h2,
    #current-date h4 {
        color: #007bff;
    }

    .calendar-container {
        display: inline-block;
        padding: 10px;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
        padding: 10px;
    }

    .calendar-day {
        padding: 10px;
        text-align: center;
        border-radius: 4px;
        transition: background 0.3s ease;
    }

    .calendar-day:hover {
        background-color: #e7f1ff;
    }

    .calendar-header {
        font-weight: bold;
        color: #007bff;
    }

    .today {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }
    </style>

    <!-- JavaScript untuk Kalender -->
    <script>
    // Fungsi untuk menampilkan tanggal dan waktu saat ini
    function updateTime() {
        const now = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        document.getElementById("date-display").innerText = now.toLocaleDateString('id-ID', options);
        document.getElementById("time-display").innerText = now.toLocaleTimeString('id-ID');
    }
    setInterval(updateTime, 1000);

    // Fungsi untuk menampilkan kalender bulanan
    function generateCalendar() {
        const calendarContainer = document.getElementById("calendar");
        calendarContainer.innerHTML = '';

        const now = new Date();
        const year = now.getFullYear();
        const month = now.getMonth();
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        const daysOfWeek = ["Ming", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];

        // Tambahkan header hari
        daysOfWeek.forEach(day => {
            const header = document.createElement("div");
            header.className = "calendar-day calendar-header";
            header.innerText = day;
            calendarContainer.appendChild(header);
        });

        // Isi dengan hari-hari kosong sebelum tanggal 1
        for (let i = 0; i < firstDay; i++) {
            const emptyDay = document.createElement("div");
            emptyDay.className = "calendar-day";
            calendarContainer.appendChild(emptyDay);
        }

        // Isi kalender dengan tanggal
        for (let day = 1; day <= daysInMonth; day++) {
            const dayElement = document.createElement("div");
            dayElement.className = "calendar-day";
            dayElement.innerText = day;

            // Tandai hari ini
            if (day === now.getDate()) {
                dayElement.classList.add("today");
            }

            calendarContainer.appendChild(dayElement);
        }
    }

    // Panggil fungsi untuk memuat tanggal dan waktu serta kalender saat halaman dimuat
    document.addEventListener("DOMContentLoaded", () => {
        updateTime();
        generateCalendar();
    });
    </script>



    <?php include 'fitur/footer.php'; ?>

</body>

</html>
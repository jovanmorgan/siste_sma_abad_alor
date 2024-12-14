<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>"
            href="home">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Dropdown Profil -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= in_array(basename($_SERVER['PHP_SELF']), ['profil.php', 'sejarah.php', 'visimisi.php', 'organisasi.php', 'galery.php']) ? 'active' : '' ?>"
                        href="profil.php" id="profilDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Profil</a>
                    <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                        <li><a class="dropdown-item <?= basename($_SERVER['PHP_SELF']) == 'sejarah.php' ? 'active' : '' ?>"
                                href="sejarah.php">Sejarah Singkat</a></li>
                        <li><a class="dropdown-item <?= basename($_SERVER['PHP_SELF']) == 'visimisi.php' ? 'active' : '' ?>"
                                href="visimisi.php">Visi Misi</a></li>
                        <li><a class="dropdown-item <?= basename($_SERVER['PHP_SELF']) == 'organisasi.php' ? 'active' : '' ?>"
                                href="organisasi.php">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item <?= basename($_SERVER['PHP_SELF']) == 'galery.php' ? 'active' : '' ?>"
                                href="galery.php">Galery</a></li>
                    </ul>
                </li>

                <!-- Dropdown Berita -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= in_array(basename($_SERVER['PHP_SELF']), ['umum.php', 'perancangan.php']) ? 'active' : '' ?>"
                        href="index.php" id="beritaDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Berita</a>
                    <ul class="dropdown-menu" aria-labelledby="beritaDropdown">
                        <li><a class="dropdown-item <?= basename($_SERVER['PHP_SELF']) == 'umum.php' ? 'active' : '' ?>"
                                href="umum.php">Umum</a></li>
                        <li><a class="dropdown-item <?= basename($_SERVER['PHP_SELF']) == 'perancangan.php' ? 'active' : '' ?>"
                                href="perancangan.php">Perancangan</a></li>
                    </ul>
                </li>

                <!-- Dropdown Data -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= in_array(basename($_SERVER['PHP_SELF']), ['guru.php', 'pegawai.php', 'pendaftaran.php', 'alumni.php']) ? 'active' : '' ?>"
                        href="data.php" id="dataDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Data</a>
                    <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                        <li><a class="dropdown-item <?= basename($_SERVER['PHP_SELF']) == 'pendaftaran.php' ? 'active' : '' ?>"
                                href="pendaftaran.php">Hasil Pendaftaran</a></li>
                        <li><a class="dropdown-item <?= basename($_SERVER['PHP_SELF']) == 'guru.php' ? 'active' : '' ?>"
                                href="guru.php">Guru</a></li>
                        <li><a class="dropdown-item <?= basename($_SERVER['PHP_SELF']) == 'pegawai.php' ? 'active' : '' ?>"
                                href="pegawai.php">Pegawai</a></li>
                        <li><a class="dropdown-item <?= basename($_SERVER['PHP_SELF']) == 'alumni.php' ? 'active' : '' ?>"
                                href="alumni.php">Alumni</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Search dan Login -->
            <form class="d-flex" style="margin-right: 20px;" method="POST" action="fitur/search.php">
                <input class="form-control me-2" type="search" name="query" placeholder="Cari Halaman.."
                    aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Cari</button>
            </form>
            <a class="nav-link btn btn-primary text-white <?= basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : '' ?>"
                href="../../berlangganan/login">Login</a>
        </div>
    </div>
</nav>
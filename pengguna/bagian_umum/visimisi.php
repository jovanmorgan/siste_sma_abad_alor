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

    <div id="load_data">


        <?php
        // Ambil data profile_sekolah dari database
        include '../../keamanan/koneksi.php';

        $search = isset($_GET['search']) ? $_GET['search'] : '';

        // Query untuk mendapatkan data profile_sekolah dengan id 1
        $query = "SELECT * FROM profile_sekolah WHERE id_profile_sekolah = 1 AND visi LIKE ?";
        $stmt = $koneksi->prepare($query);
        $search_param = '%' . $search . '%';
        $stmt->bind_param("s", $search_param);
        $stmt->execute();
        $result = $stmt->get_result();

        // Tampilkan data profile_sekolah dalam layout vertikal
        if ($result->num_rows > 0):
            $row = $result->fetch_assoc();
            $id_profile_sekolah = htmlspecialchars($row['id_profile_sekolah']);
            $visi = htmlspecialchars($row['visi']);
            $misi = htmlspecialchars($row['misi']);
            $alamat_sekolah = htmlspecialchars($row['alamat_sekolah']);
        ?>

            <section class="section">
                <div class="card shadow-sm p-4 mb-4 bg-light rounded">
                    <div class="card-body">
                        <h3 class="text-center">Visi Dan Misi Sekolah</h3>
                        <div class="text-start mt-4">
                            <h5 class="mt-3"><strong>Visi:</strong></h5>
                            <p><?php echo $visi; ?></p>
                            <h5 class="mt-3"><strong>Misi:</strong></h5>
                            <?php
                            // Pisahkan Misi menjadi paragraf berdasarkan tanda '-'
                            $misi_paragraphs = explode("\n", $misi);
                            foreach ($misi_paragraphs as $paragraph) {
                                if (trim($paragraph) !== '') {
                                    echo '<p>' . nl2br(trim($paragraph)) . '</p>';
                                }
                            }
                            ?>
                            <h5 class="mt-3"><strong>Alamat Sekolah:</strong></h5>
                            <p><?php echo $alamat_sekolah; ?></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Modal Edit Dinamis -->
            <div class="modal fade" id="editModal-<?php echo $id_profile_sekolah; ?>" tabindex="-1"
                aria-labelledby="editModalLabel-<?php echo $id_profile_sekolah; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel-<?php echo $id_profile_sekolah; ?>">Edit Data Sekolah
                            </h5>
                            <button id="closeEditModal" type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm-<?php echo $id_profile_sekolah; ?>" method="POST"
                                action="proses/<?= $page_title_proses ?>/edit.php" enctype="multipart/form-data">
                                <input type="hidden" name="id_profile_sekolah" value="<?php echo $id_profile_sekolah; ?>">

                                <!-- Textarea VISI -->
                                <div class="mb-3">
                                    <label for="visi-<?php echo $id_profile_sekolah; ?>" class="form-label">VISI</label>
                                    <textarea id="visi-<?php echo $id_profile_sekolah; ?>" name="visi" class="form-control"
                                        rows="3" required><?php echo $visi; ?></textarea>
                                </div>

                                <!-- Textarea MISI -->
                                <div class="mb-3">
                                    <label for="misi-<?php echo $id_profile_sekolah; ?>" class="form-label">MISI</label>
                                    <textarea id="misi-<?php echo $id_profile_sekolah; ?>" name="misi" class="form-control"
                                        rows="3" required><?php echo $misi; ?></textarea>
                                </div>

                                <!-- Textarea ALAMAT SEKOLAH -->
                                <div class="mb-3">
                                    <label for="alamat-<?php echo $id_profile_sekolah; ?>" class="form-label">Alamat
                                        Sekolah</label>
                                    <textarea id="alamat-<?php echo $id_profile_sekolah; ?>" name="alamat_sekolah"
                                        class="form-control" rows="3" required><?php echo $alamat_sekolah; ?></textarea>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <p class="text-center mt-4">Data tidak ditemukan.</p>
        <?php endif; ?>
    </div>


    <?php include 'fitur/footer.php'; ?>

</body>

</html>

</html>
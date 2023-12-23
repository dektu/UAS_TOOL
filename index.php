<?php 
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO tbmahasiswa (nim, nama, prodi) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nim, $nama, $prodi);


    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $stmt->execute();

    echo "<script type='text/javascript'>alert('Data Berhasil Ditambahkan!'); window.location.href = 'daftar.php';</script>";

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Mahasiswa</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Sistem Informasi Mahasiswa</h1>
    </header>

    <section>
        <h2>Selamat datang di Sistem Informasi Mahasiswa!</h2>
        <p>Website ini menyediakan informasi tentang mahasiswa-mahasiswa yang terdaftar di institusi ini.</p>

        <button onclick="showForm()">Tambah Mahasiswa</button>

        <form id="addForm" style="display: none;" method="post">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="prodi">Program Studi:</label>
            <input type="text" id="prodi" name="prodi" required>

            <button type="submit">Simpan</button>
        </form>

        <a href="daftar.php"><button>Daftar Mahasiswa</button></a>

    </section>

    <footer>
        <p>&copy; 2023 Sistem Informasi Mahasiswa</p>
    </footer>

    <script src = "script.js"></script>
</body>
</html>

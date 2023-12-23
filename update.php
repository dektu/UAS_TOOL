<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['nim'], $_POST['nama'], $_POST['prodi'])) {

        $stmt = $conn->prepare("UPDATE tbmahasiswa SET nama=?, prodi=? WHERE nim=?");
        $stmt->bind_param("sss", $nama, $prodi, $nim);

        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Data mahasiswa berhasil diperbarui";
        } else {
            echo "Tidak ada perubahan data atau NIM tidak ditemukan";
        }

        $stmt->close();
    } else {
        echo "Semua kolom harus diisi";
    }

    $conn->close();
    exit; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Mahasiswa - Sistem Informasi Mahasiswa</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Update Mahasiswa - Sistem Informasi Mahasiswa</h1>
    </header>

    <section>
        <form id="updateForm">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="" required>

            <label for="prodi">Program Studi:</label>
            <input type="text" id="prodi" name="prodi" value="" required>

            <button type="button" onclick="updateMahasiswa()">Simpan Perubahan</button>
        </form>

        <a href="index.php"><button>Kembali ke Halaman Pertama</button></a>
        <a href="daftar.php"><button>Daftar Mahasiswa</button></a>
    </section>

    <footer>
        <p>&copy; 2023 Sistem Informasi Mahasiswa</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <script>
        function updateMahasiswa() {

            var nim = $('#nim').val();
            var nama = $('#nama').val();
            var prodi = $('#prodi').val();

            $.ajax({
                type: 'POST',
                url: 'update.php',
                data: { nim: nim, nama: nama, prodi: prodi },
                success: function(response) {
                    alert(response);

                },
                error: function(error) {
                    alert('Error: ' + error.responseText);
                }
            });
        }
    </script>
</body>
</html>

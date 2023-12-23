<?php 
include "koneksi.php";

$sql = "SELECT nim, nama, prodi FROM tbmahasiswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - Sistem Informasi Mahasiswa</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Data Mahasiswa - Sistem Informasi Mahasiswa</h1>
    </header>

    <section>
        <h2>Daftar Mahasiswa</h2>
        <?php
        if ($result->num_rows > 0) {

            echo '<table style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>';
            $no = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row["nim"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["prodi"] . "</td>";
                echo '<td><button onclick="deleteMahasiswa(' . $row["nim"] . ')">Delete</button>';
                echo '<a href="update.php?id=' . $row["nim"] . '" style="margin-left: 10px;"><button>Update</button></a></td>';
                echo "</tr>";
            }
            echo '</tbody></table>';
        } else {
            echo '<p style="margin-top: 20px;">No data available</p>';
        }
        $conn->close();
        ?>
        <a href="index.php" style="display: inline-block; margin-top: 20px;"><button>Kembali ke Halaman Awal</button></a>
    </section>

    <footer>
        <p>&copy; 2023 Sistem Informasi Mahasiswa</p>
    </footer>

    <script src = "script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>

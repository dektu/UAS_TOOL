function showForm() {
    var form = document.getElementById('addForm');
    form.style.display = 'block';
}

function deleteMahasiswa(nim) {
    if (confirm("Apakah anda yakin ingin menghapus mahasiswa dengan NIM " + nim + "?")) {
        $.ajax({
            url: 'delete.php',
            type: 'POST',
            data: { nim: nim },
            success: function(result) {
                location.reload(); // reload the page to reflect the changes
            }
        });
    }
}


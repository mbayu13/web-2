<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM NILAI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Import Font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

/* Styling Body */
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(to right, #0096c7, #48cae4);
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    padding: 20px;
}

/* Container Style */
.container {
    width: 100%;
    max-width: 500px;
}

/* Card Styling */
.card {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    padding: 20px;
    text-align: center;
    animation: fadeIn 0.8s ease-in-out;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

/* Hover Effect */
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
}

/* Title Styling */
h3 {
    color: #023e8a;
    font-weight: bold;
    margin-bottom: 15px;
    text-transform: uppercase;
}

/* Paragraph Styling */
p {
    font-size: 16px;
    color: #444;
}

/* Nilai Total Styling */
.nilai-total {
    font-size: 22px;
    font-weight: bold;
    color: #0077b6;
    padding: 12px;
    background: rgba(0, 183, 255, 0.2);
    border-radius: 12px;
    display: inline-block;
    margin: 12px 0;
}

/* Status Lulus & Tidak Lulus */
.text-success {
    color: #1b5e20;
    font-weight: bold;
    font-size: 18px;
    background: rgba(27, 94, 32, 0.1);
    padding: 12px;
    border-radius: 8px;
    display: inline-block;
}

.text-danger {
    color: #b71c1c;
    font-weight: bold;
    font-size: 18px;
    background: rgba(183, 28, 28, 0.1);
    padding: 12px;
    border-radius: 8px;
    display: inline-block;
}

/* Animasi fadeIn */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

    </style>
</head>
<body>

<?php
// Tangkap input form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Ambil data dari form, jika kosong beri default nilai
    $name = $_POST['name'] ?? '';
    $matkul = $_POST['matkul'] ?? '';
    $nilai_uts = $_POST['nilai_uts'] ?? 60;
    $nilai_uas = $_POST['nilai_uas'] ?? 70;
    $nilai_praktikum = $_POST['nilai_praktikum'] ?? 80;

    // Validasi input
    if (empty($name) || empty($matkul) || $nilai_uts === '' || $nilai_uas === '' || $nilai_praktikum === '') {
        die("Harap isi semua kolom!");
    }

    if (!is_numeric($nilai_uts) || !is_numeric($nilai_uas) || !is_numeric($nilai_praktikum)) {
        die("Harap masukkan angka yang valid untuk nilai!");
    }

    // Konversi input ke angka float
    $nilai_uts = floatval($nilai_uts);
    $nilai_uas = floatval($nilai_uas);
    $nilai_praktikum = floatval($nilai_praktikum);

    // Menghitung nilai total
    $nilai_total = ($nilai_uts * 0.3) + ($nilai_uas * 0.35) + ($nilai_praktikum * 0.35);

    echo <<<HTML
    <div class='container mt-4'>
        <div class='card'>
            <div class='card-body text-center'>
                <h3>Hasil Nilai Mahasiswa</h3>
                <p><strong>Nama:</strong> $name</p>
                <p><strong>Mata Kuliah:</strong> $matkul</p>
                <p><strong>Nilai UTS:</strong> $nilai_uts</p>
                <p><strong>Nilai UAS:</strong> $nilai_uas</p>
                <p><strong>Nilai Tugas/Praktikum:</strong> $nilai_praktikum</p>
                <p class='nilai-total'><strong>Nilai Total:</strong> " . number_format($nilai_total, 2) . "</p>
HTML;

    // Menentukan apakah mahasiswa lulus atau tidak
    if ($nilai_total > 55) {
        echo "<p class='text-success'><strong>$name DINYATAKAN LULUS 🎉</strong></p>";
    } else {
        echo "<p class='text-danger'><strong>$name DINYATAKAN TIDAK LULUS 😢</strong></p>";
    }

    echo "
            </div>
        </div>
    </div>";
}
?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM NILAI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="text-center">FORM NILAI MAHASISWA</h5>
            <form method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input id="name" name="name" placeholder="Nama Lengkap" type="text" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="matkul" class="form-label">Mata Kuliah</label>
                    <select id="matkul" name="matkul" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Mata Kuliah --</option>
                        <option value="Dasar Dasar Pemrograman">Dasar Dasar Pemrograman</option>
                        <option value="Bahasa Inggris">Bahasa Inggris</option>
                        <option value="Pemrograman Web">Pemrograman Web</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nilai_uts" class="form-label">Nilai UTS</label>
                    <input id="nilai_uts" name="nilai_uts" placeholder="Nilai UTS" type="number" min="0" max="100" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nilai_uas" class="form-label">Nilai UAS</label>
                    <input id="nilai_uas" name="nilai_uas" placeholder="Nilai UAS" type="number" min="0" max="100" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nilai_praktikum" class="form-label">Nilai Tugas/Praktikum</label>
                    <input id="nilai_praktikum" name="nilai_praktikum" placeholder="Nilai Tugas" type="number" min="0" max="100" class="form-control" required>
                </div>
                <div class="text-center">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

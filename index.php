<?php
$biodata = null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_biodata'])) {
    $nama   = htmlspecialchars($_POST['nama']);
    $nim    = htmlspecialchars($_POST['nim']);
    $prodi  = htmlspecialchars($_POST['prodi']);
    $jk     = htmlspecialchars($_POST['jk']);
    $hobi   = isset($_POST['hobi']) ? implode(", ", $_POST['hobi']) : "-";
    $alamat = htmlspecialchars($_POST['alamat']);

    $biodata = [
        "Nama Lengkap" => $nama,
        "NIM"          => $nim,
        "Program Studi"=> $prodi,
        "Jenis Kelamin"=> $jk,
        "Hobi"         => $hobi,
        "Alamat"       => $alamat
    ];
}

$pencarian = null;
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['keyword']) && $_GET['keyword'] !== "") {
    $pencarian = htmlspecialchars($_GET['keyword']);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Biodata & Pencarian</title>
    <link rel="stylesheet" href="style.css"> <!-- Hubungkan ke CSS -->
</head>
<body>
    <div class="container">
        <h1>Form Biodata Mahasiswa</h1>
        <form method="post">
            <label>Nama Lengkap:</label>
            <input type="text" name="nama" required>

            <label>NIM:</label>
            <input type="text" name="nim" required>

            <label>Program Studi:</label>
            <select name="prodi">
                <option value="Informatika">Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
            </select>

            <label>Jenis Kelamin:</label>
            <div class="radio-group">
            <label><input type="radio" name="jk" value="Laki-laki" required> Laki-laki</label>
            <label><input type="radio" name="jk" value="Perempuan" required> Perempuan</label>
            </div>


            <label>Hobi:</label>
            <div class="checkbox-group">
            <label><input type="checkbox" name="hobi[]" value="Membaca"> Membaca</label>
            <label><input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga</label>
            <label><input type="checkbox" name="hobi[]" value="Gaming"> Gaming</label>
            <label><input type="checkbox" name="hobi[]" value="Musik"> Musik</label>
            </div>

            <label>Alamat:</label>
            <textarea name="alamat" rows="3" required></textarea>

            <input type="submit" name="submit_biodata" value="Kirim Biodata">
        </form>

        <?php if ($biodata): ?>
            <h2>Hasil Biodata</h2>
            <table>
                <?php foreach ($biodata as $key => $value): ?>
                    <tr>
                        <th><?= $key ?></th>
                        <td><?= $value ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

        <hr>

        <h2>Pencarian</h2>
        <form method="get">
            <label for="keyword">Kata Kunci:</label>
            <input type="text" name="keyword" id="keyword">
            <input type="submit" value="Cari">
        </form>

        <?php if ($pencarian): ?>
            <p>Anda mencari data dengan kata kunci: <b><?= $pencarian ?></b></p>
        <?php endif; ?>
    </div>
</body>
</html>

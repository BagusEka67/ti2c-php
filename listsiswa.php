<?php
include 'koneksi.php';

$sql = "SELECT nama, alamat, tempat_lahir, jenis_kelamin, usia FROM mahasiswa ORDER BY id DESC LIMIT 1";
$result = $db->query($sql); 

if ($result && $result->num_rows > 0) {
    $mahasiswa = $result->fetch_assoc(); 
} else {
    $mahasiswa = null; 
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Informasi Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            background-color: #1F627F;
            margin: 0;
            padding: 0;
        }
        .container {
            border-radius: 5px;
            width: 500px;
            height: 280px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        .data-group {
            margin-bottom: 15px;
        }
        strong {
            font-weight: bold;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            float: right;
            margin: 10px;
            padding: 10px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Informasi Mahasiswa Terbaru</h2>
        <?php if ($mahasiswa): ?>
            <div class="data-group">
                <strong>Nama:</strong> <?php echo htmlspecialchars($mahasiswa['nama']); ?>
            </div>
            <div class="data-group">
                <strong>Alamat:</strong> <?php echo htmlspecialchars($mahasiswa['alamat']); ?>
            </div>
            <div class="data-group">
                <strong>Tempat Lahir:</strong> <?php echo htmlspecialchars($mahasiswa['tempat_lahir']); ?>
            </div>
            <div class="data-group">
                <strong>Jenis Kelamin:</strong> <?php echo htmlspecialchars($mahasiswa['jenis_kelamin']); ?>
            </div>
            <div class="data-group">
                <strong>Usia:</strong> <?php echo (int)$mahasiswa['usia']; ?>
            </div>
        <?php else: ?>
            <p>Tidak ada data mahasiswa yang ditemukan.</p>
        <?php endif; ?>
        <a href="biodata.php" class="button">Kembali ke Form Biodata</a>
    </div>
</body>
</html>

<?php
$db->close(); 
?>

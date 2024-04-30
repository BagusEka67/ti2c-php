<?php
include 'koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["biodata"])) {
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $usia = (int) $_POST['usia'];


    $sql = "INSERT INTO mahasiswa (nama, alamat, Tempat_Lahir, jenis_kelamin, usia) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssi", $nama, $alamat, $tempat_lahir, $jenis_kelamin, $usia); // Kaitkan parameter
        if ($stmt->execute()) {
            header("Location: listsiswa.php");
            exit();
        } else {
            echo "Error saat menyimpan data: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error saat menyiapkan query: " . $db->error;
    }
}

$db->close(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Biodata</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1F627F;
            margin: 0;
            padding: 20px;
        }

        .container {
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
            font-weight: bold;
            border-radius: 5px;
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-family: 'Times New Roman', Times, serif;
            font-size: 24px;
            color: #333;
        }

        label {
            font-size: 18px;
            color: #333;
        }

        input[type="text"],
        select {
            font-family: 'Times New Roman', Times, serif;
            font-size: 15px;
            width: 50%;
            padding: 8px;
            margin: 10px 0 20px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 25%;
            background-color: #4CAF50;
            color: white;
            padding: 8px 10px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            width: 100px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>FORM BIODATA</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usia">Usia:</label>
                <input type="text" id="usia" name="usia" required>
            </div>
            <button type="submit" name="biodata">Submit</button>
        </form>
    </div>
</body>

</html>
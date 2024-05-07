<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Buku</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .form-container {
            position: relative;
        }

        .alert-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 999;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .form-container ul li {
            margin-bottom: 15px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="text"],
        .form-container input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .alert-container {
            text-align: center;
            margin-top: 20px;
        }

        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            margin-bottom: 15px;
            border-radius: 4px;
        }

        .success {
            background-color: #4CAF50;
            color: white;
        }

        .failed {
            background-color: #f44336;
            color: white;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Tambah Data Buku</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <ul>
                <li>
                    <label for="judul">Judul : </label>
                    <input type="text" name="judul" id="judul">
                </li>
                <li>
                    <label for="pengarang">Pengarang : </label>
                    <input type="text" name="pengarang" id="pengarang">
                </li>
                <li>
                    <label for="halaman">Halaman : </label>
                    <input type="text" name="halaman" id="halaman">
                </li>
                <li>
                    <label for="tahun">Tahun : </label>
                    <input type="text" name="tahun" id="tahun">
                </li>
                <li>
                    <label for="penerbit">Penerbit : </label>
                    <input type="text" name="penerbit" id="penerbit">
                </li>
                <li>
                    <label for="foto">Foto : </label>
                    <input type="file" name="foto" id="foto">
                </li>
            </ul>
            <button type="submit" name="submit">Simpan Data</button>
        </form>
    </div>

    <?php
    require 'koneksi.php';

    if (isset($_POST['submit'])) {
        if (create($_POST) > 0) {
            echo "<div class='alert-container'>
                <div class='alert success'> <!-- Menambahkan kelas 'success' di sini -->
                    Data berhasil disimpan
                    <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span>
                </div>
            </div>";
        } else {
            echo "<div class='alert-container'>
                <div class='alert'>
                    Data gagal disimpan
                    <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span>
                </div>
            </div>";
        }
    }
    ?>

</body>

</html>
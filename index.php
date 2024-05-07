<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Buku</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        .header h1 {
            margin-top: 1px;
        }

        .topnav {
            margin-top: 1px;
        }

        .dark-mode-toggle {
            position: fixed;
            right: 20px;
            top: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            z-index: 9999;
            transition: background-color 0.3s ease;
        }

        .dark-mode-toggle i {
            font-size: 24px;
            color: #333;
        }

        .dark-mode-toggle.active {
            background-color: #333;
        }

        .dark-mode-toggle.active i {
            color: #fff;
        }

        .dark-mode-toggle.active i.sun {
            display: none;
        }

        .dark-mode-toggle i.moon {
            display: none;
        }

        .rotate {
            animation: spin 2s linear infinite;
        }

        body.dark-mode {
            background-color: rgb(40, 40, 40);
            color: #fff;
        }

        .header.dark-mode,
        .topnav.dark-mode {
            background-color: rgb(40, 40, 40);
            color: #fff;
        }

        .book-list.dark-mode {
            background-color: rgb(64, 64, 64);
            color: #fff;
        }

        .topnav.light-mode a {
            color: #000;
        }

        .topnav.dark-mode a {
            color: #fff;
        }

        .topnav.dark-mode a:hover {
            color: red;
        }

        .moon-icon {
            display: none;
        }

        .search-box {
            display: flex;
            align-items: center;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            padding: 8px;
            margin-bottom: 10px;
        }

        .search-box input[type="text"] {
            border: none;
            padding: 10px;
            border-radius: 4px;
            margin-right: 10px;
            font-size: 16px;
            outline: none;
            width: 300px;
        }

        .search-box button {
            padding: 10px 20px;
            border: none;
            background-color: #4caf50;
            color: #ffffff;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            outline: none;
        }

        .search-box button:hover {
            background-color: #45a049;
        }

        @media screen and (max-width: 768px) {
            body {
                padding: 10px;
            }

            .header {
                border-right: none;
                padding-right: 0;
            }

            .topnav a {
                float: none;
                display: block;
                text-align: left;
                padding: 12px;
                text-decoration: none;
                font-size: 18px;
                border-bottom: 1px solid #ddd;
            }

            .topnav .icon {
                display: block;
                float: right;
            }

            .topnav.responsive {
                position: relative;
            }

            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }

            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }

            .book-list {
                flex-basis: calc(100% - 20px);
                margin: 10px 0;
            }
        }

        .topnav.responsive.active {
            display: block;
        }

        @media screen and (max-width: 768px) {
            .topnav {
                display: none;
            }

            .search-box input[type="text"] {
                border: none;
                padding: 6px;
                border-radius: 4px;
                margin-right: 5px;
                font-size: 14px;
                outline: none;
                width: 150px;
            }
        }

        .add {
            margin-bottom: 20px;
        }

        .add button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            outline: none;

        }

        .add button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Cari buku...">
            <button onclick="searchBooks()">Cari</button>

        </div>

        <div class="add">
            <a href="create.php"><button type="button"><i class='bx bxs-book-add'>&nbsp;Tambah Data</i></button></a>
        </div>

        <h1>List Buku Reza Alawi</h1>

        <div class="topnav">
            <a href="https://www.instagram.com/rezaalawiii" class="home__social-icon"><i
                    class='bx bxl-instagram'>&nbsp;Instagram</i></a><br>
            <a href="https://github.com/rezaalawii" class="home__social-icon"><i
                    class='bx bxl-github'>&nbsp;Github</i></a><br>
            <a href="https://id.linkedin.com/in/rezaalawi0" class="home__social-icon"><i
                    class='bx bxl-linkedin'>&nbsp;Linkedin</i></a>
        </div>
        <br><br>
    </div>


    <div class="dark-mode-toggle" onclick="toggleDarkMode()">
        <i class='bx bx-moon moon-icon'></i>
        <i class='bx bx-sun sun rotate'></i>
    </div>

    <?php
    require 'koneksi.php';
    $buku = read("SELECT * FROM bukureza");
    // $conn = mysqli_connect("localhost", "root", "", "listbuku");
    // $result = mysqli_query($conn, "SELECT * FROM bukureza");
    ?>

    <?php $no = 1;
    // while ($data_array = mysqli_fetch_array($result)): 
    while ($data = current($buku)):
        ?>
        <ul class="book-list">
            <li>Judul :
                <?php echo $data[1]; ?>
            </li>
            <li>Pengarang :
                <?php echo $data[2]; ?>
            </li>
            <li>Halaman :
                <?php echo $data[3]; ?>
            </li>
            <li>Tahun :
                <?php echo $data[4]; ?>
            </li>
            <li>Penerbit :
                <?php echo $data[5]; ?>
            </li>
            <li><img src="img/<?php echo $data["foto"]; ?>"></li>
        </ul>

        <?php $no++;
        next($buku);
    endwhile; ?>


    <script>
        function toggleDarkMode() {
            const body = document.body;
            const header = document.querySelector('.header');
            const topnav = document.querySelector('.topnav');
            const bookLists = document.querySelectorAll('.book-list');
            body.classList.toggle('dark-mode');
            header.classList.toggle('dark-mode');
            topnav.classList.toggle('dark-mode');
            bookLists.forEach((list) => {
                list.classList.toggle('dark-mode');
            });
            const darkModeToggle = document.querySelector('.dark-mode-toggle');
            darkModeToggle.classList.toggle('active');
            const moonIcon = document.querySelector('.moon-icon');
            moonIcon.style.display = body.classList.contains('dark-mode') ? 'inline-block' : 'none';
        }

        function searchBooks() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            ul = document.getElementsByTagName('ul');
            for (i = 0; i < ul.length; i++) {
                li = ul[i].getElementsByTagName('li')[0];
                txtValue = li.textContent || li.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    ul[i].style.display = '';
                } else {
                    ul[i].style.display = 'none';
                }
            }
        }
    </script>
</body>

</html>
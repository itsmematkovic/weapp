<?php

mkdir("../generated");

$view = fopen('../generated/view.php', 'w');
fwrite($view, '<html>

<head>
<title>Daftar Nilai Mahasiswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="view.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
</head>

<body>
<div class="container">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-6">
                    <div class="feature-box">

    <h2>Daftar Nilai Mahasiswa</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Nilai</th>
        </tr>

        <?php
        include "connection.php";

        $result = $db->query("SELECT nim,nama,nilai FROM mahasiswa");
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>$row[nim]</td>",
            "<td>$row[nama]</td>",
            "<td>$row[nilai]</td></tr>";
        }
        ?>

    </table>
    <h2>Input Data</h2>
    <form method="post" action="input.php">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Nilai</td>
                <td><input type="number" name="nilai"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>

    <h2>Update Data</h2>
    <form method="post" action="update.php">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Nilai</td>
                <td><input type="number" name="nilai"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>

    <h2>Delete Data</h2>
    <form method="post" action="delete.php">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="no"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>

    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>');

$view_css = fopen('../generated/view.css', 'w');
fwrite($view_css, 'body {
    margin: 0;
    padding: 0;
    background-image: url("../webapp/bg.png");
    background-attachment: fixed;
  }
  
  .nav-link {
    color: black;
    font-weight: 600;
    margin-left: 30px;
  }
  
  .navbar-brand {
    font-weight: 600;
  }
  
  .wrapper {
    margin: 50px auto;
    border-radius: 10px;
    padding-top: 50px;
    padding-bottom: 50px;
    -webkit-box-shadow: 0 0 40px 2px rgba(98, 203, 198, 0.28);
            box-shadow: 0 0 40px 2px rgba(98, 203, 198, 0.28);
    background-color: white;
  }
  
  .feature-box {
    padding: 30px;
  }
  
  .feature-box h1 {
    margin-top: 20%;
    color: #00374b;
  }

  .feature-box table{
    border: 1px #00374b;
    width: 100%;
  }

  .feature-box th, td{
      padding: 20px;
      background-color: none;
  }
  /*# sourceMappingURL=dashboard.css.map */');

$connection = fopen('../generated/connection.php', 'w');
fwrite($connection,'<?php
$db = new mysqli("localhost", "root", "", "webapp");');

$delete = fopen('../generated/delete.php', 'w');
fwrite($delete,'<?php
include_once "connection.php";

$nim = $_POST["nim"];
$db->query("DELETE FROM mahasiswa WHERE nim=\'\$nim\'");
header("Location: view.php");');

$input = fopen('../generated/input.php', 'w');
fwrite($input, '<?php
include_once "connection.php";

$nim = $_POST["nim"];
$nama = $_POST["nama"];
$nilai = $_POST["nilai"];
$db->query("INSERT INTO mahasiswa VALUES (\'$nim\', \'$nama\', \'$nilai\')");
header("Location: view.php");');

$update = fopen('../generated/update.php', 'w');
fwrite($update, '<?php
include_once "connection.php";

$nim = $_POST["nim"];
$nama = $_POST["nama"];
$nilai = $_POST["nilai"];
$db->query("UPDATE mahasiswa SET nim = \'$nim\', nama = \'$nama\', nilai = \'$nilai\' WHERE nim = \'$nim\'");
header("Location: view.php");');

header('Location:../generated/view.php');



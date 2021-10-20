<?php
include_once 'connection.php';
$handle = fopen($_FILES['uploaded']['tmp_name'], 'r');

$i = 0;
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    if ($i > 0) {
        $import = "INSERT into mahasiswa(nim,nama,nilai)values('" . $data[0] . "','" . $data[1] . "','" . $data[2] . "')";
        $db->query($import);
    }
    $i = 1;
}

header('location: generate.php');


<?php

require 'vendor/autoload.php';

$host = "localhost";
$user = "root";
$pass = "";
$db = "excel_ke_mysql";

$konek = new mysqli($host, $user, $pass, $db);

if ($konek->connect_error) {
    die("Connection failed: " . $konek->connect_error);
}

if(isset($_POST['submit'])){
    $err        = "";
    $ekstensi   = "";
    $success    = "";

    $filename = $_FILES['filexls']['name'] ?? '';
    $filedata = $_FILES['filexls']['tmp_name'] ?? '';


if (empty($filename)) {
    $err .= "<li>Silahkan masukan file yang kamu inginkan</li>";
} else {
    $ekstensi = pathinfo($filename, PATHINFO_EXTENSION);
}
$ekstensi_allowed = array("xls", "xlsx");

if (!in_array($ekstensi, $ekstensi_allowed)) {
    $err .= "<li>Silahkan masukan file type xls, xlsx. File yang kamu masukan <b>$filename</b> berentensi <b>$ekstensi</b></li>";
}

if(empty($err)){
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($filedata);
    $spreadsheet = $reader->load($filedata);
    $sheetData = $spreadsheet->getActiveSheet()->toArray();

    $jumlahData = 0;
    $values = [];
    $params = [];

    for ($i = 1; $i < count($sheetData); $i++) {
        $first_name = $sheetData[$i][1];
        $last_name = $sheetData[$i][2];
        $gender = $sheetData[$i][3];
        $country = $sheetData[$i][4];
        $age = $sheetData[$i][5];
        $date = $sheetData[$i][6];
        $id = $sheetData[$i][7];

        $gender = str_replace(array("Male", "Female"), array("L", "P"), $gender);
        $date_explode = explode("/", $date);
        $date = "$date_explode[2]-$date_explode[1]-${date_explode[0]}";

        $values[] = "(?, ?, ?, ?, ?, ?, ?)";
        $params[] = $first_name;
        $params[] = $last_name;
        $params[] = $gender;
        $params[] = $country;
        $params[] = $age;
        $params[] = $date;
        $params[] = $id;

        $jumlahData++;
    }

    if ($jumlahData > 0) {
        // Build the SQL statement
        $sql = "INSERT INTO xls (firstname, lastname, gender, country, age, date, id) VALUES " . implode(", ", $values);
        $stmt = $konek->prepare($sql);

        // Create a types string for bind_param
        $types = str_repeat('ssssiss', $jumlahData);

        // Bind the parameters
        $stmt->bind_param($types, ...$params);

        // Execute the prepared statement
        $stmt->execute();

        // Close the prepared statement
        $stmt->close();
    }

    if($jumlahData>0){
        $success = "$jumlahData berhasil dimasukan ke MySQL";
    }
}


if($err){
    ?>
<div class="alert alert-danger">
    <ul><?= $err ; ?></ul>
</div>
<?php
}

if($success){
    ?>
<div class="alert alert-primary">
    <ul><?= $success ;?></ul>
</div>
<?php
}

}
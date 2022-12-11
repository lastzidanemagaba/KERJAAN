<?php 


$file = "DataDoaSai.txt";
$content = file_get_contents($file);
$value = "";
$alphas = range('A', 'Z');
$ya = explode("\n", $content);
//remove spaces from array elements and remove empty elements 
$ya2 = array_map('trim', $ya);
//print_r($ya2);


$matches  = preg_grep ('/^.Doa (\w+)/i', $ya2);
$rep = str_replace(".", "", $matches);
$masukindb = (array_values($rep));
// print_r($masukindb);

// insert database
$servername = "localhost";
$username = 'zidane';
$password = 'zidane';
$dbname = 'jtindode_qtracking';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

for($i=0;$i<count($masukindb);$i++)
{
    $pinggirjurang = mysqli_real_escape_string($conn, $masukindb[$i]);
$sql = "INSERT INTO `panduan_umroh_subbab` (`id`, `panduan_umroh_bab`, `title_id`, `title_ar`) VALUES (NULL, '2', '$pinggirjurang', NULL);";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully"."<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}




?>
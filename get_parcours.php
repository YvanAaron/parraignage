<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parrainage_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['filiere_id'])) {
    $filiere_id = intval($_GET['filiere_id']);
    $parcours_sql = "SELECT id, nom FROM parcours WHERE filiere_id = $filiere_id";
    $parcours_result = $conn->query($parcours_sql);

    if ($parcours_result->num_rows > 0) {
        while($row = $parcours_result->fetch_assoc()) {
            echo "<option value='" . $row["id"] . "'>" . $row["nom"] . "</option>";
        }
    } else {
        echo "<option value=''>Aucun parcours disponible</option>";
    }
}

$conn->close();
?>
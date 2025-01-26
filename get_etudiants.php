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

$filiere_id = $_GET['filiere_id'];
$parcours_id = $_GET['parcours_id'];
$niveau = $_GET['niveau'];

$sql = "SELECT id, nom FROM etudiants WHERE filiere_id = ? AND parcours_id = ? AND niveau = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $filiere_id, $parcours_id, $niveau);
$stmt->execute();
$result = $stmt->get_result();

$options = "<option value=''>Sélectionner un étudiant</option>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row["id"] . "'>" . $row["nom"] . "</option>";
    }
} else {
    $options .= "<option value=''>Aucun étudiant disponible</option>";
}

echo $options;

$stmt->close();
$conn->close();
?>
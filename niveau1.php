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

// Fetch filieres
$filiere_sql = "SELECT id, nom FROM filieres";
$filiere_result = $conn->query($filiere_sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de la Filière et du Parcours</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('1.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .glass {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            width: 30%;
            height: auto;
        }
        .container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function loadParcours(filiereId) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_parcours.php?filiere_id=" + filiereId, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("parcours").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</head>
<body>
    <div class="glass">
        <div class="container">
            <form action="process_selection.php" method="post">
                <label for="filiere">Choisir la Filière:</label>
                <select id="filiere" name="filiere" onchange="loadParcours(this.value)">
                    <option value="">Sélectionner une filière</option>
                    <?php
                    if ($filiere_result->num_rows > 0) {
                        while($row = $filiere_result->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["nom"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Aucune filière disponible</option>";
                    }
                    ?>
                </select>
                <label for="parcours">Choisir le Parcours:</label>
                <select id="parcours" name="parcours">
                    <option value="">Sélectionner un parcours</option>
                </select>
                <button type="submit">Valider</button>
            </form>
        </div>
    </div>
</body>
</html>

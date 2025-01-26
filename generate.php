<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filiere_id = $_POST['filiere'];
    $parcours_id = $_POST['parcours'];
    $niveau = $_POST['niveau'];
    $etudiant_id = $_POST['etudiant'];

    $email = isset($_POST['email']) ? $_POST['email'] : ''; // Add an input field for email in your form

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

    // Fetch student details
    $student_sql = "SELECT e.nom, f.nom AS filiere, p.nom AS parcours, e.niveau 
                    FROM etudiants e 
                    JOIN filieres f ON e.filiere_id = f.id 
                    JOIN parcours p ON e.parcours_id = p.id 
                    WHERE e.id = ?";
    $stmt = $conn->prepare($student_sql);
    if ($stmt === false) {
        die("Erreur de préparation de la requête: " . $conn->error);
    }
    $stmt->bind_param("i", $etudiant_id);
    $stmt->execute();
    $student_result = $stmt->get_result();

    if ($student_result->num_rows > 0) {
        $student = $student_result->fetch_assoc();
        $student_info = "Informations de l'étudiant :<br>" .
                        "Nom : " . $student['nom'] . "<br>" .
                        "Filière : " . $student['filiere'] . "<br>" .
                        "Parcours : " . $student['parcours'] . "<br>" .
                        "Niveau : " . $student['niveau'] . "<br><br>";
    } else {
        die("Étudiant non trouvé.");
    }

    // Check if the student already has a mentor
    $check_sql = "SELECT sponsor_id FROM parrainages WHERE sponsored_id = ?";
    $stmt = $conn->prepare($check_sql);
    if ($stmt === false) {
        die("Erreur de préparation de la requête: " . $conn->error);
    }
    $stmt->bind_param("i", $etudiant_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $parrainage = $result->fetch_assoc();
        $sponsor_id = $parrainage['sponsor_id'];

        // Fetch mentor details
        $mentor_sql = "SELECT e.nom, e.niveau, f.nom AS filiere, p.nom AS parcours 
                       FROM etudiants e 
                       JOIN filieres f ON e.filiere_id = f.id 
                       JOIN parcours p ON e.parcours_id = p.id 
                       WHERE e.id = ?";
        $stmt = $conn->prepare($mentor_sql);
        if ($stmt === false) {
            die("Erreur de préparation de la requête: " . $conn->error);
        }
        $stmt->bind_param("i", $sponsor_id);
        $stmt->execute();
        $mentor_result = $stmt->get_result();

        if ($mentor_result->num_rows > 0) {
            $mentor = $mentor_result->fetch_assoc();
            $mentor_info = "Cet étudiant a déjà un parrain. Voici les informations du parrain :<br>" .
                           "Nom : " . $mentor['nom'] . "<br>" .
                           "Filière : " . $mentor['filiere'] . "<br>" .
                           "Parcours : " . $mentor['parcours'] . "<br>" .
                           "Niveau : " . $mentor['niveau'] . "<br>";
        } else {
            $mentor_info = "Erreur lors de la récupération des informations du parrain.";
        }
    } else {
        // Find an available mentor
        $mentor_sql = "SELECT e.id, e.nom, e.niveau, f.nom AS filiere, p.nom AS parcours 
                       FROM etudiants e 
                       JOIN filieres f ON e.filiere_id = f.id 
                       JOIN parcours p ON e.parcours_id = p.id 
                       WHERE e.filiere_id = ? AND e.parcours_id = ? AND e.niveau = 'L2' AND e.id NOT IN (SELECT sponsor_id FROM parrainages)";
        $stmt = $conn->prepare($mentor_sql);
        if ($stmt === false) {
            die("Erreur de préparation de la requête: " . $conn->error);
        }
        $stmt->bind_param("ii", $filiere_id, $parcours_id);
        $stmt->execute();
        $mentor_result = $stmt->get_result();

        if ($mentor_result->num_rows > 0) {
            $mentor = $mentor_result->fetch_assoc();
            $mentor_id = $mentor['id'];

            // Assign the mentor to the student
            $assign_sql = "INSERT INTO parrainages (sponsor_id, sponsored_id) VALUES (?, ?)";
            $stmt = $conn->prepare($assign_sql);
            if ($stmt === false) {
                die("Erreur de préparation de la requête: " . $conn->error);
            }
            $stmt->bind_param("ii", $mentor_id, $etudiant_id);
            if ($stmt->execute()) {
                $mentor_info = "Le parrain a été assigné avec succès.<br>" .
                               "Voici les informations du parrain assigné :<br>" .
                               "Nom : " . $mentor['nom'] . "<br>" .
                               "Filière : " . $mentor['filiere'] . "<br>" .
                               "Parcours : " . $mentor['parcours'] . "<br>" .
                               "Niveau : " . $mentor['niveau'] . "<br>";
            } else {
                $mentor_info = "Erreur lors de l'assignation du parrain.";
            }
        } else {
            $mentor_info = "Aucun parrain disponible.";
        }
    }

    $stmt->close();
    $conn->close();

    // Send email using PHPMailer
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'yvan.hakassoum@gmail.com'; // SMTP username
        $mail->Password = 'niys uubq cyol oxnv'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('yvan.hakassoum@gmail.com', 'Parrainage App');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Informations de Parrainage';
        $mail->Body    = $student_info . $mentor_info;

        $mail->send();
        echo '<script>alert("Message has been sent");</script>';
    } catch (Exception $e) {
        echo '<script>alert("Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations de Parrainage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            width: 100%;
            max-width: 600px;
            color: white;
        }
    </style>
</head>
<body>
    <div class="glass">
        <h2>Informations de Parrainage</h2>
        <form method="post" action="" class="w-100">
            <input type="hidden" name="filiere" value="<?php echo $filiere_id; ?>">
            <input type="hidden" name="parcours" value="<?php echo $parcours_id; ?>">
            <input type="hidden" name="niveau" value="<?php echo $niveau; ?>">
            <input type="hidden" name="etudiant" value="<?php echo $etudiant_id; ?>">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <a href="index.php" class="btn btn-danger">< Back</a>
        </form>
        <div class="mt-3">
            <?php
            if (isset($student_info)) {
                echo $student_info;
            }
            if (isset($mentor_info)) {
                echo $mentor_info;
            }
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

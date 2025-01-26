<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix du Niveau</title>
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
            height: 80%;
        }
        .container {
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }
        .level {
            width: 300px;
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 20px;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s, background-color 0.3s, background-image 0.3s;
        }
        .level1 {
            background-color: rgba(76, 175, 80, 0.8);
            background-image: url('niveau1.jpg'); /* Image pour Niveau 1 */
            background-size: cover;
            background-position: center;
        }
        .level2 {
            background-color: rgba(76, 175, 80, 0.8);
            background-image: url('niveau2.jpg'); /* Image pour Niveau 2 */
            background-size: cover;
            background-position: center;
        }
        .level:hover {
            transform: scale(1.1);
            background-color: rgba(69, 160, 73, 0.8);
        }
    </style>
</head>
<body>
    <div class="glass">
        <div class="container">
            <div class="level level1" onclick="location.href='niveau1.php'">Niveau 1</div>
            <div class="level level2" onclick="location.href='niveau2.php'">Niveau 2</div>
        </div>
    </div>
</body>
</html>
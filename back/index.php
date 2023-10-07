<?php
header("Access-Control-Allow-Origin: *"); // Autoriser l'accès depuis n'importe quelle origine (à des fins de développement)
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // Autoriser les méthodes HTTP
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// Établir une connexion à la base de données
$host = "localhost";
$user = "root";
$pass = "";
$db = "kaisen";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Exécuter une requête SQL pour récupérer des données
$sql = "SELECT * FROM article";
$result = $conn->query($sql);

if (!$result) {
    die("Erreur dans la requête : " . $conn->error);
}

// Initialiser un tableau pour stocker les données
$articles = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $articles[] = $row; 
        echo "Nom : " . $row["Title"] . "<br>";
        
        // Affichez l'image en utilisant le chemin stocké en base de données
        echo '<img src="' . $row["Image"] . '" alt="Image" /><br>';
        
        echo "Introduction : " . $row["Introduction"] . "<br>";
        echo "IdTheme : " . $row["IdTheme"] . "<br>";
        echo "LastMod : " . $row["LastMod"] . "<br>";
    }
}


// return $articles;

header('content-type: application/json');
echo json_encode($articles);
// Fermer la connexion à la base de données (similaire à ce que vous avez fait dans result.php)
$conn->close();
?>


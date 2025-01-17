<?php
include("config.php");
include("reactions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postArray = [
        'name' => $_POST['name'] ?? '',
        'email' => $_POST['email'] ?? '',
        'message' => $_POST['comment'] ?? ''
    ];
    
    $setReaction = Reactions::setReaction($postArray);
}

// Haal alle reacties op uit de database
$reactions = Reactions::getReactions();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>youtube-clone</title>
</head>
<body>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/qvC2bVa7UX4?si=vIujIeVt-Jhacfiv" 
        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
        encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" 
        allowfullscreen>
    </iframe>

    <p>Maak hier je eigen pagina van aan de hand van de opdracht----</p>

    <h2>Laat een reactie achter</h2>
    <form method="POST" action="">
        <label for="email">E-mail:</label><br>
        <input type="text" id="email" name="email" required><br>

        <label for="name">Naam:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="message">Bericht:</label><br>
        <textarea name="comment" cols="30" rows="10" required></textarea><br>

        <input type="submit" value="Verstuur">
    </form>

    <h2>Reacties</h2>
    <?php 
    if (!empty($reactions)) {
        foreach ($reactions as $reaction) {
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;'>";
            echo "<strong>Naam:</strong> " . htmlspecialchars($reaction['name']) . "<br>";
            echo "<strong>E-mail:</strong> " . htmlspecialchars($reaction['message']) . "<br>";
            echo "<strong>Bericht:</strong> " . htmlspecialchars($reaction['email']) . "<br>";
            echo "</div>";
        }
    } else {
        echo "<p>Geen reacties gevonden.</p>";
    }
    ?>
</body>
</html>
<?php
$con->close();
?>
<?php
include("config.php");
include("reactions.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube-clone</title>
</head>

<body>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/8Pc0AEbfnBM?si=Fhlk_LAHs3tJtmk2" title="YouTube video player" frameborder="2" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

    <p>Maak hier je eigen pagina van aan de hand van de opdracht----</p>
    <h2>Reacties</h2>
    <form method="POST" action="">

        <label for="email">email:</label><br>
        <input type="text" id="fname" name="email" value=><br>
        <label for="message">naam:</label><br>
        <input type="text" id="fname" name="name" value=><br>
        <label for="message">bericht:</label><br>
        <textarea name="commentaar" cols="30" rows="10"></textarea>
        <input type="submit" value="Submit">
    </form>


</body>

</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $setreactions = Reactions::setReaction($_POST);
}

if (!empty($_GET)) {

    //dit is een voorbeeld array.  Deze waardes moeten erin staan.

    $postArray = [
        'name' => $_GET['name'],
        'email' => $_GET['email'],
        'message' => $_GET['Message']
    ];

    

    if (isset($setReaction['error']) && $setReaction['error'] != '') {
        prettyDump($setReaction['error']);
    }
}

// Roep de getReactions-methode aan
$reactions = Reactions::getReactions();

// Controleer of er reacties zijn en toon ze
if (!empty($reactions)) {
    foreach ($reactions as $reaction) {
        // echo "ID: " . htmlspecialchars($reaction['id']) . "<br>";
        echo "Naam: " . htmlspecialchars($reaction['name']) . "<br>";
        echo "E-mail: " . htmlspecialchars($reaction['message']) . "<br>";
        echo "message: " . htmlspecialchars($reaction['email']) . "<br>";

        echo "<hr>";
    }
} else {
    echo "Geen reacties gevonden.";
}
$con->close();
?>

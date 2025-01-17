<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Install huidige site</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #240229;
        }

        .loader {
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(#14ffe9, #ffeb3b, #ff00e0);
            animation: animate 0.5s linear infinite;
        }

        @keyframes animate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .loader span {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: linear-gradient(#14ffe9, #ffeb3b, #ff00e0);
        }

        .loader span:nth-child(1){
            filter: blur(5px);
        }

        .loader span:nth-child(2){
            filter: blur(10px);
        }

        .loader span:nth-child(3){
            filter: blur(25px);
        }

            .loader span:nth-child(4){
            filter: blur(50px);
        }

        .loader:after {
            content: '';
            position: absolute;
            top: 10px;
            left: 10px;
            bottom: 10px;
            right: 10px;
            background: #240229;
            border-radius: 50%;
        }
        h3{
            color:white;
            font-family:Arial, Helvetica, sans-serif;
            position:absolute;
            bottom:35%;

        }
    </style>
</head>
<body>
    <div class="loader" id="loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <h3 id="update-status">Installing</h3>

    <?php
     if ($result = mysqli_query($con, "CREATE TABLE `videos` (
        `id` int(10) UNSIGNED NOT NULL,
        `title` varchar(255) NOT NULL,
        `url` varchar(255) NOT NULL,
        `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;")) {
       
        // Free result set
    }

    if ($result = mysqli_query($con, "CREATE TABLE `reactions` (
        `id` int(10) UNSIGNED NOT NULL,
        `video_id` int(11) DEFAULT NULL,
        `name` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL,
        `message` varchar(255) NOT NULL,
        `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;")) {
       
        // Free result set

        if ($result = mysqli_query($con, "INSERT INTO `reactions` (`id`, `video_id`, `name`, `email`, `message`, `date_added`) VALUES
            (1, NULL, 'Pino', 'pino@sesamstraat.nl', 'Dit is de beste Rick Roll ever!', '2024-10-23 07:21:51'),
            (2, NULL, 'Tommy', 'tommy@sesamstraat.nl', 'Deze wil ik de hele dag wel draaien', '2024-10-23 07:21:51');")){

            ?>
            <script>
                let h3 = document.getElementById('update-status');

                h3.innerHTML = "Installeren gelukt, verwijder je install.php."
            </script>
            <?php
        }

        
    }
        ?>

    

</body>
</html>

<?php
$con->close();
?>
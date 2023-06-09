<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comic+Sans+MS&display=swap">
    <title>Quoicoutionnaire</title>
</head>
<?php

$success = false;

$servername = "localhost";
$username = "php";
$password = "K&a=K!pKv~5kf8qa";

$status = "";

function main()
{
    global $success, $servername, $username, $password, $status;
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Erreur de connexion: " . $conn->connect_error);
    }
    $conn->query("use quoicou");
    if ($_POST["mot"] == '') {
        $status = "Le mot ne peut pas être vide !";
        return;
    }
    if (strtolower(substr($_POST["mot"], 0, 7)) != 'quoicou') {
        $status = "Le mot doit commencer par 'quoicou'.";
        return;
    }
    try {
        if ($conn->query("insert into mots(label) values ('" . $_POST["mot"] . "')"))
            $success = true;
    } catch (mysqli_sql_exception $ex) {
        $status = $ex->getCode() == 1062 ? 'Ce mot existe déjà dans la base !' : $ex;
    }
}
main();
?>

<body>

    <header>
        <h1>Quoicoutionnaire</h1>
        <sub>LA référence</sub>
    </header>

    <div class=<?php echo $success ? '"success"' : '"failure"' ?>>
        <h2>Epic
            <?php echo $success ? 'success' : 'fail' ?>
        </h2>
        <?php echo $success ? 'Mot ajouté !' : $status; ?>
    </div>
    <br><br>
    <a href="quoicou.php">Retourner au dictionnaire</a>

</body>

</html>
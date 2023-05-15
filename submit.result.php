<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="style.css">
    <title>Quoicoutionnaire</title>
</head>

<error>
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
        if (strtolower(substr($_POST["mot"], 0, 7)) != 'quoicou')
            die("Le mot doit commencer par 'quoicou'.");
        $sql = "insert into mots(label) values ('" . $_POST["mot"] . "')";
        try {
            if ($conn->query($sql))
                $success = true;
        } catch (mysqli_sql_exception $ex) {
            $status = $ex->getCode() == 1062 ? 'Ce mot existe déjà dans la base !' : $conn->error;
        }
    }
    main();
    ?>
</error>

<body>

    <h1>Quoicoutionnaire</h1>
    <sub>LA référence</sub>

    <h2>Epic
        <?php echo $success ? 'success' : 'fail' ?>
    </h2>
    <?php echo $success ? 'Mot ajouté !' : $status; ?>
    <br><br>
    <a href="index.php">Retourner au dictionnaire</a>

</body>

</html>
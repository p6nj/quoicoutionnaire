<!DOCTYPE html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comic+Sans+MS&display=swap">
  <title>Quoicoutionnaire</title>
</head>

<body>
  <header>
    <h1>Quoicoutionnaire</h1>
    <sub>LA référence</sub>
  </header>

  <aside>Connecté en tant que:
    <?php require_once '../vendor/autoload.php';
    echo Faker\Factory::create("FR_fr")->userName(); ?>
  </aside>

  <br>
  <a href="submit.php">Ajoutez votre mot !</a><br><br>

  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');

  $servername = "localhost";
  $username = "php";
  $password = "K&a=K!pKv~5kf8qa";

  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $conn->query("use quoicou");

  $sql = "select substr(label,8,1) as alpha, count(label) as n from mots group by substr(label,8,1) order by substr(label,8,1)";
  $brief = $conn->query($sql);

  if ($brief->num_rows <= 0)
    die("Error with brief query");

  while ($row = $brief->fetch_assoc()) {
    $sql = "select label from mots where substr(label,8,1)='" . $row["alpha"] . "'";
    $mots = $conn->query($sql);
    if ($mots->num_rows <= 0)
      die("Error getting words in quoicou-" . $row["alpha"]);
    echo '<div class="container">';
    echo "<h2>Quoicou-" . strtoupper($row["alpha"]) . "</h2>";
    echo "<ul>";
    for ($i = 0; $i < $row["n"]; $i++) {
      $mot = $mots->fetch_assoc()["label"];
      echo "<li>" . $mot . "</li>";
    }
    echo "</ul></div>";
  }

  $conn->close();
  ?>

  <div class="h-banner">
    <img src="../img/casinosdv.gif" alt="pub chinoise">
    <img src="../img/casinozersrq.gif" alt="big chilling">
  </div>

  <div class="v-banner">
    <img src="../img/banner.gif" alt="grand casino">
  </div>

</body>

</html>
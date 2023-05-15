<!DOCTYPE html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="style.css">
  <title>Quoicoutionnaire</title>
</head>

<body>

  <h1>Quoicoutionnaire</h1>
  <sub>LA référence</sub>

  <br>
  <a href="submit.php">Ajoutez votre mot !</a>

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

  $sql = "select substr(label,8,1) as alpha, count(label) as n from mots group by substr(label,8,1)";
  $brief = $conn->query($sql);

  if ($brief->num_rows <= 0)
    die("Error with brief query");

  while ($row = $brief->fetch_assoc()) {
    $sql = "select label from mots where substr(label,8,1)='" . $row["alpha"] . "'";
    $mots = $conn->query($sql);
    if ($mots->num_rows <= 0)
      die("Error getting words in quoicou-" . $row["alpha"]);
    echo "<h2>Quoicou-" . strtoupper($row["alpha"]) . "</h2>";
    echo "<ul>";
    for ($i = 0; $i < $row["n"]; $i++) {
      $mot = $mots->fetch_assoc()["label"];
      echo "<li>" . $mot . "</li>";
    }
    echo "</ul>";
  }

  $conn->close();
  ?>
</body>

</html>
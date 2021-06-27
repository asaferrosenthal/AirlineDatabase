<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Departure Time Updated</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      include 'connectdb.php';

      $flightnum = $_POST["flightnumbers"];
      $time = $_POST["updatedDtime"];

      $query = 'UPDATE flight SET Actual_Departure = "'.$time.'" WHERE Flight_Number = "'.$flightnum.'"';
      $update = $connection->exec($query);

      echo "Flight <i>#" .$flightnum. "</i>'s departure time was updated!";
      echo "<br><br>";
      echo "<img src='https://img1.grunge.com/img/gallery/secrets-the-airlines-dont-want-you-to-know/intro-1523027680.jpg' alt='Airplane Flying'>";
    ?>
      <?php include 'return.php';?>
      <?php $connection = NULL; ?>
  </body>
</html>

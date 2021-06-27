<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Airline</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>

    <?php
      include 'connectdb.php';
    ?>
    <h1>Aaron's Airline Database</h1>
    <img src='https://cdn.iconscout.com/icon/free/png-256/plane-2359613-1987480.png' alt='Plane Icon'>
    <p><hr><p>
    <h2>Flight Times</h2>
    <?php
      include 'getflights.php';
    ?>
    <p><hr><p>
    <h2>Flight Search:</h2>
    <?php
      include 'flightsearchform.php';
    ?>
    <p><hr><p>
    <h2>Add a new flight</h2>
    <?php
      include 'addflightform.php';
    ?>
    <p><hr><p>
    <h2>Update the departure time of a flight</h2>
    <?php
      include 'updatedepartureform.php';
    ?>
    <p><hr><p>
    <h2>Find the average number of seats available per day</h2>
    <?php
      include 'avgseatsform.php';
    ?>
    <p><hr>
    <?php
      $connection = NULL;
    ?>
  </body>
</html>

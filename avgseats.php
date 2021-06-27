<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Average Number of Seats</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      include 'connectdb.php';

      $day = $_POST["weekdays"];

      $query = 'SELECT SUM(Max_Num_Seats) AS sumseats
        FROM flight_offers_per_week
        JOIN flight ON flight_offers_per_week.Flight_Number = flight.Flight_Number
        JOIN airplane ON flight.Assigned_Airplane_ID = airplane.ID
        JOIN airplane_type ON airplane.Airplane_Type_Name = airplane_type.Type_Name
        WHERE flight_offers_per_week.Day = "'.$day.'"';
      $result = $connection->query($query);
      $sumseats = $result->fetch();
      echo "There are <b>".$sumseats["sumseats"]."</b> total available seats on all flights departing on <i>".$day."</i>.";
      echo "<br><br>";
      echo "<img src='https://www.travelersunited.org/wp-content/uploads/2020/03/Sukoi_Seats.jpg' alt='Airplane Seats'>";
    ?>
    <?php $connection = NULL; ?>
    <?php include 'return.php';?>
  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Flight Offers</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      include 'connectdb.php';
    ?>

    <?php
      $code = $_POST["airlinecode"];
      $query = 'SELECT * FROM airline WHERE Code = "'.$code.'"';
      $result = $connection->query($query);
      $codecheck = $result->fetch();
      if (empty($codecheck)) {
        echo "You did not enter a valid airline code.
          <br>
          For reference, here is a list of airlines and their codes:
          <br>
          <br>
          <table>
            <tr>
              <th>Code</th>
              <th>Airline Name</th>
            </tr>";
            $query = 'SELECT * FROM airline';
            $result = $connection->query($query);
            while ($row = $result->fetch()) {
              echo "<tr><td>".$row["Code"]."</td><td>".$row["Name"]."</td></tr>";
            }
            echo "</table>";
            echo "<br>";
            echo "<img src='https://i0.wp.com/cdn.aerotelegraph.com/production/uploads/2020/08/lufthansa_austrian_swiss_brussels.jpg?w=800&resize=800%2C&ssl=1' alt='Airlines'>";

      }
      else {
        echo "<h1>Flight Offers:</h1>";
          $day= $_POST["weekdays"];
          echo "<p>Flights offered on <b>".$day."</b> by ";
          $query = 'SELECT * FROM airline WHERE Code = "'.$code.'"';
          $result=$connection->query($query);
          $row = $result->fetch();
          echo "<i>".$row["Name"]."</i>:</p>";
        ?>
        <table>
          <table>
            <tr>
              <th>Flight Number</th>
              <th>Departing Airport Name</th>
              <th>Arriving Airport Name</th>
            </tr>
          <?php
            $query = 'SELECT flight_offers_per_week.Flight_Number, DA.Name AS "DAName", AA.Name AS "AAName"
              FROM flight_offers_per_week
              JOIN flight
              ON flight_offers_per_week.Airline_Code = flight.Airline_Code
              AND flight_offers_per_week.Flight_Number = flight.Flight_Number
              JOIN airport DA
              ON flight.Departing_Airport_Code = DA.Code
              AND flight_offers_per_week.Airline_Code = flight.Airline_Code
              JOIN airport AA
              ON flight.Arriving_Airport_Code = AA.Code
              AND flight_offers_per_week.Airline_Code = flight.Airline_Code
              WHERE flight_offers_per_week.Airline_Code = "'.$code.'" AND flight_offers_per_week.Day = "'.$day.'"
              ';
            $result=$connection->query($query);
            while ($row=$result->fetch()) {
               echo "<tr><td>".$row["Flight_Number"]."</td><td>".$row["DAName"]."</td><td>".$row["AAName"]."</td></tr>";
            }

          ?>
        </table>
        <br>
        <img src="https://www.airport-suppliers.com/wp-content/uploads/2016/11/Munich-Airport.jpg" alt="Airport">
    <?php } ?>
    <?php include 'return.php';?>
    <?php
       $connection = NULL;
    ?>
  </body>
</html>

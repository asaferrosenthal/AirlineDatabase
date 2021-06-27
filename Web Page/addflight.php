<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Flight Added</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      include 'connectdb.php';

      $airline = $_POST["airlines"];
      $airplane = $_POST["airplane"];
      $flightnum = $_POST["flightnumber"];
      $Dairport = $_POST["Dairports"];
      $Aairport = $_POST["Aairports"];
      $Dtime = $_POST["departuretime"];
      $Atime = $_POST["arrivaltime"];

      $query = 'SELECT Flight_Number FROM flight WHERE Flight_Number = "'.$flightnum.'"';
      $result = $connection->query($query);
      $exists = $result->fetch();
      if (!empty($exists)) {
        echo "A flight with flight number <i>".$flightnum."</i> already exists.
          <br>
          Please choose another flight number.
          <br>";
        echo "<img src='https://i.stack.imgur.com/vddpy.jpg' alt='Plane Turning Around'>";
      }
      else {
        $query = 'INSERT INTO flight values("'.$flightnum.'", "'.$airline.'", "'.$airplane.'", "'.$Atime.'", "'.$Dtime.'", "'.$Atime.'", "'.$Dtime.'", "'.$Dairport.'", "'.$Aairport.'")';
        $flightAdd = $connection->exec($query);

        foreach ($_POST["weekdays"] as $weekdays) {
         $query = 'INSERT INTO Flight_Offers_Per_Week values("'.$flightnum.'", "'.$airline.'", "'.$weekdays.'")';
         $flightAdd = $connection->exec($query);
        }
        echo "Your flight was added!";
        echo "<br><br>";

        $query = 'SELECT * FROM airline WHERE Code = "'.$airline.'"';
        $result = $connection->query($query);
        $airlinename = $result->fetch();

        $query = 'SELECT * FROM airplane
        JOIN airplane_type
        ON airplane.Airplane_Type_Name = airplane_type.Type_Name
        WHERE ID = "'.$airplane.'"';
        $result = $connection->query($query);
        $airplanename = $result->fetch();

        echo "
        <table>
          <tr>
            <th>Flight Number</th>
            <th>Airline</th>
            <th>Assigned Airplane</th>
            <th>Departure Time</th>
            <th>Arrival Time</th>
          </tr>
          <tr>
          <td>".$flightnum."</td>
          <td>".$airlinename["Name"]."</td>
          <td>".$airplanename["Manufacturing_Company"]." ".$airplanename["Type_Name"]."</td>
          <td>".$Dtime."</td>
          <td>".$Atime."</td>
          </tr>
        </table>
        <br>
        ";
        echo "<img src='https://i.pinimg.com/originals/b7/60/a2/b760a2efe13426a20fb5befcdf8197c1.jpg' alt='Airport Check-In'>";
      }
    ?>
    <?php include 'return.php';?>
  </body>
  <?php $connection = NULL; ?>
</html>

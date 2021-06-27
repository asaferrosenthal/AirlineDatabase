<?php
  include 'connectdb.php';
?>

<form method="post" >
  <label for = "airlines">Select an airline to begin:</label>
  <select name = "airlines" required>
    <option disabled selected value> -- select an option -- </option>
    <?php if (!isset($_POST['airlines'])){?>
      <?php
      $query = 'SELECT * FROM airline';
      $result = $connection->query($query);
      while ($row = $result->fetch()) {
        echo "<option value=".$row["Code"].">".$row["Name"]."</option>";
      }}
    else{$airline = $_POST['airlines'];
      $query = 'SELECT * FROM airline WHERE Code = "'.$airline.'"';
      $result = $connection->query($query);
      $name = $result->fetch();
      echo "<option disabled selected value=".$airline.">".$name["Name"]."</option>";}?>
  </select>
  <input type="submit" value="Select Airline">
  <button onclick="window.location.reload();">RESET</button>
</form>

<form action="addflight.php" method="post">
  <select name = "airlines" hidden>
    <option value=<?php echo $airline; ?>></option>
  </select>
  <label for = "flightnumber">Flight Number:</label>
  <input type="text" name="flightnumber" maxlength="3">
  <br>
  <label for = "airplane">Select an airplane to use for this flight:</label>
  <select name = "airplane" required>

    <?php if (!isset($_POST['airlines'])){
      echo "<option disabled selected value>Select an airline to view available planes</option>";}
    else {
      echo "<option disabled selected value> -- select an option -- </option>";}?>


    <?php
      $query = 'SELECT * FROM airplane
        WHERE Airline_Code = "'.$airline.'"';
      $result=$connection->query($query);
      while ($row = $result->fetch()) {
        $query2 = 'SELECT * FROM airplane_type
          WHERE Type_Name = "'.$row["Airplane_Type_Name"].'"' ;
        $result2=$connection->query($query2);
        $row2 = $result2->fetch();
        echo "<option value=".$row["ID"].">".$row2["Manufacturing_Company"]." ".$row["Airplane_Type_Name"]."</option>";
      }
     ?>
  </select>
  <br>
  <label for = "Dairports">Select an airport to depart from:</label>
  <select name = "Dairports" required>
    <option disabled selected value> -- select an option -- </option>
    <?php
    $query = 'SELECT * FROM airport';
    $result = $connection ->query($query);
    while ($row = $result->fetch()) {
      echo "<option value=".$row["Code"].">".$row["Name"]."</option>";
    }
     ?>
  </select>
  <br>
  <label for = "Aairports">Select an airport to arrive at:</label>
  <select name = "Aairports" required>
    <option disabled selected value> -- select an option -- </option>
    <?php
    $result = $connection ->query($query);
    while ($row = $result->fetch()) {
      echo "<option value=".$row["Code"].">".$row["Name"]."</option>";
    }
     ?>
  </select>
  <br>
  <label for = "departuretime">Select a departure time:</label>
  <input type="time" name="departuretime" required>
  <br>
  <label for = "arrivaltime">Select an arrival time:</label>
  <input type="time" name="arrivaltime" required>
  <br>
  <div>
    <label>Select the days of the week this flight will take place on:</label>
    <br>
    <input type="checkbox" name="weekdays[]" id="Sunday" value="Sun">
    <label for="Sunday">Sunday</label>
    <br>
    <input type="checkbox" name="weekdays[]" id="Monday" value="Mon">
    <label for="Monday">Monday</label>
    <br>
    <input type="checkbox" name="weekdays[]" id="Tuesday" value="Tues">
    <label for="Tuesday">Tuesday</label>
    <br>
    <input type="checkbox" name="weekdays[]" id="Wednesday" value="Wed">
    <label for="Wednesday">Wednesday</label>
    <br>
    <input type="checkbox" name="weekdays[]" id="Thursday" value="Thurs">
    <label for="Thursday">Thursday</label>
    <br>
    <input type="checkbox" name="weekdays[]" id="Friday" value="Fri">
    <label for="Friday">Friday</label>
    <br>
    <input type="checkbox" name="weekdays[]" id="Saturday" value="Sat">
    <label for="Saturday">Saturday</label>
  </div>
  <input type="submit" value="Add Flight">
</form>

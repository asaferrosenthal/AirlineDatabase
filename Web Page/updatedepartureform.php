<?php
  include 'connectdb.php';
?>
<form action="updatedeparture.php" method="post">
  <label for = "flightnumbers">Select a flight to update:</label>
  <select name = "flightnumbers" required>
    <option disabled selected value> -- select an option -- </option>
    <?php
    $query = 'SELECT * FROM flight';
    $result = $connection ->query($query);
    while ($row = $result->fetch()) {
      echo "<option value=".$row["Flight_Number"].">".$row["Flight_Number"]."</option>";
    }
     ?>
  </select>
  <br>
  <label for = "updatedDtime">Enter an updated departure time:</label>
  <input type="time" name="updatedDtime" required>
  <br>
  <input type="submit" value="Update">
</form>

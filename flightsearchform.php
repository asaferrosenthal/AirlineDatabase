<?php
  include 'connectdb.php';
?>
<form action="flightsearch.php" method="post">
  <?php include 'weekdays.php'; ?>
  <br>
  <label for = "airlinecode">Airline Code:</label>
  <input type="text" name="airlinecode" maxlength="3"><br>
  <input type="submit" value="Search">
</form>

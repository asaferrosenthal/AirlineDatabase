<table>
  <tr>
    <th>Flight Number</th>
    <th>Airline Code</th>
    <th>Airline Name</th>
    <th>Assigned Airplane</th>
    <th>Departure Time</th>
    <th>Arrival Time</th>
  </tr>
<?php
  $query = 'SELECT * FROM flight WHERE Scheduled_Arrival = Actual_Arrival';
  $result = $connection ->query($query);
  while ($row = $result->fetch()) {
  	echo "<tr><td>".$row["Flight_Number"]."</td>";
    echo "<td>".$row["Airline_Code"]."</td>";
    $query2 = 'SELECT Name FROM airline WHERE Code = "'.$row["Airline_Code"].'"';
    $result2 = $connection->query($query2);
    $airlinename = $result2->fetch();
    echo "<td>".$airlinename["Name"]."</td>";
    $query3 = 'SELECT * FROM airplane
      WHERE ID = "'.$row["Assigned_Airplane_ID"].'"' ;
    $result3=$connection->query($query3);
    $row3 = $result3->fetch();
    $query4 = 'SELECT * FROM airplane_type
      WHERE Type_Name = "'.$row3["Airplane_Type_Name"].'"' ;
    $result4=$connection->query($query4);
    $row4 = $result4->fetch();
    echo "<td>".$row4["Manufacturing_Company"]." ".$row3["Airplane_Type_Name"]."</td>";
    echo "<td>".$row["Actual_Departure"]."</td>";
    echo "<td>".$row["Actual_Arrival"]."</td>";
  }
?>
</table>

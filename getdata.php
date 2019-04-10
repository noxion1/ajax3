<?php
include "dbVars.php";
$debug = true;
$q = $_GET['q'];
$q = filter_var($q, FILTER_SANITIZE_STRING);
$con = mysqli_connect($servername,$uid,$pwd,$database);
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$sql = "SELECT * FROM user_details WHERE last_name LIKE '$q%'";
if ($debug) {
}
$result = mysqli_query($con, $sql);
echo "<br><table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Gender</th>
<th>UID</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['first_name'] . "</td>";
  echo "<td>" . $row['last_name'] . "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['user_id'] . "</td>";
  echo "</tr>";
}
echo "</table";
mysqli_close($con);
 ?>

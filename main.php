<?php
include 'db_connection.php';
$conn = OpenCon();
echo "Connected Successfully";
$sql = "SELECT ItemName FROM items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "items " . $row["ItemName"]. "<br>";
    }
} else {
    echo "0 results";
}
CloseCon($conn);
?>
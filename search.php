<html>

<body>
    <?php
include 'db_connection.php';
function arraymap($map){
    return "'".$map."'";
}
$conn = OpenCon();
echo "Connected Successfully";
echo "<br>";
$keywords = $_GET["key_words_input"];
$keywords = strtolower($keywords);

$keywords_array = explode(",",$keywords);
echo "<br>";
$new_str=implode("','",$keywords_array);
$new_str = "'". $new_str. "'";

$sql = "SELECT ItemKeyWord,KeywordID FROM itemkeywords WHERE ItemKeyWord IN ($new_str)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "keyword: " . $row["ItemKeyWord"] .  $row["KeywordID"]."<br>";
    }
} else {
    echo "0 results";
}
CloseCon($conn);
?>

</body>

</html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="./favicon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./main.css">
    <title>Find It</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal"
                    data-target="#data-entry">Create</button>
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn btn-dark btn-lg btn-block" onclick=window.history.back();>Back to search page</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">Action</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Comment</th>
                        <th scope="col">KeyWord</th>
                        <th scope="col">ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
include 'db_connection.php';
function arraymap($map){
    return "'".$map."'";
}
$conn = OpenCon();
echo "<br>";
$keywords = $_GET["key_words_input"];
$keywords = strtolower($keywords);

$keywords_array = explode(",",$keywords);
echo "<br>";
$new_str=implode("','",$keywords_array);
$new_str = "'". $new_str. "'";

$sql = "SELECT Items.ItemName, Items.Comment, ItemKeyWords.ItemKeyWord,Items.ItemId,ItemKeyWords.KeywordID FROM Items INNER JOIN (ItemKeyWords INNER JOIN XrefTable ON ItemKeyWords.KeywordID = XrefTable.KeyWordID) ON Items.ItemID = XrefTable.ItemID WHERE ItemKeyWords.ItemKeyWord IN ($new_str)";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<th scope='row'><button class='btn btn-info'>Edit</button><button class='btn btn-danger'>Delete</button></th>"."<td>". $row["ItemName"] . "</td><td>". $row["Comment"]."</td><td>". $row["ItemKeyWord"] . "</td><td>". $row["KeywordID"]."</td>";
        echo "</tr>";

    }
} else {
    echo "<tr>";
    echo "<th scope='row' style='color:red'>0 results found. Try changing your Key Words</th>";
    echo "</tr>";
}
CloseCon($conn);
?>
        </div>
    </div>
    <!--Modal-->
    <div class="modal fade" id="data-entry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Entry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Create a Entry</p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Title</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Example Name" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2">Keywords</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Key,words,like,this" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Description</span>
                        </div>
                        <textarea class="form-control" aria-label="With textarea" placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <p id="copyright">Find It ©️ 2019 <code>Version 1.0.1</code></p>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script src="./main.js"></script>
</body>

</html>
<?php
require_once 'config.php';
if(isset($_GET["search"]) && !empty($_GET["search"])) {
    $key = $_GET["search"];
    $sql = "SELECT * FROM list_ebookstore WHERE title LIKE '%$key%'";
}else{
    header("location: error.php");
    exit();
}
$result = mysqli_query($link, $sql);
?>
<!DOCTYPe html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css ">
        .wrappers{
            width: 890px;
            margin: 0 auto;
        }
        .center{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 style="text-align: center">Search Record</h2>
                <?php
                require_once 'config.php';
                echo "<table class='table table-bordered table-striped'>";
                echo"<thead>";
                echo "<tr>";
                echo "<th style='text-align: center'>BookID</th>";
                echo "<th style='text-align: center'>Authorid</th>";
                echo "<th style='text-align: center'>Title</th>";
                echo "<th style='text-align: center'>ISBN</th>";
                echo "<th style='text-align: center'>Pud_year</th>";
                echo "<th style='text-align: center'>Available</th>";
                echo "</tr>";
                echo"</thead>";
                echo"<tbody>";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td style='text-align: center'>" . $row['bookid'] . "</td>";
                    echo "<td style='text-align: right'>" . $row['authorid'] . "</td>";
                    echo "<td style='text-align: right'>" . $row['title'] . "</td>";
                    echo "<td style='text-align: right' >" . $row['ISBN'] . "</td>";
                    echo "<td style='text-align: center'>" . $row['pub_year'] . "</td>";
                    echo "<td style='text-align: right'>" . $row['available'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                mysqli_free_result($result);
                ?>
                <p align="right" style="margin-right: 150px"><a href="index.php" class="btn btn-primary">Back</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
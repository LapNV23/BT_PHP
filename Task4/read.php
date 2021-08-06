<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once 'config.php';

    $sql = "SELECT * FROM people WHERE id = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt,"i",$param_id);
        $param_id = trim($_GET["id"]);
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result)== 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            }else{
                header("location: error.php");
                exit();
            }
        }
    }
}
?>
<!DOCTYPe html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css ">
        .wrappers{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrappers">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <h1 style="text-align: center">View Record</h1>
                </div>
                <?php
                echo "<table class='table table-bordered table-striped'>";
                echo"<thead>";
                echo "<tr>";
                echo "<th style='text-align: center'>ID</th>";
                echo "<th style='text-align: center'>Name</th>";
                echo "<th style='text-align: center'>Telephone</th>";
                echo "<th style='text-align: center'>Address</th>";
                echo "<th style='text-align: center'>F</th>";
                echo "<th style='text-align: center'>Location</th>";
                echo "<th style='text-align: center'>Start Date</th>";
                echo "<th style='text-align: center'>Exit Date</th>";
                echo "</tr>";
                echo"</thead>";
                echo"<tbody>";
                echo "<tr>";
                echo "<td style='text-align: center'>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td style='text-align: right'>" . $row['telephone'] . "</td>";
                echo "<td style='text-align: right' >" . $row['address'] . "</td>";
                echo "<td style='text-align: center'>" . $row['F'] . "</td>";
                echo "<td>" . $row['location'] . "</td>";
                echo "<td style='text-align: center'>" . $row['start_date'] . "</td>";
                echo "<td style='text-align: center'>" . $row['end_date'] . "</td>";
                echo "</tbody>";
                echo "</table>";
                ?>
                <p align="right" style="margin-right: 150px"><a href="index.php" class="btn btn-primary">Back</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

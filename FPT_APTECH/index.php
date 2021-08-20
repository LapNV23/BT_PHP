<!DOCTYPe html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book library</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css ">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr rd:last-child a{
            margin-right: 10px;
        }
    </style>
    <script type="application/javascript">
        $(document).ready(function (){
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <form action="search.php" method="get">
                        <input type="text" name="search" placeholder="Input text" value="
                        <?php if(isset($_GET["search"])){echo $_GET["search"];} ?>">
                        <input type="submit" value="search" />
                    </form>
                    <h2 style="text-align: center">BOOK LIBRARY</h2>
                </div>
                <?php
                require_once 'config.php';
                $sql = "SELECT * FROM list_ebookstore";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) >0){

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
                        while ($row = mysqli_fetch_array($result)){
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
                    }else{
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                }else{
                    echo"EROR: Could not able to execute $sql. " . mysqli_arror($link);
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
require_once 'config.php';
$id = $name= $telephone = $address = $F = $location= $star_date = $end_date ="";
$id_err = $name_err= $telephone_err = $address_err = $F_err = $location_err= $star_date_err = $end_date_err ="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_id = trim($_POST["id"]);
    if(empty($input_id)){
        $address_err = 'Nhập id người cách ly.';
    } else {
        $id = $input_id;
    }

    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Nhập tên.";
    }elseif (!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP,
        array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $name_err = 'Xin vui lòng nhập vào một tên hợp lệ.';
    } else{
        $name = $input_name;
    }

    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = 'Nhập địa chỉ nơi ở của bệnh nhân.';
    } else {
        $address = $input_address;
    }

    $input_F = trim($_POST["F"]);
    if(empty($input_F)){
        $F_err = 'Đây là F.';
    } else {
        $F = $input_F;
    }

    $input_location = trim($_POST["location"]);
    if(empty($input_location)){
        $location_err = 'Bệnh nhân hiện đang cách ly tại.';
    } else {
        $location = $input_location;
    }

    $input_start_date = trim($_POST["start_date"]);
    if(empty($input_start_date)){
        $star_date_err = 'Ngày bắt đầu cách ly.';
    } else {
        $star_date = $input_start_date;
    }

    $input_end_date = trim($_POST["end_date"]);
    if(empty($input_end_date)){
        $end_date_err = 'Ngày kết thúc cách ly.';
    } else {
        $end_date = $input_end_date;
    }

    if(empty($id_err)&&empty($name_err)&&empty($telephone_err)&&empty($address_err)&&empty($F_err)&&empty($location_err)&&empty($star_date_err)&&empty($end_date_err)){
        $sql = "INSERT INTO people (id,name,telephone,address,F,location,start_date,end_date) VALUES (?,?,?,?,?,?,?,?)";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssd", $param_id, $param_name,$param_telephone,$param_address,$param_F,$param_location, $param_start_date, $param_end_date);

            $param_id = $id;
            $param_name = $name;
            $param_address = $address;
            $param_telephone = $telephone;
            $param_F =$F;
            $param_location =$location;
            $param_start_date =$star_date;
            $param_end_date = $end_date;

            if(mysqli_stmt_execute($stmt)){
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Create Record</h2>
                </div>
                <p>Please fill this form and submit to add employee record to the database.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : '';?>">
                        <label>ID</label>
                        <input type="text" name="id" class="form-control" value="">
                        <span class="help-block"><?php echo $id_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="">
                        <span class="help-block"><?php echo $name_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($telephone_err)) ? 'has-error' : '';?>">
                        <label>Telephone</label>
                        <input type="text" name="telephone" class="form-control" value="">
                        <span class="help-block"><?php echo $telephone_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : '';?>">
                        <label>Address</label>
                        <textarea name="address" class="form-control"></textarea>
                        <span class="help-block"><?php echo $address_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($F_err)) ? 'has-error' : '';?>">
                        <label>F</label>
                        <input type="text" name="F" class="form-control" value="">
                        <span class="help-block"><?php echo $F_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($location_err)) ? 'has-error' : '';?>">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control" value="">
                        <span class="help-block"><?php echo $location_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($star_date_err)) ? 'has-error' : '';?>">
                        <label>Start date</label>
                        <input type="text" name="start_date" class="form-control" value="">
                        <span class="help-block"><?php echo $star_date_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($end_date_err)) ? 'has-error' : '';?>">
                        <label>End date</label>
                        <input type="text" name="end_date" class="form-control" value="">
                        <span class="help-block"><?php echo $end_date_err;?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>


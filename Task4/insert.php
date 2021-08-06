<html>
<head>
    <title>Add Profile</title>
</head>

<body>
<?php
$id = 0;
$name = "";
$telephone = "";
$address = "";
$F = "";
$location ="";
$start_date = "";
$end_date = "";

if (!empty($_POST['id'])) {
    $id = $_POST['id'];
}

if (!empty($_POST['name'])) {
    $name = $_POST['name'];
}

if (!empty($_POST['telephone'])) {
    $telephone = $_POST['telephone'];
}

if (!empty($_POST['address'])) {
    $address = $_POST['address'];
}

if (!empty($_POST['F'])) {
    $F = $_POST['F'];
}

if (!empty($_POST['location'])) {
    $location = $_POST['location'];
}

if (!empty($_POST['start_date'])) {
    $start_date = $_POST['start_date'];
}

if (!empty($_POST['end_date'])) {
    $end_date = $_POST['end_date'];
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Id: <input type="text" name="id"/>
    Name: <input type="text" name="name"/>
    Telephone: <input type="text" name="telephone"/>
    Address: <input type="text" name="address"/>
    </br>
    F: <input style="margin-top: 10px" type="text" name="F"/>
    Location: <input type="text" name="location"/>
    Start Date: <input type="text" name="start_date">
    End Date: <input type="text" name="end_date">
    </br>
    <input style="margin-top: 10px; margin-left: 20px " type="submit" value="Add People"/>
</form>

<?php
$myDB = new mysqli('localhost', 'root', '', 'library');
// make sure the above credentials are correct for your environment
if ($myDB->connect_error){
    die('Connect Error (' . $myDB->connect_errno . ') '
        . $myDB->connect_error);
}

if ($name != '' && $telephone != ''){
    $insert = "INSERT INTO people (id, name, telephone, address, F, location, start_date, end_date) VALUES
         ('id', 'name', 'telephone', 'address', 'F', 'location', 'start_date', 'end_date')";
    echo $insert;
    $myDB->query($insert);
    echo "New record created successfully";
}

if ($id != ''){
    $sql = "SELECT * FROM people";
} else {
    $sql = "SELECT * FROM people";

}
$result = $myDB->query($sql);

?>

<table cellSpacing="2" cellPadding="6" align="center" border="1">
    <tr>
        <td colspan="8">
            <h3 align="center">Danh sách theo dõi người cách ly</h3>
        </td>
    </tr>
    <tr>
        <td align="center">Id</td>
        <td align="center">Name</td>
        <td align="center">Telephone</td>
        <td align="center">Address</td>
        <td align="center">F</td>
        <td align="center">Location</td>
        <td align="center">Start Date</td>
        <td align="center">End Date</td>
    </tr>
    <?php
    while ($row = $result->fetch_assoc() ){
        echo "<tr>";
        echo "<td>";
        echo stripslashes($row["id"]);
        echo "</td><td align='center'>";
        echo $row["name"];
        echo "</td><td align='center'>";
        echo $row["telephone"];
        echo "</td><td align='center'>";
        echo $row["address"];
        echo "</td><td align='center'>";
        echo $row["F"];
        echo "</td><td align='center'>";
        echo $row["location"];
        echo "</td><td align='center'>";
        echo $row["start_date"];
        echo "</td><td align='center'>";
        echo $row["end_date"];
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>


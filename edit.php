<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>

<?php
include "connect.php";

    if(isset($_POST["update"])){
    
    $id = $_POST["id"];
    
    $up = ("SELECT * FROM announce WHERE id ='$id'");
    $result = mysqli_query($con,$up);

    if($result){
        echo "Please Update";
        while($row=mysqli_fetch_array($result))
        {
            ?>
            
            <form action="updatefile.php" method="post">
            <input type="hidden" name="id" placeholder="id" value="<?php echo $row["id"]?>">
            
            <input type = "text" name="title" id="title" required value="<?php echo $row["title"];?>">
            <input type = "number" name="description" id="description" required value="<?php echo $row["description"];?>">
            <input type="date" name = "start" id="start" required value="<?php echo $row["start"];?>">
            <input type="date" name ="end" id="end" required value="<?php echo $row["end"];?>">
            <input type = "date" name="date" id="date" required value="<?php echo $row["date"];?>"><br>
            <button type="submit" name="updated">Update</button>
            </form>

            <form action="index.php" method="post">
            <button >Cancel</button>
            </form>

            <?php 
        }}
    
    else {
        echo "Check Update Part";  }
    }

?>

</body>
</html>
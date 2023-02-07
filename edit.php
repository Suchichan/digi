<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="edit.css">
    <!-- Bootstrap CSS cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


</head>
<body>
    <!-- Bootstrap js cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <section id ="nav">
        <h1>Digiboxx Hub<br>Welcome to the Announcement Edit Portal</h1>
        <a href="index.php" class="back"><button>Go Home</a>
    </section>

<?php
include "connect.php";

    if(isset($_POST["update"])){
    
    $id = $_POST["id"];
    
    $up = ("SELECT * FROM announce WHERE id ='$id'");

    $result = mysqli_query($con,$up);

    if($result){
        while($row=mysqli_fetch_array($result))
        {
            ?>
    <section class="edit" class="form-floating">

    <form action="" method="post" >
        <div class="form">
            
            <input type="hidden" name="id" placeholder="id" value="<?php echo $row["id"]?>">

            <div class="title">
                <label for="ControlInput1" >Title</label>
                <input type = "text"  name="title" class="form-control" id="ControlInput1" required value="<?php echo $row["title"];?>">
            </div>

            <div class="description">
                <label for="ControlInput2">Description</label>
                <textarea type="text" name="text" id="ControlInput2" class="form-control" rows="8" cols="50" placeholder="<?php echo $row["text"];?>"></textarea>
            </div>

            <div class="date">
                <label for="start">Start Date</label>
                <input type="date" name = "start" id="start" required value="<?php echo $row["start"];?>">
                <label for="start">End Date</label>
                <input type="date" name ="end" id="end" required value="<?php echo $row["end"];?>">
            </div>
        </div>
            
            <input type = "hidden" name="date" id="date" required value="<?php echo $row["date"];?>">

            <div class="button">
            <button type="submit" class="update" name="updated" onclick="return confirm('Are you sure you want to update the data ?')">Update</button>
            <button name="cancel" class="cancel">Cancel</button>
            </div>
        </form>
    
    </section>

            <?php 
        }}
    
    else {
        echo "Check Update Part";  }
    }

?>

</body>
</html>
<?php
include "connect.php";

if (isset($_POST['cancel'])){
    echo"no data updated";
    header("location:index.php");
}
if(isset($_POST['updated'])){
                $title = $_POST['title'];
                $text = $_POST['text'];
                $start = $_POST['start'];
                $end = $_POST['end'];

                $date = $_POST['date'];

                $id = $_POST['id'];

                if($start==$end){
                    echo "Please Go Back provide the date correctly";
                }
                else{
                $query = "UPDATE announce SET title = '$title' , text = '$text', start ='$start', end = '$end', date =current_timestamp() WHERE id ='$id' ";
                
                $re = mysqli_query($con,$query);

                if($re){
                    echo "The data is updated";
                    header ("location:index.php");
                }
                else {
                    echo "Nope, Its Not Updated!!".mysqli_error($con);  
                }}}
?>
<!doctype html>
<html lang="en">
  
  <head>
  <title>Announcement</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=30">
    
    <!-- external CSS-->
    <link rel='stylesheet' href="style.css">
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

    
  </head>
  <body>


<section id ="nav">
    <h2>Digiboxx Hub<br>Welcome to the Announcement Portal</h2>
    </nav>
</section>

<section id="input">

  <div class ="announcement">
        <h3>Please Enter the announcement details</h3>
        


  <form method="post">
  <div class="form">

    <div class ="title">
      <label for="ControlInput1" >Title</label>
      <input type="text" name="title" class="form-control" id="ControlInput1" placeholder="Title of Announcement" required>
    </div>

    <div class="description">
      <label for="ControlTextarea1">Description</label>
      <textarea type="text" name="text" id="ControlTextarea1" rows="8" cols="50" placeholder="Description of the Announcement" required></textarea>
    </div>

    <div class = "date">
    
      <label for="DatelInput1">Start Date</label>
      <input type="date" name="start" class="form-control" id="DateInput1" required>
      <br>
      <label for="DatelInput1">End Date</label>
      <input type="date" name="end" id="DateInput2" required>
    </div>


    <div class="status">
      <legend >Status</legend>
        <select name="status" required>
          <option>Publish
          <option>Enterred
          </select>
    </div>
  </div>

  <h5>
        <input class="announce" name ="submit" type="submit" value="Announce">
        <input class = "reset" name ="reset" type="reset" value="Reset">     
  </h5>  
  </form>
</section>

<div class="dataview">

<table class="table">
    <thead>
        <tr>
            <td>Edit</td>
            <td>ID Number</td>
            <td>Announcement Title</td>
            <td>Announcement Details</td>
            <td>Start</td>
            <td>End</td>
            <td>Status</td>
            <td>Date of the Announcement</td>
        </tr>
    </thead>


        <?php
      #connection check
  include "connect.php";
  $sql = "SELECT * FROM announce";
  $result = mysqli_query($con,$sql) or die("Query Failed");
  $row= mysqli_fetch_assoc($result);
      while($row=$result->fetch_assoc())
        {
    ?>
    <tbody>
        <tr>
          <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <td><input class="announce" name ="update" type="submit" value="Edit">
        </form>

            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo $row['text'];?></td>
            <td><?php echo $row['start'];?></td>
            <td><?php echo $row['end'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><?php echo $row['date'];?></td>
        </tr>
    </tbody>   

        <?php
        }
        ?>    
    </table>   

    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
        $('.table').DataTable();
    } );</script>

</div>
</body>
</html>

<?php
    include "connect.php";

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $text = $_POST['text'];
        $start = $_POST['start'];
        $end= $_POST['end'];
        $status = $_POST['status'];
        

        if($start==$end){
          
          echo "please enter the dates correctly";
        }
        else{
        $sql = "INSERT INTO `hub`.`announce` (`title`, `text`,`start`,`end`,`status`, `date`) VALUES ('$title','$text','$start','$end','$status',current_timestamp())";

        

        if($con->query($sql)==true){
          header ("location:index.php");
          echo "Announcement is done. Check the admin";

        }
        else{
            echo "ERROR: $sql <br>";
        }
      }
        
      }
?>







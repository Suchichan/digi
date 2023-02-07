<!doctype html>
<html lang="en">
  
  <head>
  <title>Announcement</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=30">
    
    <!-- external CSS-->
    <link rel='stylesheet' href="style.css">
    <!-- Bootstrap CSS cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!-- datatables css cdn -->
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
        


  <form method="post" class="form-floating">
  <div class="form">

    <div class ="title">
      <label for="ControlInput1" >Title</label>
      <input type="text" name="title" class="form-control" id="ControlInput1" placeholder="Announcement Title"  required>
    </div>

    <div class="description">
      <label for="ControlInput2">Description</label>
      <textarea type="text" name="text" id="ControlInput2" class="form-control" rows="8" cols="50" placeholder="Description of the Announcement" required></textarea>
    </div>

    <div class = "date">  
      <label for="start">Start Date</label>
      <input type="date" name="start" id="start" required>
      <label for="end">End Date</label>
      <input type="date" name="end" id="end" required>
    </div>


    <div class="form-floating">

        <select name="status" class="form-select" id="floatingSelect" aria-label="Status" required>
          <option>
          <option value="1">Publish
          <option value="2">Enterred
          </select>
          <label for="floatingSelect">Status</label>
    </div>
</div>
  </div>

  
  <h5>
        <input class="announce" name ="submit" type="submit" value="Announce">
        <input class = "reset" name ="reset" type="reset" value="Reset">     
  </h5>  
  </form>
</section>

<div class="dataview">
  <h3>Announcement View Table</h3>

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
            <td>Delete</td>
          </tr>
        </thead>
        
        <tbody>

        <?php
      #connection check
      include "connect.php";
      $sql = "SELECT * FROM announce";
      $result = mysqli_query($con,$sql) or die("Query Failed");
      $row= mysqli_fetch_assoc($result);
      while($row=$result->fetch_assoc())
        {
      ?>
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

          <form action ="delete.php" method = "post">
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <td><button class="announce" type="submit" value ="Delete" name="delete" onclick="return confirm('<?php echo'You want to delete announcement'.'\n'.' Id Number : '.$row['id'].'\n'.' Announcement Title : '.$row['title']?>')">Delete</button>

          </form>        
        </tr>
        
        <?php
        }
        ?>    
</tbody>   
  </table>
</div>
<!-- Bootstrap js cdn -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
    <!-- datatables js cdn -->
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <!-- datatables js function -->
    <script>
        $(document).ready( function () {
        $('.table').DataTable();
        $('#example').dataTable({"sPaginationType": "full_numbers"});
        $('#example').DataTable();
    } );</script>
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







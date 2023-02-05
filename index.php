<!doctype html>
<html lang="en">
  
  <head>
  <title>Announcement</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=30">
    
    <!-- external CSS-->
    <link rel='stylesheet' href="style.css">
    
  </head>
  <body>


<section id ="nav">
    <h2>Digiboxx Hub<br>Welcome to the Announcement Portal</h2>
    </nav>

<section id="input">

  <div class ="announcement">
        <h3>Please Enter the announcement details</h3>
        
        
  <form method="post" action="index.php">

  <div class="form">

    <div class ="title">
      <label for="ControlInput1" >Title</label>
    <div class="col-sm-8">
        <input type="text" name="title" class="form-control" id="ControlInput1" placeholder="Title of Announcement">
    </div></div>

    <div class="description">
  
      <label for="ControlTextarea1" class="col-sm-5 col-form-label">Desciption</label>
    <div class="col-sm-8">
      <textarea type="text" name="text" class="form-control" id="ControlTextarea1" rows="5" placeholder="Description of the Announcement"></textarea>
    </div></div>

    <div class = "date">
    <div class="row mb-3 w-50 p-1">
      <label for="DatelInput1" class="col-sm-2 col-form-label">Start Date</label>
    <div class="col-sm-8">
      <input type="date" name="start" class="form-control" id="DateInput1">
    </div></div>
    <br>
    <div class="row mb-3 w-50 p-1">
      <label for="DatelInput1" class="col-sm-2 col-form-label">End Date</label>
    <div class="col-sm-8">
       <input type="date" name="end" class="form-control" id="DateInput2">
    </div></div>
    </div>


    <div class="status">
      <legend class="col-form-label col-sm-5" name="status">Status</legend>
    <div class="col-sm-8">
      
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="status">Publish
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="status">Enterred
      </div>
    </div>
    </div>
  </div>
  <h5>
        <input class="announce" name ="submit" type="submit" value="Announce">
        <input class = "reset" name ="reset" type="reset" value="Reset">     
  </h5>  
  </form>
</section>
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
    
            echo "Successfully inserted the bill.<br>Please wait for the payment";

        }
        else{
            echo "ERROR: $sql <br>";
        }
      }
        
      }
?>
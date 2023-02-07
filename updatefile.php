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
                $status = $_POST['status'];
                $date = $_POST['date'];

                $id = $_POST['id'];

                
                $query = "UPDATE announce SET title = '$title' , text = '$text', start ='$start', end = '$end', status = '$status', date =current_timestamp() WHERE id ='$id' ";
                
                $re = mysqli_query($con,$query);

                if($re){
                    echo "The data is updated";
                    header ("location:index.php");
                }
                else {
                    echo "Nope, Its Not Updated!!".mysqli_error($con);  
                }}
?>
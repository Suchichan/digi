<?php
    include "connect.php";
    
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $name = $_POST['title'];

        $del = ("DELETE FROM announce WHERE id ='$id' or title ='$title' ");
        
        $result = mysqli_query($con,$del);

        if($result){
            echo "Deleted";
            header ("location:index.php");
        }
        else {
            echo "Not deleted";
        }
}

?>

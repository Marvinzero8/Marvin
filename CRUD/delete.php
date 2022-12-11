<?php
    include 'myconn.php';
 
   $new_id = $_GET['id'];
    
   $sql = "DELETE FROM `user` WHERE `ID`='$new_id'";

        if($link->query($sql)===true){
            echo "<script> window.alert('Data Deleted Successfully'); window.location.href='index.php'</script>";
        }else{
            echo "<script> window.alert('Updated Failed');</script>";
        }
?>  
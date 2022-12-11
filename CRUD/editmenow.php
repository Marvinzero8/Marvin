<?php
    include 'myconn.php';
    $the_data = $_GET['cd'];

    $get_info=$link->query("SELECT * FROM `user` WHERE `ID` = '$the_data'");
    $info_row = $get_info->fetch_array();

    $new_id=$info_row['ID'];

    if (isset($_POST['editmenow'])){
        $name = $_POST['Username'];
        $passw = $_POST['Pass'];
        $course = $_POST['Course'];

        $update_query=$link->query("UPDATE `user` SET `Username`='$name',`Password`='$passw',`Course`='$course' WHERE `ID`='$new_id'");

        if($update_query){
            echo "<script> window.alert('Data Updated!'); window.location.href='index.php'</script>";
        }else{
            echo "<script> window.alert('Updated Failed'); window.location.href='editme.php?cd=$new_id'</script>";
        }

    }
?>  
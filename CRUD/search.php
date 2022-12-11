<?php
    include 'myconn.php';
    $txt_searchauto = $_GET['cd'];
    if ($txt_searchauto != ""){
        $ret2=$link->query("SELECT * FROM `user` WHERE CONCAT(`ID`, `Username`, `Password`, `Course`) LIKE '%$txt_searchauto%'");
    }else{
        $ret2=$link->query("SELECT * FROM `user` WHERE CONCAT(`ID`, `Username`, `Password`, `Course`) LIKE '%$txt_searchauto%' LIMIT 0");
    }

        while($fetch_d = $ret2 -> fetch_array()){
?>
    <tr>
        <td><?php echo $fetch_d['ID']; ?></td>
        <td><?php echo $fetch_d['Username']; ?></td>
        <td><?php echo $fetch_d['Password']; ?></td>
        <td><?php echo $fetch_d['Course']; ?></td>

        <td><a href="editme.php?id=<?php echo $fetch_d['ID'];?>"><button type="button" title="click to edit" class="btn btn-outline-success">Edit</button></a></td>
        <td><a href="delete.php?id=<?php echo $fetch_d['ID'];?>"><button type="button" title="click to delete" class="btn btn-outline-danger" 
        onclick ="return confirm('Do you want to delete the data <?php echo $fetch_d['Username'];?>')" name="del">Delete</button></a></td>
    </tr>
<?php
}?>

<!---------------------- CSS ---------------------->
<style>
        body{
            padding-bottom:10%;
            padding-top:0;
        }
        .form-control{
            width:30%;
        }
        .btn{
            padding:5px 20px 5px 20px;
        }
        .insertlabel{
            padding-top:5%;
          
        }
    </style>
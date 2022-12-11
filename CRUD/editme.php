<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<?php

    include 'myconn.php';
    $get_data = $_GET['id'];

    $get_info=$link->query("SELECT * FROM `user` WHERE `ID`='$get_data'");
    $info_row = $get_info->fetch_array();

    $new_id = $info_row['ID'];
?>

<form method = "POST" enctype="multipart/form-data" action="editmenow.php?cd=<?php echo $new_id?>">
    <h2>Edit Info</h2>
    <input type="text" name="Username" value="<?php echo $info_row["Username"];?>" class="form-control" required> <br>
    <input type="text" name="Pass" value="<?php echo ($info_row["Password"]);?>" class="form-control" required> <br>
    <select name="Course" class="form-control">
                <option value = "" disabled selected hidden><?php echo $info_row["Course"];?></option>
                <option value = "BA English Language" >BA English Language</option>
                <option value = "BA Political Science" >BA Political Science</option>
                <option value = "BSBA Marketing Management" >BSBA Marketing Management</option>
                <option value = "BSBA Financial Management" >BSBA Financial Management</option>
                <option value = "BSBA Human Resource Management" >BSBA Human Resource Management</option>
                <option value = "BSE English" >BSE English</option>
                <option value = "BSE Filipino" >BSE Filipino</option>
                <option value = "BSE Mathematics" >BSE Mathematics</option>
                <option value = "BSE Biological Science" >BSE Biological Science</option>
                <option value = "BEE Generalist" >BEE Generalist</option>
                <option value = "BS Information Technology" >BS Information Technology</option>
                <option value = "BS Criminology" >BS Criminology</option>
                <option value = "BS Accounting Technology" >BS Accounting Technology</option>
                <option value = "BS Psychology" >BS Psychology</option>
                <option value = "BS Accountancy" >BS Accountancy</option>
                <option value = "BS Tourism Management" >BS Tourism Management</option>
                <option value = "BS Computer Engineering" >BS Computer Engineering</option>
                <option value = "BPE School P.E." >BPE School P.E.</option>
                <option value = "BTTE Food and Service Management" >BTTE Food and Service Management</option>
            </select>
            <br>
    <button type="submit" name="editmenow" class="btn btn-primary">Update</button>

</form>

<!---------------------- CSS ---------------------->
<style>
    body{
        padding-left:40%;
    }
    h2{
        padding-left:50px;
        padding-top:10%;
    }
    .form-control{
        width:30%;
    }
</style>
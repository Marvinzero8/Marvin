<?php 
    include('myconn.php'); 
    $uname ="";
    $pass = "";
    $cour = "";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        
        body{
            padding-bottom:10%;
            padding-top:0;
            text-align:center;
        }
        .form-control{
            margin-left:35%;
            text-align:center;
            width:30%;
        }
        .btn{
            padding:5px 20px 5px 20px;
        }
        .insertlabel{
            padding-top:5%;
          
        }
    </style>

    <link rel="icon" href="src/icons8-binder-96.png" />
</head> 
<body>

<!-------------------------------------- Create --------------------------->
<div class="insertdata container" id="Insert">
    <h1 class ="insertlabel">Add New Data</h1>
        <form method = "POST" class="mb3">
            <label for="txt_username" class="form-label">Username</label><br>
            <input type="text" name="txt_username" placeholder = "Enter Username" class="form-control">
            <br>

            <label for="txt_pass" class="form-label">Password</label><br>
            <input type="password" name="txt_pass" placeholder = "Enter Password" class="form-control">
            <br>

            <label for="txt_course" class="form-label">Course</label> <br>
            <select name="txt_course" class="form-control">
                <option value = "" disabled selected hidden>Select Course</option>
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
            <input type="submit" value="Save" name="btn_save" class="btn btn-outline-success">
            <input type="button" value="Clear" name="clear" class="btn btn-outline-danger" onclick="window.location.href=window.location.href">  
        <?php
            if (isset($_POST['btn_save'])){
                $uname =$_POST['txt_username'];
                $pass = ($_POST['txt_pass']);
                $cour = $_POST['txt_course'];

                $sql=$link->query("INSERT INTO `user`(`Username`, `Password`, `Course`) VALUES ('$uname','$pass','$cour')");

                if($sql){
                    echo "<script>
                    window.alert('Data Sucessfuly Saved');
                    </script>";
                }
            }


        ?>

        </form>

</div>
<!--  -------------------------------------Create------------------------------------- -->
<hr>
<!--  -------------------------------------Retrieve------------------------------------- -->
<div class="retrieve container" id="ret">
    <h1 class ="insertlabel">Retrieve Data</h1>

    <form method="POST">
        <label for="txt_search" class="form-label">Search Information</label><br>
        <input type="text" name="txt_search" placeholder = "Search Username" class="form-control">
        <br>

        <input type="submit" value="Search" name="btn_search" class="btn btn-primary">
        <input type="button" value="Clear" name="clear" class="btn btn-outline-danger" onclick= "window.location.href=window.location.href">
    </form>

    <?php
        if(isset($_POST['btn_search'])){
            $s_uname = $_POST['txt_search'];

            $sql=$link->query("SELECT * FROM `user` WHERE `Username` = '$s_uname'");
            $row=$sql->fetch_array();

        

        }
    ?>

    <h2>Search Result:</h2>
    <h3><span class="text-primary"> ID:</span>  <?php echo @$row['ID']?></h3>
    <h3><span class="text-primary"> Username:</span>  <?php echo @$row['Username']?></h3>
    <h3><span class="text-primary"> Password:</span>  <?php echo @$row['Password']?></h3>
    <h3><span class="text-primary"> Course:</span>  <?php echo @$row['Course']?></h3>

</div>
<!--  -------------------------------------Retrieve------------------------------------- -->
<hr>
<!--  -------------------------------------Table 1------------------------------------- -->
<div class="retreivetabale container" id="tab1">
    <h1 class ="insertlabel">Retrieve with Table</h1>

    <form method="POST">
        <label for="txt_searcht" class="form-label">Search Information</label><br>
        <input type="text" name="txt_searcht" placeholder = "Input Keywords" class="form-control">
        <br>

        <input type="submit" value="Search" name="btn_searcht" class="btn btn-primary">
        <input type="button" value="Clear" name="clear" class="btn btn-outline-danger" onclick= "window.location.href=window.location.href">
    </form>

    <h2>Search Result</h2>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Course</th>

        </tr>
    
    <?php
        if(isset($_POST['btn_searcht'])){
            $s_unamet = $_POST['txt_searcht'];

            $return=$link->query("SELECT * FROM `user` WHERE CONCAT(`ID`, `Username`, `Password`, `Course`) LIKE '%$s_unamet%'");


            while ($fetch_ds=$return->fetch_array()){
    ?>


        <tr>
            <td><?php echo $fetch_ds['ID'];?></td>
            <td><?php echo $fetch_ds['Username'];?></td>
            <td><?php echo $fetch_ds['Password'];?></td>
            <td><?php echo $fetch_ds['Course'];?></td>
        </tr>

    <?php
          }

        }
    ?>
    </table>
</div>
<br>
<!--  -------------------------------------Table 1------------------------------------- -->
<hr>

<!--  -------------------------------------Table 2------------------------------------- -->
<div class="autoserch container" id="tab2">
    <h1 class ="insertlabel">Auto Search with Edit and Delete</h1>
    <form method="POST">
        <label for="txt_searchauto" class="form-label">Search Information</label><br>
        <input type="text" id="txt_searchauto" name="txt_searchauto"  onkeyup="load_res()" placeholder = "Input Keywords" class="form-control">
      
    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Course</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody id="load_data" style = "visibility:hidden;">
        </tbody>
    </table>
        
</div>

</body>

<script type="text/javascript">
    function load_res(){
        loader = new XMLHttpRequest();
        loader.open("GET", "search.php?cd="+document.getElementById('txt_searchauto').value, false);
        loader.send(null);

        document.getElementById("load_data").innerHTML = loader.responseText;
        document.getElementById("load_data").style.visibility = "visible";
    }
</script>
<!--  -------------------------------------Table 2--------------------------------------->
</html>
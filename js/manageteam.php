<?php 
require_once("../../../../connect.php");
//include("inc/global_functions.php");

$sql = "select * from team_members order by id desc limit 100";
if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) > 0)){
   
echo "<h3>Delete News Here:</h3><hr>
    <table class='table table-responsive table-bordered'>
    <tr style='background-color:black; color:white; font-weight:bold'>
    <td>S/N</td>
     <td>NAME</td>
     <td>ROLE</td>
     <td>ACTION</td>

    </tr>
";

$count = 0;
    while ($row = mysqli_fetch_array($query)) {$count++;
        # code...
        $id = $row['id'];
       // $hid = $row['hid'];
        $role = $row['role'];
        $fname = $row['fname'];
        echo "
         <tr >
    <td width='20'>$count</td>
     <td width='150'>$fname</td>
     <td>$role</td>
     <td><span style='cursor:pointer; color:red' onclick=\"delt('$id')\"><span class='glyphicon glyphicon-remove-circle'> Delete</span></td>

    </tr>

        ";
        

    }
}else{
    echo '

                    <div class="alert alert-warning ">
                        Sorry, no team has been added yet!  
                    </div> 
    ';//echo $sql;
}


?>


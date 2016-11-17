<?php 
require_once("../../../../connect.php");
//include("inc/global_functions.php");

$sql = "select * from newsandevents order by id desc limit 100";
if(($query = mysqli_query($con, $sql)) && (mysqli_num_rows($query) > 0)){
   
echo "<h3>Delete News Here:</h3><hr>
    <table class='table table-responsive table-bordered'>
    <tr style='background-color:black; color:white; font-weight:bold'>
    <td>S/N</td>
     <td>DATE</td>
     <td>TITLE</td>
     <td>ACTION</td>

    </tr>
";

$count = 0;
    while ($row = mysqli_fetch_array($query)) {$count++;
        # code...
        $title = $row['title'];
        $hid = $row['hid'];
        $photo = $row['passport'];
        $date = $row['date'];
        $month = $row['month'];
         $year = $row['year'];
         if($photo == ''){
            $photo = "w.jpg";
         }
         $caption = $row['caption'];
         echo "
         <tr >
    <td width='20'>$count</td>
     <td width='150'>$date - $month - $year</td>
     <td>$title</td>
     <td><span style='cursor:pointer; color:red' onclick=\"deln('$hid')\"><span class='glyphicon glyphicon-remove-circle'> Delete</span></td>

    </tr>

        ";
        

    }
}else{
    echo '

                    <div class="alert alert-warning ">
                        Sorry, no news has been added yet!  
                    </div> 
    ';//echo $sql;
}


?>


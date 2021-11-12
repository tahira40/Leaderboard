<html>
    <head>
        <title> Insert Record</title>
        <style>
             .container{
                height: 200px;
                width: 100%;
                display: inline-block; 
                text-align: center;
                margin: auto;

            }
            a {
                text-decoration: none;
                display: inline-block;
                padding: 10px 20px;
               
            }
            a:hover{
                background-color: #ddd;
                color: black;
            }
            .previous{
                background-color: #f1f1f1;
                color: black;
            }
            .next{
                background-color: #04AA6D;
                color: white;
            }
        </style>

    </head>
    <body bgcolor="#E0FFFF">
        <div class = "container">

<?php


$sql_playinfo = "INSERT INTO playinfo (pname,pnum,tname,pos,height,opponname,gid,ename, division, facility, event_city_state, gdate, tip_off_time, per) 
values('$pname', $pnum, '$tname', $pos, $height, '$oponname', '$gameid', '$ename', $division,'$facility', '$e_c_state', '$date', '$time', $per)";

 
if (mysqli_query($conn,$sql_playinfo))
    {
        ?>
            <h3> <?php echo "New record has been added successfully!" ?> </h3>
        <?php  
    }
    else{
        echo "Error: " .$sql_playinfo .":-" .mysql_error($conn);
    }
    
    

?>

<br><br><br><br><br><br><br><br>
<a href="index.php" class="previous"> &laquo; Previous  </a> 
<a href="show_record.php" class="next"> View Records &raquo; </a>

<?php

    mysql_close($conn);



?>


</div>
</body>
</html>

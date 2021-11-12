<?php



$pname = $tname = $oponname = $gameid = $ename = $facility = $e_c_state = "";
$pnum  = $pos = $height = $division =$per = 0;
include "connect.php";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['btnsubmit']))
{
    $pname = test_input($_POST['pname']);
    $pnum = test_input($_POST['pnum']);
    $tname = test_input($_POST['tname']);
    $pos = test_input($_POST['pos']);
    $height = test_input($_POST['height']);
    $oponname = test_input($_POST['opponname']);
    $gameid = test_input($_POST['gid']);
    $ename = test_input($_POST['ename']);
    $division = test_input($_POST['division']);
    $facility = test_input($_POST['facility']);
    $e_c_state = test_input($_POST['event_city_state']);

    $date = date('Y-m-d', strtotime($_POST['gdate']));
    $time = $_POST['tip_off_time'];
    $per = test_input($_POST['per']);


    

    if($pname == "") {
        $errorMsg =  "error : Please enter player name.";
        $code = "1" ;
    }
    
    elseif (!preg_match("/^[a-zA-Z]+(?:(?:\. |[' ])[a-zA-Z]+)*$/", $pname)) {
        $errorMsg =  "error : Please enter valid player name."; 
        $code = "1" ;
    }
    elseif ( strlen ( $pname ) < 3 || strlen ( $pname ) > 30 ){
        $errorMsg =  "error : Player name must be between 3 to 30 characters.";  
        $code = "1" ; 
    } 

    elseif ( empty($pnum) ) {
        $errorMsg = "error : Player number can not be empty.";
        $code = "2" ;
    }

    elseif ( $pnum < 0 ) {
        $errorMsg = "error : Please enter valid player number.";
        $code = "2" ;
    }

    elseif ( $tname == "") {
        $errorMsg = "error : Team name can not be empty.";
        $code = "3" ;
    }

    elseif ( !preg_match("/^[a-zA-Z]*$/",$tname)) {
        $errorMsg = "error : Plaese enter valid team name.";
        $code = "3" ;
    }

    elseif ( strlen ( $tname ) <3 || strlen ( $tname ) > 30 ) {
        $errorMsg = "error : Team name must be between 3 to 30 characters.";
        $code = "3" ;
    }

    elseif ( empty($pos) ) {
        echo "position: " .$pos;
        $errorMsg = "error :  Position can not be empty.";
        $code = "4" ;
    }
    
    elseif ( $pos < 0 ) {
        $errorMsg = "error :  Please enter valid position number.";
        $code = "4" ;
    }

    elseif ( empty($height) ) {
        $errorMsg = "error : Height can not be empty.";
        $code = "5" ;
    } 

    elseif ( $height < 120 || $height > 190  ) {
        $errorMsg = "error : Please enter valid height of player.";
        $code = "5" ;
    } 

    elseif ( $oponname == "" ) {
        $errorMsg = "error : Opponent name can not be empty.";
        $code = "6" ;
    }

    elseif ( !preg_match("/^[a-zA-Z]+(?:(?:\. |[' ])[a-zA-Z]+)*$/", $oponname) ) {
        $errorMsg = "error : Please enter valid opponent name.";
        $code = "6" ;
    }

    elseif (strlen ( $oponname ) <3 || strlen ( $oponname ) > 30 ) {
        $errorMsg = "error : Opponent name must be 3 to 30 characters.";
        $code = "6" ;
    }

    elseif ( empty($gameid) ) {
        $errorMsg = "error : Game id can not be empty.";
        $code = "7" ;
    }

    elseif ( !preg_match("/^[a-zA-Z0-9]+$/", $gameid) ) {
        $errorMsg = "error : Please enter valid game id.";
        $code = "7" ;
    }

    elseif ( $ename == "") {
        $errorMsg = "error : Event name can not be empty.";
        $code = "8" ;
    }

    elseif ( !preg_match("/^[a-zA-Z]*$/",$ename)) {
        $errorMsg = "error : Please enter valid event name.";
        $code = "8" ;
    }
    elseif ( strlen ( $ename ) <3 || strlen ( $ename ) > 20 ) {
        $errorMsg = "error : Event name must be between 3 to 20 characters.";
        $code = "8" ;
    }

    elseif ( empty($division) ) { 
        $errorMsg = "error : Division can not be empty.";
        $code = "9" ;
    }

    elseif ( $division < 0 ) { 
        $errorMsg = "error : please enter valid division.";
        $code = "9" ;
    }

    elseif ( $facility == "") {
        $errorMsg = "error : Facility can not be empty.";
        $code = "10" ;
    }

    elseif ( !preg_match("/^[a-zA-Z]*$/",$facility) ) {
        $errorMsg = "error : Please enter valid facility.";
        $code = "10" ;
    }

    elseif ( strlen ( $facility ) < 3 || strlen ( $facility ) > 20 ) {
        $errorMsg = "error : Facility must be between 3 to 20 characters.";
        $code = "10" ;
    }

    elseif ( $e_c_state == " ") {
        $errorMsg = "error : Event city state can not be empty.";
        $code = "11" ;
    }

    elseif ( !preg_match("/^[a-zA-Z]*$/",$e_c_state)) {
        $errorMsg = "error : Please enter valid event city state.";
        $code = "11" ;
    }

    elseif ( strlen ( $e_c_state ) < 3 || strlen ( $e_c_state ) > 30) {
        $errorMsg = "error : Event city state must be between 3 to 30 characters.";
        $code = "11" ;
    }

    elseif ( empty($per)) {
        $errorMsg = "error : PER can not be empty.";
        $code = "12" ;
    }

    elseif ( $per < 0) {
        $errorMsg = "error : Please enter valid PER.";
        $code = "12" ;
    }
    else{
        echo "success";


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
        // Mysql insert statement
        
    }
}    


?>

<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title> This is leaderboard data entry page </title>
        <link rel="shortcut icon" href="#">
        <link rel="stylesheet" href="leaderboard.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js" defer></script>
        <style>
        .errorMsg{border:1px solid red; }
        .message{color: red; font-weight:bold; }
        </style>
    </head>
    
<body bgcolor="#E0FFFF">  
    <h2> Please Enter Game Details</h2>  
    <?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?>
<form name = "playInfo" id = "playInfo" action = ""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"" method = "POST">

    <div class = "formField">
        <label for="pname"> Player Name: </label>
        <input type="text" id="pname" name="pname" placeholder = "First name Last name" value = "<?php if(isset($pname)){echo $pname;} ?>"
        <?php if(isset($code) && $code == 1){echo "class = errorMsg" ;} ?> >
        <small></small>
        
        <br>
    </div>
        
    <div class = "formField">
        <label for="pnum"> Player Number: </label>
        <input type="number" id="pnum" name="pnum" min = "1" value=""
        <?php if(isset($code) && $code == 2){echo "class = errorMsg" ;} ?> >
        <small></small>
        <br>
    </div>

    <div class = "formField">
        <label for="tname"> Team Name: </label>
        <input type="text" id="tname" name="tname" value="" placeholder = "Eg. Knight Riders"
        <?php if(isset($code) && $code == 3){echo "class = errorMsg" ;} ?> >
        <small></small>
        <br>
    </div>

    <div class = "formField">
        <label for="position"> Position: </label>
        <input type="number" id="posn" name="pos"  min = "1" value=""
        <?php if(isset($code) && $code == 4){echo "class = errorMsg" ;} ?> >
        <small></small>
        <br>
    </div>

    <div class = "formField">
        <label for="height"> Height: </label>
        <input type="number" id="height" name="height" value=""
        <?php if(isset($code) && $code == 5){echo "class = errorMsg" ;} ?> >
        <small></small>
        <br>
    </div>

    <div class = "formField">
        <label for="oponname"> Opponent Name: </label>
        <input type="text" id="oponname" name="opponname" value="" placeholder ="First name Last name "
        <?php if(isset($code) && $code == 6){echo "class = errorMsg" ;} ?> >
        <small></small>
        <br>
    </div>
    
    <div class = "formField">
        <label for="gameid"> Game Id: </label>
        <input type="text" id="gid" name="gid" value="" placeholder = "Eg. G5"
        <?php if(isset($code) && $code == 7){echo "class = errorMsg" ;} ?> >
        <small></small>
        <br>
    </div>

    <div class = "formField">
        <label for="ename"> Event Name: </label>
        <input type="text" id="ename" name="ename" value="" placeholder = "Eg. Badminton"
        <?php if(isset($code) && $code == 8){echo "class = errorMsg" ;} ?> >
        <small></small>
        <br>
    </div>

    <div class = "formField">
        <label for="division"> Division: </label>
        <input type="number" id="division" name="division" min = "1" value=""
        <?php if(isset($code) && $code == 9){echo "class = errorMsg" ;} ?> >
        <small></small>
        <br>
    </div>

    <div class = "formField">
        <label for="facility"> Facility: </label>
        <input type="text" id="facility" name="facility" valur="" placeholder = "Eg. Eden Garden"
        <?php if(isset($code) && $code == 10){echo "class = errorMsg" ;} ?> >
        <small></small>
        <br>
    </div>

    <div class = "formField">
        <label for="event-city-state"> Event City State: </label>
        <input type="text" id="e-c-state" name="event_city_state" value="" placeholder = "Eg. West Bengal"
        <?php if(isset($code) && $code == 11){echo "class = errorMsg" ;} ?> >
        <small></small>
        <br>
    </div>

    <div class = "formField">
        <label for="date"> Date: </label>
        <input type="date" id="date" name="gdate" value=""
        <?php if(isset($code) && $code == 12){echo "class = errorMsg" ;} ?> >
        <small></small>
        <br>
    </div>

    <div class = "formField">
        <label for="tip-time"> Tipoff Time: </label>
        <input type="time" id="time" name="tip_off_time" value=""
        <?php if(isset($code) && $code == 13){echo "class = errorMsg" ;} ?> >
        <small></small>
        <br>
    </div>   
    
    <div class = "formField">
        <label for="per"> PER: </label>
        <input type="number" id="per" name="per" min = "1" value=""
        <?php if(isset($code) && $code == 14){echo "class = errorMsg" ;} ?> >
        <small></small>
        <br>
    </div>

  
    
  <!--!  <div class = "formField"> -->
        <input type="submit" name = "btnsubmit" id="sub" value="Next"> <br><br>
  <!--      <small></small>
    </div> -->
</form>

<script src = "validateupdate.js" defer></script>  <!--client side validation-->

</body>
</html>

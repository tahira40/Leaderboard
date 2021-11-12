<?php

if(isset($_POST['btnsubmit'])){
    $pName = $_POST['pname'];
    $pNum = $_POST['pnum'];
    $tName = $_POST['tname'];
    $Pos = $_POST['pos'];
    $Height = $_POST['height'];
    $oponName = $_POST['opponname'];
    $gameId = $_POST['gid'];
    $eName = $_POST['ename'];
    $Division = $_POST['division'];
    $Facility = $_POST['facility'];
    $e_c_State = $_POST['event_city_state'];

    $Date = date('Y-m-d', strtotime($_POST['gdate']));
    $Time = $_POST['tip_off_time'];
    $Per = $_POST['per'];
    if($pName == "") {
        $error_pName=  "<span class = 'error'>Please enter your name.</span>";
    }
}

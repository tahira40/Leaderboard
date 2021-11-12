<html>
<head>
<title> play information</title>
<style>

    .container{
        height: 200px;
        width: 100%;
        display: inline-block; 
        text-align: center;
        margin: auto;

    }
    a{
        text-align: right;
        float: right;
    }
    th{
        margin: 15px;
        background: #FFBF00;
        height: 50px;
        width: 100px;
        color: #FFF5EE;
        font-size: 20px;
        font-family: verdana;
       /* column-gap: 40px;*/

    }
    h2 {
        text-align: center;
    }
    .center{
        margin-left: auto;
        margin-right: auto;
        margin-top: auto;
        padding: 12px 16px;
    }
    td{
        padding: 10px;
    }
    tr:nth-child(even) {
        background-color: #F2D2BD;
    }
    tr:nth-child(odd) {
        background-color: #FFF5EE;
    }

    .btn {
        border: none;
        outline: none;
        color: white;
        padding: 12px 16px;
        font-size: 20px;
        background-color: #FFBF00;
        cursor: pointer;
        
        
    }

    .btn:hover {
        background-color: #DAA520;
    }

    .btn.active {
        background-color: #DAA520;
        color: white;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }

</style>    
</head>
<body>
    <h2> Filters</h2>


<div class = "container">
<div id = "buttonseries" class = "btngroup">
        <button id = "player" class = "btn" onclick = "player.php"> Player</button> 
        <button id = "event" class = "btn" onclick = "event.php"> Event Name </button>
        <button class = "btn" onclick = "filterSelection('division')"> Division </button>
        <button class = "btn" onclick = "filterSelection('gdate')"> Date </button>
        <button class = "btn" onclick = "filterSelection('gameid')"> Games Played </button>
</div>

<script type = "text/javascript">
    document.getElementById("player").onclick = function (){
        location.href = "player.php";
    };

    document.getElementById("event").onclick = function (){
        location.href = "event.php";
    };

</script>



<br>


    <table cellspacing="1" width="90%" class="center">
        <tr>
            <th style="width:20px"> # </style></th>
            <th style="width:120px"> Player </th>
            <th style="width:170px"> Event Name </th>
            <th> Division </th>
            <th> Date </th>
            <th> Games Played </th>
            <th> PER(Average) </th>
        </tr>
    
    <?php
    include "connect.php";
    $records_playinfo = mysqli_query($conn,"select pname, pnum,tname, ename, count(gid) as game, division, facility, event_city_state, min(gdate) as sdate, max(gdate) as edate, avg(per) as aper from playinfo group by pname, pnum,tname, ename, gid, division, facility, event_city_state order by aper desc");

   
    $record_count = 1;
    while($data = mysqli_fetch_array($records_playinfo))
    {
       
        if ( date ('M', strtotime($data['sdate'])) == date ('M', strtotime($data['edate'])) )
        {
            if ( date ('j', strtotime($data['sdate'])) == date ('j', strtotime($data['edate'])) )
            {
                $effect_date = date("Mj, Y", strtotime($data['sdate']));   //have to rectify
            }
            else
            {
                $mon = date('M', strtotime($data['sdate']));
                $fday = date('j', strtotime($data['sdate']));
                $lday = date('j', strtotime($data['edate']));
                $year = date ('Y', strtotime($data['edate']));
                $effect_date = $mon." ".$fday."-".$lday.", ".$year;
            }
        }
        else
        {
            $fmon = date('M', strtotime($data['sdate']));
            $lmon = date('M', strtotime($data['edate']));
            $fday = date('j', strtotime($data['sdate']));
            $lday = date('j', strtotime($data['edate']));
            $year = date ('Y', strtotime($data['edate']));
            $effect_date = $fmon." ".$fday."-".$lmon." ".$lday.", ".$year;
        }
       
        ?>
        <tr>
            <td><?php echo $record_count; ?> </td>
            <td><b><?php echo $data['pname']."- #" .$data['pnum'] ?></b><br><i><?php echo $data['tname']; ?></i> </td>
            <td><?php echo $data['ename']; ?> <br><?php echo $data['facility'].", ".$data['event_city_state']; ?> </td>
            <td><?php echo $data['division']; ?> </td>
            <td><?php echo $effect_date; ?> </td>   
            <td><?php echo $data['game']; ?></td>
            <td><?php echo $data['aper']; ?> </td>
        </tr>
        <?php
    $record_count++;
    }
    ?>
    </table>

 <br><br><br>   

<a href="indexphp" class="home"> &laquo; Home  </a>



    <?  /*php mysqli_close($conn); */ ?>
</div>

</body>
</html>

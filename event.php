<html>
<head>
<title> Player </title>
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
</style>

</head>
<body>
    <div class = "container">
        <div id = "buttonseries" class = "btngroup">
                <button id = "player" class = "btn" onclick = "player.php"> Player</button> 
                <button id = "event" class = "btn" onclick = "event.php"> Event Name </button>
                <button class = "btn" onclick = "filterSelection('division')"> Division </button>
                <button class = "btn" onclick = "filterSelection('gdate')"> Date </button>
                <button class = "btn" onclick = "filterSelection('gameid')"> Games Played </button>
        </div>
    
<br>    

<script type = "text/javascript">
    document.getElementById("player").onclick = function (){
        location.href = "player.php";
    };

    document.getElementById("event").onclick = function (){
        location.href = "event.php";
    };

</script>   

<table cellspacing="1" width="60%" class="center">
    <tr>
        <th style="width:15px"> # </style></th>
        <th style="width:120px"> Event  Name</th>
        <th style="width:80px"> Game Id </th>
        
    </tr>

    <?php
    include "connect.php";
    $records_playinfo = mysqli_query($conn,"select distinct ename, gid from playinfo");

   
    $record_count = 1;
    while($data = mysqli_fetch_array($records_playinfo))
    {
        ?>
    <tr>
            <td><?php echo $record_count; ?> </td>
            <td><b><?php echo $data['ename']; ?></td>
            <td><?php echo $data['gid']; ?></td>
            
        </tr>
     <?php
     $record_count++;   
    }
    ?>
</div>
<Br><br><br>
<a href = "index.php"> Home </a>



</body>
</html>

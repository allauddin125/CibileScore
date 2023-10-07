<?php
session_start();
$conn=mysqli_connect("sql207.epizy.com","epiz_34212671","r4C0F0iDlqt","epiz_34212671_project2");

if(isset($_POST['uname'])){
    $uname=$_POST['uname'];
    $sql = "SELECT * FROM register WHERE userId='".$uname."'";
    $result = mysqli_query($conn, $sql);
    if ($result != false&&mysqli_num_rows($result) == 1) 
    {
        $history=$_POST['history'];
        $exposure=$_POST['exposure'];
        $time=$_POST['time'];
        $type=$_POST['type'];
        $credit = 0;
        switch($history){
            case 'before':
                $credit+=200;
                break;
            case 'after':
                $credit+=80;
                break;
            case 'ontime':
                $credit+=170;
                break;
        }
        switch($exposure){
            case '0-20':
                $credit+=180;
                break;
            case '20-40':
                $credit+=160;
                break;
            case '40-60':
                $credit+=130;
                break;
            case '60-80':
                $credit+=115;
                break;
            case '80-100':
                $credit+=100;
                break;
        }
        switch($type){
            case 'secure':
                $credit+=170;
                break;
            case 'unsecure':
                $credit+=140;
                break;
            case 'hybrid':
                $credit+=200;
                break;
        }
        if($time<20){$credit+=(100+$time);}else{$credit+=$time*7;}
        $credit+=rand(10,95);

        $sql = "update register set creditScore=".$credit." where userId=".$uname.";";
        mysqli_query($conn,$sql);
        $loc = "location:cibilCount.php?uname=".$uname;
        header($loc);
    }else{
        echo "invalid user";
    }
}else{
    echo "page not found";
}
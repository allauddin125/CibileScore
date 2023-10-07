<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <style>
            .formbox{
                display:flex;
                flex-direction:column;
                justify-content:center;
                align-items:center;                
                height:200px;
                padding:50px;
            }
        </style>
    </head>
    <body>
<?php
$connect=mysqli_connect("sql207.epizy.com","epiz_34212671","r4C0F0iDlqt","epiz_34212671_project2");
if(isset($_POST['uname'])){
    $uname=$_POST['uname'];
    $sql = "SELECT * FROM register WHERE userId='".$uname."'";
    $result = mysqli_query($connect, $sql);
    if ($result != false&&mysqli_num_rows($result) == 1) 
    {
        $maxLoan=$_POST['maxLoan'];
        $requiredLoan=$_POST['requiredLoan'];
        $salary=$_POST['salary'];
        $period=$_POST['period'];
        $method=$_POST['method'];
        $emi=(($requiredLoan*$period*12/100)+$requiredLoan);
        $emi = $emi/($period*12);
        if($maxLoan<$requiredLoan){
            $msg="<b style='color:tomato;'>Max loan should not be Greater than Required loan.</b>";
            //algo for 80% of salary calculation
        }else if($emi>($salary*80/100)){
            $msg="<b style='color:tomato;'>Your salary is not sufficient to Approve this loan.</b>";
        }else{
            $cmd="insert into loanDetails values(".$uname.",".$requiredLoan.",".$salary.",".$period.",".$method.",".$emi.");";
            $ins=mysqli_query($connect,$cmd);
            $emi= $emi*$method;
            if ($ins) {
                $msg="<b style='color:green;'>Yey! Your Loan is Approved with EMI = <b style='color:tomato;'>".$emi."</b></b>";
            }
            else
            {
                $msg="Something Went Wrong.";
            }
        }
    }

}

?>
<div class="container">
    <div class="formbox">
        <h2><?php echo $msg; ?></h2>
        <a class="submitBtn" href="loanEmi.php?uname=<?php echo $uname;?>">OK</a>
    </div>
</div>
</body>
</html>
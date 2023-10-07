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

if($connect)
{
    $userid=$_POST['userId'];
    $email=$_POST['email-Id'];
    $pass=$_POST['password'];

}
$cmd="insert into register values(".$userid.",'".$email."','".$pass."',true,0);";
$ins=mysqli_query($connect,$cmd);
if ($ins) {
    //echo "Successfully Registered.";
    $msg="Successfully Registered";
}
else
{
    $msg="You are already registered.";
}

?>
<div class="container">
    <div class="formbox">
        <h2><?php echo $msg; ?></h2>
        <a class="submitBtn" href="index.html">Login</a>
    </div>
</div>
</body>
</html>
<?php
if(isset($_GET['uname'])){
    $uname=$_GET['uname'];
    $conn=mysqli_connect("sql207.epizy.com","epiz_34212671","r4C0F0iDlqt","epiz_34212671_project2");
    $sql = "SELECT * FROM register WHERE userId='".$uname."'";
    $result = mysqli_query($conn, $sql);
    if ($result != false&&mysqli_num_rows($result) == 1) 
    {
?>
<html>
    <head>
    <link rel="stylesheet" href="dashboard.css">
        <link rel="stylesheet" href="style.css">
        <title>Calculate loan EMI and CIBIL count</title>
        <style>
            #mainContent form{
                background-image:url(picture/creditMeter.png);
                background-size:60%;
                width:80%;
                height:600px;
            }
            #maincontent form div{
                background:rgba(255,255,255,.2);
                padding:60px;
            }
            #maincontent form div h1{color:green;}
        </style>
    </head>
    <body>
        <div class="firstDiv">
            <div id="sidenav" class="dashboardContainer">
                <div id="profile">
                    <div id="profileImg"></div>
                    <h1 id="userId"><?php echo $uname;?></h1>
                </div>
                <button name="dashboard" class="navbtn" onclick="getNewPage(this)">Dashboard</button>
                <button class="navbtn" name="loanEmi" onclick="getNewPage(this)">Loan EMI</button>
                <button class="navbtn" name="cibilCount" onclick="getNewPage(this)">CIBIL count</button>
                <button id="activeTab" class="navbtn" name="about" onclick="getNewPage(this)">About</button>
                <button class="navbtn" name="writeUs" onclick="getNewPage(this)">Write To Us</button>
                <button class="navbtn" onclick="window.location.href='index.html'">Log Out</button>
            </div>
            <div id="mainContent" class="dashboardContainer">
                <form method="post"> 
                <div> 
					<h1>About This Platform:</h1>
                    <p>This Platform is for Cibil calculating and loan approval system. If you want to calculate your cibil score you can simply go to the DASHBOARD and fill the Form with varified details. Then you will get your CIBIL Score.</p>
                    <p>You can also request here for loan approval here according to your cibil score.</p>
					<h1>How to calculate CIBIL Score?</h1>
                    <p>Simply after loging in, go to the DASHBOARD. There will be a Cibil calculating form. You have to fill every required detail the after clicking the 'calculate CIBIL Score' you will get your CIBIL Score quickly.</p>
					<h1>How to request For loan?</h1>
                    <p>Simply go to the LOAN EMI. If your credit score is good then you can apply for loan below max loan which will be mensioned according to your cibil score. If your CIBIL score is below 550 then you will not be eligible for any loan.</p>
                </div>
                </form>
            </div>
        </div>
        <script>
            function getNewPage(t){
                let btn=t.name;
                let target=btn+".php?uname="+<?php echo $uname; ?>;
                window.location.href=target;
            }
        </script>
    </body>
</html>
<?php
    }else{
       echo "Invalid Id";
    }
}else{
    $uname="page not found: Please contact to the service provider;";
    echo $uname;
}
?>

 
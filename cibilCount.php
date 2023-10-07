<?php
if(isset($_GET['uname'])){
    $uname=$_GET['uname'];
    $conn=mysqli_connect("sql207.epizy.com","epiz_34212671","r4C0F0iDlqt","epiz_34212671_project2");
    $sql = "SELECT * FROM register WHERE userId='".$uname."'";
    $result = mysqli_query($conn, $sql);
    if ($result != false&&mysqli_num_rows($result) == 1) 
    {
        $row = $result->fetch_assoc();
        $cibilScore=$row['creditScore'];
?>
<html>
    <head>
    <link rel="stylesheet" href="dashboard.css">
        <link rel="stylesheet" href="style.css">
        <title>Calculate loan EMI and CIBIL count</title>
        <style>
            #mainContent #cibilScore{
                height:500px;
                width:600px;
                padding:5%;
                background:rgba(255,255,255,.6);
                border-radius:20px;
                display:flex;
                flex-direction:column;
                gap:10px;
                background-image:url(picture/creditBadge.png);
                background-size:40%;
                background-position:right bottom;
                background-repeat: no-repeat;
            }
            #cibilScore p{
                color:green;
                font-size:100px;
            }
            #cibilScore h1{font-size:150px;}
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
                <button id="activeTab" class="navbtn" name="cibilCount" onclick="getNewPage(this)">CIBIL count</button>
                <button class="navbtn" name="about" onclick="getNewPage(this)">About</button>
                <button class="navbtn" name="writeUs" onclick="getNewPage(this)">Write To Us</button>
                <button class="navbtn" onclick="window.location.href='index.html'">Log Out</button>
            </div>
            <div id="mainContent" class="dashboardContainer">
                <div id="cibilScore">
                    <h2>YOUR</h2>
                    <p>CIBIL Score</p>
					<h1><?php echo $cibilScore;?></h1>
                </div>
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

 
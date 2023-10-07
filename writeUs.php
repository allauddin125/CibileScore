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
                background-image:url(picture/growth.png);
                background-position:center;
                background-size:40%;
                width:500px;
                height:400px;
                gap:30px;
                text-align:center;
            }
            #mainContent form input{
                width:100%;
                font-size:30px;
            }
            #mainContent form h1{color:green;}
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
                <button class="navbtn" name="about" onclick="getNewPage(this)">About</button>
                <button id="activeTab" class="navbtn" name="writeUs" onclick="getNewPage(this)">Write To Us</button>
                <button class="navbtn" onclick="window.location.href='index.html'">Log Out</button>
            </div>
            <div id="mainContent" class="dashboardContainer">
            <form method="post">  
                <h1>Write To Us</h1>
                <input type="text" value="<?php echo $uname;?>" name="uname" required>
                <input type="email" placeholder="Email" required>
                <input type="text" placeholder="Comment" required>
                <button id="submitDashboard">SUBMIT</button>        
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

 
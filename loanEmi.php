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
        $maxloan=$cibilScore*5500;
?>
<html>
    <head>
    <link rel="stylesheet" href="dashboard.css">
        <link rel="stylesheet" href="style.css">
        <title>Calculate loan EMI and CIBIL count</title>
        <style>
            #mainContent form{
                background-image:url(picture/approval.png);
                gap:30px;
                height:500px;
                width:600px;
            }
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
                <button id="activeTab" class="navbtn" name="loanEmi" onclick="getNewPage(this)">Loan EMI</button>
                <button class="navbtn" name="cibilCount" onclick="getNewPage(this)">CIBIL count</button>
                <button class="navbtn" name="about" onclick="getNewPage(this)">About</button>
                <button class="navbtn" name="writeUs" onclick="getNewPage(this)">Write To Us</button>
                <button class="navbtn" onclick="window.location.href='index.html'">Log Out</button>
            </div>
            <div id="mainContent" class="dashboardContainer">  
                <form action="loanApproval.php" method="post">
                    <div>
                        <label for="NAME">Id:</label>
						<input type="text" value="<?php echo $uname;?>" name="uname" required>
                    </div>
                    <div>
                        <label for="NAME">MAX loan: According to Credit Score</label>
                        <input type="text" name="maxLoan" value="<?php echo $maxloan;?>" required>
                    </div>
                    <div>
                        <label for="contact">Required loan:</label>
                        <input type="text" name="requiredLoan" required>
                    </div>
                    <div>
                        <label for="contact">Monthly Income:</label>
                        <input type="text" name="salary" required>
                    </div>
                    <div>
                        <label for="history">Time Period (In Year):</label>
                        <input type="number" name="period" required min='1' max='20'>
                    </div>
                    <div>
                        <label for="history">Rate: <b>12 %</b></label>
                    </div>
                    <div>
                        <label for="history">How do you want to pay:</label>
                        <select name="method" required>
                            <option value="1">Monthly</option>
                            <option value="3">Quarterly</option>
                            <option value="6">Half Yearly</option>
                            <option value="12">Yearly</option>
                        </select>
                    </div>
                    <div>
					<button type="submit" id="submitDashboard">SUBMIT</button>        
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

 
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
    </head>
    <body>
        <div class="firstDiv">
            <div id="sidenav" class="dashboardContainer">
                <div id="profile">
                    <div id="profileImg"></div>
                    <h1 id="userId"><?php echo $uname;?></h1>
                </div>
                <button id="activeTab" name="dashboard" class="navbtn" onclick="getNewPage(this)">Dashboard</button>
                <button class="navbtn" name="loanEmi" onclick="getNewPage(this)">Loan EMI</button>
                <button class="navbtn" name="cibilCount" onclick="getNewPage(this)">CIBIL count</button>
                <button class="navbtn" name="about" onclick="getNewPage(this)">About</button>
                <button class="navbtn" name="writeUs" onclick="getNewPage(this)">Write To Us</button>
                <button class="navbtn" onclick="window.location.href='index.html'">Log Out</button>
            </div>
            <div id="mainContent" class="dashboardContainer">
                <form action="calculateScore.php" method="post">  
					<fieldset>
						<legend>Personal information:</legend>
						<label for="NAME">Id:</label>
						<input type="text" value="<?php echo $uname;?>" name="uname" required>
						<label for="contact">Contact:</label>
						<input type="text" name="contact" id="PHNO">
					</fieldset>		
                    <fieldset>
                    <legend>Payment History:</legend>
                    <label for="history">History</label>
                    <select name="history" id="history" required>
                        <option value="before">Before Month End</option>
                        <option value="after">After Month End</option>
                        <option value="ontime">OnTime</option>
                    </select>
                    </fieldset>		
                    <fieldset>
                    <legend>Credit Exposure:</legend>
                    <label for="exposure">Credit Exposure in %</label>
                    <select name="exposure" id="exposure" required>
                        <option value="0-20">0-20</option>
                        <option value="20-40">20-40</option>
                        <option value="40-60">40-60</option>
                        <option value="60-80">60-80</option>
                        <option value="80-100">80-100</option>
                    </select>
                    </fieldset>	
					<div style="display:flex;">
						<fieldset>
							<legend>Credit Duration:</legend>
							<label for="time">duration</label>
							<input required type="number" name="time" value="1" min="1" max="30">
						</fieldset>		
						<fieldset>
							<legend>Credit Type:</legend>
							<label for="type">Type</label>
							<select required name="type" id="type">
								<option value="secured">Secured</option>
								<option value="unsecured">Unsecured</option>
								<option value="hybrid">Hybrid</option>
							</select>
						</fieldset> 
					</div>
                    <fieldset>
                    <legend>Hard Inquiry:</legend>
                    <h4>It will calculated by <b style="color:red;">CIBIL CRAT</b> after submission</h4>
                    </fieldset>
                    <button type="submit" id="submitDashboard">Calculate CIBIL Score</button>        
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

 
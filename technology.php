<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard | By Code Info</title>
  
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  


  <style>

	/*  import google fonts */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");
*{
  margin: 0;
  padding: 0;
  border: none;
  outline: none;
  text-decoration: none;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  background: #0c4e92;
}
.header{
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 60px;
  padding: 20px;
  background: #fff;
}
.logo{
  display: flex;
  align-items: center;
}
.logo a{
  color: #000;
  font-size: 18px;
  font-weight: 600;
  margin: 2rem 8rem 2rem 2rem;
}
.search_box{
  display: flex;
  align-items: center;
}
.search_box input{
  padding: 9px;
  width: 250px;
  background: rgb(228, 228, 228);
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
}
.search_box i{
  padding: 0.66rem;
  cursor: pointer;
  color: #fff;
  background: #000;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}
.header-icons{
  display: flex;
  align-items: center;
}
.header-icons i{
  margin-right: 2rem;
  cursor: pointer;
}
.header-icons .account{
  width: 130px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.header-icons .account img{
  width: 35px;
  height: 35px;
  cursor: pointer;
  border-radius: 50%;
}
.container{
  margin-top: 10px;
  display: flex;
  justify-content: space-between;
}

/* Side menubar section */
nav{
  background: #fff;
}
.side_navbar{
  padding: 1px;
  display: flex;
  flex-direction: column;
}
.side_navbar span{
  color: gray;
  margin: 1rem 3rem;
  font-size: 12px;
}
.side_navbar a{
  width: 100%;
  padding: 0.8rem 3rem;
  font-weight: 500;
  font-size: 15px;
  color: rgb(100, 100, 100);
}
.links{
  margin-top: 5rem;
  display: flex;
  flex-direction: column;
}
.links a{
  font-size: 13px;
}
.side_navbar a:hover{
  background: rgb(235, 235, 235);
}
.side_navbar .active{
  border-left: 2px solid rgb(100, 100, 100);
}

/* Main Body Section */
.main-body{
  width: 70%;
  padding: 1rem;
}
.promo_card{
  width: 100%;
  color: #0c4e92;
  margin-top: 10px;
  border-radius: 8px;
  padding: 0.5rem 1rem 1rem 3rem;
  background: #939598;
}
.promo_card h1, .promo_card span, button{
  margin: 10px;
}
.promo_card button{
  display: block;
  padding: 6px 12px;
  border-radius: 5px;
  cursor: pointer;
}
.history_lists{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.row{
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 1rem 0;
}
table{
  background: #fff;
  padding: 1rem;
  text-align: left;
  border-radius: 10px;
}
table td, th{
  padding: 0.2rem 0.8rem;
}
table th{
  font-size: 15px;
}
table td{
  font-size: 13px;
  color: rgb(100, 100, 100);
}



/* Sidebar Section */
.sidebar{
  width: 15%;
  padding: 2rem 1rem;
  background: #fff;
}
.sidebar h4{
  margin-bottom: 1.5rem;
}
.sidebar .balance{
  display: flex;
  align-items: center;
  margin-bottom: 1rem;
}
.balance .icon{
  color: #fff;
  font-size: 20px;
  border-radius: 6px;
  margin-right: 1rem;
  padding: 1rem;
  background: rgb(37, 37, 37);
}
.balance .info h5{
  font-size: 16px;
}
.balance .info span{
  font-size: 14px;
  color: rgb(100, 100, 100);
}
.balance .info i{
  margin-right: 2px;
}

	</style>
</head>
<body>
  <header class="header">
    <div class="logo">
      <!--<a href="#">EasyPay</a>-->
      <div class="search_box">
        <input type="text" placeholder="Search ---">
        <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
      </div>
    </div>

    <div class="header-icons">
      <i class="fas fa-bell"></i>
      <div class="account">
        <img src="./pic/img.jpg" alt="">
        <h4>Alice Jeremoki</h4>
      </div>
    </div>
  </header>
  <div class="container">
    <nav>
      <div class="side_navbar">
        <span>Main Menu</span>
        <a href="dashboard.php" class="active">Dashboard</a>
		
        <a href="#">Profile</a>
        <a href="#">History</a>
        <a href="#">Application</a>
        <a href="upload.html">Upload</a>
        <a href="#">Documnets</a>

        <!--<div class="links">
          <span>Quick Link</span>
          <a href="#">Paypal</a>
          <a href="#">EasyPay</a>
          <a href="#">SadaPay</a>
        </div>
-->
      </div>
    </nav>

    <div class="main-body">
      <h2>Dashboard</h2>
      <div class="promo_card">
        <h1>Welcome to Technology and Innovation page</h1>
        <span>Learn more.</span>
        <a href="https://volkselevator.co.ke/"><button>Learn More</button></a>
      </div>

    <!--  <div class="history_lists">
        <div class="list1">
          <div class="row">
            <h4>History</h4>
            <a href="history.php">See all</a>
          </div>
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Dates</th>
                <th>Name</th>
                <th>Type</th>
                <th>Ammount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>2, Aug, 2022</td>
                <td>Sam Tonny</td>
                <td>Premimum</td>
                <td>$2000.00</td>
              </tr>
              <tr>
                <td>2</td>
                <td>29, July, 2022</td>
                
                <td>Code Info</td>
                <td>Silver</td>
                <td>$5,000.00</td>
              </tr>
              <tr>
                <td>3</td>
                <td>15, July, 2022</td>
              
                <td>Jhon David</td>
                <td>Startup</td>
                <td>$3000.00</td>
              </tr>
              <tr>
                <td>4</td>
                <td>5, July, 2022</td>
                <td>Salina Gomiz</td>
                <td>Premimum</td>
                <td>$7000.00</td>
              </tr>
              <tr>
                <td>5</td>
                <td>29, June, 2022</td>
                <td>Gomiz</td>
                <td>Gold</td>
                <td>$4000.00</td>
              </tr>
              <tr>
                <td>6</td>
                <td>28, June, 2022</td>
                <td>Elyana Jhon</td>
                <td>Premimum</td>
                <td>$2000.00</td>
              </tr>
            </tbody>
          </table>
        </div>



        <div class="list2">
          <div class="row">
            <a href="upload.html">Upload</a>
          </div>
		  <h1>Procurement Data</h1> -->

<table>
	<tr>
		<th>ID</th>
		<th>file_name</th>
		<!--<th>file_size</th>
		<th>file_type</th> -->
		<th>upload_data</th>
	</tr>
	<?php
		// Set database connection details
		$host = "localhost";
		$username = "root";
		$password = "";
		$database = "volks";

		// Connect to the database
		$conn = mysqli_connect($host, $username, $password, $database);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Select all procurement data from the database
		$sql = "SELECT * FROM uploads";
		$result = mysqli_query($conn, $sql);

		// Loop through each row of procurement data and output it in the HTML table
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row["id"] . "</td>";
			echo "<td>" . $row["file_name"] . "</td>";
			// echo "<td>" . $row["file_type"] . "</td>";
			// echo "<td>" . $row["file_size"] . "</td>";
			echo "<td>" . $row["upload_date"] . "</td>";
			echo "</tr>";
		}

		// Close database connection
		mysqli_close($conn);
	?>
</table>
        </div>
      </div>
    </div>

    <div class="sidebar">
     <!-- <h4>Account Balance</h4>
      
      <div class="balance">
        <i class="fas fa-dollar icon"></i>
        <div class="info">
          <h5>Dollar</h5>
          <span><i class="fas fa-dollar"></i>25,000.00</span>
        </div>
      </div>

      
      <div class="balance">
        <i class="fa-solid fa-rupee-sign icon"></i>
        <div class="info">
          <h5>PKR</h5>
          <span><i class="fa-solid fa-rupee-sign"></i>300,000.00</span>
        </div>
      </div>

      <div class="balance">
        <i class="fas fa-euro icon"></i>
        <div class="info">
          <h5>Euro</h5>
          <span><i class="fas fa-euro"></i>25,000.00</span>
        </div>
      </div>

      <div class="balance">
        <i class="fa-solid fa-indian-rupee-sign icon"></i>
        <div class="info">
          <h5>INR</h5>
          <span><i class="fa-solid fa-indian-rupee-sign"></i>220,000.00</span>
        </div>
      </div>

      <div class="balance">
        <i class="fa-solid fa-sterling-sign icon"></i>
        <div class="info">
          <h5>Pound</h5>
          <span><i class="fa-solid fa-sterling-sign"></i>30,000.00</span>
        </div>
      </div>

    </div>
-->
  </div>
</body>
</html>
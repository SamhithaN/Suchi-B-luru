
<?php 
        $server = "localhost" ;
        $username = "root";
        $password = "";

        $con = mysqli_connect($server,$username,$password);
        if(!$con)
        {
            die("Connection to Database failed due to".mysqli_connect_error());
        }

        mysqli_select_db($con, "swcs");
        session_start();
        $pincode = $_SESSION['login_user']['Pin_Code'];
        ?>
<!DOCTYPE html>
 <html lang="en">
 <!DOCTYPE html>
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />
      <title>ADMIN DASHBOARD</title>
      <!-- BOOTSTRAP CORE STYLE  -->
      <link href="assets/css/bootstrap.css" rel="stylesheet" />
      <!-- FONT AWESOME STYLE  -->
      <link href="assets/css/font-awesome.css" rel="stylesheet" />
      <!-- DATATABLE STYLE  -->
      <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
      <!-- CUSTOM STYLE  -->
      <link href="assets/css/style.css" rel="stylesheet" />
      <!-- GOOGLE FONT -->
      <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
      <style>


	.align-top{
		border: 0;
		padding-top: 20px;
	}
	.btn_home {
      background-color: #00b38f;
      border: 12px;
      color: black;
      text-align: center;
      font-family: Source Sans Pro;
      margin: 4px 2px;
      padding: 12px 16px;
      font-size: 16px;
      cursor: pointer;
      border-radius: 8px;
      text-decoration: none;
	  font-weight: bold;
	  
	  
    }

	.btn_home:hover {
      background-color:  #00b38f;
	  text-decoration: none;
	  color: white;

    }


</style>

    </head>
 <body>
      <div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="align-top">
              <a class="btn_home" href="admin_dashboard.php">
              ADMIN DASHBOARD
            </a></div>

          </div>

          <div class="right-div">
            <a href="logout.php" class="btn btn-danger pull-right">LOG OUT</a>
          </div>
        </div>
      </div>
      <!-- LOGO HEADER END-->
      <section class="menu-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="navbar-collapse collapse ">
                <ul id="menu-top" class="nav navbar-nav navbar-right">
                  <li><a href="admin_dashboard.php">DASHBOARD</a></li>  
                  <li><a href="pending_requests.php">PENDING REQUESTS</a></li>
                  <li><a href="all_requests.php"  >WASTE PICKUP REQUESTS</a></li>
                  
                  <li><a href="add_new_truck.php" >NEW TRUCK</a></li>
                  <li><a href="sanitation_reg.html" >NEW WORKER</a></li>
                  <li><a href="all_trucks.php" class="menu-top-active">TRUCKS LIST</a></li>
							    <li><a href="all_workers.php" >WORKERS LIST</a></li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </section>
      <!-- MENU SECTION END-->
      <div class="content-wrapper">
       <div class="container">
        <div class="row pad-botm">
          <div class="col-md-12">
            <h4 class="header-line">Trucks serving Pincode : <?php echo $_SESSION['login_user']['Pin_Code'];?>
             </h4>
       </div>

        </div>
        <div class="row">
          <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
              <div class="panel-heading">
               Request History
             </div>
             <div class="panel-body">
              <div class="table-responsive">
       <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>

                    <tr>
          <th>Vehicle Number</th>
          <th>Capacity</th>
          <th>Capacity Remaining</th>
          <th>Driver ID</th>
          <th>Availability</th>
          </tr>
           
            </thead>
            <tbody>

            <?php 
            $sql = "SELECT * FROM `truck` where Pin_Code = $pincode ";
            $data= mysqli_query($con,$sql);
            
            while($result=mysqli_fetch_assoc($data))
            { ?>
			
                    <tr>
                    <td><?php echo $result['Vehicle_No'] ?></td>
                    <td><?php echo $result['Capacity'] ?></td>
                    <td><?php echo $result['Capacity_Left'] ?></td>
                    <td><?php echo $result['Driver_ID'] ?></td>
                    <td><?php echo $result['Availability'] ?></td>      
                     </tr>
                        
          <?php  }
            ?>
</tbody>
                  </table>
                </div>

              </div>
            </div>
            <!--End Advanced Tables -->
          </div>
        </div>

        <!-- /. ROW  -->

      </div>
    </div>

    <!-- CONTENT-WRAPPER SECTION END-->
    <section class="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
           Smart Waste Collection System
         </div>

       </div>
     </div>
   </section>
   <!-- FOOTER SECTION END-->
   <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
   <!-- CORE JQUERY  -->
   <script src="assets/js/jquery-1.10.2.js"></script>
   <!-- BOOTSTRAP SCRIPTS  -->
   <script src="assets/js/bootstrap.js"></script>
   <!-- DATATABLE SCRIPTS  -->
   <script src="assets/js/dataTables/jquery.dataTables.js"></script>
   <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
   <!-- CUSTOM SCRIPTS  -->
   <script src="assets/js/custom.js"></script>
 </body>
 </html>

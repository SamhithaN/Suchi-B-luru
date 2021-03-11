<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin Contact Details</title>
     <style>
      header{
      padding: 1px;
      text-align: center;
      color: #0fc690;
      font-size: 25px;
      font-family: Candara ;
      font-weight : bold;
      font-size: 60px;
     
      display: inline-block;
     
      margin-left: 40px ;
      }
     
      .align-left{
        text-align: left;
        border: 0;
        padding-top: 15px;

      }
      .button {
          background-color: #ffcc00;
          border: none;
          color: white;
          padding: 15px 25px;
          text-align: center;
          text-decoration: none;
          font-size: 18px;
          margin: 4px 2px;
          cursor: pointer;
          border-radius: 8px;
      }
      .button:hover {
    background-color: #fff0b3;
  }

      h1{
          font-family: Source Sans Pro;
          color: #00b38f;   
          font-size: 25px;                
           text-align: center;
      }
        

#contact {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 40%;
  text-align: center;
}

#contact td, #contact th {
  border: 1px solid #ddd;
  padding: 8px;
}

#contact tr:nth-child(even){background-color: #f2f2f2;}

#contact tr:hover {background-color: #ddd; }

#contact th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #00b38f;
  color: white;
}
</style>
</head>
<body>
<div class="align-left">
  <a href="home_page.html" class="button" >HOME</a>
</div>
  <center><header> Admin Contact Details</header>
    
    <div class="container">
      <h1>In case of queries/complaints contact the Area Admin of the respective Pin Code</h1>
  
        <table id="contact">
          <tr>
          <th>Area Name</th>
          <th>Pin Code</th>
          <th>Admin Name</th>
          <th>Admin Email</th>
          <th>Admin Contact No.</th>
          </tr>
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
            $sql = "SELECT * FROM `area_admin`";
            $data= mysqli_query($con,$sql);
            
            while($result=mysqli_fetch_assoc($data))
            {?>
			
           
                    <tr>
                    <td><?php echo $result['Area_Name'] ?></td>
                    <td><?php echo $result['Pin_Code'] ?></td>
                    <td><?php echo $result['Admin_Name'] ?></td>
                    <td><?php echo $result['Admin_email'] ?></td>
                    <td><?php echo $result['Admin_Ph'] ?></td>
                    </tr>
                       
           <?php }
            ?>
          </table>
        </center>
</div>
<br>


        </body>
        </html>
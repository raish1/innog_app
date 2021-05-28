<?php
require"header.php";
$email=$name="";
$email=$_SESSION['email'];
$name=$_SESSION["name"];

?>
  <style>
  #user {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#user tbody, #user thead {
  border: 3px solid black;
  padding: 8px;
}

#user tbody:nth-child(even){background-color: #f2f2f2;}

#user tbody:hover {background-color: #ddd;}

#user thead {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #04AA6D;
  color: white;
  </style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="comment-reply-title">User Name-:  <?php echo $_SESSION['name'];?></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Welcome</a></li>
              <li class="breadcrumb-item active">User profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 col-lg-12">
            
            <!-- /.card -->
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">User Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
            </div>
            <!-- /.card -->
           <!-- ======= Blog Page ======= -->
    <div class="blog-page area-padding">
      <div class="container">
        <div class="row">
        
              <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="comment-respond">
                     <table class="table table-bordered text-center" id="user">
						  <thead class="text-center">
							<tr>
							   <th scope="col">ID</th>
							  <th scope="col">NAME</th>
							  <th scope="col">MOBILE</th>
							  <th scope="col">ADDRESS</th>
							  <th scope="col">EMAIL</th>
							  <th scope="col">PROFILE</th>
							  
							</tr>
						  </thead>
					<tbody>
					<?php 
					        $sql="SELECT id,name,number,address,email,file FROM user Where email='$email'";
							$query = mysqli_query($conn,$sql);
							$result=mysqli_fetch_assoc($query);
							//while($result=mysqli_fetch_array($query)){?>
				    	<tr>
							<td><?php echo $result['id'];?></td>
							<td><?php echo $result['name'];?></td>
							<td><?php echo $result['number'];?></td>
							<td><?php echo $result['address'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><img src="<?php echo $result['file'];?>" height="100px" width="100px"></td>
							
						</tr>
							  	
					</tbody>
					</table>
					 <button class="btn btn-success text-left"><a href="home.php">Back</a></button>
                  </div>
                
                <!-- single-blog end -->
              </div>
            </div>
          </div>
        
           </div>
          </div>
          
          
        </div>
        
      </div>
    </section>
    <!-- /.content -->
  </div>
  
<?php require"footer.php";?>
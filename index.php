<?php
ob_start();
require"header.php";
require"db.php";
$_SESSION['name']='';
$login_faild=$result=$query=$sql=$password=$email="";
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = base64_encode($_POST['password']); 
	$sql="SELECT id,email,name,file FROM user Where email='$email' and password='$password'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_num_rows($query);
	$row = mysqli_fetch_array($query);
	if($result==1){
		$_SESSION['email']=$row['email'];
		$_SESSION['name']=$row['name'];
		$_SESSION['file']=$row['file'];
		
		header("location: home.php");
	}else{
		$login_faild="login error";
	}
}
ob_end_flush();
?>

     
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Login</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">User</a></li>
              <li class="breadcrumb-item active">Login</li>
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
                <h3 class="card-title">Login</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="index.php" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-info">Login</button>
                  <button type="submit" name="" class="btn btn-default float-right"><a href="signup.php">New User</a></button>
                </div>
                <!-- /.card-footer -->
              </form>
			  <span class="text-danger"><?php if($login_faild!=1){ echo $login_faild ;}?></span>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>	 
<?php require"footer.php";?>
<?php
ob_start();
require"header.php";
require"db.php";

$error = $errorName = $errorPassword = $errorConf_password = $errorEmail = $errorNumber = $errorAddress = '';
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$password = base64_encode($_POST['password']);
	$conf_password = base64_encode($_POST['conf_password']);
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$address = $_POST['address'];
	$files = $_FILES['file'];
	$filename=$files['name'];
	$fileerror=$files['error'];
	$filetmp = $files['tmp_name'];
	$fileext = explode(".",$filename);
	$filecheck = strtolower(end($fileext));
	$fileextstore = array('png','jpg','jpeg');
	
	$error = False;
	if($name==''){
		$errorName = "Name is empty.";
		$error = True;
	}
	
	if($password==''){
		$errorPassword = "Password is empty.";
		$error = True;
	}
	if($conf_password==''){
		$errorConf_password = "Conf_password is empty.";
		$error = True;
	}
	if($email==''){
		$errorEmail = "Email is empty.";
		$error = True;
	}
	if($number==''){
		$errorNumber = "Number is empty.";
		$error = True;
	}
	if($address==''){
		$errorAddress = "Address is empty.";
		$error = True;
	}

	
    if(in_array($filecheck,$fileextstore)){
		$destination ='img_folder/'.$filename;
        move_uploaded_file($filetmp,$destination);
	}
	
	if($error!=True){
		$sql="INSERT INTO user(`name`,`password`,`conf_password`,`gender`,`email`,`number`,`address`,`file`)
			  VALUES('$name','$password','$conf_password','$gender','$email','$number','$address','$destination')";
			  if($conn->query($sql)==TRUE){
				  header("location: index.php");
			  }else{
				  echo "error".$sql."</br>".$conn->error;
			  }
			  $conn->close();
	}else{
		echo "data is not found.";
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
            <h1>Sign up</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Welcome</a></li>
              <li class="breadcrumb-item active">Sign up</li>
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
                <h3 class="card-title">Sign UP</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="signup.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
				<div class="form-group row">
                    <label for="inputName3" class="col-sm-2 col-form-label">Name *</label>
                    <div class="col-sm-6">
                      <input type="text" name="name" class="form-control" id="inputName3" placeholder="Enter name" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''; ?>">
					  <span id="username" class="text-denger font-weight-bold"></span> 
                    </div>
					<div class="col-sm-3 text-danger">
                      <span id="" class="text-denger font-weight-bold"><?php echo $errorName;?></span> 
                    </div>
					
                </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password *</label>
                    <div class="col-sm-6">
                      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>">
					  <span id="password" class="text-denger font-weight-bold"></span>
                    </div>
					<div class="col-sm-3 text-danger">
                      <span id="" class="text-denger font-weight-bold"><?php echo $errorPassword;?></span> 
                    </div>
					
                  </div>
				  <div class="form-group row">
                    <label for="inputConPassword3" class="col-sm-2 col-form-label">Conf Password *</label>
                    <div class="col-sm-6">
                      <input type="password" name="conf_password" class="form-control" id="inputConPassword3" placeholder="Confirm Password" value="<?php echo isset($_POST["conf_password"]) ? $_POST["conf_password"] : ''; ?>">
					  <span id="conpass" class="text-denger font-weight-bold"></span> 
                    </div>
					<div class="col-sm-3 text-danger">
					 <span id="" class="text-denger font-weight-bold"><?php echo $errorConf_password;?></span>
					</div>
                  </div>
                    <div class="form-group row">
					<label class="col-sm-2" >Gender *</label>
					 <div class="col-sm-1">
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio1" name="gender" value="male" checked>
                          <label for="customRadio1" class="custom-control-label">&nbsp;&nbsp;Male&nbsp;&nbsp;</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio2" name="gender" value="female">
                          <label for="customRadio2" class="custom-control-label">&nbsp;&nbsp;Female&nbsp;&nbsp;</label>
                        </div>
                    </div>
                  </div>
               
				  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email *</label>
                    <div class="col-sm-6">
                      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
					  <span id="mail" class="text-denger font-weight-bold"></span> 
                    </div>
					<div class="col-sm-3 text-danger">
					 <span id="" class="text-denger font-weight-bold"><?php echo $errorEmail;?></span>
					</div>
                  </div>
				  <div class="form-group row">
                    <label for="inputNumber3" class="col-sm-2 col-form-label">Number *</label>
                    <div class="col-sm-6">
                      <input type="tel" name="number" class="form-control" id="inputNumber3" placeholder="+91" value="<?php echo isset($_POST["number"]) ? $_POST["number"] : ''; ?>">
					  <span id="number" class="text-denger font-weight-bold"></span>
                    </div>
					<div class="col-sm-3 text-danger">
					 <span id="" class="text-denger font-weight-bold"><?php echo $errorNumber;?></span>
					</div>
                  </div>
				   <!-- textarea -->
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Address *</label>
					     <div class="col-sm-6">
                        <textarea type="textarea" name="address" class="form-control" rows="3" placeholder="Enter Address" value="<?php echo isset($_POST["address"]) ? $_POST["address"] : ''; ?>"></textarea>
                      </div>
					  <div class="col-sm-3 text-danger">
					 <span id="" class="text-denger font-weight-bold"><?php echo $errorAddress;?></span>
					</div>
                    </div>
					<div class="form-group row">
                    <label for="inputFile3" class="col-sm-2 col-form-label">Profile :</label>
                    <div class="">
                      <input type="file" name="file" class="" id="inputFile3">
                    </div>
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-info"> Register</button>
                  <button type="submit" name="" class="btn btn-default float-right"><a href="index.php">Cancel</a></button>
                </div>
                </div>
              </form>
			  <!--form end-->
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
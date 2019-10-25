<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Application in CodeIgniter - CREATE</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="styles.css" >

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
	<form method="post" class="form-horizontal col-md-6 col-md-offset-3" action="<?php echo site_url('user/check_login'); ?>">
		<h2>login</h2>


<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">E-Mail</label>
			    <div class="col-sm-10">
			      <input type="email" name="email"  class="form-control" id="input1" placeholder="E-Mail" />
			    </div>
			</div>


			
            <div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">password</label>
			    <div class="col-sm-10">
			      <input type="text" name="password"  class="form-control" id="input1" placeholder="password" />
			    </div>
			</div>

			
			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="login" />
		</form>
	</div>
</div>
</body>
</html>
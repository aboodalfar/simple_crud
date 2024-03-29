<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Application - READ Operation</title>
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="styles.css" >
 

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
	<h2>Read Operation in CRUD applicaiton</h2>

<a href="user/create" class="btn btn-primary"> create user</a>   <a class="btn btn-primary" href="user/login"> login user</a>
		<table class="table "> 
		<thead> 
			<tr> 
				<th>#</th> 
				<th>Full Name</th> 
				<th>E-Mail</th> 
				<th>Age</th> 
				
				<th>Extras</th>
			</tr> 
		</thead> 
		<tbody> 
	<?php 
foreach($res_id->result() as $row){
?>
	<tr> 
		<th scope="row"><?php echo $row->id; ?></th> 
		<td><?php echo $row->first_name . " " . $row->last_name; ?></td> 
		<td><?php echo $row->email; ?></td> 

		<td><?php echo $row->age ?></td> 
		<td>
			<a href="user/update/<?php echo $row->id; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
			<a href="user/delete/<?php echo $row->id; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
		

			  <!-- Modal -->
			  <div class="modal fade" id="myModal<?php echo $row->id; ?>" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Delete File</h4>
			        </div>
			        <div class="modal-body">
			          <p>Are you sure?</p>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			          <a href="delete/<?php echo $row->id; ?>"><button type="button" class="btn btn-danger"> Yes..! Delete</button></a>
			        </div>
			      </div>
			      
			    </div>
			  </div>
		</td>
	</tr> 
<?php } ?>
</tbody> 
		</table>
	</div>
</div>
</body>
</html>
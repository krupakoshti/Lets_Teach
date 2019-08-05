<!DOCTYPE html>
<html>
<head>
	<title>Reg Form</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js">
	</script>
</head>
<body>
	<div style="border: 5px; border-style: ridge; padding: 10px" class="col-md-6 col-md-offset-3 bg-info">
	<h1 style="padding: 10px">Registration Form</h1>
	<div style="border: 5px; border-style: ridge; padding: 10px" class="col-md-12 bg-warning">
	<form method="post">
		
		<div class="form-group">
			First Name: <input type="text" name="txtfname" class="form-control" placeholder="Enter First Name">
		</div>
		
		<div class="form-group">
			Last Name: <input type="text" name="txtlname" class="form-control" placeholder="Enter Last Name">
		</div>
		
		<div class="form-group">
			Email ID: <input type="text" name="txteid" class="form-control" placeholder="Enter Email ID">
		</div>
		
		<div class="form-group">
			User Name: <input type="text" name="txuname" class="form-control" placeholder="Enter User Name">
		</div>
		
		<div class="form-group">
			Password: <input type="password" name="txtpwd" class="form-control" placeholder="Enter Password">
		</div>
		
		<div class="form-group">
			Address: <input type="text" name="txtadd" class="form-control" placeholder="Enter Address">
		</div>

		<div class="form-group">
			City: 	<select class="form-control">
						<option>SELECT</option>				
						<option>Surat</option>
						<option>Valsad</option>
						<option>Navsari</option>
						<option>Vadodra</option>
					</select>
		</div>
		
		<div class="form-group">
			Contact No: <input type="text" name="txtno" class="form-control" placeholder="Enter Contact Number">
		</div>
		
		<div class="form-group">
			Gender: <div class="radio radio-inline"><input type="radio" name="rb"> Male</div>   
					<div class="radio radio-inline"><input type="radio" name="rb"> Female</div>			
		</div>

		<div class="form-group">
			Hobbies: <div class="checkbox checkbox-inline"><input type="checkbox" name="chk"> Dancing</div>
					<div class="checkbox checkbox-inline"><input type="checkbox" name="chk"> Singing</div>
					<div class="checkbox checkbox-inline"><input type="checkbox" name="chk"> Reading</div>
		</div>

		<div class="form-group">
			<input type="submit" name="btnsub" value="Submit" class="btn btn-info text-center col-md-3" style="align">
		</div>
	</form>
</div>
</div>
</body>
</html>
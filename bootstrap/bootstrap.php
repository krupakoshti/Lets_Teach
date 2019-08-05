<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
    		$('[data-toggle="tooltip"]').tooltip(); 
		});	
	</script>
</head>
<body>
	<div class="container lead bg-danger" style="font-size: 20px">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</div>
	<br><br><br>
	<div class="row">
		<div class="col-md-2 col-md-offset-5">
			<p class="text-primary" style="background-color: black">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		</div>
		<div class="col-md-6 text-center text-capitalize">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>
	</div>
	
	<br><br>
	
	<div style="font-size: 30px">
		<ul class="list-unstyled text-center">
			<li>Kartik</li>
			<li>Varun</li>
			<li>Nikunj</li>
			<li>Leonardo</li>
		</ul>
	</div>
	
	<button class="btn-primary">Submit</button>
	<button class="btn-lg col-md-6 btn-info text-danger">sumbit</button>
	
	<br><br><br><br>
	
	<table border="2" width="100%" class="table table-hover">
			<thead>
					<th>
						User
					</th>
					<th>
						Password
					</th>
					<th>
						Email
					</th>
					<th>
						Phno
					</th>
			</thead>
			<tbody>
				<tr class="info">
					<td>
						Admin
					</td>
					<td>
						admin
					</td>
					<td>
						admin@gmail.com
					</td>
					<td>
						893923821
					</td>
				</tr>
				<tr class="warning">
					<td>
						Khushbu
					</td>
					<td>
						kt
					</td>
					<td>
						kt@gmail.com
					</td>
					<td>
						238983
					</td>
				</tr>
				<tr class="danger">
					<td>
						abc
					</td>
					<td>
						xyz
					</td>
					<td>
						abc@gmail.com
					</td>
					<td>
						3984902
					</td>
				</tr>
			</tbody>
	</table>

	<div class="col-md-8">
		<div class="col-md-1">
			Name:
		</div>
		<div class="col-md-6">
			<input type="text" class="form-control">
		</div>
	</div>

	
	<br><br>
	
	<div class="container">
		<select class="form-control">
			<option>select</option>
			<option>abc</option>
			<option>xyz</option>
			<option>jdh</option>
		</select>
	</div>
	
	<br><br>
	
	<div class="inline-checkbox col-md-6">
		<input type="checkbox"> jsdf
		<input type="checkbox"> dksjd
		<input type="checkbox"> KDJSCK
	</div>
	
	<br><br>
	
	<div>
		<form class="col-md-6 col-md-offset-3">
			<div class="form-group">
				Email: <input type="text" class="form-control">
			</div>
			<div class="form-group">
				Password: <input type="text" name="" class="form-control">
			</div>
			<div class="form-group">
				<input type="Submit" name="" value="Submit" class="btn" data-toggle="tooltip" title="Submit form" data-placement="top">
			</div>
		</form>
	</div>
	<div class="col-md-12">
	<div class="col-md-4 col-md-offset-4">	
	<button class="dropdown-toggle form-control" data-toggle="dropdown">Submit</button>

	<ul class="dropdown-menu col-md-12">
		<li>HTML</li>
		<li>CSS</li>
		<li>PHP</li>
	</ul>
	</div>
	</div>
</body>
</html>
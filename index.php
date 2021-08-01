<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap.min.js"></script>
	<script type="text/javascript" src="popper.min.js"></script>
	<script>
		
	</script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-xl-4">
			<form id="signupForm" enctype="multipart/form-data">
				<div class="form-group">
					<label>Name : </label>
					<input type="text" name="name" id="name" class="form-control">
				</div>
				<div class="form-group">
					<label>Email : </label>
					<input type="text" name="email" id="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Password : </label>
					<input type="password" name="password" id="password" class="form-control">
				</div>
				<div class="form-group">
					<label>Mobile : </label>
					<input type="text" name="mobile" id="mobile" class="form-control">
				</div>
				<div class="form-group">
					<label>Qualification : </label>
					<input type="checkbox" name="qualification[]"   value="MCA">MCA
					<input type="checkbox" name="qualification[]"   value="BCA">BCA
					<input type="checkbox" name="qualification[]"   value="B.Tech">B.Tech
				</div>
				<input type="submit" name="" id="btn" class="btn btn-info">
			</form>
		</div>

		<div class="col-xl-8">
			<table class="table" id="display"></table>
		</div>
	</div>
</div>
<script type="text/javascript" src="jquery.js"></script>
<script>
	$(document).ready(function(){
		function show()
		{
			$.ajax({
				url:'http://localhost/practice/php/api/fetch.php',
				type:'GET',
				success:function(res)
				{
					// console.log(data.data.length);
					var html="<tr><td>ID</td><td>Name</td><td>Email</td><td>Gender</td></tr>";
						var i;
						for(i=0;i<res.data.length;i++)
						{
							html+="<tr>"+
							"<td>"+res.data[i].id+"</td>"+
							"<td>"+res.data[i].name+"</td>"+
							"<td>"+res.data[i].email+"</td>"+
							"<td>"+res.data[i].gender+"</td>"+
							"</tr>";
						}
						$("#display").html(html);
				}
			});
		}
		show();


		$("#signupForm").on("submit",function(e){
			e.preventDefault();
			var name=$("#name").val();
			var email=$("#email").val();
			var password=$("#password").val();
			var mobile=$("#mobile").val();

			var qualification=[];
			$("input:checked").each(function(){
				qualification.push($(this).val());
			});
			var qua=qualification;

			var file = $('#pic')[0].files[0]
			var pic=file.name;

			// var obj={name:name,email:email,password:password,mobile:mobile,qualification:qua,pic:pic};
			var obj={name:name,email:email,password:password,mobile:mobile,pic:pic};

			var jdata=JSON.stringify(obj);
			$.ajax({
				url : 'http://localhost/practice/php/api/insert.php',
				type: 'POST',
				data: obj,
				success:function(res)
				{
					// alert("Insert Success");
					console.log(res);
				}
			});

			
		});
	});





</script>
</body>
</html>
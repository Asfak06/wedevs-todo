
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>We devs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<style>
@media only screen and (max-width: 600px) {
 #all,#active,#completed{
  display: block;
 }
 #task,#clear{
  display: block;
  text-align: center;
  float: none !important;
 }
 .invisible{
 	visibility: visible !important;
 }
}
::placeholder {
  font-style: italic;
  font-size: 20px;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
 ></script>
</head>
<body>
<h1 class=" display-1 font-weight-bold text-center mt-3 text-danger">todos</h1>

<div class="card w-50 m-auto">
	<div class="card-header p-0 d-inline-flex">
		<i class="fas fa-chevron-down mt-3 px-3 text-secondary"></i>
		<form id="new" class="form-group m-0 w-100" action="" >	
			<input style="min-height:50px;" id="addtodo" class="form-control" type="" placeholder="what needs to be done ?">
		</form>
	</div>
	<div class="card-body pb-0 pl-0" style="display: none;">
  		<div class="todo">

      </div>
	</div>
	<div class="card-footer" style="display: none;">
    <span id="task" class="float-left mt-1"></span>
		<div class="text-center">
		 <span id="all" class="btn btn-sm border">All</span>
		 <span id="active" class="btn btn-sm border">Active</span>
		 <span id="completed" class="btn btn-sm border">Completed</span>	
     <span id="clear" class="btn btn-sm border float-right" style="display:none;">Clear 
     Completed</span>	    	 	
		</div>
	</div>
</div>



<script src="https://kit.fontawesome.com/59168b3e43.js" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>	
<script src="src/home.js"></script>

<script>


</script>
</body>
</html>
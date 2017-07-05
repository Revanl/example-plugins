<?php
if($_SESSION["isLoggedIn"] == false){
?>
	
  <!-- Trigger the modal with a button -->

<a href="#" data-toggle="modal" data-target="#logIn"><div class="col-6 col-m-6 login">Log in</div></a>

  <!-- Modal -->
  <div class="modal fade" id="logIn" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Log in</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post" id="loginForm">
			<label for="loginName">NAME</label>
			<input type="text" id="loginName">
			<label for="loginPassword">PASSWORD</label>
			<input type="password" id="loginPassword">
			<input type="submit" id="loginSubmit" value="Submit">
		  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- Trigger the modal with a button -->
<a href="#" data-toggle="modal" data-target="#register"><div class="col-6 col-m-6 register">Register</div></a>

  <!-- Modal -->
  <div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post" id="registerForm">
			<label for="registerName">NAME</label>
			<input type="text" id="registerName" required>
			<label for="registerPassword">PASSWORD</label>
			<input type="password" id="registerPassword" required>
			<input type="submit" id="registerSubmit" value="Submit">
		  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	<?php
}
	
if($_SESSION["isLoggedIn"] == true){
			?>

<!-- Trigger the modal with a button -->
<a href="#" data-toggle="modal" data-target="#addCar"><div class="col-12 col-m-12 addCar">Add a car</div></a>

  <!-- Modal -->
  <div class="modal fade" id="addCar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add a car</h4>
        </div>
        <div class="modal-body">

		<?php include("addCar.php");?>
		
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<?php
}
?>

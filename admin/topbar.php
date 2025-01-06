<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}

#logo {
  width: 36px;
  border-radius:50%;
}

.navbar {
  background-color: #1A535C;
  border-bottom: 1px solid gray;
}

h6 {
  font-weight:bold;
  font-size: 1.25rem;
}

.loglog {
  font-weight: 600;
  font-size: 1.2rem;

}

</style>

<nav class="navbar navbar-light fixed-top " style="padding:0;min-height: 3.5rem">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  		
  		</div>
      <div class="col-md-4 float-left text-white d-flex">
      <img src="assets/img/logo.jpg" alt="logo" id=logo>
      <h6 class='ml-3 mt-2'>SPNHS</h6>
      </div>
	  	<div class="float-right mt-2 log">
                <a class="text-white loglog" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
        </div>
      </div>
  </div>
  
</nav>

<script>
  $('#manage_my_account').click(function(){
    uni_modal("Manage Account","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
</script>
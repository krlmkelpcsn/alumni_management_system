<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('admin/db_connect.php');
    ob_start();
        $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
         foreach ($query as $key => $value) {
          if(!is_numeric($key))
            $_SESSION['system'][$key] = $value;
        }
    ob_end_flush();
    include('header.php');

	
    ?>

<style>


.logo {
  width: 32px;
  border-radius: 50%;
  margin-right: 12px;
}

#viewer_modal .btn-close {
  position: absolute;
  z-index: 999999;
  /*right: -4.5em;*/
  background: unset;
  color: white;
  border: unset;
  font-size: 27px;
  top: 0;
}
#viewer_modal .modal-dialog {
  width: 80%;
  max-width: unset;
  height: calc(90%);
  max-height: unset;
}
  #viewer_modal .modal-content {
  background: black;
  border: unset;
  height: calc(100%);
  display: flex;
  align-items: center;
  justify-content: center;
}

#viewer_modal img,#viewer_modal video{
  max-height: calc(100%);
  max-width: calc(100%);
}

/* #login {
  border: 1px solid white;
}
   */

 body {
    background: #021526 ;
}


footer {
    background-color: #343a40;
}

footer a {
    text-decoration: none;
    transition: color 0.2s;
}

footer a:hover {
    color: #ffc107;
}


a.jqte_tool_label.unselectable {
  height: auto !important;
  min-width: 4rem !important;
  padding:5px
}


/*
a.jqte_tool_label.unselectable {
    height: 22px !important;
}*/

/* .btn {
  opacity:0;
} */
  nav#mainNav {
    background: #1A535C;
  }
    </style>
    <body id="page-top">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container d-flex justify-content-between align-items-center">
              <img src="img/logo.jpg" alt="logo" class=logo>
                <a class="navbar-brand js-scroll-trigger" href="./"><?php echo $_SESSION['system']['name'] ?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">  
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=gallery">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=careers">Jobs</a></li>
                        <?php if(isset($_SESSION['login_id'])): ?>
                          <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=alumni_list">Alumni</a></li> -->
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=forum">Forums</a></li>
                        <li class="nav-item">
                    <a class="btn  nav-link js-scroll-trigger" href="admin/index.php?page=home" target="_blank">Post</a>
                </li> 
                        <?php endif; ?>
                        
                        <?php if(!isset($_SESSION['login_id'])): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#" id="login">Login</a></li>
                        <?php else: ?>
                        <li class="nav-item">
                          <div class=" dropdown mr-4">
                              <!-- <a href="#" class="nav-link js-scroll-trigger"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-angle-down"></i></a>
                                <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;"> -->
                                  <!-- <a class="dropdown-item" href="index.php?page=my_account" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a> -->
                                  <a class="text-white ml-5" href="admin/ajax.php?action=logout2"><i class="fa fa-power-off"></i> Logout</a>
                                </div>
                          </div>
                        </li>
                        <?php endif; ?>              
            </ul>
        </div>
    </div>
</nav>
        <?php 
        $page = isset($_GET['page']) ?$_GET['page'] : "home";
        include $page.'.php';
        ?>
       

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>-->
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-righ t"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
  <div id="preloader"></div>
  <footer class="bg-dark text-light py-4">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-4 mb-3">
                <h5>About Us</h5>
                <p>
                    This Alumni Management System is designed to connect graduates with their alma mater. Stay in touch, share your experiences, and contribute to the community.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4 mb-3">
                <h5>Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}" class="text-light">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="text-light">About</a></li>
                    <li><a href="{{ url('/events') }}" class="text-light">Events</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-light">Contact Us</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-md-4 mb-3">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <li><i class="bi bi-envelope"></i> <a href="mailto:info@alumni.com" class="text-light">spnh@alumni.com</a></li>
                    <li><i class="bi bi-telephone"></i> +6395 4567 7890</li>
                    <li><i class="bi bi-geo-alt"></i> San Pedro Iriga City</li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center mt-3">
            <p class="mb-0">&copy; 2024 San Pedro National High School. All Rights Reserved.</p>
        </div>
    </div>
</footer>

        
       <?php include('footer.php') ?>
    </body>
    <script type="text/javascript">
      // document.querySelector('.btn').onclick

      $('#login').click(function(){
        uni_modal("Login",'login.php')
      })
    </script>
    <?php $conn->close() ?>

</html>

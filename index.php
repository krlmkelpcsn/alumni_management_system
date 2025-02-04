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
    background: #F5F7F8 ;
}

footer a:hover {
        color: #1cc88a; /* Light green on hover */
        text-decoration: underline;
    }
    footer .bi, footer .fab {
        font-size: 1.2rem;
        transition: color 0.3s;
    }
    footer .bi:hover, footer .fab:hover {
        color: #1cc88a;
    }
    hr {
      border: solid .5px #5e5e5e;
    }
/*  

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

  #mainNav .navbar-nav .nav-item .menu {
    font-weight: 500;
    font-size: small;
  }
.bg-name {
    backdrop-filter: blur(8px) saturate(170%);
    -webkit-backdrop-filter: blur(8px) saturate(170%);
    background-color: rgba(255, 255, 255, 0.3);
    border-radius: 12px;
    border: 1px solid rgba(209, 213, 219, 0.3);
    padding-right: 2.5em;
    padding-left: 1.5em;
    padding-top: 0.5em; 
    padding-bottom: 0.5em;
}
    </style>
    <body id="page-top">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top " id="mainNav">
            <div class="container d-flex justify-content-between align-items-center">
              <img src="img/logo.jpg" alt="logo" class=logo>
                <a class="navbar-brand js-scroll-trigger" href="index.php?page=home">SPNHS</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">  
                    <ul class="navbar-nav mr-auto ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link menu js-scroll-trigger" href="index.php?page=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link menu js-scroll-trigger" href="index.php?page=about">About</a></li>
                        <li class="nav-item"><a class="nav-link menu js-scroll-trigger" href="index.php?page=gallery">Gallery</a></li>
                        <?php if(isset($_SESSION['login_id'])): ?>
                        <li class="nav-item"><a class="nav-link menu js-scroll-trigger" href="index.php?page=announcement">Announcements</a></li>
                        <li class="nav-item"><a class="nav-link  menu js-scroll-trigger" href="index.php?page=careers">Jobs</a></li>
                        <li class="nav-item"><a class="nav-link menu js-scroll-trigger" href="index.php?page=forum">Forums</a></li>
                        <li class="nav-item"><a class="nav-link menu js-scroll-trigger" href="index.php?page=alumni_list">Alumni</a></li>
                        <li class="nav-item">
                    <a class="nav-link menu js-scroll-trigger" href="admin/index.php?page=home" target="_blank">Post</a>
                </li> 
                </ul> 
                </div>
            </div>
                        <?php endif; ?>
                        
                      </ul>
                      <ul class="navbar-nav navbar-login px-4">
                  <?php if(!isset($_SESSION['login_id'])): ?>
                      <li class="nav-item bg-name" ><a class="nav-link js-scroll-trigger" href="index.php?page=login">Login</a></li>
                  <?php else: ?>
                      <li class="nav-item dropdown ">
                          <a class="nav-link dropdown-toggle pr-5" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?php echo $_SESSION['login_name'] ?>
                          </a>
                          <div class="dropdown-menu mt-2 border-2" aria-labelledby="navbarDropdown">
                              <!-- <a class="dropdown-item" href="index.php?page=my_account">Manage Account</a> -->
                              <a class="dropdown-item" href="admin/ajax.php?action=logout2">Logout</a>
                          </div>
                      </li>
                  <?php endif; ?>
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
      </div>
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

<footer class="bg-dark text-light py-4 mt-1 d-flex justify-content-between">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-4 mt-1">
                <h5 class="fw-bold text-uppercase">About Us</h5>
                <p class="small">
                The Alumni Management System is designed to connect graduates of 
            <strong>San Pedro National High School</strong> with their alma mater. 
            Stay in touch, share your experiences, and contribute to the vibrant alumni community.                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4 mt-1">
                <h5 class="fw-bold text-uppercase">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}" class="text-light text-decoration-none">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="text-light text-decoration-none">About</a></li>
                    <li><a href="{{ url('/events') }}" class="text-light text-decoration-none">Events</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-light text-decoration-none">Contact Us</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-md-4 mt-1">
                <h5 class="fw-bold text-uppercase">Contact Us</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="bi bi-envelope-fill me-2"></i><a href="mailto:spnhs@alumni.com" class="text-light text-decoration-none">spnh@alumni.com</a></li>
                    <li class="mb-2"><i class="bi bi-telephone-fill me-2"></i>+63 95 4567 7890</li>
                    <li><i class="bi bi-geo-alt-fill me-2"></i>San Pedro, Iriga City</li>
                </ul>
            </div>
        </div>

        <hr class="" />

        <!-- Social Media & Copyright -->
        <div class="row align-items-center justify-content-between text-center text-md-start">
            <div class="col-md-6">
                <p class="mb-0 small">&copy; 2024 San Pedro National High School. All Rights Reserved.</p>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-center justify-content-center">
                    <a href="#" class="text-light mr-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-light mr-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-light mr-3"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>


        
       <?php include('footer.php') ?>
    </body>
    <script type="text/javascript">
      // document.querySelector('.btn').onclick

      $('#login').click(function(){
        uni_modal("",'login.php')
      })
    </script>
    <?php $conn->close() ?>

</html>

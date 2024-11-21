 
 <style>
    * {
        font-family:system-ui;
    }
    .head {
        padding-top:7rem;
    }
    section {
        background: #fff;
    }
 </style>
 <!-- Masthead-->
        <header class="">
            <!-- <div class="head container h-100"> -->
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <!-- <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;"> -->
                    	 <!-- <h1 class="text-uppercase text-white font-weight-bold">About Us</h1> -->
                        <!-- <hr class="divider my-4" /> -->
                    </div>
                    
                </div>
            </div>
        </header>

    <section class="page-section">
        <div class="container">
    <?php echo html_entity_decode($_SESSION['system']['about_content']) ?>        
            
        </div>
        </section>
<?php 
include 'admin/db_connect.php'; 
?>
<style>
#portfolio .img-fluid{
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}
.event-list{
cursor: pointer;
}
span.hightlight{
    background: yellow;
}
.banner{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 26vh;
        width: calc(30%);
    }
    .banner img{
        width: calc(100%);
        height: calc(100%);
        cursor :pointer;
    }
.event-list{
cursor: pointer;
border: unset;
flex-direction: inherit;
}

.event-list .banner {
    width: calc(40%)
}
.event-list .card-body {
    width: calc(60%)
}
.event-list .banner img {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    min-height: 50vh;
}
span.hightlight{
    background: yellow;
}
.banner{
   min-height: calc(100%)
}


/* Hero Section */

        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");

      * {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
            Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
            sans-serif;
      }

      section {
        height: 100vh;
        width: 100%;
        background: #021526;
        padding: 0 2em;
        display: flex;
        align-items: center;
        justify-content: space-around;
      }

      .msg_con {
        height: auto;
        width: 40%;
      }

     .msg_con h1 {
        color: white;
        font-size: 2.4rem;
        line-height: 3rem;
      }

      .msg_con p {
        width: 87%;
        color: rgb(220, 215, 215);
        line-height: 1.3rem;
        margin-top:10px;
        margin-bottom: 1.6em;
        font-size: 14px;
      }

      .hero_img {
        height: 100%;
        width: 35%;
        display: flex;
        align-items: center;
      }

      .hero_img img {
        height: 50%;
        width: 100%;
        border-radius: 14px;
        box-shadow: 0px 0px 40px rgba(42, 48, 238, 0.362);
      }

      

      .hero_btn_con {
        display: flex;
        gap: 10px;
      }
      .about_btn {
        cursor: pointer;
        border: none;
        font-size: 14px;
        color: rgb(255, 255, 255);
        padding: 12px 24px;
        transition: 0.2s ease-in-out;
        width: 180px;
        box-shadow: 0px 15px 25px rgba(42, 48, 238, 0.262);
        border-radius: 10px;
        background: rgb(14, 14, 255);
        font-weight: 500;
      }

      .contact_btn {
        cursor: pointer;
        border: none;
        font-size: 14px;
        letter-spacing: 1px;
        color: rgb(255, 255, 255);
        padding: 11px 24px;
        transition: 0.2s ease-in-out;
        width: 180px;
        box-shadow: 0px 9px 25px rgba(242, 242, 242, 0.144);
        border: 2px solid rgba(236, 236, 236, 0.791);
        border-radius: 10px;
        background: none;
        font-weight: 500;
        --hover-width: 180px;
        --hover-borderSize: 0px;
        --hover-bgc: #145ae6ed;
        --hover-color: #fff;
      }

      .about_btn:hover {
        background: rgba(14, 14, 255, 0.83);
      }

      .contact_btn:hover {
        background: rgba(255, 255, 255, 0.236);
      }

      h2 {
        padding-bottom: 2em;
      }
</style>
        <!-- <header class="masthead">
            <div class="container-fluid h-200">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end mb-4 page-title">
                    	<h3 class="text-white">Welcome to <?php echo $_SESSION['system']['name']; ?></h3>
                        <hr class="divider my-4" />

                    <div class="col-md-12 mb-2 justify-content-center">
                    </div>                        
                    </div>
                    
                </div>
            </div>
        </header> -->

        <section class="hero_section">
      <div class="msg_con">
        <h1>Welcome to the San Pedro Alumni Management System!</h1>
        <p>
          We're excited to help you reconnect, engage, and grow with your fellow
          alumni. Join us in building lasting connections, discovering new
          opportunities, and staying involved with your community. Let's make
          great things happen together!
        </p>
        <div class="hero_btn_con">
          <a href="index.php?page=about"><button class="about_btn">About</button></a>
          <a href="index.php?page=signup"><button class="contact_btn" id='login'>Sign up</button></a>
        </div>
      </div>

      <div class="hero_img">
        <img src="img/hero-image.avif" alt="hero-img" />
      </div>
    </section>








            <div  class="container pt-4">
                <h2 class="text-center text-white">Upcoming Events</h2>
                <?php
                $event = $conn->query("SELECT * FROM events where date_format(schedule,'%Y-%m%-d') >= '".date('Y-m-d')."' order by unix_timestamp(schedule) asc");
                while($row = $event->fetch_assoc()):
                    $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                    unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                    $desc = strtr(html_entity_decode($row['content']),$trans);
                    $desc=str_replace(array("<li>","</li>"), array("",","), $desc);
                ?>
                <div class="card event-list" data-id="<?php echo $row['id'] ?>">
                     <div class='banner'>
                        <?php if(!empty($row['banner'])): ?>
                            <img src="admin/assets/uploads/<?php echo($row['banner']) ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="card-body bg-info text-white">
                        <div class="row  align-items-center justify-content-center text-center h-100">
                            <div class="col  align-items-center justify-content-center text-center">
                                <h3><b class="filter-txt"><?php echo ucwords($row['title']) ?></b></h3>
                                <div><small><p><b><i class="fa fa-calendar"></i> <?php echo date("F d, Y h:i A",strtotime($row['schedule'])) ?></b></p></small></div>
                                <hr>
                                <larger class="truncate filter-txt text-white"><?php echo strip_tags($desc) ?></larger>
                                <br>
                                <!-- <hr class="divider"  style="max-width: calc(80%)"> -->
                                <button class="btn btn-primary read_more " data-id="<?php echo $row['id'] ?>">Read More</button>
                            </div>
                        </div>
                        

                    </div>
                </div>
                <br>
                <?php endwhile; ?>
                
            </div>


<script>

  
     $('.read_more').click(function(){
         location.href = "index.php?page=view_event&id="+$(this).attr('data-id')
     })
     $('.banner img').click(function(){
        viewer_modal($(this).attr('src'))
    })
    $('#filter').keyup(function(e){
        var filter = $(this).val()

        $('.card.event-list .filter-txt').each(function(){
            var txto = $(this).html();
            txt = txto
            if((txt.toLowerCase()).includes((filter.toLowerCase())) == true){
                $(this).closest('.card').toggle(true)
            }else{
                $(this).closest('.card').toggle(false)
               
            }
        })
    })
</script>
<?php
include 'admin/db_connect.php';
?>
<style>
  #portfolio .img-fluid {
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
  }

  .event-list {
    cursor: pointer;
  }

  span.highlight {
    background: yellow;
  }

  .banner {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 26vh;
    width: calc(30%);
  }

  .banner img {
    width: calc(100%);
    height: calc(100%);
    cursor: pointer;
  }

  .event-list {
    cursor: pointer;
    border: unset;
    flex-direction: inherit;
  }

  .event-list .banner {
    width: calc(40%);
  }

  .event-list .card-body {
    width: calc(60%);
  }

  .event-list .banner img {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    min-height: 50vh;
  }

  .banner {
    min-height: calc(100%);
  }

  /* Hero Section */

  @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");

  * {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
      Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
      sans-serif;
  }

  section {
    height: 100vh;
    width: 100%;
    background: #F5F7F8;
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
    color: #4e73df;
    font-size: 2.4rem;
    line-height: 3rem;
  }

  .msg_con p {
    width: 87%;
    color: #555;
    line-height: 1.3rem;
    margin-top: 10px;
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
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
  }

  .hero_img img:hover {
    transform: scale(1.05);
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
    font-size: 14px;
    letter-spacing: 1px;
    color: #212529;
    padding: 11px 24px;
    transition: 0.2s ease-in-out;
    width: 180px;
    box-shadow: 0px 15px 25px #ccc;
    border: 2px solid #4e73df;
    border-radius: 10px;
    background: none;
    font-weight: 500;
    --hover-width: 180px;
    --hover-borderSize: 0px;
    --hover-bgc: #145ae6ed;
    --hover-color: #fff;
  }

  .about_btn:hover,
  .contact_btn:hover {
    transform: scale(1.05);
  }

  h2 {
    padding-bottom: 2em;
    color: #4e73df;
    font-size: 2.5rem;
    margin-bottom: 1rem;
    font-weight: 700;
  }

  /* Card Hover Effect */
  .card.event-list {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .card.event-list:hover {
    transform: scale(1.02);
    transition: transform 0.3s ease-in-out;
  }

  .card-body {
    border-bottom-right-radius: 10px;
    border-top-right-radius: 10px;
  }

  /* Button Styling */
  .btn-primary {
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #0056b3;
  }

  .row-items {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-top: 2rem;
  }

  .card {
    background: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    transition: transform 0.3s ease;
  }

  .card:hover {
    transform: translateY(-5px);
  }
</style>

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
      <a href="index.php?page=about"><button class="about_btn bg-primary">About</button></a>
      <a href="index.php?page=signup"><button class="contact_btn" id='login'>Sign up</button></a>
    </div>
  </div>

  <div class="hero_img">
    <img src="img/hero-image.avif" alt="hero-img" />
  </div>
</section>

<div class="container pt-4 ">
  <h2 class="text-center mb-4">Events</h2>
  <div class="row-items">
    <div class="row">

      <?php
      $event = $conn->query("SELECT * FROM events where date_format(schedule,'%Y-%m-%d') >= '" . date('Y-m-d') . "' order by unix_timestamp(schedule) asc");
      while ($row = $event->fetch_assoc()):
        $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
        $desc = strtr(html_entity_decode($row['content']), $trans);
        $desc = str_replace(array("<li>", "</li>"), array("", ","), $desc);
      ?>
        <div class="col-md-4 mb-4"> <!-- 3 Columns layout -->
          <div class="card " style="width: 22rem;" data-id="<?php echo $row['id'] ?>">
            <div class="banner" style="width: 22rem; height: 18em;">
              <?php if (!empty($row['banner'])): ?>
                <img src="admin/assets/uploads/<?php echo ($row['banner']) ?>" alt="" class="card-img-top">
              <?php endif; ?>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo ucwords($row['title']) ?></h5>
              <div class="text-muted mb-3">
                <small><i class="fa fa-calendar"></i> <?php echo date("F d, Y h:i A", strtotime($row['schedule'])) ?></small>
              </div>
              <p class="card-text" style="height: 60px; overflow: hidden; text-overflow: ellipsis;"><?php echo strip_tags($desc) ?></p>
              <button class="btn btn-primary read_more" data-id="<?php echo $row['id'] ?>">Read More</button>
            </div>
          </div>
        </div>

      <?php endwhile; ?>
    </div>
  </div>
</div>

<script>
  $('.read_more').click(function() {
    location.href = "index.php?page=view_event&id=" + $(this).attr('data-id')
  })
  $('.banner img').click(function() {
    viewer_modal($(this).attr('src'))
  })
  $('#filter').keyup(function(e) {
    var filter = $(this).val()

    $('.card.event-list .filter-txt').each(function() {
      var txto = $(this).html();
      txt = txto
      if ((txt.toLowerCase()).includes((filter.toLowerCase())) == true) {
        $(this).closest('.card').toggle(true)
      } else {
        $(this).closest('.card').toggle(false)
      }
    })
  });
</script>
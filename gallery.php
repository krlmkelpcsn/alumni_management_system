<?php 
include 'admin/db_connect.php'; 
?>
<style>
    * {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    header.masthead {
        background: linear-gradient(to bottom, #6c757d, #343a40);
        color: white;
        text-align: center;
        padding: 2rem 0;
    }
    header .head h1 {
        color: #4e73df;
        font-size: 2.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }
    .gallery-list {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border: none;
        border-radius: 10px;
        overflow: hidden;
        height: 100%;
    }
    .gallery-list:hover {
        transform: scale(1.05);
        box-shadow: 0px 10px 40px rgba(42, 48, 238, 0.362);    
    }
    .gallery-img img {
        border-radius: 10px;
        height: 200px;
        object-fit: cover;
        width: 100%;
    }
    .card-body {
        background-color: #fff;
        padding: 1rem;
        text-align: center;
        font-size: 0.9rem;
    }
    .card-body span {
        font-weight: 600;
        color: #495057;
    }
    .truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: inline-block;
    }
    .row-items {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-top: 2rem;
    }
    .col-md-4 {
        margin-bottom: 1.5rem;
    }
    footer {
        background: #343a40;
        color: #fff;
        padding: 1rem 0;
        text-align: center;
    }
    .head {
        padding-top:7rem;
    }

    /* Card Hover Effect */
    .card.event-list:hover {
        transform: scale(1.02);
        transition: transform 0.3s ease-in-out;
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
    
</style>

<header class="">
    <div class="head container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end mb-4 page-title">
                <h1 class="mt-3 display-4 fw-bold">Gallery</h1>
                <div class="col-md-12 mb-2 justify-content-center">
                </div>                        
            </div>
        </div>
    </div>
</header>
<!-- <?php if(isset($_SESSION['login_id'])): ?>
    <div class="d-flex align-items-center justify-content-center">
        <button class="btn btn-primary btn-md" type="button" id="new_gallery">
            <i class="fas fa-plus"></i> Add gallery
        </button>
        <?php endif; ?>
    </div> -->
<div class="container-fluid mt-3 pt-2">
    <div class="row-items">
        <div class="col-lg-12">
            <div class="row">
                <?php
                $rtl ='rtl';
                $ci= 0;
                $img = array();
                $fpath = 'admin/assets/uploads/gallery';
                $files= is_dir($fpath) ? scandir($fpath) : array();
                foreach($files as $val){
                    if(!in_array($val, array('.','..'))){
                        $n = explode('_',$val);
                        $img[$n[0]] = $val;
                    }
                }
                $gallery = $conn->query("SELECT * from gallery order by id desc");
                while($row = $gallery->fetch_assoc()):
                    $ci++;
                    if($ci < 3){
                        $rtl = '';
                    }else{
                        $rtl = 'rtl';
                    }
                    if($ci == 4){
                        $ci = 0;
                    }
                ?>
                <div class="col-md-4">
                    <div class="card gallery-list <?php echo $rtl ?>" data-id="<?php echo $row['id'] ?>">
                        <div class="gallery-img" card-img-top>
                            <img src="<?php echo isset($img[$row['id']]) && is_file($fpath.'/'.$img[$row['id']]) ? $fpath.'/'.$img[$row['id']] :'' ?>" alt="">
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center justify-content-center text-center h-100">
                                <div class="">
                                    <div>
                                        <span class="truncate" style="font-size: inherit;"><small><?php echo ucwords($row['about']) ?></small></span>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

<script>
    // $('#new_gallery').click(function() {
    //         uni_modal("Add Gallery", "manage_gallery.php", 'mid-large');
    //     });
        
    $('.book-gallery').click(function(){
        uni_modal("Submit Booking Request","booking.php?gallery_id="+$(this).attr('data-id'))
    })
    $('.gallery-img img').click(function(){
        viewer_modal($(this).attr('src'))
    })
</script>
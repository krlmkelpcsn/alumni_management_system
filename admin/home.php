<?php include 'db_connect.php' ?>

<style>
    .summary-card {
        transition: transform 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
    }
    .summary-card:hover {
        transform: scale(1.05);
    }
    .card-body-custom {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        padding: 2rem;
        border-radius: 12px;
    }
    .icon-bg {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .bg-alumni {
    background-color: #FF6B6B; /* Vibrant Red */
}
.bg-forum {
    background-color: #4ECDC4; /* Mint Green */
}
.bg-jobs {
    background-color: #FFD166; /* Golden Yellow */
}
.bg-events {
    background-color: #1A535C; /* Dark Teal */
}

</style>

<div class="container-fluid">
    <div class="row mt-5 mx-3">
        <div class="col-lg-12">
            <div class="row g-3">
                <!-- Alumni Card -->
                <div class="col-md-3">
                    <div class="card summary-card bg-alumni">
                        <div class="card-body card-body-custom">
                            <div class="icon-bg"><i class="fas fa-user-graduate"></i></div>
                            <h4><b><?php echo $conn->query("SELECT * FROM alumnus_bio WHERE status = 1")->num_rows; ?></b></h4>
                            <p><b>Alumni</b></p>
                        </div>
                    </div>
                </div>

                <!-- Forum Topics Card -->
                <div class="col-md-3">
                    <div class="card summary-card bg-forum">
                        <div class="card-body card-body-custom">
                            <div class="icon-bg"><i class="fas fa-comments"></i></div>
                            <h4><b><?php echo $conn->query("SELECT * FROM forum_topics")->num_rows; ?></b></h4>
                            <p><b>Forum Topics</b></p>
                        </div>
                    </div>
                </div>

                <!-- Posted Jobs Card -->
                <div class="col-md-3">
                    <div class="card summary-card bg-jobs">
                        <div class="card-body card-body-custom">
                            <div class="icon-bg"><i class="fas fa-briefcase"></i></div>
                            <h4><b><?php echo $conn->query("SELECT * FROM careers")->num_rows; ?></b></h4>
                            <p><b>Posted Jobs</b></p>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Events Card -->
                <div class="col-md-3">
                    <div class="card summary-card bg-events">
                        <div class="card-body card-body-custom">
                            <div class="icon-bg"><i class="fas fa-calendar-alt"></i></div>
                            <h4><b><?php echo $conn->query("SELECT * FROM events WHERE DATE(schedule) >= '".date('Y-m-d')."'")->num_rows; ?></b></h4>
                            <p><b>Upcoming Events</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#manage-records').submit(function(e){
        e.preventDefault();
        start_load();
        $.ajax({
            url: 'ajax.php?action=save_track',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            success: function(resp) {
                const response = JSON.parse(resp);
                if (response.status === 1) {
                    alert_toast("Data successfully saved", 'success');
                    setTimeout(() => location.reload(), 800);
                }
            }
        });
    });

    $('#tracking_id').on('keypress', function(e) {
        if (e.which === 13) {
            get_person();
        }
    });

    $('#check').on('click', get_person);

    function get_person() {
        start_load();
        $.ajax({
            url: 'ajax.php?action=get_pdetails',
            method: "POST",
            data: { tracking_id: $('#tracking_id').val() },
            success: function(resp) {
                const response = JSON.parse(resp);
                if (response.status === 1) {
                    $('#name').html(response.name);
                    $('#address').html(response.address);
                    $('[name="person_id"]').val(response.id);
                    $('#details').show();
                } else if (response.status === 2) {
                    alert_toast("Unknown tracking ID.", 'danger');
                }
                end_load();
            }
        });
    }
</script>







<!-- 
<style>
   span.float-right.summary_icon {
    font-size: 3rem;
    position: absolute;
    right: 1rem;
    color: #ffffff96;
}
.imgs{
		margin: .5em;
		max-width: calc(100%);
		max-height: calc(100%);
	}
	.imgs img{
		max-width: calc(100%);
		max-height: calc(100%);
		cursor: pointer;
	}
	#imagesCarousel,#imagesCarousel .carousel-inner,#imagesCarousel .carousel-item{
		height: 60vh !important;background: black;
	}
	#imagesCarousel .carousel-item.active{
		display: flex !important;
	}
	#imagesCarousel .carousel-item-next{
		display: flex !important;
	}
	#imagesCarousel .carousel-item img{
		margin: auto;
	}
	#imagesCarousel img{
		width: auto!important;
		height: auto!important;
		max-height: calc(100%)!important;
		max-width: calc(100%)!important;
	}

    .card, #dashdash {
        box-shadow: 0px 0px 10px 0px rgba(148,153,152,0.3);
        border-radius:8px;
    }
</style>

<div class="container-fluid">
	<div class="row mt-5   ml-3 mr-3">
        <div class="col-lg-12"> -->
            <!-- <div class="card ">
                <div id="dashdash" class="card-body">
                    <!-- <?php echo "Welcome back ". $_SESSION['login_name']."!"  ?> -->
                    <!-- <hr -->
                    <!-- <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body bg-info rounded">
                                    <div class="card-body text-white text-center">
                                        <h4><b>
                                            <?php echo $conn->query("SELECT * FROM alumnus_bio where status = 1")->num_rows; ?>
                                        </b></h4>
                                        <p><b>Alumni</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body bg-secondary rounded">
                                    <div class="card-body text-white text-center"> -->
                                        <!-- <span class="float-right summary_icon"><i class="fa fa-comments"></i></span> -->
                                        <!-- <h4><b>
                                            <?php echo $conn->query("SELECT * FROM forum_topics")->num_rows; ?>
                                        </b></h4>
                                        <p><b>Forum Topics</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body bg-primary rounded">
                                    <div class="card-body text-white text-center"> -->
                                        <!-- <span class="float-right summary_icon"><i class="fa fa-briefcase"></i></span> -->
                                        <!-- <h4><b>
                                            <?php echo $conn->query("SELECT * FROM careers")->num_rows; ?>
                                        </b></h4>
                                        <p><b>Posted jobs</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body bg-success rounded">
                                    <div class="card-body text-white text-center"> -->
                                        <!-- <span class="float-right summary_icon"><i class="fa fa-calendar-day"></i></span> -->
                                        <!-- <h4><b>
                                            <?php echo $conn->query("SELECT * FROM events where date_format(schedule,'%Y-%m%-d') >= '".date('Y-m-d')."' ")->num_rows; ?>
                                        </b></h4>
                                        <p><b>Upcoming Events</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>	

                    
                </div>
            </div>      			
        </div>
    </div>
</div>
<script>
	$('#manage-records').submit(function(e){
        e.preventDefault()
        start_load()
        $.ajax({
            url:'ajax.php?action=save_track',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                resp=JSON.parse(resp)
                if(resp.status==1){
                    alert_toast("Data successfully saved",'success')
                    setTimeout(function(){
                        location.reload()
                    },800)

                }
                
            }
        })
    })
    $('#tracking_id').on('keypress',function(e){
        if(e.which == 13){
            get_person()
        }
    })
    $('#check').on('click',function(e){
            get_person()
    })
    function get_person(){
            start_load()
        $.ajax({
                url:'ajax.php?action=get_pdetails',
                method:"POST",
                data:{tracking_id : $('#tracking_id').val()},
                success:function(resp){
                    if(resp){
                        resp = JSON.parse(resp)
                        if(resp.status == 1){
                            $('#name').html(resp.name)
                            $('#address').html(resp.address)
                            $('[name="person_id"]').val(resp.id)
                            $('#details').show()
                            end_load()

                        }else if(resp.status == 2){
                            alert_toast("Unknow tracking id.",'danger');
                            end_load();
                        }
                    }
                }
            })
    }
</script> -->
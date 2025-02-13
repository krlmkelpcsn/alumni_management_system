<?php 
include 'admin/db_connect.php'; 
?>
<style>
    * {
        font-family:system-ui;
    }
#portfolio .img-fluid{
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}
.gallery-list{
cursor: pointer;
border: unset;
flex-direction: inherit;
}
.gallery-img,.gallery-list .card-body {
    width: calc(50%)
}
.gallery-img img{
    border-radius: 5px;
    min-height: 50vh;
    max-width: calc(100%);
}
span.hightlight{
    background: yellow;
}
.carousel,.carousel-inner,.carousel-item{
   min-height: calc(100%)
}
header.masthead,header.masthead:before {
        min-height: 50vh !important;
        height: 50vh !important
    }
.row-items{
    position: relative;
}
.masthead{
        min-height: 23vh !important;
        height: 23vh !important;
    }
     .masthead:before{
        min-height: 23vh !important;
        height: 23vh !important;
    }

    .head {
        padding-top:7rem;
    }

    .search_container { 
    align-self:center;
    padding: 0 15em;
    }

    .card {
        margin-top:5em;
    }

    .container1 {
    padding:0;
    margin:0 20em;
    display: flex;
    gap:0.5em;  
}

/* #filter {
    width: 60%;
} */
.container1 .btn {
    width: 20%;
}
header .head h1 {
        color: #4e73df;
        font-size: 2.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }

</style>



<div class="container pt-4">
    <header class="">
            <div class="head container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end mb-4 page-title">
                    <h1 class="mt-3 display-4 fw-bold">Forum List</h1>
                    <div class="col-md-12 mb-2 justify-content-center">
                    </div>                        
                    </div>
                    
                </div>
            </div>
        </header>
        <!-- <?php if(isset($_SESSION['login_id'])): ?>
    <div class="d-flex align-items-center justify-content-center">
        <button class="btn btn-primary btn-md mb-5" type="button" id="new_forum">
            <i class="fas fa-plus"></i> Add Forum
        </button>
        <?php endif; ?>
    </div> -->

    <div class="search_container d-flex justify-content-center mb-5">
        <div class="input-group" style="width: 60%;">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-search"></i></span>
            </div>
            <input type="text" class="form-control" id="filter" placeholder="Search topics..." aria-label="Filter">
            <button class="btn btn-primary ml-2" id="search">Search</button>
        </div>
    </div>

    <div class="row mb-6" >
        <?php
        $event = $conn->query("SELECT f.*,u.name FROM forum_topics f INNER JOIN users u ON u.id = f.user_id ORDER BY f.id DESC");
        while ($row = $event->fetch_assoc()):
            $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
            unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
            $desc = strtr(html_entity_decode($row['description']), $trans);
            $desc = str_replace(array("<li>", "</li>"), array("", ","), $desc);
            $count_comments = $conn->query("SELECT * FROM forum_comments WHERE topic_id = ".$row['id'])->num_rows;
        ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h5 class="card-title text-primary"><?php echo ucwords($row['title']); ?></h5>
                        <?php if ($_SESSION['login_id'] == $row['user_id']): ?>
                        <div class="dropdown">
                            <a href="#" class="text-dark" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item edit_forum" data-id="<?php echo $row['id']; ?>" href="#">Edit</a>
                                <a class="dropdown-item delete_forum" data-id="<?php echo $row['id']; ?>" href="#">Delete</a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <p class="text-muted mb-2"><i class="fa fa-user"></i> Created by: <b><?php echo $row['name']; ?></b></p>
                    <p class="text-muted"><i class="fa fa-comments"></i> <?php echo $count_comments; ?> Comments</p>
                    <hr>
                    <p class="card-text text-truncate" style="height: 60px; overflow: hidden;"><?php echo strip_tags($desc); ?></p>
                    <button class="btn btn-primary btn-sm float-right view_topic" data-id="<?php echo $row['id']; ?>">View Topic</button>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>



<style>
    hr {
        border-top: 1px solid #ddd;
        margin: 1rem 0;
    }
    .card {
        border-radius: 10px;
        transition: transform 0.3s, box-shadow 0.3s;
        margin-top:0;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .btn {
        border-radius: 4px;
    }

    .text-primary {
        font-weight: bold;
    }

    .card-title {
        font-size: 1.25rem;
    }

    .text-muted {
        font-size: 0.85rem;
    }
</style>

<script>
    // $('.card.gallery-list').click(function(){
    //     location.href = "index.php?page=view_gallery&id="+$(this).attr('data-id')
    // })
    // New Forum Button Click
    // $('#new_forum').click(function() {
    //     uni_modal("New Forum Entry", "manage_forum.php", 'mid-large');
    // });
    // $('#new_forum').click(function(){
    //     uni_modal("New Topic","manage_forum.php",'mid-large')
    // })
    $('.view_topic').click(function(){
       location.replace('index.php?page=view_forum&id='+$(this).attr('data-id'))
    })
    $('.edit_forum').click(function(){
        uni_modal("Edit Topic","manage_forum.php?id="+$(this).attr('data-id'),'mid-large')
    })
    $('.gallery-img img').click(function(){
        viewer_modal($(this).attr('src'))
    })
     $('.delete_forum').click(function(){
        _conf("Are you sure to delete this Topic?","delete_forum",[$(this).attr('data-id')],'mid-large')
    })

    function delete_forum($id){
        start_load()
        $.ajax({
            url:'admin/ajax.php?action=delete_forum',
            method:'POST',
            data:{id:$id},
            success:function(resp){
                if(resp==1){
                    alert_toast("Data successfully deleted",'success')
                    setTimeout(function(){
                        location.reload()
                    },1500)

                }
            }
        })
    }
    $('#filter').keypress(function(e){
    if(e.which == 13)
        $('#search').trigger('click')
   })
    $('#search').click(function(){
        var txt = $('#filter').val()
        start_load()
        if(txt == ''){
        $('.Forum-list').show()
        end_load()
        return false;
        }
        $('.Forum-list').each(function(){
            var content = "";
            $(this).find(".filter-txt").each(function(){
                content += ' '+$(this).text()
            })
            if((content.toLowerCase()).includes(txt.toLowerCase()) == true){
                $(this).toggle(true)
            }else{
                $(this).toggle(false)
            }
        })
        end_load()
    })

</script>
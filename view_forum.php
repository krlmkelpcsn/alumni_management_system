<?php 
include 'admin/db_connect.php'; 
 $topic = $conn->query("SELECT *,u.name from forum_topics f inner join users u on u.id = f.user_id  where f.id = ".$_GET['id']);
 foreach($topic->fetch_array() as $k=>$v){
 	if(!is_numeric($k))
 		$$k = $v;
 }
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

header .head h1 {
        color: #4e73df;
        font-size: 2.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .head {
        padding-top:7rem;
    }


    .card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 1.5rem;
}

.card-body {
    background: #f8f9fc;
    border-radius: 10px;
    padding: 1.5rem;
}

.comment {
    background: #e9ecef;
    padding: 1rem;
    border-radius: 10px;
    margin-bottom: 1rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.btn-primary {
    background-color: #4e73df;
    border: none;
    border-radius: 5px;
    padding: 0.5rem 1.5rem;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #3751ab;
}

.dropdown-menu {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

h3 {
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

p {
    font-size: 1rem;
    color: #5a5c69;
}

textarea {
    border: 1px solid #d1d3e2;
    border-radius: 5px;
    padding: 0.5rem;
    resize: none;
    font-size: 1rem;
}
    hr {
        border-top: 1px solid #ddd;
        margin: 1rem 0;
    }
</style>


<div class="container  pt-3">
    <header class="">
                <div class="head container-fluid h-100">
                    <div class="row h-100 align-items-center justify-content-center text-center">
                        <div class="col-lg-8 align-self-end mb-4 page-title">
                        <h1 class="mt-3 display-4 fw-bold">Forum List</h1>
                        <span class="badge badge-primary px-3 pt-1 pb-1">
                            <b><i>Topic Created by: <?php echo $name ?></i></b>
                        </span>
                        <div class="col-md-12 mb-2 justify-content-center">
                        </div>                        
                        </div>
                        
                    </div>
                </div>
            </header>
    <div class="card mb-4">
        <div class="card-body">
	            <?php echo html_entity_decode($description) ?>
        <!-- <hr class="divider"> -->
        </div>
    </div>
  	<?php 
  	// echo "SELECT f.*,u.name,u.email FROM forum_comments f inner join users u on u.id = f.user_id where f.topic_id = $id order by f.id asc";
  	$comments = $conn->query("SELECT f.*,u.name,u.username FROM forum_comments f inner join users u on u.id = f.user_id where f.topic_id = $id order by f.id asc");
  	?>
    <div class="card mb-4">
    	<div class="card-body">
    		<div class="col-lg-12">
    			<div class="row">
    				<h3><b> <i class="fa fa-comments"></i> <?php echo $comments->num_rows ?> Comments</b></h3>
    			</div>
    			<!-- <hr class="divider" style="max-width: 100%"> -->
    			<?php 
    			while($row= $comments->fetch_assoc()):
    			?>
    			<div class="form-group comment">
                    <?php if($_SESSION['login_id'] == $row['user_id']): ?>
                    <div class="dropdown float-right">
                      <a class="text-dark" href="javascript:void(0)" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-ellipsis-v"></span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item edit_comment" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">Edit</a>
                        <a class="dropdown-item delete_comment" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">Delete</a>
                      </div>
                    </div>
                    <?php endif; ?>
    				<p class="mb-0"><large><b><?php echo $row['name'] ?></b></large></p>
    				<small class="mb-0"><i><?php echo $row['username'] ?></i></small>
    				<br>
    				<?php echo html_entity_decode($row['comment']) ?>
    				<hr>
    			</div>
    		<?php endwhile; ?>
    		</div>
    			<!-- <hr> -->
    			<div class="col-lg-12">
    				<form action="" id="manage-comment">
    					<div class="form-group">
    						<input type="hidden" name="topic_id" value="<?php echo isset($id) ? $id : '' ?>">
    						<textarea class="form-control jqte" name="comment" cols="30" rows="5" placeholder="New Comment"></textarea>
    					</div>
    					<button class="btn btn-primary">Save Comment</button>
    				</form>
    			</div>
    	</div>
    </div>
    
</div>
    


<script>
    // $('.card.gallery-list').click(function(){
    //     location.href = "index.php?page=view_gallery&id="+$(this).attr('data-id')
    // })
	$('.jqte').jqte();

    $('#new_forum').click(function(){
        uni_modal("New Topic","manage_forum.php",'mid-large')
    })
    $('.edit_comment').click(function(){
        uni_modal("Edit Comment","manage_comment.php?id="+$(this).attr('data-id'),'mid-large')
    })
    $('.view_topic').click(function(){
        uni_modal("Career Opportunity","view_Forums.php?id="+$(this).attr('data-id'),'mid-large')
    })

    $('#search').click(function(){
        var txt = $(this).val()
        start_load()
        $('.Forum-list').each(function(){
            var content = $(this).text()
            if((content.toLowerCase()).includes(txt.toLowerCase) == true){
                $(this).toggle('true')
            }else{
                $(this).toggle('false')
            }
        })
        end_load()
    })
    $('#manage-comment').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'admin/ajax.php?action=save_comment',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp == 1){
					alert_toast("Data successfully saved.",'success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})
	})
    $('.delete_comment').click(function(){
        _conf("Are you sure to delete this comment?","delete_comment",[$(this).attr('data-id')],'mid-large')
    })

    function delete_comment($id){
        start_load()
        $.ajax({
            url:'admin/ajax.php?action=delete_comment',
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

</script>
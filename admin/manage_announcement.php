<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM announcements where id=".$_GET['id'])->fetch_array();
	foreach($qry as $k =>$v){
		$$k = $v;
	}
}

?>
<div class="container-fluid">
	<form action="" id="manage-forum">
				<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id']:'' ?>" class="form-control">
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Title</label>
				<input type="text" name="title" class="form-control" value="<?php echo isset($title) ? $title:'' ?>">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Description</label>
				<textarea name="description" class="text-jqte"><?php echo isset($description) ? $description : '' ?></textarea>
			</div>
			<!-- <div class="col-md-12">
				<label class="control-label">Status</label>
				<select name="status" class="form-control">
					<option value="pending" <?php echo isset($status) && $status == 'pending' ? 'selected' : '' ?>>Pending</option>
					<option value="approved" <?php echo isset($status) && $status == 'approved' ? 'selected' : '' ?>>Approved</option>
					<option value="rejected" <?php echo isset($status) && $status == 'rejected' ? 'selected' : '' ?>>Rejected</option>
				</select>
			</div> -->
		</div>
	</form>
</div>

<script>
	$('.text-jqte').jqte();
	$('#manage-forum').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_announcement',
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
</script>
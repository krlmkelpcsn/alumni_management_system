<?php include 'admin/db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM gallery where id=".$_GET['id'])->fetch_array();
	foreach($qry as $k =>$v){
		$$k = $v;
	}
}

?>
<div class="container-fluid">
<form action="" id="manage-gallery">

                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-upload"></i> Upload Image</h5>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id">
                            <div class="mb-3">
                                <label for="img" class="form-label">Select Image</label>
                                <input type="file" class="form-control" name="img" onchange="displayImg(this, $(this))" required>
                            </div>
                            <div class="mb-3 text-center">
                                <img src="" alt="Image Preview" id="cimg" class="img-thumbnail" style="max-height: 200px;">
                            </div>
                            <div class="mb-3">  
                                    <label for="about" class="form-label">Short Description</label>
                                    <textarea class="form-control" name="about" rows="3" placeholder="Enter a brief description" required> <?php echo isset($about) ? $about:'' ?></textarea>
                                </div>
                            </div>
                            <!-- <div class="card-footer">
                                <div class="d-grid gap-2">
                                <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Save</button>
                                <button class="btn btn-secondary" type="button" onclick="$('#manage-gallery').get(0).reset()"><i class="fas fa-times"></i> Cancel</button>
                            </div>
                        </div> -->
                    </div>
                </form>
</div>

<script>
    $('#manage-gallery').submit(function (e) {
        e.preventDefault();
        start_load();
        $.ajax({
            url: 'admin/ajax.php?action=save_gallery',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            success: function (resp) {
                if (resp == 1) {
                    alert_toast("Data successfully added", 'success');
                    setTimeout(() => location.reload(), 1500);
                } else if (resp == 2) {
                    alert_toast("Data successfully updated", 'success');
                    setTimeout(() => location.reload(), 1500);
                }
            }
        });
    });
</script>
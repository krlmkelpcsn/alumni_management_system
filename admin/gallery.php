<?php include('db_connect.php'); ?>

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <!-- Form Panel -->
            <!-- <div class="col-md-4 mb-3">
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
                                <textarea class="form-control" name="about" rows="3" placeholder="Enter a brief description" required></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-grid gap-2">
                                <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Save</button>
                                <button class="btn btn-secondary" type="button" onclick="$('#manage-gallery').get(0).reset()"><i class="fas fa-times"></i> Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> -->
            <!-- Table Panel -->
            <div class="col-md-12">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="bx bx-images"></i> List of Gallery</h5>
                        <button class="btn btn-light btn-sm" type="button" id="new_gallery">
                            <i class="fas fa-plus"></i> Add gallery
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table  table-hover ">
                            <thead class="table-info">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Image</th>
                                    <th>Description</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $img = array();
                                $fpath = 'assets/uploads/gallery';
                                $files = is_dir($fpath) ? scandir($fpath) : array();
                                foreach ($files as $val) {
                                    if (!in_array($val, array('.', '..'))) {
                                        $n = explode('_', $val);
                                        $img[$n[0]] = $val;
                                    }
                                }
                                $gallery = $conn->query("SELECT * FROM gallery ORDER BY id ASC");
                                while ($row = $gallery->fetch_assoc()):
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++; ?></td>
                                        <td class="text-center">
                                            <img src="<?php echo isset($img[$row['id']]) && is_file($fpath . '/' . $img[$row['id']]) ? $fpath . '/' . $img[$row['id']] : ''; ?>" class="gimg img-thumbnail" alt="Gallery Image">
                                        </td>

                                        <td><?php echo $row['about']; ?></td>
                                        <td class="text-center">
                                            <!-- Check if the user role is not 'client' -->
                                            <?php if ($_SESSION['login_type'] == 1): ?>
                                                <button class="btn btn-sm btn-warning edit_gallery" type="button"
                                                    data-id="<?php echo $row['id']; ?>"
                                                    data-about="<?php echo htmlspecialchars($row['about']); ?>"
                                                    data-src="<?php echo isset($img[$row['id']]) && is_file($fpath . '/' . $img[$row['id']]) ? $fpath . '/' . $img[$row['id']] : ''; ?>">
                                                    <i class="fas fa-edit"></i>
                                                    <!-- Delete Button -->
                                                    <button class="btn btn-sm btn-danger delete_gallery" type="button"
                                                        data-id="<?php echo $row['id']; ?>">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                <?php else: ?>
                                                    <!-- Show a placeholder or nothing for clients -->
                                                    <span>No Actions Available</span>
                                                <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn {
        border-radius: 0.3rem;
    }

    td {
        vertical-align: middle !important;
    }

    img#gimg {
        max-height: 200px;
        max-width: 100%;
    }

    .gimg {
        max-height: 50px;
        max-width: 50px;
        object-fit: cover;
    }
</style>

<script>
    // New Career Button Click
    $('#new_gallery').click(function() {
        uni_modal("Add Gallery", "manage_gallery.php", 'mid-large');
    });


    $('.edit_gallery').click(function() {
        uni_modal("Edit Gallery", "manage_gallery.php?id=" + $(this).attr('data-id'), 'mid-large');
    });

    // View Career Button Click
    // $('.view_gallery').click(function() {
    //     uni_modal("Job Opportunity", "view_gallery.php?id=" + $(this).attr('data-id'), 'mid-large');
    // });

    // Delete Career Button Click
    // $('.delete_career').click(function() {
    //     _conf("Are you sure you want to delete this job post?", "delete_career", [$(this).attr('data-id')], 'mid-large');
    // });



    function displayImg(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#cimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }



    // $('#manage-gallery').submit(function (e) {
    //     e.preventDefault();
    //     start_load();
    //     $.ajax({
    //         url: 'ajax.php?action=save_gallery',
    //         data: new FormData($(this)[0]),
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         method: 'POST',
    //         success: function (resp) {
    //             if (resp == 1) {
    //                 alert_toast("Data successfully added", 'success');
    //                 setTimeout(() => location.reload(), 1500);
    //             } else if (resp == 2) {
    //                 alert_toast("Data successfully updated", 'success');
    //                 setTimeout(() => location.reload(), 1500);
    //             }
    //         }
    //     });
    // });

    // $('.edit_gallery').click(function(){
    // 	start_load()
    // 	var cat = $('#manage-gallery')
    // 	cat.get(0).reset()
    // 	cat.find("[name='id']").val($(this).attr('data-id'))
    // 	cat.find("[name='about']").val($(this).attr('data-about'))
    // 	cat.find("img").attr('src',$(this).attr('data-src'))
    // 	end_load()
    // })

    $('.delete_gallery').click(function() {
        _conf("Are you sure to delete this data?", "delete_gallery", [$(this).attr('data-id')]);
    });

    function delete_gallery(id) {
        start_load();
        $.ajax({
            url: 'ajax.php?action=delete_gallery',
            method: 'POST',
            data: {
                id: id
            },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Data successfully deleted", 'success');
                    setTimeout(() => location.reload(), 1500);
                }
            }
        });
    }

    $('table').dataTable();
</script>
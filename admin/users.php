<!-- <?php include 'db_connect.php'; ?> -->

<div class="container-fluid">
    <div class="row mb-3">
        <!-- <div class="col-lg-12  "> -->
            <!-- <h3 class="text-primary"><i class="fas fa-users"></i> User Accounts</h3> -->
            <!-- <button class="btn btn-primary btn-sm" id="new_user">
                <i class="fas fa-plus"></i> Add Account
            </button> -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card shadow-sm border-0">
              <div class="card-header bg-dark d-flex justify-content-between align-items-center bg-primary text-white ">
                <h4><i class="bx bx-user"></i> User Accounts</h4>
                <button class="btn btn-light btn-sm float-right" id="new_user">
                <i class="fas fa-plus"></i> Add Account
            </button>
              </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-info">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Level</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $type = ["", "Admin", "Staff", "Alumni"];
                                    $users = $conn->query("SELECT * FROM users ORDER BY name ASC");
                                    $i = 1;
                                    while ($row = $users->fetch_assoc()):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++; ?></td>
                                    <td><?php echo ucwords($row['name']); ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td class="text-center">
                                        <span class="badge <?php echo $row['type'] == 1 ? 'bg-primary text-white' : ($row['type'] == 2 ? 'bg-warning text-white' : 'bg-info text-white'); ?>">
                                            <?php echo $type[$row['type']]; ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-warning edit_user" data-id="<?php echo $row['id']; ?>" title="Edit User">
                                            <i class="fas fa-edit"></i>Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger delete_user" data-id="<?php echo $row['id']; ?>" title="Delete User">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
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
    .table {
        width: 100%;
    }
    .table-responsive {
        margin-top: 10px;
    }
    .badge {
        font-size: 0.9rem;
    }
</style>

<script>
	$('table').dataTable();
$('#new_user').click(function(){
	uni_modal('Add User Account','manage_user.php')
})
$('.edit_user').click(function(){
	uni_modal('Edit User','manage_user.php?id='+$(this).attr('data-id'))
})
$('.delete_user').click(function(){
		_conf("Are you sure to delete this user?","delete_user",[$(this).attr('data-id')])
	})
	function delete_user($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_user',
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

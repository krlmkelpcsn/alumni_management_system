<?php
include('db_connect.php');
session_start();

$meta = [];
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $meta = $result->fetch_assoc();
    }
    $stmt->close();
}
?>

<div class="container-fluid">
    <div id="msg"></div>
    
    <form action="" id="manage-user">    
        <input type="hidden" name="id" value="<?php echo isset($meta['id']) ? htmlspecialchars($meta['id']) : ''; ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" 
                   value="<?php echo isset($meta['name']) ? htmlspecialchars($meta['name']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" 
                   value="<?php echo isset($meta['username']) ? htmlspecialchars($meta['username']) : ''; ?>" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="<?php echo isset($meta['password']) ? $meta['password']: '' ?>" autocomplete="off">
        </div>
        <?php if (isset($meta['type']) && $meta['type'] == 3): ?>
            <input type="hidden" name="type" value="3">
        <?php else: ?>
            <?php if (!isset($_GET['mtype'])): ?>
                <div class="form-group">
                    <label for="type">User Type</label>
                    <select name="type" id="type" class="custom-select">
                        <option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected' : ''; ?>>Admin</option>
                    </select>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        
        <!-- <button type="submit" class="btn btn-primary">Save</button> -->
    </form>
</div>

<script>
  	$('#manage-user').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_user',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
		<!-- <option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected': '' ?>></option> -->
	})
</script>

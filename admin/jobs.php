<?php include('db_connect.php'); ?>

<div class="container-fluid">
    <style>
        * {
            font-family: Arial, sans-serif;
        }
        td {
            vertical-align: middle !important;
        }
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
        .btn {
            font-size: 0.9rem;
            border-radius: 0.3rem;
        }
        
    </style>

    <div class="col-lg-12">
        <!-- <div class="row mb-4 mt-4">
            <div class="col-md-12 text-center">
                <h2 class="text-primary">Jobs List</h2>
            </div> -->
        </div>
        <div class="row">
            <!-- Table Panel -->
            <div class="col-md-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="bx bx-briefcase"></i> Available Jobs</h4>
                        <button class="btn btn-light btn-sm" type="button" id="new_career">
                            <i class="fas fa-plus"></i> Add Jobs
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <thead class="table-info">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Company</th>
                                    <th class="text-center">Job Title</th>
                                    <th class="text-center">Posted By</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $jobs = $conn->query("SELECT c.*, u.name FROM careers c INNER JOIN users u ON u.id = c.user_id ORDER BY id DESC");
                                while ($row = $jobs->fetch_assoc()):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++; ?></td>
                                    <td class="text-center">
                                        <p><?php echo ucwords($row['company']); ?></p>
                                    </td>
                                    <td class="text-center">
                                        <p><?php echo ucwords($row['job_title']); ?></p>
                                    </td>
                                    <td class="text-center">
                                        <p class="badge bg-success text-white"><?php echo ucwords($row['name']); ?></p>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-info view_career" type="button" data-id="<?php echo $row['id']; ?>" title="View Job">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning edit_career" type="button" data-id="<?php echo $row['id']; ?>" title="Edit Job">
                                            <i class="fas fa-edit"></i> 
                                        </button>
                                        <button class="btn btn-sm btn-danger delete_career" type="button" data-id="<?php echo $row['id']; ?>" title="Delete Job">
                                            <i class="fas fa-trash-alt"></i> 
                                        </button>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table Panel -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('table').DataTable({
            responsive: true,
            autoWidth: false,
            lengthChange: false,
            pageLength: 10,
            language: {
                search: "Search records:"
            }
        });

        // New Career Button Click
        $('#new_career').click(function() {
            uni_modal("New Job Entry", "manage_career.php", 'mid-large');
        });

        // Edit Career Button Click
        $('.edit_career').click(function() {
            uni_modal("Edit Job Post", "manage_career.php?id=" + $(this).attr('data-id'), 'mid-large');
        });

        // View Career Button Click
        $('.view_career').click(function() {
            uni_modal("Job Opportunity", "view_jobs.php?id=" + $(this).attr('data-id'), 'mid-large');
        });

        // Delete Career Button Click
        $('.delete_career').click(function() {
            _conf("Are you sure you want to delete this job post?", "delete_career", [$(this).attr('data-id')], 'mid-large');
        });
    });

    // Function to Delete Career
    function delete_career(id) {
        start_load();
        $.ajax({
            url: 'ajax.php?action=delete_career',
            method: 'POST',
            data: { id: id },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Job post successfully deleted", 'success');
                    setTimeout(() => location.reload(), 1500);
                }
            }
        });
    }
</script>

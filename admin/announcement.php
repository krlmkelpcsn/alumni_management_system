<?php include('db_connect.php'); ?>

<div class="container-fluid">
    <style>
        * {
            font-family: Arial, sans-serif;
        }
        input[type=checkbox] {
            transform: scale(1.5);
            padding: 10px;
        }
        td {
            vertical-align: middle !important;
        }
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
        .truncate {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .btn {
            border-radius: 0.3rem;
            font-size: 0.9rem;
        }
    </style>

    <div class="col-lg-12">
        <!-- <div class="row mb-4 mt-4">
            <div class="col-md-12 text-center">
                <h2 class="text-primary">List of Forum Topics</h2>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="bx bx-chat"></i> Announcements</h4>
                        <button class="btn btn-light btn-sm" type="button" id="new_announcement">
                            <i class="fas fa-plus"></i> Add Announcement
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <colgroup>
                                    <!-- <col width="5%">
                                    <col width="15%">
                                    <col width="30%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="25%"> -->
                                </colgroup>
                                <thead class="table-info">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Created</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    $announcement = $conn->query("SELECT a.*, u.name FROM announcements a INNER JOIN users u ON u.id = a.user_id ORDER BY a.id DESC");
                                    while ($row = $announcement->fetch_assoc()):
                                        $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
                                        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                                        $desc = strtr(html_entity_decode($row['content']), $trans);
                                        $desc = str_replace(["<li>", "</li>"], ["", ","], $desc);
                                    
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++; ?></td>
                                        <td><p class="text-center"><?php echo ucwords($row['title']); ?></p></td>
                                        <td><p class="truncate text-center"><?php echo $desc; ?></p></td>
                                      
                                        <td class="text-center"><p class='badge bg-success text-white'><?php echo ucwords($row['name']); ?></p></td>
                                        <td class="text-center" type="button" data-id="<?php echo $row['status']; ?>" >
                                            <?php if ($row['status'] == 'approved'): ?>
                                                <span class="badge bg-success text-white">Approved</span>
                                            <?php elseif ($row['status'] == 'rejected'): ?>
                                                <span class="badge text-white bg-danger">Rejected</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary text-white">Pending</span>
                                            <?php endif; ?>
                                        </td>
                                        <!-- <td class="text-center"><p class='badge bg-secondary text-white'>Pending</p></td> -->
                                        
                                        <td class="text-center">
                                             <!-- <a class="btn btn-sm btn-info view_forum" href="../index.php?page=view_forum&id=<?php echo $row['id']; ?>" target="_blank" data-id="<?php echo $row['id']; ?>" title="View Topic">
                                                <i class="fas fa-eye"></i> View
                                            </a> -->
                                            <?php if ($_SESSION['login_type'] == 1): ?>
                                            <button class="btn btn-sm btn-warning edit_announcement" type="button" data-id="<?php echo $row['id']; ?>" title="View Announcement">
                                                <i class="fas fa-eye"></i> 
                                            </button> 
                                            <?php endif; ?>
                                            <button class="btn btn-sm btn-danger delete_announcement" type="button" disabled data-id="<?php echo $row['id']; ?>" title="Delete Announcement">
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
            </div>
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
                search: "Search announcement:"
            }
        });

        $('#new_announcement').click(function() {
            uni_modal("New Announcement Entry", "manage_announcement.php", 'mid-large');
        });

        $('.edit_announcement').click(function() {
            uni_modal("Manage Status", "manage_status.php?id=" + $(this).attr('data-id'), 'mid-large');
        });

        $('.delete_announcement').click(function() {
            _conf("Are you sure you want to delete this data?", "delete_announcement", [$(this).attr('data-id')], 'mid-large');
        });
    });

    // Function to Delete Forum
    function delete_announcement(id) {
        start_load();
        $.ajax({
            url: 'ajax.php?action=delete_announcement',
            method: 'POST',
            data: { id: id },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Data successfully deleted", 'success');
                    setTimeout(() => location.reload(), 1500);
                }
            }
        });
    }
</script>



<!-- Dashboard - View all Total Products, Total Orders, Total Sales, Total Income.

Product Management - Create, Read, Update, Delete.

Users Management - Create, Read, Update, Delete

History - View all the products that have been created, updated, and deleted. -->
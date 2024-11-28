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
                        <h4 class="mb-0"><i class="bx bx-chat"></i> Forum Topics</h4>
                        <button class="btn btn-light btn-sm" type="button" id="new_forum">
                            <i class="fas fa-plus"></i> Add Forum
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
                                        <th>Topic</th>
                                        <th>Description</th>
                                        <th class="text-center">Created</th>
                                        <!-- <th>Comments</th> -->
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    $Forum = $conn->query("SELECT f.*, u.name FROM forum_topics f INNER JOIN users u ON u.id = f.user_id ORDER BY f.id DESC");
                                    while ($row = $Forum->fetch_assoc()):
                                        $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
                                        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                                        $desc = strtr(html_entity_decode($row['description']), $trans);
                                        $desc = str_replace(["<li>", "</li>"], ["", ","], $desc);
                                        $count_comments = $conn->query("SELECT * FROM forum_comments WHERE id = " . $row['id'])->num_rows;
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++; ?></td>
                                        <td><p><?php echo ucwords($row['title']); ?></p></td>
                                        <td><p class="truncate"><?php echo $desc; ?></p></td>
                                        <td class="text-center"><p class='badge bg-success text-white'><?php echo ucwords($row['name']); ?></p></td>
                                        <!-- <td class="text-center"><p class='badge bg-success text-white'><?php echo number_format($count_comments ); ?></p></td> -->
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-info view_forum" href="../index.php?page=view_forum&id=<?php echo $row['id']; ?>" target="_blank" data-id="<?php echo $row['id']; ?>" title="View Topic">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <button class="btn btn-sm btn-warning edit_forum" type="button" data-id="<?php echo $row['id']; ?>" title="Edit Topic">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger delete_forum" type="button" data-id="<?php echo $row['id']; ?>" title="Delete Topic">
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
                search: "Search topics:"
            }
        });

        // New Forum Button Click
        $('#new_forum').click(function() {
            uni_modal("New Forum Entry", "manage_forum.php", 'mid-large');
        });

        // Edit Forum Button Click
        $('.edit_forum').click(function() {
            uni_modal("Edit Forum Topic", "manage_forum.php?id=" + $(this).attr('data-id'), 'mid-large');
        });

        // Delete Forum Button Click
        $('.delete_forum').click(function() {
            _conf("Are you sure you want to delete this forum topic?", "delete_forum", [$(this).attr('data-id')], 'mid-large');
        });
    });

    // Function to Delete Forum
    function delete_forum(id) {
        start_load();
        $.ajax({
            url: 'ajax.php?action=delete_forum',
            method: 'POST',
            data: { id: id },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Forum topic successfully deleted", 'success');
                    setTimeout(() => location.reload(), 1500);
                }
            }
        });
    }
</script>

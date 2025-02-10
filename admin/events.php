<?php include('db_connect.php'); ?>

<div class="container-fluid">
    <div class="col-lg-12">
        <!-- <div class="row mb-4 mt-4">
            <div class="col-md-12 text-center">
                <h2 class="text-primary">Event Management</h2>
            </div> -->
        </div>
        <div class="row">
            <!-- Table Panel -->
            <div class="col-md-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="bx bx-calendar-alt"></i> List of Events</h4>
                        <a class="btn btn-light btn-sm" href="index.php?page=manage_event" id="new_event">
                            <i class="fas fa-plus"></i> Add Event
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover ">
                            <colgroup>
                                <col width="5%">
                                <col width="20%">
                                <col width="15%">
                                <col width="30%">
                                <col width="15%">
                                <col width="15%">
                            </colgroup>
                            <thead class="table-info ">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Schedule</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Participate</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $events = $conn->query("SELECT * FROM events ORDER BY unix_timestamp(schedule) DESC");
                                while ($row = $events->fetch_assoc()):
                                    $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
                                    unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                                    $desc = strtr(html_entity_decode($row['content']), $trans);
                                    $desc = str_replace(array("<li>", "</li>"), array("", ","), $desc);
                                    $commits = $conn->query("SELECT * FROM event_commits WHERE event_id = " . $row['id'])->num_rows;
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++; ?></td>
                                    <td>
                                        <p class="mb-0"><?php echo date("M d, Y h:i A", strtotime($row['schedule'])); ?></p>
                                    </td>
                                    <td>
                                        <p class="mb-0"><?php echo ucwords($row['title']); ?></p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-truncate" style="max-width: 300px;"><?php echo strip_tags($desc); ?></p>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-success text-white"><?php echo $commits; ?></span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-info view_event" type="button" data-id="<?php echo $row['id']; ?>">
                                            <i class="fas fa-eye"></i> 
                                        </button>
                                        <button class="btn btn-sm btn-warning edit_event" type="button" data-id="<?php echo $row['id']; ?>">
                                            <i class="fas fa-edit"></i> 
                                        </button>
                                        <button class="btn btn-sm btn-danger delete_event" type="button" data-id="<?php echo $row['id']; ?>">
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

<style>
    .btn {
        border-radius: 0.3rem;
    }
    td {
        vertical-align: middle !important;
    }
    td p {
        margin: unset;
    }
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }
</style>

<script>
    $(document).ready(function() {
        $('table').dataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthChange": false,
            "pageLength": 10,
            "language": {
                "search": "Search records:"
            }
        });
    });

    $('.view_event').click(function() {
        window.open("../index.php?page=view_event&id=" + $(this).attr('data-id'));
    });

    $('.edit_event').click(function() {
        location.href = "index.php?page=manage_event&id=" + $(this).attr('data-id');
    });

    $('.delete_event').click(function() {
        _conf("Are you sure you want to delete this event?", "delete_event", [$(this).attr('data-id')]);
    });

    function delete_event(id) {
        start_load();
        $.ajax({
            url: 'ajax.php?action=delete_event',
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

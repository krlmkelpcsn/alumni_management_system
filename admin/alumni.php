<?php include('db_connect.php'); ?>

<div class="container-fluid">
    <div class="col-lg-12">
        <!-- <div class="row mb-4 mt-4">
            <div class="col-md-12 text-center">
                <h2 class="text-primary">List of Alumni</h2>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="bx bx-user"></i> Alumni Management</h4>
                        <!-- <a class="btn btn-light btn-sm" href="index.php?page=manage_alumni" id="new_alumni">
                            <i class="fas fa-plus"></i> Add
                        </a> -->
                    </div>
                    <div class="card-header bg-light d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <p class="mb-0 mr-1">Occupation: </p>
                        <select class="form-select form-select-sm" id="filter_occupation">
                            <option value="">All</option>
                            <option value="unemployed">Unemployed</option>
                        </select>
                        </div>
                    
                        <p class="mb-0 ml-3" id="unemployed_percentage"></p>
                    </div>
                    <script>
                        $(document).ready(function() {
                            updateUnemployedPercentage();

                            $('#filter_occupation').change(function() {
                                var selectedOccupation = $(this).val();
                                $('tbody tr').each(function() {
                                    var occupation = $(this).find('td:nth-child(6)').text().trim();
                                    if (selectedOccupation === '' || occupation.toLowerCase() === selectedOccupation) {
                                        $(this).show();
                                    } else {
                                        $(this).hide();
                                    }
                                });
                            });
                        });

                        function updateUnemployedPercentage() {
                            var totalAlumni = $('tbody tr').length;
                            var unemployedAlumni = $('tbody tr').filter(function() {
                                return $(this).find('td:nth-child(6)').text().trim().toLowerCase() === 'unemployed';
                            }).length;
                            var percentage = (unemployedAlumni / totalAlumni) * 100;
                            $('#unemployed_percentage').text('Unemployed: ' + percentage.toFixed(2) + '%');
                        }
                    function updateUnemployedPercentage() {
                        var totalAlumni = $('tbody tr').length;
                        var unemployedAlumni = $('tbody tr').filter(function() {
                            return $(this).find('td:nth-child(6)').text().trim().toLowerCase() === 'unemployed';
                        }).length;
                        var percentage = (unemployedAlumni / totalAlumni) * 100;
                        $('#unemployed_percentage').html('Unemployed: ' + percentage.toFixed(2) + '% <div class="progress"><div class="progress-bar" role="progressbar" style="width: ' + percentage.toFixed(2) + '%;" aria-valuenow="' + percentage.toFixed(2) + '" aria-valuemin="0" aria-valuemax="100"></div></div>');
                    }
                    </script>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-info">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Batch</th>
                                        <th>Occupation</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    $alumni = $conn->query("SELECT a.*,c.course,Concat(a.lastname,', ',a.firstname,' ',a.middlename) as name FROM alumnus_bio a INNER JOIN courses c ON c.id = a.course_id ORDER BY Concat(a.lastname,', ',a.firstname,' ',a.middlename) ASC");
                                    while ($row = $alumni->fetch_assoc()):
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++; ?></td>
                                        <td class="text-center">
                                            <div class="avatar">
                                                <img src="assets/uploads/<?php echo $row['avatar']; ?>" alt="Avatar">
                                            </div>
                                        </td>
                                        <td><?php echo ucwords($row['name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['contact'])?></td>
                                        <td><?php echo $row['course']; ?></td>
                                        <td><?php echo htmlspecialchars($row['connected_to'])?></td>
                                        <td class="text-center">
                                            <?php if ($row['status'] == 1): ?>
                                                <span class="badge bg-success text-white">Verified</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">Not Verified</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-info view_alumni" type="button" data-id="<?php echo $row['id']; ?>" title="View Alumni">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                            <button class="btn btn-sm btn-danger delete_alumni" type="button" data-id="<?php echo $row['id']; ?>" title="Delete Alumni">
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

<style>
    .btn {
        border-radius: 0.3rem;
    }
    td {
        vertical-align: middle !important;
    }
    .avatar {
        display: flex;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        overflow: hidden;
        align-items: center;
        justify-content: center;
        border: 2px solid #007bff;
    }
    .avatar img {
        width: 100%;
        height: auto;
        border-radius: 50%;
    }
</style>

<script>
    // $(document).ready(function() {
    //     // Initialize DataTable
    //     $('table').DataTable({
    //         responsive: true,
    //         autoWidth: false,
    //         lengthChange: false,
    //         pageLength: 10,
    //         language: {
    //             search: "Search alumni:"
    //         }
    //     });

        // View Alumni Button Click
        $('.view_alumni').click(function() {
            uni_modal("Account Information", "view_alumni.php?id=" + $(this).attr('data-id'), 'mid-large');
        });

        // Delete Alumni Button Click
        $('.delete_alumni').click(function() {
            _conf("Are you sure you want to delete this alumni?", "delete_alumni", [$(this).attr('data-id')]);
        });


    // Function to Delete Alumni
    function delete_alumni(id) {
        start_load();
        $.ajax({
            url: 'ajax.php?action=delete_alumni',
            method: 'POST',
            data: { id: id },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Alumni data successfully deleted", 'success');
                    setTimeout(() => location.reload(), 1500);
                }
            }
        });
    }
</script>

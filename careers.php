<?php 
include 'admin/db_connect.php'; 
?>


<style>
    * {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #f8f9fa;
    }

    header {
        /* background: linear-gradient(to right, #4b6cb7, #182848); */
        /* color: white; */
        padding-top: 8rem ;
        text-align: center;
    }


    .job-list {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin: 1rem auto;
        max-width: 900px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .job-list:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .job-list .card-body {
        padding: 2rem;
        text-align: left;
    }

    .job-list h3 {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .job-list .filter-txt small {
        font-size: 0.9rem;
        color: #555;
        display: inline-block;
        margin-right: 1rem;
    }

    .job-list hr {
        border-top: 1px solid #ddd;
        margin: 1rem 0;
    }

    .job-list .badge {
        background-color: #17a2b8;
        color: white;
        font-size: 0.8rem;
        border-radius: 20px;
    }

    .job-list .btn {
        background-color: #007bff;
        border: none;
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .job-list .btn:hover {
        background-color: #0056b3;
    }
    .search_container { 
    align-self:center;
    padding: 0 15em;
    }


    header .head h1 {
        color: #4e73df;
        font-size: 2.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }

</style>
<div class="container pt-4">

<header class="">
            <div class="head container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end mb-4 page-title">
                        <h1 class="mt-3 display-4 fw-bold">Job Opportunities</h1>
                        <p>Find the perfect role for you!</p>
                        <!-- <hr class="divider my-4" /> -->

                    <div class="col-md-12 mb-2 justify-content-center">
                    </div>                        
                    </div>
                    
                </div>
            </div>
        </header>
<!-- <header>
    <h1 class="head display-4 fw-bold">Job Opportunities</h1>
    <p>Find the perfect role for you!</p>
</header> -->

<div class="search_container d-flex justify-content-center mb-5">
        <div class="input-group" style="width: 60%;">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-search"></i></span>
            </div>
            <input type="text" class="form-control" id="filter" placeholder="Search for jobs, companies, or locations..." aria-label="Filter">
            <button class="btn btn-primary ml-2" id="search">Search</button>
        </div>
    </div>

<?php
$event = $conn->query("SELECT c.*, u.name FROM careers c INNER JOIN users u ON u.id = c.user_id ORDER BY id DESC");
while ($row = $event->fetch_assoc()):
    $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
    unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
    $desc = strtr(html_entity_decode($row['description']), $trans);
    $desc = str_replace(["<li>", "</li>"], ["", ","], $desc);
?>
    <div class="card job-list" data-id="<?php echo $row['id'] ?>">
        <div class="card-body">
            <h3><b class="filter-txt"><?php echo ucwords($row['job_title']) ?></b></h3>
            <div>
                <small class="filter-txt"><b><i class="fa fa-building"></i> <?php echo ucwords($row['company']) ?></b></small>
                <small class="filter-txt"><b><i class="fa fa-map-marker"></i> <?php echo ucwords($row['location']) ?></b></small>
            </div>
            <hr>
            <p class="truncate filter-txt"><?php echo strip_tags($desc) ?></p>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <span class="badge"><b>Posted by: <?php echo $row['name'] ?></b></span>
                <button class="btn btn-primary read_more" data-id="<?php echo $row['id'] ?>">Read More</button>
            </div>
        </div>
    </div>
<?php endwhile; ?>
</div>

<script>
$('#new_career').click(function(){
        uni_modal("New Job Hiring","manage_career.php",'mid-large')
    })
    $('.read_more').click(function(){
        uni_modal("Career Opportunity","view_jobs.php?id="+$(this).attr('data-id'),'mid-large')
    })
    $('.gallery-img img').click(function(){
        viewer_modal($(this).attr('src'))
    })

   $('#filter').keypress(function(e){
    if(e.which == 13)
        $('#search').trigger('click')
   })
    $('#search').click(function(){
        var txt = $('#filter').val()
        start_load()
        if(txt == ''){
        $('.job-list').show()
        end_load()
        return false;
        }
        $('.job-list').each(function(){
            var content = "";
            $(this).find(".filter-txt").each(function(){
                content += ' '+$(this).text()
            })
            if((content.toLowerCase()).includes(txt.toLowerCase()) == true){
                $(this).toggle(true)
            }else{
                $(this).toggle(false)
            }
        })
        end_load()
    })

</script>
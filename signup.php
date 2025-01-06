<?php 
include 'admin/db_connect.php'; 
?>
<style>
    * {
        font-family:system-ui;
    }
    .masthead{
        min-height: 23vh !important;
        height: 23vh !important;
    }
     .masthead:before{
        min-height: 23vh !important;
        height: 23vh !important;
    }
    /* img#cimg{
        max-height: 10vh;
        max-width: 6vw;
    } */
    .head {
        padding-top:7rem;
    }
    .about-header {
            margin-top:6em;
            /* background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('img/home-background.webp') no-repeat center center/cover; */
            
        }
        .about-header h1 {
            color: #4e73df;
            font-size: 2.5rem;
            /* margin-bottom: 1rem;
            font-weight: 700; */
        }
        .about-header p {
            font-size: 1.2rem;
            color: #555;
        }

        .container input, .container button {
            border-radius: 8px;
        }
</style>
<div class="about-header text-center py-5" >
    <div class="container">
        <h1 class="display-4 fw-bold">Sign Up</h1>
        
    </div>
    </div>

    <div class="container mb-5">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white text-center">
                <h4>Create an Account</h4>
            </div>
            <div class="card-body">
                <form action="" id="create_account" novalidate>
                    <!-- Name Fields -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name" required>
                        </div>
                        <div class="col-md-4">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" required>
                        </div>
                        <div class="col-md-4">
                            <label for="middlename" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter middle name">
                        </div>
                    </div>

                    <!-- Gender and Batch -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label for="gender" class="form-label">Gender</label>
                            <br>
                            <select class="form-select" id="gender" name="gender" required>
                                <option selected disabled>Choose...</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="course_id" class="form-label">Batch</label>
                            <br>
                            <select class="form-select" id="course_id" name="course_id" required>
                                <option selected disabled>Choose...</option>
                                <?php 
                                $course = $conn->query("SELECT * FROM courses order by course asc");
                                while($row=$course->fetch_assoc()): ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['course'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="occupation" class="form-label">Occupation</label>
                            <input type="text" class="form-control" id="occupation" name="connected_to" placeholder="Enter occupation">
                        </div>
                    </div>

                    <!-- Image Upload, Email, and Password -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label for="img" class="form-label">Image</label>
                            <input type="file" class="form-control" id="img" name="img" onchange="displayImg(this, $(this))">
                            <img src="" alt="Preview" id="cimg" class="img-fluid mt-2 rounded d-none">
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                        </div>
                        <div class="col-md-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center mt-4">
                        <button type="submit" id="submit" href="index.php?page=login" class="btn btn-primary px-4 ">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- <div class="container mt-3 pt-2">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <form action="" id="create_account">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="control-label">First Name</label>
                                        <input type="text" class="form-control" name="firstname" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Middle Name</label>
                                        <input type="text" class="form-control" name="middlename" >
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Gender</label>
                                        <select class="custom-select" name="gender" required>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                        <div class="col-md-4">
                                            <label for="" class="control-label">Batch</label>
                                            <input type="input" class="form-control datepickerY" name="batch" required>
                                        </div>
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Batch</label>
                                        <select class="custom-select select2" name="course_id" required>
                                            <option></option>
                                            <?php 
                                            $course = $conn->query("SELECT * FROM courses order by course asc");
                                            while($row=$course->fetch_assoc()):
                                            ?>
                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['course'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Occupation</label>
                                        <input name="connected_to" id="" cols="30" rows="3" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Image</label>
                                        <input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
                                        <img src="" alt="" id="cimg">

                                    </div>  
                                    <div class="col-md-4">
                                    <label for="" class="control-label">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="control-label">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                </div>
                                <div class="row">
                                </div>
                                <div id="msg">
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button id="submit" class="btn btn-primary">Sign Up</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


<script>
    // alert ('')
    // document.getElementById("submit").onclick;
   $('.datepickerY').datepicker({
        format: " yyyy", 
        viewMode: "years", 
        minViewMode: "years"
   })
   $('.select2').select2({
    placeholder:"Please Select Here",
    width:"100%"
   });
   function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$('#create_account').submit(function(e){
    e.preventDefault()
    start_load()
    $.ajax({
        url:'admin/ajax.php?action=signup',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success:function(resp){
            if(resp == 1){
                location.replace('index.php')
            }else{
                alert_toast("Data created successfully ", 'success');
                setTimeout(() => location.reload(), 1500);
            }
        }
    })
})
</script>
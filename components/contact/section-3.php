<script>
    function openModal() {
        $(document).ready(function() {
            $("#exampleModal").modal("show");
        });
    }
</script>

<div class="container mt-5 mb-5" id="career-section">
    <div class="section-header">
        <h2>Career</h2>
        <p>Checkout job opening in Sewa Hospital</p>
    </div>

    <?php

    if (isset($_POST['apply'])) {
        $job_applied_for = $_POST['job_applied_for'];
        $job_candidate_name = $_POST['job_candidate_name'];
        $job_candidate_contact = $_POST['job_candidate_contact'];
        $job_candidate_email = $_POST['job_candidate_email'];

        $targetDir = "cv/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('pdf');

        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                $upload_cv_query = "INSERT INTO `job`(
                    `job_applied_for`,
                    `job_candidate_name`,
                    `job_candidate_contact`,
                    `job_candidate_email`,
                    `job_candidate_cv`
                )
                VALUES(
                    '$job_applied_for',
                    '$job_candidate_name',
                    '$job_candidate_contact',
                    '$job_candidate_email',
                    '$fileName'
                )";
                $upload_cv_res = mysqli_query($connection, $upload_cv_query);
                if ($upload_cv_res) {
                    $to = "info@sewahospitallko.com, connectonlyn@onlynus.com";
                    $subject = "Candidate Applied for Job | Sewa Hospital ";
                    $message = "
<html>
<head>
</head>
<body>
<table style='border: 1px solid #e7e7e7e7'>
<tr>
<th>Candidate Name</th>
<th>Contact</th>
<th>Email</th>
</tr>
<tr>
<td>$job_candidate_name</td>
<td>$job_candidate_contact</td>
<td>$job_candidate_email</td>
</tr>
</table>
</body>
</html>
";
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    mail($to, $subject, $message, $headers);
    ?>
                    <div class="alert alert-success mb-3 mt-3" role="alert">
                        Thank you applying for this job. We will connect with you shortly!
                    </div>
            <?php


                }
            }
        } else { ?>
            <div class="alert alert-danger mb-3 mt-3" role="alert">
                Error!
            </div>
        <?php
        }
    }

    $fetch = "SELECT * FROM `career` WHERE `career_status` = '1'";
    $fetch_res = mysqli_query($connection, $fetch);
    while ($row = mysqli_fetch_assoc($fetch_res)) {
        $career_id = $row['career_id'];
        $career_title = $row['career_title'];
        $career_det = $row['career_det'];
        $career_status = $row['career_status'];
        ?>
        <div class="career-bar">
            <div class="career-bar-content">
                <h3><?php echo $career_title ?></h3>
                <p><?php echo $career_det ?></p>
            </div>

            <form action="" method="post">
                <input type="text" value="<?php echo $career_id ?>" name="career_id" hidden>
                <button type="submit" name="open" class="career-bar-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Apply
                    Now</button>
            </form>
        </div>
        <?php }
    if (isset($_POST['open'])) {
        echo "<script>openModal();</script>";
        $career_id = $_POST['career_id'];

        $query = "SELECT * FROM `career` WHERE `career_id` = '$career_id'";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $career_title = $row['career_title'];
        ?>
</div>

<!-- Modal -->
<div class="modal fade hide" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel">Applying for <?php echo $career_title ?></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" value="<?php echo $career_id ?>" name="job_applied_for" hidden>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="job_candidate_name" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mobile Number</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="job_candidate_contact" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="job_candidate_email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Upload CV</label>
                        <input type="file" class="form-control" name="file" id="file">
                    </div>
                    <button type="submit" name="apply" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php }
    } ?>
</div>
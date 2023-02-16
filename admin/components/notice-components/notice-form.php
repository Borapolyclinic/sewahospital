<div class="dashboard-header">
    <h2>Add Notice</h2>
    <p>All notices added from here will be visible on the main website</p>
    <?php
    include('includes/db.php');
    if (isset($_POST['submit'])) {
        $notice_date = mysqli_real_escape_string($connection, $_POST['notice_date']);
        $notice_title = mysqli_real_escape_string($connection, $_POST['notice_title']);
        $notice_details = mysqli_real_escape_string($connection, $_POST['notice_details']);
        $notice_status = "1";

        if (empty($notice_title) || empty($notice_details)) { ?>
    <div class="alert alert-warning w-50 mt-3 mb-3" role="alert">
        Notice Title OR Notice Details cannot be left empty
    </div>
    <?php
        } else {
            $query = "INSERT INTO `notices`(
                `notice_date`,
                `notice_title`,
                `notice_details`,
                `notice_status`
            )
            VALUES(
                '$notice_date',
                '$notice_title',
                '$notice_details',
                '$notice_status'
            )";
            $result = mysqli_query($connection, $query);

            if (!$result) { ?>

    <div class="alert alert-danger w-50 mt-3 mb-3" role="alert">
        Looks like there was some problem creating this notice. Please retry!
    </div>
    <?php } else { ?>
    <div class="alert alert-success w-50 mt-3 mb-3" role="alert">
        Notice is Live!
    </div>
    <?php  }
        }
    }
    ?>
</div>



<form action="" method="POST" class="add-notice-form">
    <div class="form-floating mb-3">
        <input type="date" name="notice_date" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Date</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" name="notice_title" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Title</label>
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" name="notice_details" placeholder="Leave a comment here" id="floatingTextarea2"
            style="height: 100px"></textarea>
        <label for="floatingTextarea2">Notice Details</label>
    </div>
    <button type="submit" name="submit" class="add-notice-btn w-100">Add Notice</button>
</form>
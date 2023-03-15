<div class="notice-form-row mb-5">
    <div class="col-md-6 p-2">
        <div class="dashboard-header">
            <h4>Edit Frequently Asked Questions</h4>
            <p>All FAQ's added from here will be visible on the <a href="https://sewahospitallko.com/contact.php" target="_blank">contact page</a>
                of the main website</p>
        </div>

        <?php
        include('includes/db.php');

        if (isset($_POST['update'])) {
            $faq_id = $_POST['faq_id'];
            $faq_ques = mysqli_real_escape_string($connection, $_POST['faq_ques']);
            $faq_details = mysqli_real_escape_string($connection, $_POST['faq_details']);

            $update = "UPDATE `faq` SET `faq_ques` = '$faq_ques', `faq_details` = '$faq_details' WHERE `faq_id` = '$faq_id'";
            $update_res = mysqli_query($connection, $update);

            if (!$update_res) { ?>
                <div class="alert alert-warning" role="alert">
                    Error!.
                </div>

            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    Success! FAQ updated. <a href="FAQ.php"> Go back</a>
                </div>
            <?php
            }
        }

        if (isset($_POST['edit'])) {
            $faq_id = mysqli_real_escape_string($connection, $_POST['faq_id']);

            $search = "SELECT * FROM `faq` WHERE `faq_id` = '$faq_id'";
            $search_r = mysqli_query($connection, $search);
            if ($search_r) {
                $new_faq_id = "";
                $new_faq_ques = "";
                $new_faq_details = "";
                while ($row = mysqli_fetch_assoc($search_r)) {
                    $new_faq_id = $row['faq_id'];
                    $new_faq_ques = $row['faq_ques'];
                    $new_faq_details = $row['faq_details'];
                } ?>


                <form action="" method="POST" class="add-notice-form">
                    <input type="text" name="faq_id" value="<?php echo $new_faq_id ?>" hidden>
                    <div class="form-floating mb-3">
                        <input type="text" name="faq_ques" class="form-control" id="floatingPassword" value="<?php echo $new_faq_ques ?>" placeholder="Password">
                        <label for="floatingPassword">FAQ Question</label>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">FAQ Details</label>
                        <textarea name="faq_details" class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $new_faq_details ?></textarea>
                    </div>

                    <button type="submit" name="update" class="add-notice-btn w-100">Update FAQ</button>
                </form>
        <?php }
        }
        ?>
    </div>

</div>
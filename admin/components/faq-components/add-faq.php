<div class="notice-form-row mb-5">
    <div class="col-md-6 p-2">
        <div class="dashboard-header">
            <h4>Add Frequently Asked Questions</h4>
            <p>All FAQ's added from here will be visible on the <a href="https://sewahospitallko.com/contact.php" target="_blank">contact page</a>
                of the main website</p>
        </div>

        <?php
        include('includes/db.php');
        if (isset($_POST['submit'])) {
            $faq_ques = mysqli_real_escape_string($connection, $_POST['faq_ques']);
            $faq_details = mysqli_real_escape_string($connection, $_POST['faq_details']);

            $insert_faq = "INSERT INTO `faq`(
                `faq_ques`,
                `faq_details`
            )
            VALUES(
                '$faq_ques',
                '$faq_details'
            )";
            $insert_faq_r = mysqli_query($connection, $insert_faq);
            if (!$insert_faq_r) { ?>
                <div class="alert alert-danger" role="alert">
                    Failed! FAQ could not be created.
                </div>

            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    Success! FAQ created.
                </div>
        <?php
            }
        }
        ?>

        <form action="" method="POST" class="add-notice-form">
            <div class="form-floating mb-3">
                <input type="text" name="faq_ques" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">FAQ Question</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="faq_details" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">FAQ Details</label>
            </div>
            <button type="submit" name="submit" class="add-notice-btn w-100">Add FAQ</button>
        </form>
    </div>

    <div class="col-md-6 p-2">
        <div class="dashboard-header">
            <h4>View all FAQ's</h4>
            <p>View or Delete past FAQ's uploaded by you</p>
        </div>
        <div class="view-notice-section">
            <div class="accordion" id="accordionExample">
                <?php

                if (isset($_POST['delete'])) {
                    $faq_id = $_POST['faq_id'];

                    $delete_query = "DELETE FROM `faq` WHERE `faq_id` = '$faq_id'";
                    $delete_res = mysqli_query($connection, $delete_query);

                    if ($delete_res) { ?>
                        <div class="alert alert-danger" role="alert">
                            FAQ deleted!
                        </div>
                    <?php
                    }
                }


                $fetch_faq = "SELECT * FROM `faq`";
                $fetch_faq_r = mysqli_query($connection, $fetch_faq);
                $fetch_count = mysqli_num_rows($fetch_faq_r);

                if ($fetch_count == 0) { ?>
                    <div class="alert alert-warning" role="alert">
                        No FAQ's added by you.
                    </div>
                    <?php } else {
                    while ($row = mysqli_fetch_assoc($fetch_faq_r)) {
                        $faq_id = $row['faq_id'];
                        $faq_ques = $row['faq_ques'];
                        $faq_details = $row['faq_details']; ?>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $faq_id ?>" aria-expanded="false" aria-controls="collapseOne">
                                    <?php echo $faq_ques ?>
                                </button>
                            </h2>
                            <div id="faq<?php echo $faq_id ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p><?php echo $faq_details ?></p>

                                    <div class="add-faq-btn-row">
                                        <form action="edit-faq.php" method="POST">
                                            <input type="text" name="faq_id" value="<?php echo $faq_id ?>" hidden>
                                            <button type="submit" name="edit" class="btn btn-sm add-fq-btn btn-warning">Edit</button>
                                        </form>

                                        <form action="" method="POST">
                                            <input type="text" name="faq_id" value="<?php echo $faq_id ?>" hidden>
                                            <button type="submit" name="delete" class="btn btn-sm add-fq-btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
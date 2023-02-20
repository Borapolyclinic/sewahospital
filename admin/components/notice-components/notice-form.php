<div class="notice-form-row mb-5">
    <div class="col-md-6 p-2">
        <div class="dashboard-header">
            <h4>Add Notice</h4>
            <p>All notices added from here will be visible on the main website</p>
            <?php
            include('includes/db.php');
            if (isset($_POST['submit'])) {
                $notice_date = mysqli_real_escape_string($connection, $_POST['notice_date']);
                $notice_title = mysqli_real_escape_string($connection, $_POST['notice_title']);
                $notice_details = mysqli_real_escape_string($connection, $_POST['notice_details']);
                $notice_status = "1";

                if (empty($notice_title) || empty($notice_details)) { ?>
            <div class="alert alert-warning mt-3 mb-3" role="alert">
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

            <div class="alert alert-danger mt-3 mb-3" role="alert">
                Looks like there was some problem creating this notice. Please retry!
            </div>
            <?php } else { ?>
            <div class="alert alert-success mt-3 mb-3" role="alert">
                Notice is Live!
            </div>
            <?php  }
                }
            }
            ?>
        </div>



        <form action="" method="POST" class="add-notice-form">
            <div class="form-floating mb-3">
                <input type="date" name="notice_date" class="form-control" id="floatingInput"
                    placeholder="name@example.com">
                <label for="floatingInput">Date</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="notice_title" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Title</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="notice_details" placeholder="Leave a comment here"
                    id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Notice Details</label>
            </div>
            <button type="submit" name="submit" class="add-notice-btn w-100">Add Notice</button>
        </form>
    </div>
    <div class="col-md-6 p-2">
        <div class="dashboard-header">
            <h4>View all notices</h4>
            <p>View or Delete past notices uploaded by you</p>
        </div>
        <div class="view-notice-section">
            <div class="table-responsive">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['delete'])) {
                            $notice_id = $_POST['notice_id'];
                            $delete_query = "DELETE FROM `notices` WHERE `notice_id` = '$notice_id'";
                            $delete_res = mysqli_query($connection, $delete_query);
                            if ($delete_res) {
                                echo "<div class='alert alert-success' role='alert'>Notice Deleted!</div>";
                            }
                        }

                        $search_query = "SELECT * FROM `notices` ORDER BY `notice_added_date` DESC LIMIT 10";
                        $search_result = mysqli_query($connection, $search_query);

                        while ($row = mysqli_fetch_assoc($search_result)) {
                            $notice_id = $row['notice_id'];
                            $notice_date = $row['notice_date'];
                            $notice_title = $row['notice_title'];
                        ?>
                        <tr>
                            <td><?php echo $notice_date ?></td>
                            <th scope="row"><?php echo $notice_title ?></th>
                            <td>
                                <form action="" method="POST">
                                    <input type="text" value="<?php echo $notice_id ?>" name="notice_id" hidden>
                                    <button type="submit" name="delete" class="btn btn-warning">
                                        <ion-icon name="trash-outline"></ion-icon> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
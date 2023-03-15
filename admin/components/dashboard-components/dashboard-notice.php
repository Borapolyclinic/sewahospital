<?php
include('includes/db.php');
$search_query = "SELECT * FROM `notices`";
$search_result = mysqli_query($connection, $search_query);
$count = mysqli_num_rows($search_result);

if ($count > 0) {
?>
<div class="section">
    <div class="dashboard-header">
        <h5>Notices</h5>
        <p>Glimpse of all the notices added by you.</p>
    </div>
    <div class="dashboard-db-notice-section col-md-6">
        <?php

            $query = "SELECT * FROM `notices` ORDER BY `notice_added_date` DESC LIMIT 10";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $notice_date = $row['notice_date'];
                $notice_title = $row['notice_title'];
                $notice_details = $row['notice_details'];
                $notice_status = $row['notice_status'];

            ?>
        <div class="dashboard-notice-bar">
            <div class="notice-main-section">
                <p class="notice-date-section"><?php echo $notice_date ?></p>
                <h5 class="notice-title"><?php echo $notice_title ?></h5>
                <p class="notice-details"><?php echo $notice_details ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>
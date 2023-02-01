<?php
include('includes/db.php');
$search_query = "SELECT * FROM `notices`";
$search_result = mysqli_query($connection, $search_query);
$count = mysqli_num_rows($search_result);

if ($count > 0) {
?>
<div class="dashboard-header">
    <p>All Notices</p>
    <div class="dashboard-db-notice-section">
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
                <p class="notice-title"><?php echo $notice_title ?></p>
                <p class="notice-details"><?php echo $notice_details ?></p>
            </div>

            <?php if ($notice_status === '1') { ?>
            <div class="notice-active">
                <p>Active</p>
            </div>

            <?php } elseif ($notice_status == '0') { ?>
            <div class="notice-disabled">
                <p>Disabled</p>
            </div>
            <?php } ?>
            </p>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>
<?php

$title = "Admin Dashboard | Sewa Hospital & Research Centre";
include('includes/header.php') ?>
<?php include('navbar/top-nav.php') ?>
<?php include('navbar/side-nav.php') ?>
<div class="dashboard-container">
    <div class="dashboard-header">
        <p>Dashboard</p>
    </div>

    <div class="dashboard-header">
        <p>All Notices</p>
        <div class="dashboard-db-notice-section">
            <?php
            include('includes/db.php');
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

                <?php } else if ($notice_status == '0') { ?>
                <div class="notice-disabled">
                    <p>Disabled</p>
                </div>
                <?php } ?>
                </p>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>
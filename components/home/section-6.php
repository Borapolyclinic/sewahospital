<?php
include('admin/includes/db.php');
$get_query = "SELECT * FROM `notices` WHERE `notice_status` = '1'";
$get_result = mysqli_query($connection, $get_query);
$count = mysqli_num_rows($get_result);
if ($count > 0) {
?>
<div class="container mt-5 home-section-6" id="important-notices">
    <div class="section-header">
        <h2>Important <span>Notice</span></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </div>

    <div class="home-section-6-container">
        <?php
            $query = "SELECT * FROM `notices` WHERE `notice_status` = '1' ORDER BY `notice_added_date` DESC LIMIT 6";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $notice_date = $row['notice_date'];
                $notice_title = $row['notice_title'];
                $notice_details = $row['notice_details'];

            ?>
        <div class="home-section-6-bar">
            <div class="home-section-6-main">
                <p class="home-section-6-date"><?php echo $notice_date ?></p>
                <h3><?php echo $notice_title ?></h3>
                <p><?php echo $notice_details ?></p>
            </div>
            <a href="#" class="home-section-6-link">Know More</a>
        </div>
        <?php } ?>
    </div>

    <a href="#" class="home-section-6-link-row animate__animated animate__pulse animate__infinite">
        <p>All Notices</p>
        <ion-icon name="caret-forward-circle-outline"></ion-icon>
    </a>
</div>
<?php } ?>
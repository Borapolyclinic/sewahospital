<!-- Modal -->
<div class="modal fade" id="noticeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


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
                $notice_id = $row['notice_id'];
                $notice_date = $row['notice_date'];
                $notice_title = $row['notice_title'];
                $notice_details = $row['notice_details'];

            ?>
        <form action="" method="POST" class="home-section-6-bar">
            <div class="home-section-6-main">
                <p class="home-section-6-date"><?php echo $notice_date ?></p>
                <h3><?php echo $notice_title ?></h3>
                <p><?php echo $notice_details ?></p>
            </div>
            <input type="text" name="notice_id" value="<?php echo $notice_id ?>" hidden>
            <input type="submit" name="submit" value="Know More" class="home-section-6-link" />
        </form>
        <?php }
            ?>
    </div>

    <div class="home-section-6-link-container">
        <a href="notices.php" class="home-section-6-link-row animate__animated animate__pulse animate__infinite">
            <p>All Notices</p>
            <ion-icon name="caret-forward-circle-outline"></ion-icon>
        </a>
    </div>
</div>
<?php }
if (isset($_POST['submit'])) {

    echo '<script type="text/javascript">openNotice();</script>';
    // $notice_id = $_POST['notice_id'];
    // $search_query = "SELECT * FROM `notices` WHERE `notice_id` = '$notice_id'";
    // $search_result = mysqli_query($connection, $search_query);


    // $notice_date = "";
    // $notice_title = "";
    // $notice_details = "";
    // while ($row = mysqli_fetch_assoc($search_result)) {
    //     $notice_date = $row['notice_date'];
    //     $notice_title = $row['notice_title'];
    //     $notice_details = $row['notice_details'];
    // }


}



?>
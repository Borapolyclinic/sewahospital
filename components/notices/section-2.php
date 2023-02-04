<div class="container mt-5">
    <?php
    include('admin/includes/db.php');
    if (isset($_POST['submit'])) {
        $notice_id = $_POST['notice_id'];
        $search_query = "SELECT * FROM `notices` WHERE `notice_id` = '$notice_id'";
        $search_result = mysqli_query($connection, $search_query);

        $notice_date = "";
        $notice_title = "";
        $notice_details = "";
        while ($row = mysqli_fetch_assoc($search_result)) {
            $notice_date = $row['notice_date'];
            $notice_title = $row['notice_title'];
            $notice_details = $row['notice_details'];
        } ?>

    <div>
        <h1><?php echo $notice_title ?></h1>
        <p><?php echo $notice_details ?></p>
        <p><?php echo $notice_date ?></p>
    </div>

    <?php
    } ?>
</div>
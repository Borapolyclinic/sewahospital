<div class="container mt-5 mb-5">
    <div class="section-header">
        <h2>All <span>Notices</span></h2>
        <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae iusto quaerat explicabo dolorum harum earum!
        </p>
    </div>

    <?php
    include('admin/includes/db.php');
    $search_query = "SELECT * FROM `notices`";
    $search_result = mysqli_query($connection, $search_query);

    while ($row = mysqli_fetch_assoc($search_result)) {
        $notice_date = $row['notice_date'];
        $notice_title = $row['notice_title'];
        $notice_details = $row['notice_details'];
    ?>
    <div>
        <h1><?php echo $notice_title ?></h1>
        <p><?php echo $notice_details ?></p>
        <p><?php echo $notice_date ?></p>
    </div>

    <?php } ?>
</div>
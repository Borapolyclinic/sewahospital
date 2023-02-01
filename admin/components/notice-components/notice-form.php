<div class="dashboard-header">
    <h1>Add Notice</h5>
        <p>All notices added from here will be visible on the main website</p>
        <?php
        include('includes/db.php');

        ?>
</div>



<form action="" method="POST" class="add-notice-form">
    <div class="form-floating mb-3">
        <input type="date" name="notice_date" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Date</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" name="notice_title" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Title</label>
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" name="notice_details" placeholder="Leave a comment here" id="floatingTextarea2"
            style="height: 100px"></textarea>
        <label for="floatingTextarea2">Notice Details</label>
    </div>
    <button class="add-notice-btn w-100">Add Notice</button>
</form>
<div class="section">
    <div class="dashboard-header">
        <h5>Contact Page</h5>
        <p>People who visited on the contact page</p>
    </div>

    <div class="table-responsive section-table">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Details</th>
                    <th scope="col">Date & Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $fetch = "SELECT * FROM `contact`";
                $result = mysqli_query($connection, $fetch);
                while ($row = mysqli_fetch_assoc($result)) {
                    $contact_id = $row['contact_id'];
                    $contact_name = $row['contact_name'];
                    $contact_number = $row['contact_number'];
                    $contact_email = $row['contact_email'];
                    $contact_comment = $row['contact_comment'];
                    $contact_date = $row['contact_date'];
                ?>
                    <tr>
                        <th scope="row"><?php echo $contact_id ?></th>
                        <td><?php echo $contact_name ?></td>
                        <td><?php echo $contact_number ?></td>
                        <td><?php echo $contact_email ?></td>
                        <td><?php echo $contact_comment ?></td>
                        <td><?php echo date('d-M-Y h:i:s', strtotime($contact_date)) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
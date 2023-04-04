<div class="section">
    <div class="dashboard-header">
        <h5>Career</h5>
        <p>People who applied for jobs</p>
    </div>

    <div class="table-responsive section-table">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col">APPLIED FOR</th>
                    <th scope="col">CANDIDATE NAME</th>
                    <th scope="col">CONTACT</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">CV</th>
                    <th scope="col">APPLIED ON</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $fetch = "SELECT * FROM `job`";
                $result = mysqli_query($connection, $fetch);
                $career_title = "";
                while ($row = mysqli_fetch_assoc($result)) {
                    $job_applied_for = $row['job_applied_for'];
                    $job_candidate_name = $row['job_candidate_name'];
                    $job_candidate_contact = $row['job_candidate_contact'];
                    $job_candidate_email = $row['job_candidate_email'];
                    $job_candidate_cv = $row['job_candidate_cv'];
                    $job_applied_date = $row['job_applied_date'];

                    $query = "SELECT * FROM `career` WHERE `career_id` = '$job_applied_for'";
                    $query_result = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($query_result)) {
                        $career_title = $row['career_title'];

                ?>
                <tr>
                    <th scope="row"><?php echo $career_title ?></th>
                    <td><?php echo $job_candidate_name ?></td>
                    <td><?php echo $job_candidate_contact ?></td>
                    <td><?php echo $job_candidate_email ?></td>
                    <td><a href="<?php echo "../cv/" . $job_candidate_cv ?>"
                            target="_blank"><?php echo $job_candidate_cv ?></a></td>
                    <td><?php echo date('d-M-Y h:i:s', strtotime($job_applied_date)) ?></td>
                </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>
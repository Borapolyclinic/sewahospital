<div class="container mt-5" id="faq-section">
    <div class="section-header">
        <h2>Frequently <span>Asked</span>Questions</h2>
        <p>We might have an answer for you</p>
    </div>

    <div>
        <div class="faq-section">
            <div class="accordion" id="accordionExample">
                <?php
                $fetch_faq = "SELECT * FROM `faq`";
                $fetch_faq_r = mysqli_query($connection, $fetch_faq);
                $fetch_count = mysqli_num_rows($fetch_faq_r);

                if ($fetch_count == 0) { ?>
                <div class="accordion-item d-none"></div>
                <?php } else {
                    while ($row = mysqli_fetch_assoc($fetch_faq_r)) {
                        $faq_id = $row['faq_id'];
                        $faq_ques = $row['faq_ques'];
                        $faq_details = $row['faq_details']; ?>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed faq-heading" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq<?php echo $faq_id ?>" aria-expanded="false"
                            aria-controls="collapseOne">
                            <?php echo $faq_ques ?>
                        </button>
                    </h2>
                    <div id="faq<?php echo $faq_id ?>" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><?php echo $faq_details ?></p>
                        </div>
                    </div>
                </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
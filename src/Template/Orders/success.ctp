<?php //echo "<pre>"; print_r($order); echo "</pre>"; ?>
<style>
.cust_trip, .review {
    margin-top: 140px;
}
</style>


<section class="review">

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                    <?php if ($response == 'success') { ?>
                    <h3>Booking Successful</h3>
                    <div class="order_completed">
                        <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                    </div>
                    <?php } else { ?>
                    <h3>Booking Unsuccessful</h3>
                    <div class="order_completed">
                        <i class="fa fa-exclamation-circle text-danger" aria-hidden="true"></i>
                    </div>
                    <?php } ?>

            </div>
            <!--col-sm-6 col-sm-offset-3--> 

        </div>
    </div>

</section>


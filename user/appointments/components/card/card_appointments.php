<?php 
    switch ($appointment_status){
        case "COMPLETE":
            $bg = "bg-success";
        break;
        case "CANCELED":
            $bg = "bg-warning";
        break;
        case "UPCOMING":
            $bg = "bg-primary";
    }
?>


<div class="card_appointment card mx-4 mb-3" data-appointment-id="<?=$appointment_id?>">
    <div class="card-body">
        <div class="row">
             <div class="col-6">
                <h4><?=$user_fullname?></h4>
                <p class="text-muted"><?=$service_name?></p>
                <p class="text-muted"><?=$appointment_date?></p>
                <p class="text-muted"><?=$appointment_time?></p>
            </div>
            <div class="col-6 ">
                <button type="button" class="<?=$bg?> btn text-light w-100 mt-5"><?=$appointment_status?></button>
            </div> 
        </div>
    </div>
</div>
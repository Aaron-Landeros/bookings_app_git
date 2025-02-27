<div class="row" data-user-id="<?=$user_id?>">
        <div class="col-6">
            <h4 class="p-4">Profile</h4>
        </div>
        <div class="col-6 p-4 fw-bold text-end p-4" id="edit_profile"> 
            <i class="fa-solid fa-pen-to-square fs-1"></i> Edit
        </div>
    </div>
    <div class="img-container">
        <img src="images/total-number-of-users.png" class="img_profile rounded mx-auto mb-3 d-block border border-1" alt="" style="width: 50%;">
    </div>
    <div class="info-container p-3">
        <p class="fw-bold mb-0">Business name</p>
        <p><?=$user_data['company_name']?></p>
        <p class="fw-bold mb-0">Address</p>
        <p><?=$user_data['company_address']?></p>
        <p class="fw-bold mb-0">Phone</p>
        <p><?=$user_data['company_phone']?></p>
        <p class="fw-bold mb-0">Email</p>
        <p><?=$user_data['company_email']?></p>
        <p class="fw-bold mb-0">Type</p>
        <p><?=$user_data['company_type']?></p>
</div>
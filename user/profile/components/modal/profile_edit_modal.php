<div class="modal fade" id="profile_modal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fw-bold mb-0">Business Image</p>
                <input type="file" class="form-control">

                <p class="fw-bold mt-2 mb-0">Business name</p>
                <input id="new_name" type="text" placeholder="Business name" class="form-control" value="<?=$user_data['company_name']?>">

                <p class="fw-bold mb-0">Address</p>
                <input id="new_address" type="text" placeholder="Address" class="form-control" value="<?=$user_data['company_address']?>">

                <p class="fw-bold mb-0">Phone</p>
                <input id="new_phone" type="text" placeholder="Phone" class="form-control" value="<?=$user_data['company_phone']?>">

                <p class="fw-bold mb-0">Email</p>
                <input id="new_email" type="text" placeholder="Email" class="form-control" value="<?=$user_data['company_email']?>">
                <!--                 
                <p class="fw-bold mb-0">Type</p>
                <select name="type" id="new_type">
                    <option value=""></option>
                </select> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="update_profile" data-company-id="<?=$user_data['company_id']?>">Update</button>
            </div>
        </div>
    </div>
</div>

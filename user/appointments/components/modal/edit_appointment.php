<div class="modal fade" id="edit_appointment_modal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content pb-3">
                <div class="row m-4 text-center mb-0">
                    <div class="col-4">
                        <p data-bs-dismiss="modal">Back</p>
                    </div>
                    <div class="col-4">
                        <p class="fw-bold">Appointment</p class="fw-bold">
                    </div>
                    <div class="col-4" id="update_appointment" data-appointment-id="<?=$appointment_id?>">
                        <p>Update</p>
                    </div>

                </div>
                <hr class="p-0 m-0">
                <div class="container mt-2">
                    <p class="fw-bold mb-0">Client name</p>
                    <p>John Doe</p>
                    <p class="fw-bold mb-0">Service</p>
                    <p>Haircut</p>
                    <p class="fw-bold mb-0">Date</p>
                    <input type="date">
                    <p class="fw-bold mb-0">Time</p>
                    <input type="time">
                    <p class="fw-bold mb-0">Status</p>
                        <select name="" id="new_status">
                            <option value="">Select</option>
                            <option value="COMPLETE">COMPLETE</option>
                            <option value="CANCELED">CANCELED</option>
                            <option value="UPCOMING">UPCOMING</option>
                        </select>
                </div>
        </div>
    </div>
</div>
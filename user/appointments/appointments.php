<div class="container page-view">
    <div class="container header">
        <div class="row">
            <div class="col-6">
                <h1 class="p-4">Appointment</h1>
            </div>
            <div class="col-6 text-right p-2 fw-bold text-end p-4"> 
                    <button id="add_appointment" type="button" class="btn btn-info text-light mx-2 w-50 text-center">+ add</button>
            </div>
        </div>
            
        <input id="search_permisos_empleado" type="text" class="form-control mt-4 border border-main-color border-1" placeholder="search">
    </div>
    <div class="container table_wrapper main-content mt-4">
                <?php
                    foreach($appointment_data as $appointment):

                        $service_id = $appointment['service_id'];
                        $appointment_date = $appointment['appointment_date'];
                        $appointment_time = $appointment['appointment_time'];
                        $service_name = $appointment['service_name'];
                        $user_fullname = $appointment['user_fullname'];

                        $appointment_status = $appointment['appointment_status'];
                        $appointment_id = $appointment['appointment_id'];
                        include "components/card/card_appointments.php";

                    endforeach;    
                ?>
                                        
    </div>
</div>
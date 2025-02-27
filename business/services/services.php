<div class="container mt-5 pt-5">
    <div class="row mb-4">
        <div class="col-12 text-container">
            <h3>
                <strong>Service</strong> in <strong>Location</strong>
            </h3>
        </div>
    </div>

    <!-- ROW1 -->
    <div class="row mb-5 d-flex justify-content-between">
        <?php  
            foreach($companies_data as $service):

                $company_id = $service['company_id'];
                $company_address = $service['company_address'];
                $company_name = $service['company_name'];

                $company_img = fetch_company_image($company_id);

                include 'components/card/card_services.php';
            endforeach;

        ?>
    </div>
</div>
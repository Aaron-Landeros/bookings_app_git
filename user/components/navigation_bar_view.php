<div class="navigation-bar sticky-top">
    <div class="bg-info p-2">
        <button type="button" class="btn" data-bs-toggle="offcanvas" data-bs-target="#handler_menu">
            <i class="fa-solid fa-bars d-flex justify-content-start align-items-start text-white fs-1 fw-bold"></i>
        </button>
    </div>
</div>
<div class="offcanvas offcanvas-start"  backdrop data-bs-scroll="true" id="handler_menu" >
    <div data-bs-toggle="offcanvas" data-bs-target="#handler_menu" id="get-dashboard-view" class="offcanvas-header p-0 bg-info"" data-section="dashboard">
        <img src="assets/entheo_wms_logo.svg" alt="Logo"  class="img-fluid p-3 mt-3" >
    </div>
    <div class="sidebar offcanvas-body d-flex flex-column p-0 bg-info">
        <nav class="navbar">
            <div data-bs-toggle="offcanvas" data-bs-target="#handler_menu" id="appointment_get_view" data-section="registro_horas" class="container p-4 border border-top-2 border-bottom-2 border-start-0 border-end-0 ">
                <a class="nav-link text-white">
                    <i class="fa-solid fa-clock fs-1"></i>
                    <span class="ms-4 fs-2">Appointments</span>
                </a>
            </div>
            <div data-bs-toggle="offcanvas" data-bs-target="#handler_menu" id="profile_get_view" data-section="permisos" class="container p-4 border border-top-2 border-bottom-2 border-start-0 border-end-0">
                <a class="nav-link text-white">
                    <i class="fa-solid fa-id-badge fs-1"></i>
                    <span class="ms-3 fs-2">Profile</span>
                </a>
            </div>
            <div data-bs-toggle="offcanvas" data-bs-target="#handler_menu" id="service_get_view" data-section="nomina" class="container p-4 border border-top-2 border-bottom-2 border-start-0 border-end-0">
                <a class="nav-link text-white">
                    <i class="fa-solid fa-list-ul fs-1"></i>
                    <span class="ms-4 fs-2">Services</span>
                </a>
            </div>
                        <div data-bs-toggle="offcanvas" data-bs-target="#handler_menu" id="service_get_view" data-section="nomina" class="container p-4 border border-top-2 border-bottom-2 border-start-0 border-end-0">
                <a class="nav-link text-white">
                    <i class="fa-solid fa-gear fs-1"></i>
                    <span class="ms-4 fs-2">Settings</span>
                </a>
            </div>
                <li class="nav-item align-items-center d-flex" >
                    <i class="fa-solid fa-sun fa-xl"></i>
                    <div class="ms-2 form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="themingSwitcher" />
                    </div>
                    <i class="fa-solid fa-moon fa-xl"></i> 
                </li>

        </nav>
        <div data-bs-toggle="offcanvas" data-bs-target="#handler_menu" class="position-absolute bottom-0 p-3">
            <a id="get-account-view" data-section="account" class="navbar-brand text-white d-flex flex-row p-2">
                <img src="https://static.vecteezy.com/system/resources/previews/019/879/186/non_2x/user-icon-on-transparent-background-free-png.png" id="employee_portrait" alt="Logo" width="40" height="40" class="rounded-5 employee_portrait">
                <h5 class="d-flex justify-content-center align-items-center ps-3 mt-2" id="sidebar_user_name"><?=$user_fullname?></h5>
            </a>
        </div>
    </div>
</div>
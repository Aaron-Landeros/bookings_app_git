<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top bg-dark">
    <div class="container">
        <a href="index.php" class="navbar-brand">
            <img src="assets/logo.webp" alt="" width="150" />
        </a>

        <select class="form-select form-select-lg mb-3" name="selector" id="selector1">
            <option value="">Services</option>
            <option value="">Barber Shop</option>
            <option value="">Hair Salon</option>
            <option value="">Massage</option>
        </select>

        <select class="form-select form-select-lg mb-3" name="selector" id="selector2">
            <option value="">Location</option>
            <option value="">El paso, TX</option>
            <option value="">Austin, TX</option>
            <option value="">Dallas, TX</option>
        </select>

        <div class="col-3 text-end">
              <div class="user-drop dropdown">
                <button
                  class="btn btn-default dropdown-toggle border-0"
                  type="button"
                  id="dropdownMenuButton"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <span
                    class="fas fa-user-circle text-light fa-3x"
                    aria-hidden="true"
                  ></span>
                </button>
                <ul
                  class="dropdown-menu rounded-0 p-0"
                  aria-labelledby="dropdownMenuButton1"
                >
                  <li>
                    <a
                      class="dropdown-item text-center bg-primary text-light"
                      href="#"
                      >Account</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item text-center" id="bookings_btn" href="#">Bookings</a>
                  </li>
                  <li>
                    <a
                      class="dropdown-item text-center bg-primary text-light"
                      href="#"
                      >Sign Out</a
                    >
                  </li>
                </ul>
              </div>
            </div>
    </div>
</nav>
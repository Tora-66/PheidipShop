<?php
if (isset($_SESSION["username"])) {
  echo '
  <div class="container">
      <nav
        class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top"
      >
        <div class="container-fluid">
          <!-- Logo -->
          <a class="navbar-brand mx-2" href="home.php"
            ><img src="img/source/Logo.svg" alt=""
          /></a>

          <!-- Search bar -->
          <form class="d-flex">
            <div class="d-flex border rounded-pill">
              <i class="bi bi-search mx-2 my-auto"></i>
              <input
                class="form-control me-2 border-0 search shadow-none bg-none"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
            </div>
          </form>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Link -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-5">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle hover-underline-animation"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Men
                </a>
                <ul class="dropdown-menu" aria-la elledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Sneaker</a></li>
                  <li><a class="dropdown-item" href="#">Boots</a></li>
                  <li><a class="dropdown-item" href="#">Sandals</a></li>
                  <li><a class="dropdown-item" href="#">Slippers</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle hover-underline-animation"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Women
                </a>
                <ul class="dropdown-menu" aria-la elledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Sneaker</a></li>
                  <li><a class="dropdown-item" href="#">Boots</a></li>
                  <li><a class="dropdown-item" href="#">Sandals</a></li>
                  <li><a class="dropdown-item" href="#">Slippers</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle hover-underline-animation"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Brand
                </a>
                <ul class="dropdown-menu" aria-la elledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Nike</a></li>
                  <li><a class="dropdown-item" href="#">Adidas</a></li>
                  <li><a class="dropdown-item" href="#">Timberland</a></li>
                  <li><a class="dropdown-item" href="#">Dr Martens</a></li>
                  <li><a class="dropdown-item" href="#">Others</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link hover-underline-animation" href="#"
                  >Collection</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link hover-underline-animation" href="feedbackUser.php?"
                  >Contact</a
                >
              </li>
            </ul>

            <ul class="navbar-nav ms-3">
              <li class="nav-item mx-0">
                <a
                  href="cart.php"
                  class="btn btn-outline-primary rounded-pill cart-button px-2 py-0"
                  ><i class="bi bi-cart-dash fs-3"></i
                ></a>
              </li>
              <li class="nav-item mx-2 my-auto">
                <a
                  href="editprofile.php"
                  class="py-0 px-1 link-dark profile-link"
                  ><i class="bi bi-person-circle fs-5 me-1"></i>User Profile</a
                >
              </li>
              <div class="vr fw-normal my-1 mx-1"></div>
              <li class="nav-item my-auto mx-1">
                <a href="logout.php" class="btn btn-primary rounded-pill p-auto"
                  ><i class="bi bi-box-arrow-right me-2"></i>Logout</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div class="nav-space"></div>
';
} else {
  echo '
  <div class="container">
  <nav
    class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top"
  >
    <div class="container-fluid">
      <!-- Logo -->
      <a class="navbar-brand mx-2" href="home.php"
        ><img src="img/source/Logo.svg" alt=""
      /></a>

      <!-- Search bar -->
      <form class="d-flex">
        <div class="d-flex border rounded-pill">
          <i class="bi bi-search mx-2 my-auto"></i>
          <input
            class="form-control me-2 border-0 search shadow-none bg-none"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
        </div>
      </form>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Link -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-5">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle hover-underline-animation"
              href="#"
              id="navbarDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Men
            </a>
            <ul class="dropdown-menu" aria-la elledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Sneaker</a></li>
              <li><a class="dropdown-item" href="#">Boots</a></li>
              <li><a class="dropdown-item" href="#">Sandals</a></li>
              <li><a class="dropdown-item" href="#">Slippers</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle hover-underline-animation"
              href="#"
              id="navbarDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Women
            </a>
            <ul class="dropdown-menu" aria-la elledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Sneaker</a></li>
              <li><a class="dropdown-item" href="#">Boots</a></li>
              <li><a class="dropdown-item" href="#">Sandals</a></li>
              <li><a class="dropdown-item" href="#">Slippers</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle hover-underline-animation"
              href="#"
              id="navbarDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Brand
            </a>
            <ul class="dropdown-menu" aria-la elledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Nike</a></li>
              <li><a class="dropdown-item" href="#">Adidas</a></li>
              <li><a class="dropdown-item" href="#">Timberland</a></li>
              <li><a class="dropdown-item" href="#">Dr Martens</a></li>
              <li><a class="dropdown-item" href="#">Others</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link hover-underline-animation" href="#"
              >Collection</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link hover-underline-animation" href="feedbackGuest.php"
              >Contact</a
            >
          </li>
        </ul>

        <ul class="navbar-nav ms-5">
          <li class="nav-item mx-0">
            <a href="login.php" class="btn btn-outline-info rounded-pill">Login</a>
          </li>
          <div class="vr fw-normal my-1 mx-1"></div>
          <li class="nav-item mx-0">
            <a href="user-registration.php" class="btn btn-outline-secondary rounded-pill"
              >Register</a
            >
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
<div class="nav-space"></div>
    ';
}

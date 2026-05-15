<style>

/* Efek hover navbar */
.navbar-nav .nav-link{
    transition: 0.3s;
    border-radius: 8px;
    padding: 8px 15px;
    margin: 0 3px;
}

/* Saat cursor diarahkan */
.navbar-nav .nav-link:hover{
    background-color: white;
    color: #198754 !important;
    transform: scale(1.05);
}

/* Menu aktif */
.navbar-nav .nav-link.active{
    background-color: white;
    color: #198754 !important;
    border-radius: 8px;
}

</style>

<nav class="navbar navbar-expand-lg bg-success" data-bs-theme="dark">

  <div class="container-fluid">

    <!-- Logo -->
    <a class="navbar-brand fw-bold" href="#">

      <img src="img/logoptr.png"
      alt="Logo"
      width="40">

      Putra Padang

    </a>

    <!-- Button Mobile -->
    <button class="navbar-toggler"
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent"
    aria-expanded="false"
    aria-label="Toggle navigation">

      <span class="navbar-toggler-icon"></span>

    </button>

    <!-- Navbar -->
    <div class="collapse navbar-collapse"
    id="navbarSupportedContent">

      <!-- Menu Kiri -->
      <ul class="navbar-nav mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link <?= ($hal == 'home') ? 'active' : '' ?>"
          href="index.php?hal=home">
            Beranda
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($hal == 'about') ? 'active' : '' ?>"
          href="index.php?hal=about">
            Tentang Saya
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($hal == 'contact') ? 'active' : '' ?>"
          href="index.php?hal=contact">
            Kontak Saya
          </a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle"
          href="#"
          role="button"
          data-bs-toggle="dropdown"
          aria-expanded="false">

            Pendidikan saya

          </a>

          <ul class="dropdown-menu">

            <li>
              <a class="dropdown-item"
              href="index.php?hal=level_list">
                Level
              </a>
            </li>

            <li>
              <a class="dropdown-item"
              href="index.php?hal=studies_list">
                Studies
              </a>
            </li>

          </ul>

        </li>

      </ul>

      <!-- Login / User di Ujung Kanan -->
      <ul class="navbar-nav ms-auto">

        <?php
        if(!isset($_SESSION['MEMBER'])){
        ?>

          <li class="nav-item">
            <a class="nav-link"
            href="index.php?hal=login">
              Login
            </a>
          </li>

        <?php
        }
        else{

        $role     = $_SESSION['MEMBER']['role'] ?? 'user';
        $username = $_SESSION['MEMBER']['username'] ?? 'User';
        ?>

          <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle"
            href="#"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false">

              <?= htmlspecialchars($username).' - '.htmlspecialchars($role) ?>

            </a>

            <ul class="dropdown-menu dropdown-menu-end">

              <li>
                <a class="dropdown-item" href="#">
                  Profile
                </a>
              </li>

              <?php if ($role == 'admin') { ?>

              <li>
                <a class="dropdown-item" href="#">
                  Kelola User
                </a>
              </li>

              <?php } ?>

              <li><hr class="dropdown-divider"></li>

              <li>
                <a class="dropdown-item"
                href="logout.php">
                  Logout
                </a>
              </li>

            </ul>

          </li>

        <?php } ?>

      </ul>

    </div>

  </div>

</nav>
  <nav class="navbar static-top navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="header-logo">
      <a href="<?= base_url('new-theme') ?>">
        <img src="https://qamuschool.com/assets/img/logo/qamuschool-transparant2.png" class="navbar-brand" style="height: 50px">
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <!-- <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Programs
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">UTBK</a></li>
            <li class="dropdown-submenu">
              <a class="dropdown-item dropdown-toggle" href="#">English Class</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url('new-tpc') ?>">Toefl Preparation Club</a></li>
                <li><a class="dropdown-item" href="#">Focus Structure Club</a></li>
                <li><a class="dropdown-item" href="#">Focus Listening & Reading Club</a></li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Students
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Apa kata mereka ?</a></li>
            <li><a class="dropdown-item" href="#">Scholarship Information</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Simulasi Online
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Toefl Prediction Test</a></li>
            <li><a class="dropdown-item" href="#">Try Out UTBK</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav">
        <a class="nav-link" href="#">Qamus Cinta Indonesia <span class="sr-only"></span></a>
      </ul>
    </div>
  </nav>
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="mm" style="margin-left: 40px;">
            <div class="wellcom">
                <h3 style=" display:flex ; align-items: center; padding-top: 20px; padding-bottom: 40px;">

                    <?php
                    echo 'Dr' . '.' . $_SESSION['username'];
                    ?>
                </h3>
            </div>
        </div>
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt "></i></div>
                    Dashboard
                </a>
                <a href="./patient.php" class="nav-link" id="patients">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-injured  hvr-icon"> </div></i>Patients
                </a>
                <a href="./appointment.php" class="nav-link" id="appointment">
                    <div class="sb-nav-link-icon"><i class="far fa-calendar-check hvr-icon"></div></i>Appointment
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Models AI
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="model2.php">Static Model</a>
                        <a class="nav-link" href="skin_cancer.php">Skin Cancer</a>
                    </nav>
                </div>
                <button style="width: 70%; " class="btn btn-primary m-auto mt-5 "><a style="text-decoration: none; color:white" href="logout-admin.php">logout</a></button>






    </nav>

 
</div>
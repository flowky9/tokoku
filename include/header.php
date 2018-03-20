<nav class="navbar navbar-expand-md navbar-light bg-light justify-content-between">
    <a class="navbar-brand" href="<?php echo URL; ?>">Toko Alat Fitnes</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Product Category
                </a>

                    <?php hierarchy(); ?>

            </li>
        </ul>
    </div>

    <!-- FORM SEARCH -->
    <form class="form-inline float-md-right">
     <input class="form-control mr-sm-2 form-control form-control-sm" type="search" placeholder="Search" aria-label="Search">
     <button class="btn btn-outline-success my-2 my-sm-0 btn-sm" type="submit">Search</button>
   </form>
</nav>


<!DOCTYPE html>
<html lang="en">

<!-- Start of Head -->

<head>

    <?php include('views/head/head.php'); ?>

</head>

<!-- End of Head -->

<body>

    <!-- Mobile Nav -->

    <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    <!-- End Mobile Nav -->

    <!-- Start of Header -->

    <header id="header">

        <?php include('views/header/header.php'); ?>

    </header>

    <!-- End of Header -->

    <!-- Start of Section -->

    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">

        <?php include('views/section/section.php'); ?>

    </section>

    <!-- End of Section -->

    <!-- Start of Main -->

    <main id="main">

        <?php include('views/main/main.php'); ?>

    </main>

    <!-- End of Main -->

    <!-- Footer -->

    <footer id="footer">

        <?php include('views/footer/footer.php'); ?>

    </footer>

    <!-- End Footer -->

    <!-- Start of Back to Top -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- End of Back to Top -->

    <!-- Start of Scripts -->

    <?php include('views/footer/scripts/scripts.php'); ?>

    <!-- End of Scripts -->

</body>

</html>
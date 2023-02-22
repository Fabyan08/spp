<?php
session_start();
if (empty($_SESSION['id_petugas'])) {
    echo '<script>alert("Anda Harus Login Terlebih Dahulu");
    window.location.href="../index.php"</script>';
}
if ($_SESSION['level'] != 'petugas') {
    echo '<script>alert("Maaf Anda Bukan Admin");
    window.location.href="../index.php"</script>';
}
?>
<?php include('../style/template/header.php') ?>

<body>
    <div class="container-scroller">

        <?php include('../style/template/sidebar3.php') ?>
        <!-- partial -->
        <?php // include('../style/template/isi.php') 
        ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <?php
                $file = @$_GET['url'];
                if (empty($file)) {
                } else {
                    include $file . '.php';
                }
                ?>
                <h1><span id="typed" class="typed"></span></h1>
                <script>
                    new Typed('#typed', {
                        strings: ['SPP SMKN 5 Malang'],
                        typeSpeed: 100,
                        delaySpeed: 100,
                        loop: true
                    });
                </script>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->

                <?php include('../style/template/footer.php') ?>
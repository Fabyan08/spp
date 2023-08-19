<?php
session_start();
if (empty($_SESSION['nisn'])) {
    echo '<script>alert("Anda Harus Login Terlebih Dahulu");
    window.location.href="../index.php"</script>';
}
?>

<?php include('../style/template/header.php') ?>

<body>
    <div class="container-scroller">

        <?php include('../style/template/sidebar2.php') ?>
        <!-- partial -->
        <?php // include('../style/template/isi.php') 
        ?>
        <div class="main-panel">
            <?php //include_once("../style/template/home.php") 
            ?>
            <div class="content-wrapper">
                <?php
                $file = @$_GET['url'];
                if (empty($file)) {
                } else {
                    include $file . '.php';
                }
                ?>
                <!-- <h1><span id="typed" class="typed"></span></h1>
                <script>
                    new Typed('#typed', {
                        strings: ['SPP SMKN 5 Malang'],
                        typeSpeed: 100,
                        delaySpeed: 100,
                        loop: true
                    });
                </script> -->
                <?php include('../style/template/footer.php') ?>
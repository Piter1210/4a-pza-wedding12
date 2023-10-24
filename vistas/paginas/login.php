<section class="breadcumd__banner">
    <div class="container">
        <div class="col-lg-6 wow fadeInDown center">
            <h1 class="left__content">
                Login
            </h1>
            <ul class="left__thumb">
                <li>
                    <a href="index.php?pagina=inicio">
                        Home
                    </a>
                </li>
</section>
<div><i class="fa fa-space-shuttle" aria-hidden="true"></i></div>
<div class="banner__content center">
<img src="assets/img/banner/banner-shape2.png" alt="banner__shape">
<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
        <div class="form-group">
            <label for="email">Email address:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" placeholder="Enter email" id="email" name="ingresoEmail">
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Enter password" id="pwd"
                    name="ingresoPassword">
            </div>
        </div>
        <?php
        $ingreso = new ControladorFormularios();
        $ingreso->ctrIngreso();
        ?>
        <button type="submit" class="btn btn-primary">Enter</button>
    </form>

</div>
<div class="banner__content center">
<img src="assets/img/banner/banner-shape3.png" alt="banner__shape">

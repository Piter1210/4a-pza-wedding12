<section class="breadcumd__banner">
    <div class="container">
        <div class="col-lg-6 wow fadeInDown center">
            <h1 class="left__content">
                Register
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
            <label for="name">Name:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Name" id="name" name="registerName">
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" placeholder="Enter email" id="email" name="registerEmail">
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Enter password" id="pwd"
                    name="registerPassword">
            </div>
        </div>
        <?php /*
   $registro = new ControladorFormularios();
   $registro -> crtRegistro(); 
   */
        $registro = ControladorFormularios::crtRegistro();
        if ($registro == "ok") {
            echo '<script>
                if (window.history.replaceState){
                    window.history.replaceState(null, null, window.location.greh);
                }
                </script>';

            echo '<div class="alert-success"> El usuario ha sido registrado</div>';
        }
        if ($registro == "error") {
            echo '<script>
                if (window.history.replaceState){
                    window.history.replaceState(null, null, window.location.greh);
                }
                </script>';

            echo '<div class="alert-danger"> Error! No se permiten caracteres especiales.</div>';
        }
        ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="banner__content center">
<img src="assets/img/banner/banner-shape3.png" alt="banner__shape">

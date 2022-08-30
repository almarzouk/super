<?php include './inc/header.php' ?>

<div class="container text-center">
    <h3 class="text-center m-5">
        Welcome to super E-commerce, votre site de location de materiel photo, vidéo, et accessoires.
    </h3>
    <!-- Carusel start -->
    <div class="container mt-5">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assets/images/carusel/01.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assets/images/carusel/02.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assets/images/carusel/03.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>
    <!-- Carusel End -->
    <!-- Form Connection start -->

    <form class="w-50 m-auto mt-5 text-start mb-5">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-dark d-block mb-2">Valider</button>
        <a href="./admin/new-user.php" class="m-2 ms-auto">You don't have account?</a>
    </form>
    <!-- Form Connection End -->

</div>
<?php include './inc/footer.php' ?>
<?php include '../inc/header.php' ?>
<?php include '../navbar.php' ?>
<div class="container min-vh-100">
    <form class="mb-5 w-50 p-5 m-auto">
        <h3>Update objet</h3>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Marque</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Modèle</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descriptif</label>
            <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">photo</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Category</label>
            <select class="form-select mb-4" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <button type="submit" class="btn btn-dark">Update</button>
    </form>
</div>
<?php include '../inc/footer.php' ?>
<?php include '../inc/header.php' ?>
<div class="container ">
    <form class="mb-5 w-50 p-5 m-auto">
        <h3>insert objet</h3>
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
            <label for="exampleInputPassword1" class="form-label">mot de pass</label>
            <select>
                <option>accessoires</option>
                <option>lumieres</option>
                <option>photos_appareils</option>
                <option>accessoires</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">mot de pass</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
<?php include '../inc/footer.php' ?>
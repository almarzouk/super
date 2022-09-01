<?php include '../inc/header.php' ?>
<?php include '../navbar.php' ?>
<div class="container min-vh-100">
    <form action="insert-user-action.php" method="POST" class="mb-5 w-50 p-5 m-auto min-vh-100">
        <h3>S'inscrire</h3>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nom">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="prenom">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="adresse">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
        </div>
        <button type="submit" class="btn btn-dark">Envoyer</button>
    </form>
</div>
<?php include '../inc/footer.php' ?>
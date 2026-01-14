<h1>Connexion</h1>
<form action="?url=user&a=verify_connexion" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="connexion">Se connecter</button>
    </div>
</form>
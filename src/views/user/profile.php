<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-header bg-primary text-white text-center">
            <h3>Mon profile</h3>
        </div>
        <div class="card-body">
            <form action="?url=user&a=update" method="POST">
                <!-- Nom -->
                <div class="mb-3">
                    <label for="nom" class="form-label"><strong>Nom</strong></label>
                    <input
                        type="text"
                        id="nom"
                        name="nom"
                        class="form-control"
                        value="<?= htmlspecialchars($user['nom']); ?>"
                        required
                    >
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label"><strong>Email</strong></label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="<?= htmlspecialchars($user['email']); ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="date_inscription" class="form-label"><strong>Date de création</strong></label>
                    <input
                        type="text"
                        id="date_inscription"
                        class="form-control"
                        value="<?= htmlspecialchars($user['date_inscription']); ?>"
                        readonly
                    >
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Enregistrer les modifications</button>
                    <a href="profile.php" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>

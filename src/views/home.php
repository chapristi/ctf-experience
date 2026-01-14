<body>
<?php if (isset($_SESSION['id'])) :?>
    <div class="mt-4" style="width: 100%">
        <h1 class="text-center">Liste des Publications</h1>
        <div class="" style="width: 100%">
            <?php foreach ($posts as $post): ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header text-black">
                            <h4><?= htmlspecialchars($post['titre']); ?></h4>
                        </div>
                        <div class="card-body">
                            <p><?= htmlspecialchars($post['contenu']); ?></p>
                        </div>
                        <div class="text-center">
                            <small>
                                Publié par <strong><?= htmlspecialchars($post['nom']); ?></strong>
                                le <?= date('d/m/Y H:i', strtotime($post['date_publication'])); ?>
                            </small>
                            <br>

                            <a class="btn btn-primary text-center" href="?url=posts&a=afficher&id=<?= $post['id_post']?>">
                                voir plus
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <div class="container mt-5">
        <div class="alert alert-danger">
            Vous devez être connecté pour accéder aux publications
        </div>
    </div>
<?php endif; ?>


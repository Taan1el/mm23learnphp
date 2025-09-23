<?php include __DIR__ . '/../partials/header.php'; ?>
  <main class="container">
        <a href="/articles/create" class="btn btn-primary">New Article</a>
        <table class="table table-striped table-hover">
            <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php foreach($articles as $article): ?>
                    <tr>
                        <td><?=$article->id?></td>
                        <td><?=$article->title?></td>
                        <td>
                            <div class="btn-group">
                                <a href="/articles/view?id=<?=$article->id?>" class="btn btn-info">View</a>
                                <a href="/articles/edit?id=<?=$article->id?>" class="btn btn-warning">Edit</a>
                                <a href="/articles/delete?id=<?=$article->id?>" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
  </main>
<?php include __DIR__ . '/../partials/footer.php'; ?>


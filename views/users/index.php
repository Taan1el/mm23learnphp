<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
  <div class="d-flex justify-content-between align-items-center my-3">
    <h1 class="h3 mb-0"><?= htmlspecialchars($title ?? 'Users') ?></h1>
    <a class="btn btn-primary" href="/users/create">Create</a>
  </div>

  <div class="table-responsive">
    <table class="table table-striped align-middle">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Email</th>
          <th scope="col" class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach (($users ?? []) as $u): ?>
          <tr>
            <td><?= (int)$u->id ?></td>
            <td><?= htmlspecialchars($u->email) ?></td>
            <td class="text-end">
              <a class="btn btn-sm btn-outline-secondary" href="/users/edit?id=<?= (int)$u->id ?>">Edit</a>
              <a class="btn btn-sm btn-outline-danger" href="/users/delete?id=<?= (int)$u->id ?>" onclick="return confirm('Delete user #<?= (int)$u->id ?>?')">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>


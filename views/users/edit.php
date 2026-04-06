<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
  <div class="my-3">
    <h1 class="h3"><?= htmlspecialchars($title ?? 'Edit user') ?></h1>
  </div>

  <form method="POST" action="/users/edit" class="row g-3">
    <input type="hidden" name="id" value="<?= (int)$user->id ?>">

    <div class="col-12">
      <label class="form-label">Email</label>
      <input name="email" type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($user->email ?? '') ?>" required>
      <?php if (isset($errors['email'])): ?>
        <div class="invalid-feedback"><?= htmlspecialchars($errors['email']) ?></div>
      <?php endif; ?>
    </div>

    <div class="col-md-6">
      <label class="form-label">New password (optional)</label>
      <input name="password" type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>">
      <?php if (isset($errors['password'])): ?>
        <div class="invalid-feedback"><?= htmlspecialchars($errors['password']) ?></div>
      <?php endif; ?>
    </div>
    <div class="col-md-6">
      <label class="form-label">Confirm new password</label>
      <input name="password_confirm" type="password" class="form-control <?= isset($errors['password_confirm']) ? 'is-invalid' : '' ?>">
      <?php if (isset($errors['password_confirm'])): ?>
        <div class="invalid-feedback"><?= htmlspecialchars($errors['password_confirm']) ?></div>
      <?php endif; ?>
    </div>

    <div class="col-12 d-flex gap-2">
      <button class="btn btn-primary" type="submit">Save</button>
      <a class="btn btn-outline-secondary" href="/users">Cancel</a>
    </div>
  </form>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>


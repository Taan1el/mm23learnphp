<?php include __DIR__ . '/../partials/header.php'; ?>
<main class="container">
    <form action="/articles/edit?id=<?=$article->id?>" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input value="<?=$article->title?>" name="title" type="text" class="form-control" id="title" placeholder="Title">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Content</label>
            <textarea 
                name="body"
                class="form-control"
                id="body"
                rows="3"
                placeholder="Write something cool..."><?=$article->body?></textarea>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>
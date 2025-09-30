<?php 
$title = "Main";
 $posts = [
    ['title' => 'Sample blog post', 'date' => 'January 1, 2024', 'author' => 'Mark', 'body' => 'NOT Cool world news!1'],
    ['title' => 'Another blog post', 'date' => 'December 23, 2024', 'author' => 'Jacob', 'body' => 'NOT More cool world news!2'],
    ['title' => 'cool blog', 'date' => 'December 17, 2023', 'author' => 'Chris', 'body' => 'NO, Even more cool world news!3'], 
    ['title' => 'Another blog but cooler', 'date' => 'December 13, 2025', 'author' => 'Bill', 'body' => 'There Are Even more cool world news!4'],
    ['title' => 'Awsome blog', 'date' => 'December 15, 2026', 'author' => 'Tom', 'body' => 'Even more Bad world news!5'],
  ];
?>

<?php include 'partials/header.php'; ?>
    <main class="container">
      <?php include 'partials/hero.php'; ?>
      <?php include 'partials/featured.php'; ?>
      <div class="row g-5">
        <div class="col-md-8">
          <?php include 'partials/posts.php'; ?>
        </div>
        <div class="col-md-4">
          <?php include 'partials/sidebar.php'; ?>
        </div>
      </div>
    </main>
<?php include 'partials/footer.php'; ?>

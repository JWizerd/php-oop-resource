<?php include("includes/header.php"); ?>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8 jumbotron">
      <!-- Blog Categories Well -->
      <h2>A Simple Object Oriented Gallery</h2>
      <div class="row">
        <div class="col-md-12">
          <p class="lead">
            This project has been such a great learning experience for me. When I initally learned Ruby on Rails I had a hard time understanding the underlying functionality for such a framework so when I decided to start learning PHP on a deeper level I knew that I want to take a ground up approach to make sure that when I transition into Laravel programming I will fully appreciate the workflow that the creators had extended into the framework. Not to mention, Object Oriented PHP developers I feel are a rarer breed since the dominating software (Wordpress) is meant to be used in a more procedural fashion. I feel that by learning OOP and Laravel I can help contribute to make PHP a mature Object Oriented Language. With PHP7 and it's huge performance update I believe that PHP will continue to be the web dominating language therefore it is so important that we as developers evolve this language and begin to remove procedural legacy code that gives the language and the community such a bad name.
          </p>
          <p>This project can be found on github. I hope that it can be a good intro to OOP resource for anybody that wants to learn professional web development like I did. <strong><a href="https://github.com/JWizerd/php-oop-resource"><i class='fa fa-github'></i>Github</a></strong></p>
        </div>
        <div class="col-md-12">
          <h2>Images</h2>
          <div class="row">
            <?php $photos = Photo::all(); ?>
            <?php foreach ($photos as $photo): ?>
              <div class="col-md-3">
                <img class="img-responsive thumbnail" src="admin/<?php echo $photo->image_path(); ?>" alt="">
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="col-md-12">
          <h2 style="margin-top: 0;">Artists:</h2>
          <?php $users = User::all(); ?>
          <?php foreach ($users as $user): ?>
            <div class="col-md-3">
              <h4><?php echo $user->get_full_name(); ?></h4>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      </div>
      <!-- Blog Sidebar Widgets Column -->
      <?php include("includes/sidebar.php"); ?>
  </div>
  <!-- /.row -->
<?php include("includes/footer.php"); ?>

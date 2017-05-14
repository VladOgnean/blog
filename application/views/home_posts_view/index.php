<?php if(isset($this->session->userdata["logged_in"])) { ?>
  <?php echo validation_errors(); ?>
  <?php echo form_open_multipart('home_posts/create','id="create_post"'); ?>
    <input type="hidden" name="author" value="<?php echo htmlspecialchars($this->session->userdata["logged_in"]["user_name"]); ?>">
    <article >
      <h3> Enter title </h3>
      <input type="text" name="title" value="<?php echo set_value('title'); ?>" required="required">
      <h3> Enter description </h3>
      <textarea rows="10" cols="50" name="description" required="required"><?php echo set_value('description'); ?></textarea>
      <h3> Enter short description </h3>
      <input type="text" name="description2" value="<?php echo set_value('description2'); ?>" required="required">
      <h3> Enter youtube link </h3>
      <input type="text" name="youtube" value="<?php echo set_value('youtube'); ?>" required="required">
      <h3> Enter images </h3>
      <input type="file" name="first_image" accept="image/*" required="required">
      <input type="file" name="second_image" accept="image/*" required="required">
      <input type="file" name="third_image" accept="image/*" required="required">
      <input type="submit">
    </article>
  </form>
<?php } ?>

<div id="ajax_response">
  <?php foreach ($home_posts as $obj): ?>
    <article>
      <h1><?php echo $obj['title']; ?></h1>
      <p><?php echo $obj['description']; ?></p>
      <iframe src="<?php echo $obj['youtube']; ?>" frameborder="0" allowfullscreen></iframe>
      <br/><br/><br/><br/><br/>
      <img src="<?php echo base_url($obj['first_image']); ?>" class="homePictures">
      <img src="<?php echo base_url($obj['second_image']); ?>" class="homePictures">
      <img src="<?php echo base_url($obj['third_image']); ?>" class="homePictures">
      <br/><br/><br/><br/><br/>
      <p><?php echo $obj['description2']; ?></p>
      <p>Added by <?php echo $obj['author']; ?></p>
    </article>
  <?php endforeach; ?>
</div>

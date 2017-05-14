<?php if(isset($this->session->userdata["logged_in"])) { ?>
  <?php echo validation_errors(); ?>
  <?php echo form_open_multipart('news_posts/create','id="create_news_post"'); ?>
    <input type="hidden" name="author" value="<?php echo htmlspecialchars($this->session->userdata["logged_in"]["user_name"]); ?>">
    <article >
      <h3> Enter title </h3>
      <input type="text" name="title" value="<?php echo set_value('title'); ?>" required="required">
      <h3> Enter description </h3>
      <textarea rows="10" cols="50" name="description" required="required"><?php echo set_value('description'); ?></textarea>
      <h3> Enter link </h3>
      <input type="text" name="link" value="<?php echo set_value('link'); ?>" required="required">
      <h3> Enter image </h3>
      <input type="file" name="image" accept="image/*" required="required">
      <input type="submit">
    </article>
  </form>
<?php } ?>

<div id="ajax_response">
  <?php foreach ($news_posts as $obj): ?>
    <div class="newsContainers">
      <p><?php echo $obj['description']; ?></p>
      <br/>
      Full article here:
      <a href="<?php echo $obj['link']; ?>" target="_blank"><?php echo $obj['title']; ?></a>
      <img src="<?php echo base_url($obj['image']); ?>" class="newsPictures">
      <p>Added by <?php echo $obj['author']; ?></p>
    </div>
  <?php endforeach; ?>
</div>

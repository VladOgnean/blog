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
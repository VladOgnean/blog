<div class="newsContainers">
  <p><?php echo $obj['description']; ?></p>
  <br/>
  Full article here:
  <a href="<?php echo $obj['link']; ?>" target="_blank"><?php echo $obj['title']; ?></a>
  <img src="<?php echo base_url($obj['image']); ?>" class="newsPictures">
  <p>Added by <?php echo $obj['author']; ?></p>
</div>
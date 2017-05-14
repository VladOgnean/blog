<?php echo validation_errors(); ?>

<?php echo form_open('users/login'); ?>
  E-mail*: <input type="text" name="email" required="required" /> <br/>
  Password*: <input type="password" name="password" required="required" /> <br/>
  <input type="submit" value="Login"/>
</form>

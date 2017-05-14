<p>Please fill in your full name and e-mail address
if you want to get the latest news in the movie world directly on your e-mail</p>
<input type="button" value="Registration form" id="register_button">
<?php if(isset($_GET["success"])) { ?>
  <p id="succes_message"> Registration completed succesfully! </p>
<?php } ?>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('date_personale_membri/create','id="registration_form"'); ?>

    First Name*: <input type="text" name="nume" value="<?php echo set_value('nume'); ?>" required="required" /> <br/>
    Last Name*: <input type="text" name="prenume" value="<?php echo set_value('prenume'); ?>" required="required" /> <br/>
    E-mail*: <input type="text" name="email" value="<?php echo set_value('email'); ?>" required="required" /> <br/>
    <input type="submit" value="Register" id="submit_button" />
</form>
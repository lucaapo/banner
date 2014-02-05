<?php echo $error;?>

<?php echo form_open_multipart('banner/uploaded'); ?>

<?php echo form_dropdown('typology', $typologies); ?>


<input type="file" name="userfile" />

<br /><br />

<input type="submit" value="upload" name="submit"/>

<?php echo form_close(); ?>
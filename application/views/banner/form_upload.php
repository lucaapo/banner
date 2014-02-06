<script type="text/javascript">
    $("body").load(function() {
        $('#dimension_x').hide();
        $('#dimension_y').hide();
    });

    function fillDimensions(id) {
       req =  $.ajax(
                '<?php echo site_url('bannertypology/typology'); ?>',
                {
                    data: {'id': id, 'op': 'typology'},
                    dataType: 'json',
                    type: 'POST',
                    success: function(res, status, jhxr) {
                       
                        $('#dimension_x').text(res.x);
                        $('#dimension_y').text(res.y);
                        $('#dimension_x').show();
                        $('#dimension_y').show();
                        return true;
                    },
                    error: function (msg){
                        alert(msg);
                    }
                }
        );
        
             

    }
</script>

<?php echo $error; ?>
<div id='dimensions' style="width: 30%; padding: 5px;">
    <span id='dimension_x'>

    </span>
    <span id='dimension_y'>

    </span>
</div>
<?php echo form_open_multipart('banner/uploaded'); ?>

<?php echo form_dropdown('typology', $typologies,0, 'onChange="js:fillDimensions(this.value);"'); ?>

<input type="file" name="userfile" />

<br /><br />

<input type="submit" value="upload" name="submit"/>

<?php echo form_close(); ?>
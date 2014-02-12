<script type="text/javascript">
    $(document).ready(function() {
        $('#dimensions').hide();
        $('#pageselect').hide();
        $('#nopage').hide();
        $('#startdate').hide();
        $('#enddate').hide();
        $('#prosegui').hide();

    });
    /**
     * riempie le dimensioni con il valore appropriato
     * @param {type} id
     * @returns {undefined}
     */
    function fillDimensions(id) {
        req = $.ajax(
                '<?php echo site_url('bannertypology/typology'); ?>',
                {
                    data: {'id': id, 'op': 'typology'},
                    dataType: 'json',
                    type: 'POST',
                    success: function(res, status, jhxr) {

                        $('#dimension_x').text(res.x);
                        $('#dimension_y').text(res.y);
                        $('#dimx').val(res.x);
                        $('#dimy').val(res.y);
                        $('#dimensions').show();
                        $('#pageselect').show();
                        return true;
                    },
                    error: function(msg) {

                    }
                }
        );



    }

    /**
     * controlla se sono già presenti delle pagine simili
     * @param {type} root
     * @returns {undefined}
     */
    function checkPage() {
        var root = $('#page').val();
        var typo = $('#typology').val();
        $.ajax(
                '<?php echo site_url('page/check'); ?>',
                {
                    data: {'root': root, 'typo': typo},
                    dataType: 'json',
                    type: 'POST',
                    success: function(res, status, jhxr) {

                        $('#messages').text(res.message);
                        $('#pagetable').detach();
                        $('#old-page').append(res.table);
//                        $('#load').show();
//                        $('#startdate').show();
//                        $('#enddate').show();
//                        $('#prosegui').show();
                        goany();
                        $('#upload').hide();
                        return true;
                    },
                    error: function(msg) {
                        $('#nopage').show();
                        $('#load').hide();
                        $('#old-page').detach();
                        $('#messages').detach();
                        $('#startdate').show();
                        $('#enddate').show();

                        $('#upload').show();

                    }
                }
        );
    }


    function goany() {
        $('#load').show();
        $('#startdate').show();
        $('#enddate').show();
        $('#prosegui').hide();
        $('#upload').hide();
        $('#load').show();
        $('#nopage').show();

    }

    $(document).ready(function() {
        $("#start_date").datepicker({dateFormat: "dd-mm-yy"});
        $("#end_date").datepicker({dateFormat: "dd-mm-yy"});
    });

</script>
<?php // $this->output->enable_profiler(TRUE); ?>
<?php echo $error; ?>

<?php echo form_open_multipart('banner/uploaded'); ?>
<?php echo $this->lang->line('select_typology_intro'); ?>
<?php echo form_dropdown('typology', $typologies, 0, 'onChange="js:fillDimensions(this.value);" id="typology"'); ?>
<div id='dimensions' style="width: 30%; padding: 5px;">
    <?php echo $this->lang->line('width'); ?>&nbsp;<span id='dimension_x'>

    </span>&nbsp; px
    <input type="hidden" value="" name="dimx" id="dimx" /> 
    <?php echo $this->lang->line('heigth'); ?> <span id='dimension_y'>

    </span>&nbsp; px
    <input type="hidden" value="" name="dimy" id="dimy"/>
</div>
<input type="file" name="userfile" />

<br /><br />
<span id="title-page">2.----------------</span>
<div id="pageselect">
    <?php echo form_input('page_name', 0, 'id="page"'); ?>
    <?php echo form_button($this->lang->line('button_check'), $this->lang->line('button_check'), 'onClick="js:checkPage();"'); ?>
    <br/>
    
    <?php
    echo   $this->lang->line('allpages_radio');
    $data = array(
        'name' => 'allpages',
        'id' => 'allpages',
        'value' => '1',
        'checked' => FALSE,
        'style' => 'margin:10px',
    );

    echo form_checkbox($data);
    
    ?>
    <br/>
    <span id="messages"></span>
    <!--input type="button" id="prosegui" value="<?php echo $this->lang->line('button_goon'); ?>" name="goon" onclick="js:goany();"/-->
    <br/>
    <span id="old-page"></span>



</div>
<br/>
<div id="startdate">
<?php echo $this->lang->line('start_date'); ?><input id="start_date" size="6" name="start_date" value=""/>
</div>
<div id="enddate">
<?php echo $this->lang->line('end_date'); ?><input id="end_date" size="6" name="end_date" value=""/>
</div>
<div id="nopage">
    <input id="load" type="submit" name="override" value="<?php echo $this->lang->line('upload_anyway'); ?>"/>
    <input id='upload' type="submit" value="upload" name="<?php echo $this->lang->line('upload'); ?>"/>
</div>
<?php echo form_close(); ?>
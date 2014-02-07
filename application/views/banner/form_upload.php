<script type="text/javascript">
    $(document).ready(function() {
        $('#dimensions').hide();
        $('#pageselect').hide();
        $('#nopage').hide();

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
                        $('#load').show();

                        $('upload').hide();
                        return true;
                    },
                    error: function(msg) {
                        $('#nopage').show();
                        $('#load').hide();
                        $('#old-page').detach();
                        $('#messages').detach();
                        $('upload').show();

                    }
                }
        );
    }
</script>
<?php $this->output->enable_profiler(TRUE); ?>
<?php echo $error; ?>

<?php echo form_open_multipart('banner/uploaded'); ?>

<?php echo form_dropdown('typology', $typologies, 0, 'onChange="js:fillDimensions(this.value);" id="typology"'); ?>
<div id='dimensions' style="width: 30%; padding: 5px;">
    Larghezza:&nbsp;<span id='dimension_x'>

    </span>&nbsp; px
    Altezza: <span id='dimension_y'>

    </span>&nbsp; px
</div>
<input type="file" name="userfile" />

<br /><br />
<span id="title-page">2.----------------</span>
<div id="pageselect">
    <?php echo form_input('page_name', 0, 'id="page"'); ?>
    <?php echo form_button('Controlla', 'Controlla', 'onClick="js:checkPage();"'); ?>

    <span id="messages"></span>
    <span id="old-page"></span>

    <input id="load" type="submit" name="override" value="Carica e sovrascrivi"/>

</div>
<div id="nopage">
    <input id='upload' type="submit" value="upload" name="submit"/>
</div>
<?php echo form_close(); ?>
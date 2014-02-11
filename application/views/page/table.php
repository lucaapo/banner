<script type="text/javascript" >
    function magnifyImg(id) {
        $('#' + id).dialog({ height: 800, width: 1000 }).open();
    }
    
    function deleteBanner(id){
        $.ajax('<?php echo site_url('banner/delete'); ?>',{
            method: 'post',
            data: {'banner_id':id},
            success: function (resp, state, xml){
                $('#'+id).hide();
            } 
           
        });
    }
    
</script>

<?php if (count($pages) > 0): ?>
    <?php echo $pagination;?>
    <table>
        <thead>
            <tr><td><?php echo $this->lang->line('page_table_head');?></td><td><?php echo $this->lang->line('banner_table_head');?></td><td><?php echo $this->lang->line('typology_table_head');?></td><td><?php echo $this->lang->line('start_date_table_head');?></td><td><?php echo $this->lang->line('end_date_table_head');?></td><td><?php echo $this->lang->line('action_table_head');?></td></tr>
        </thead>
        <tbody>
            <?php $i = 0;
            foreach ($pages as $page):
                ?>
                <tr id='<?php echo $page['banner_id'];?>'>
                    <td><?php echo $page['url']; ?></td>
                    <td><img src='<?php echo $page['storage']; ?>' height="70px" width="70px" 
                             onclick="js:magnifyImg('img<?php echo $i; ?>');"/>
                        <span id='img<?php echo $i; ?>'>
                            <img src='<?php echo $page['storage']; ?>'/>
                        </span>
                        <script type="text/javascript">
                            $('document').ready(function() {
                                $('#img<?php echo $i; ?>').hide();
                            });
                        </script>
                    </td>
                    <td><?php echo $page['typology']; ?></td>
                    <td><?php echo date('d-m-Y',  strtotime($page['start_date'])); ?></td>
                    <td><?php echo date('d-m-Y',  strtotime($page['end_date'])); ?></td>
                    <td><span class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="js:deleteBanner(<?php echo $page['banner_id'];?>);">Cancella</span></td><?php //echo anchor('','Cancella',array("onClick"=>'js:deleteBanner('.$page['banner_id'].');'));?>
                    
                </tr>

    <?php $i++;
    endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

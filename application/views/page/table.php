<script type="text/javascript" >
    function magnifyImg(id) {
        $('#' + id).dialog({ height: 800, width: 1000 }).open();
    }
</script>

<?php if (count($pages) > 0): ?>

    <table>
        <thead>
            <tr><td>Pagina</td><td>Banner</td><td>Typology</td><td>Start Date</td><td>End Date</td></tr>
        </thead>
        <tbody>
            <?php $i = 0;
            foreach ($pages as $page):
                ?>
                <tr>
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
                </tr>

    <?php $i++;
    endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

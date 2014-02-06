<!-- File che cotruisce l'header -->
<script type="text/javascript" src='/js/jquery-1.10.2.js'></script>
<script type="text/javascript" src='/js/jquery-ui-1.10.4.custom.min.js'></script>

<link href='/css/redmond/jquery-ui-1.10.4.custom.css' type="text/css" rel="stylesheet"/>

<script type="text/javascript" >
    $(document).ready(function() {
        $('#mainmenu').menu();
    });


</script>


<?php $this->load->library('Tank_auth');
       $auth = new Tank_auth();?>

<ul id='mainmenu' style='width: 200px;float:left; height: 90%; margin-right: 5px;'>
    
    <li><a href="#">Home</a></li>
    <?php if($auth->is_logged_in()): ?>
    <li><?php echo anchor("website/addone","Inserisci un Sito"); ?></li>
    <li><?php echo anchor("banner/form_upload","Aggiungi un Banner");?></li>
    <li><?php echo anchor('auth/logout',"Logout");?> </li>
    <?php else: ?>
    <li><?php echo anchor('auth/login',"Login");?></li>
    <li><?php echo anchor('auth/login',"Recupera password"); ?></li>
    <?php endif;?>
</li>
</ul>
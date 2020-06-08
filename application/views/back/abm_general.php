<?php foreach($css_files as $file): ?>
                <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
              
<section>
    <h1><?php echo $this->session->userdata("abm_general")?></h1>
        
    <div class="container">
        <div class="col-md-12 proveedoreditar">
            <?php echo $output; ?>
        </div>
    </div>
    </div><br><br><br><br> 
</section>   
    

                
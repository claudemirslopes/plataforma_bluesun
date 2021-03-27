        <!-- content -->
        <!-- MAIN CONTENT - CONTEÚDO PRINCIPAL -->
        
        <!-- SESSÃO COPYRIGHT -->
        <?php $this->load->view('layout/copyright') ?>
        <!-- SESSÃO COPYRIGHT -->
        
    </div><!-- /#right-panel -->

    <!-- BARRA DIREITA --> 
    
<!--    <script src="https://kit.fontawesome.com/a8568f4b07.js" crossorigin="anonymous"></script>-->
    <script src="<?php echo base_url('public/vendors/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/vendors/popper.js/dist/umd/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/main.js'); ?>"></script>
<!--    <script src="<?php echo base_url('public/vendors/chart.js/dist/Chart.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/dashboard.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/widgets.js'); ?>"></script>
    <script src="<?php echo base_url('public/vendors/jqvmap/dist/jquery.vmap.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js'); ?>"></script>
    <script src="<?php echo base_url('public/vendors/jqvmap/dist/maps/jquery.vmap.world.js'); ?>"></script>-->
    <script src="<?php echo base_url('public/assets/js/util.js'); ?>"></script>
    
    <?php if (isset($scripts)): ?>
    
        <?php foreach ($scripts as $script): ?>
    
            <script src="<?php echo base_url('public/'.$script); ?>"></script>
    
        <?php endforeach; ?>
    
    <?php endif; ?>

</body>

</html>
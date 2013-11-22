<script src="https://code.jquery.com/jquery.js"></script>
	<script type="text/javascript">
		var products = <?php echo $products; ?>;
		var product_images = <?php echo $product_images; ?>;
	</script>
    <script src="<?php echo site_url('../js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo site_url('../js/handlebars-v1.1.2.js'); ?>"></script>
    <script src="<?php echo site_url('../js/mediaelement-and-player.min.js'); ?>"></script>
    <script src="<?php echo site_url('../js/bjqs-1.3.js'); ?>"></script>
    <script src="<?php echo site_url('../js/frontend_scripts.js'); ?>"></script>
    <script type="text/javascript">
    	jQuery(document).ready(function() {
    	
    		jQuery('#product_entry').delay(6000).bjqs({
    		  height      : 600,
    		  width       : 800,
    		  responsive  : true
    		});
    	
    	});
    	
    </script>
  </body>
</html>
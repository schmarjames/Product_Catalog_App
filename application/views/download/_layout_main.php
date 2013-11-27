<?php $this->load->view('admin/components/page_head');?>
  <body>
  
	<nav class="navbar navbar-default" role="navigation">
	  <!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	      		<span class="sr-only">Toggle navigation</span>
		    	<span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	    	</button>
	   		<a class="navbar-brand" href="<?php echo site_url('download/dashboard'); ?>"><?php echo $meta_title; ?></a>
	 	</div>
	</nav>
  
   	<div class="container">
  		<div class="row">
	   		<!-- Main column -->
	   		<div class="pull-left col-xs-12 col-md-8">
	   			<?php $this->load->view($subview); ?>
	   		</div>
	   		<!-- Sidebar -->
	   		<div class="pull-right">
	   			<section>
	   				<?php echo mailto('sales@focusedlightengraving.com', '<i class="glyphicon glyphicon-envelope"></i> sales@focusedlightengraving.com'); ?><br>
	   				<?php echo anchor('download/dashboard/logout', '<i class="glyphicon glyphicon-off"></i> logout'); ?>
	   			</section>
	   		</div>
	   	</div>
   </div>
<?php $this->load->view('admin/components/page_tail');?>
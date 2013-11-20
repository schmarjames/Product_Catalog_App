<?php $this->load->view('components/page_head');?>
<body>
<h2>Laser Marking Systems</h2>

<br>
<div class="product_entry">
	<script id="template" type="text/x-handlebars-template">
	
		{{#each this}}
			<div class="product_info">
				<div id="image_gallery_wrapper">
					{{{image_group image}}}
			 	</div>
			 	
			 	<div id ="product_content_wrapper">
			 		<h1>{{name}}</h1>
			 		<p>{{description}}</p>
			 	</div>
		 	</div>
	 	{{/each}}
	 
	</script>
</div>



<?php $this->load->view('components/page_tail');?>
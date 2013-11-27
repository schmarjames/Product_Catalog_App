<?php $this->load->view('components/page_head');?>
<body>
<div id="header">
	<h2>Laser Marking Systems</h2>
	<div id="nav">
		<?php echo anchor('download/dashboard', 'Downloads'); ?> /
		<?php echo anchor('admin/dashboard', 'Admin'); ?>
	</div>
</div>

<br>
<div class="product_entry">

	<script id="template" type="text/x-handlebars-template">
		<ul class="bjqs">
		{{#each this}}
			<li>
				<div id="product_header">
					<div class="title"><h2>{{name}}</h2></div>
					<div class="price">$ {{price}}</div>
				</div>
				<div class="product_info">
					<div id="image_gallery_wrapper">
						{{{media_group media}}}
						<div class="description lead">{{description}}</div>
				 	</div>
				 	
				 	<div id ="product_content_wrapper">
				 		
				 		<div id="hightlight_wrapper">
				 			<ul class="highlight">
				 				{{#if highlight_message1}}
				 					<li class="alert alert-info"><span class="glyphicon glyphicon-star"></span> {{highlight_message1}}</li>
				 				{{/if}}
				 				{{#if highlight_message2}}
				 					<li class="alert alert-info"><span class="glyphicon glyphicon-star"></span> {{highlight_message2}}</li>
				 				{{/if}}
				 			</ul>
				 		</div>
				 		
				 		<div id='cssmenu{{@index}}' class="accordion">
					 		<ul>
					 		{{#if bullet_list_title1}}
						 		<li class="has-sub">
						 			<a href='#'><span>{{bullet_list_title1}}</span></a>
						 			<ul>
						 		   		<li>{{bullet_point1_1}}</li>
						 		   		<li>{{bullet_point1_2}}</li>
						 		   		<li>{{bullet_point1_3}}</li>
						 		   		<li>{{bullet_point1_4}}</li>
						 		   		<li>{{bullet_point1_5}}</li>
						 		   	</ul>
						 		</li>
						 	{{/if}}
					 		{{#if bullet_list_title2}}
					 			<li class="has-sub">
					 		   		<a href='#'><span>{{bullet_list_title2}}</span></a>
					 		   	   	<ul>
					 		   	   		<li>{{bullet_point2_1}}</li>
					 		   	   		<li>{{bullet_point2_2}}</li>
					 		   	   		<li>{{bullet_point2_3}}</li>
					 		   	   		<li>{{bullet_point2_4}}</li>
					 		   	   		<li>{{bullet_point2_5}}</li>
					 		   	   	</ul>
					 		   	</li>
					 		{{/if}}
					 		</ul>
				 		</div>  
				 	</div>
				</div>
				{{#if warranty_message}} <p class="alert alert-warning warranty">warranty: {{warranty_message}}</p> {{/if}}
			</li>
		{{/each}}
		</ul>
		<div id="product_footer">
			<address>
			  <p><strong>Dave Montes</strong></p>
			  <p><abbr title="Phone">P:</abbr> (407) 830-8885</p>
			  <p><abbr title="Fax">F:</abbr> (407) 927-2173</p>
			  <p><a href="mailto:#">dave@focusedlightengraving.com</a></p>
			</address>
		</div>
	</script>
</div>




<?php $this->load->view('components/page_tail');?>
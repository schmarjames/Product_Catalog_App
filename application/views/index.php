<?php $this->load->view('components/page_head');?>
<body>
<h2>Laser Marking Systems</h2>

<br>
<div class="product_entry">
<ul class="bjqs">
	<script id="template" type="text/x-handlebars-template">
		{{#each this}}
			<li>
			<div class="product_info">
				<div id="image_gallery_wrapper">
					{{{media_group media}}}
					<div class="description">{{description}}</div>
			 	</div>
			 	
			 	<div id ="product_content_wrapper">
			 	
			 		<h2>{{name}}</h2>
			 		
			 		<div id="price_hightlight_wrapper">
			 			<div class="price">$ {{price}}</div>
			 			<ul class="highlight">
			 				{{#if highlight_message1}}
			 					<li class="alert alert-info"><span class="glyphicon glyphicon-star"></span> {{highlight_message1}}</li>
			 				{{/if}}
			 				{{#if highlight_message2}}
			 					<li class="alert alert-info"><span class="glyphicon glyphicon-star"></span> {{highlight_message2}}</li>
			 				{{/if}}
			 			</ul>
			 		</div>
			 		
			 		
			 		
			 		{{#if bullet_list_title1}}
				 		<div class="panel-group" id="accordion">
				 		  <div class="panel panel-default">
				 		    <div class="panel-heading">
				 		      <h4 class="panel-title">
				 		        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
				 		          {{bullet_list_title1}}
				 		        </a>
				 		      </h4>
				 		    </div>
				 		    <div id="collapseOne" class="panel-collapse collapse in">
				 		      <div class="panel-body">
				 		        <ul>
				 		        	<li>{{bullet_point1_1}}</li>
				 		        	<li>{{bullet_point1_2}}</li>
				 		        	<li>{{bullet_point1_3}}</li>
				 		        	<li>{{bullet_point1_4}}</li>
				 		        	<li>{{bullet_point1_5}}</li>
				 		        </ul>
				 		      </div>
				 		    </div>
				 		  </div>
			 		  {{/if}}
			 		  
			 		  {{#if bullet_list_title2}}
				 		  <div class="panel panel-default">
				 		    <div class="panel-heading">
				 		      <h4 class="panel-title">
				 		        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				 		         {{bullet_list_title2}}
				 		        </a>
				 		      </h4>
				 		    </div>
				 		    <div id="collapseTwo" class="panel-collapse collapse">
				 		      <div class="panel-body">
					 		  	<ul>
					 		       	<li>{{bullet_point2_1}}</li>
					 		       	<li>{{bullet_point2_2}}</li>
					 		       	<li>{{bullet_point2_3}}</li>
					 		       	<li>{{bullet_point2_4}}</li>
					 		       	<li>{{bullet_point2_5}}</li>
					 		  	</ul>
				 		      </div>
				 		    </div>
				 		  </div>
			 		  {{/if}}
			 		  
			 		  {{#if bullet_list_title3}}
			 		  <div class="panel panel-default">
			 		    <div class="panel-heading">
			 		      <h4 class="panel-title">
			 		        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
			 		          {{bullet_list_title3}}
			 		        </a>
			 		      </h4>
			 		    </div>
			 		    <div id="collapseThree" class="panel-collapse collapse">
			 		      <div class="panel-body">
			 		         <ul>
			 		          	<li>{{bullet_point3_1}}</li>
			 		          	<li>{{bullet_point3_2}}</li>
			 		          	<li>{{bullet_point3_3}}</li>
			 		          	<li>{{bullet_point3_4}}</li>
			 		          	<li>{{bullet_point3_5}}</li>
			 		         </ul>
			 		      </div>
			 		    </div>
			 		  </div>
			 		{{/if}}
			 		  
				</div>
			</div>
			{{#if warranty_message}} <p class="alert alert-warning warranty">warranty: {{warranty_message}}</p> {{/if}}
			</div>
			</li>
		{{/each}}
	</script>
</ul>
</div>



<?php $this->load->view('components/page_tail');?>
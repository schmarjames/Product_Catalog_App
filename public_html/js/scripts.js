jQuery(document).ready(function(){
	
	/*for (var i=0; i<products.length; i++) {
		
		for (var j=0; j<product_images.length; j++) {
			if(products[i].id == product_images[j].product_id) {
				console.log(product_images[j]);
			}
		}
	}*/
	
	var product_data = [];
	var image_data = {};
	var image = [];
	var image_new_data = {};
	
	for (var i=0; i<products.product.length; i++) {
		
		tempdata = products.product[i];
		product_data.push(tempdata);
		  		
		for (var j=0; j<product_images.product_image.length; j++) {
			if (products.product[i].id == product_images.product_image[j].product_id) {
		  		tempdataimage = product_images.product_image[j].file_name;
		  		image.push(tempdataimage);
		  	}	
		}
		  	
		image_new_data.image = image;
		console.log(image_new_data);
		jQuery.extend(product_data[i], image_new_data);
		image = [];
	}
	
	Handlebars.registerHelper('image_group', function( image ) {
		var image_list = '';
		for(var x=0; x<image.length; x++) {
			if (x == 0)
			{
		    	image_list = image_list + "<div id='main_image'><img src='img/"+ image[x] + "' ></div>";
		    	image_list = image_list + "<ul>";
		    }
		    image_list = image_list + "<li class='thumb_image"+x+"'><img src='img/"+ image[x] + "' ></li>";
		}  
		image_list = image_list + "</ul>";
		return image_list;
	});
	
	//console.dir(product_data);
	//console.dir(image_new_data);
	
	var template = Handlebars.compile( $("#template").html() );
	$(".product_entry").append( template(product_data) );
	
	jQuery("#image_gallery_wrapper ul li").click(function() {
		var clicked_thumb = this,
			choosen_img = this.childNodes,
			swap_img;
		
		jQuery(this).parent().parent().find("#main_image").fadeOut(200, function() {
			swap_img = this.childNodes;
			console.log(swap_img);
			jQuery(this).html(choosen_img).fadeIn(200);
		});
		
	});
	
	var uri = location.pathname;
	
	if ((uri.indexOf("/admin/dashboard/edit/")) > -1 && parseInt((uri.substr(uri.lastIndexOf('/')+1))) > 0) {
		jQuery("#upload_wrapper #image_checkbox_wrapper input:checkbox").attr('checked', false);
		if(jQuery(".bullet_group input:text").val != "") {
			jQuery(".bullet_group").show();
		}
			
		var checked_len = jQuery("#upload_wrapper #image_checkbox_wrapper input:checkbox").length;
		var file_len =jQuery("#file_upload_wrapper .upload_input").length;
		
		jQuery("#file_upload_wrapper .upload_input").each(function(i) {
			if(i < checked_len) {
				jQuery("#file_upload_wrapper .form-group").eq(i).hide();
			
			}
		});	
	}
	
	// debugging: (uri.indexOf('admin/dashboard/edit') > -1) ? console.log("we are on the page") : console.log("this is the wrong page");
	
	jQuery("#bullet_set1 .bullet_title, #bullet_set2 .bullet_title").blur(function() {
		var group_num = jQuery(this).parent().attr('id');

		if (jQuery(this).val() != '') {
			jQuery("#"+group_num).children("ul.bullet_group").fadeIn(500);
			jQuery("#"+group_num).find(".help-block").show();
		}
		else {
			jQuery("#"+group_num).children("ul.bullet_group").fadeOut(500, function(){
				jQuery(this).find("input:text").val('');
			});			
			jQuery("#"+group_num).find(".help-block").hide();
		}
	});
});

(function(){
 	jQuery("#image_checkbox_wrapper input[name=image_check]").on("change", function(){	
 		if(jQuery(this).is(":checked")) {
	 		jQuery("#image_checkbox_wrapper .check_wrap:has(:checkbox:checked)").map(function() {
	 		        return jQuery(this).index();  // index in parent
	 		    }).each(function() {
	 		        "use strict";
	 		        //alert(parseInt(this));
	 		       jQuery("#file_upload_wrapper .form-group:eq("+(this)+")").fadeIn(200);
	 		});
 		}
 		else {
 			jQuery("#image_checkbox_wrapper .check_wrap:has(:checkbox:not(:checked))").map(function() {
 			        return jQuery(this).index();  // index in parent
 			    }).each(function() {
 			        "use strict";
 			        //alert(parseInt(this));
 			       jQuery("#file_upload_wrapper .form-group:eq("+(this)+")").fadeOut(200).find("input:file").val('');
 			});
 		}	
 	});
})();
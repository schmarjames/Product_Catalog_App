jQuery(document).ready(function(){

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
	
	// Dynamically creates and appends character counter for the form inputs
	jQuery("#edit_form *").filter(":input").each(function(){
		var name_attr = jQuery(this).attr('name');
		
		if (name_attr != "image_check") {
			jQuery(this).attr('id', name_attr);
			jQuery(this).after('<div id="'+name_attr+'_char" class="badge"></div>');
		}
		
		var char_div = jQuery("#"+name_attr+"_char");
		
		char_div.css({
			"margin" 	: "5px",
			"font-size"	: "14px"
		});
	});
	
	// Character limit for each input within the edit form
	var edit_fields = {
			"name"					: 70,
			"description"			: 500,
			"highlight_message1"	: 75,
			"highlight_message2"	: 75,
			"bullet_list_title1"	: 100,
			"bullet_point1_1"		: 90,
			"bullet_point1_2"		: 90,
			"bullet_point1_3"		: 90,
			"bullet_point1_4"		: 90,
			"bullet_point1_5"		: 90,
			"bullet_list_title2"	: 100,
			"bullet_point2_1"		: 90,
			"bullet_point2_2"		: 90,
			"bullet_point2_3"		: 90,
			"bullet_point2_4"		: 90,
			"bullet_point2_5"		: 90,
			"warranty_message"		: 150
	};
	
	// Call the limiter plugin on each form element
	jQuery.each(edit_fields, function(field, char_amount) {
		var elem = jQuery("#"+field+"_char");
		jQuery("#"+field).limiter(char_amount,elem);
	});
	
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
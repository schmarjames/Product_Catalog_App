(function(){

	/*for (var i=0; i<products.length; i++) {
		
		for (var j=0; j<product_images.length; j++) {
			if(products[i].id == product_images[j].product_id) {
				console.log(product_images[j]);
			}
		}
	}*/
	
	var product_data = [];
	var media_data = {};
	var media = [];
	var media_new_data = {};
	
	for (var i=0; i<products.product.length; i++) {
		
		tempdata = products.product[i];
		product_data.push(tempdata);
		  		
		for (var j=0; j<product_images.product_image.length; j++) {
			if (products.product[i].id == product_images.product_image[j].product_id) {
		  		tempdatamedia = product_images.product_image[j].file_name;
		  		media.push(tempdatamedia);
		  	}	
		}
		  	
		media_new_data.media = media;
		console.log(media);
		jQuery.extend(product_data[i], media_new_data);
		media = [];
	}
	
	Handlebars.registerHelper('media_group', function( media ) {
		var media_list = '', video_file, image_file, source_tag, video_tag, img_tag, video_ready = [],
			image_ready = [], video_section, thumb_list,
			video_extension = ['m4v', 'webm', 'ogv', '3pg', 'mp4', 'flv', 'wmv', 'swf'];
			
		for (var x=0; x<media.length; x++) {
			var extension = media[x].replace(/^.*\./, '');
			
			for (j=0; j<video_extension.length; j++) {
				if (video_extension[j] == extension) {
					// These media files are videos
					// Place them within the video tags
					video_file = media[x];
					
					if (x == 0) {
						jQuery("#main_media_section video").css("display", "block");
					} 
					
					source_tag = "<source type='video/" + extension + "' src='media/" + video_file + "' />";
					
					video_tag = "<video width='350' height='250' id='player' controls='controls' preload='none'>" + source_tag + "<object width='350' height='250' type='application/x-shockwave-flash' data='flashmediaelement.swf'><param name='movie' value='flashmediaelement.swf' /><param name='flashvars' value='controls=true&amp;file=media/" + video_file + "' /></object></video>";	
		
					video_ready.push(video_tag);
					arr_index = media.indexOf(media[x]);
					media.splice(arr_index, 1);
				} 	
			}
			
			image_file = media[x];
			img_tag = "<img src='media/"+ image_file + "' >";
			image_ready.push(img_tag);
		}
		  
		video_section = "<div id='video_section'>";
		thumb_list = "<ul>";
		if (video_ready.length > 0) {
			for (m=0; m<video_ready.length; m++) {
				video_section = video_section + "<div id='vid_"+m+"'>" + video_ready[m] + "</div>";
				thumb_list = thumb_list + "<li class='thumbnail thumb_media"+m+" vid_"+m+"'><span class='video_image_placeholder'>Video</span></li>";
			}
		}
		video_section = video_section + "</div>";
		
		for (n=0; n<image_ready.length; n++) {
			thumb_list = thumb_list + "<li class='thumbnail thumb_media"+n+" image'>" + image_ready[n] + "</li>";
		}
		
		thumb_list = thumb_list + "</ul>";
		media_list = "<div id='main_media_section'>" + video_section + "</div>" + thumb_list + "";
		return media_list;
	});
	
	var template = Handlebars.compile( jQuery("#template").html() );
	jQuery(".product_entry").append( template(product_data) );
	
	jQuery('audio,video').mediaelementplayer({
		success: function(player, node) {
			jQuery('#' + node.id + '-mode').html('mode: ' + player.pluginType);
		}
	});
	
	// Check first thumbnail and load media within main media section based on thumbnail type
	jQuery(".product_info").each(function(i){
		if (jQuery(this).find("#image_gallery_wrapper .thumbnail:first").hasClass("vid_0")) {
			jQuery(this).find("#image_gallery_wrapper #video_section").css({"display": "block", "zIndex": 100});
			jQuery(this).find("#image_gallery_wrapper #video_section #vid_0").css("zIndex", 100);
		} else if (jQuery(this).find("#image_gallery_wrapper .thumbnail:first").hasClass("image")) {
			var image_swap = jQuery(this).find("#image_gallery_wrapper .thumbnail:first").children('img').clone();
			jQuery(this).find("#main_media_section").append(image_swap);
		}
	});
	
	// Click event that checks if thumbnail is for a video or image
	// If the thumbnail is vid_# class then display that video with the matching # in the main media section
	// Else clone & prepend the img tag in the thumbnail to the main media section
	jQuery("#image_gallery_wrapper .thumbnail").click(function() {
		var clicked_thumb = jQuery(this),
			thumb_index = jQuery(this).index(),
			choosen_media = clicked_thumb.children('img');
			
		if (clicked_thumb.hasClass("vid_"+thumb_index+"")) {
			jQuery(this).parent().parent().find("#main_media_section img").remove();
			jQuery(this).parent().parent().find("#main_media_section #video_section").css({"display": "block", "zIndex": 100});
			jQuery(this).parent().parent().find("#main_media_section #video_section #vid_"+thumb_index+"").css("zIndex", 100);
			jQuery(this).parent().parent().find("#main_media_section #video_section #vid_"+thumb_index+"").siblings().css("zIndex", -100);
		} else {
			jQuery(this).parent().parent().find("#main_media_section").fadeOut(200, function() {
				jQuery(this).find("img").remove();
				if (clicked_thumb.children('img')) {
					jQuery(this).find("#video_section").css({"display": "none", "zIndex": -100});
					choosen_media.clone().appendTo(this);
					jQuery(this).fadeIn(200);
				}
			});
		}
	});
	
	// Accordion functionality 
	jQuery(".accordion").each(function(i) {
		jQuery(this).attr('id', 'cssmenu'+i);
		
		jQuery("#cssmenu"+i+" > ul > li > a").click(function() {
			var checkElement = jQuery(this).next();
			  
			jQuery("#cssmenu"+i+" li").removeClass('active');
			jQuery(this).closest('li').addClass('active');	
			  
			  
			if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		    	jQuery(this).closest('li').removeClass('active');
		    	checkElement.slideUp('normal');
		  	}
			  
		  	if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		    	jQuery("#cssmenu"+i+" ul ul:visible").slideUp('normal');
		    	checkElement.slideDown('normal');
		  	}
			  
		  	jQuery("#cssmenu"+i+" ul li ul li").each(function() {
		  		if(jQuery(this).text() == '') {
		  			jQuery(this).css("display", "none");
		  		}
		  	});
			  
		  	if (checkElement.is('ul')) {
		    	return false;
		  	} else {
		    	return true;	
		  	}		
		});
	});
	
	jQuery('.product_entry').bjqs({
		  height      : 555,
		  width       : 800,
		  automatic   : false,
		  nexttext : '',
		  prevtext : '',
		  responsive  : true
		});
		
	jQuery(".bjqs-prev a").append('<span class="glyphicon glyphicon-chevron-left"></span>');
	jQuery(".bjqs-next a").append('<span class="glyphicon glyphicon-chevron-right"></span>');
	
	jQuery(".bjqs-markers li:first").addClass("first");
	jQuery(".bjqs-markers li:last").addClass("last");
	

})();
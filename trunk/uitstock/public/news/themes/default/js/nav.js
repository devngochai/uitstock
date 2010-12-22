// JavaScript Document
jQuery(document).ready(function(){
	var timer=null;	
	var leftPos = jQuery("#menu > li > a.Active").parent().position().left;
	var childWidth = jQuery("#menu > li > a.Active").parent().find("ul").outerWidth();
	leftPos = leftPos-(childWidth-100)/2;
	if (leftPos < 27) {
		leftPos = 27;
	}
	if (leftPos + childWidth > 1000) {
		leftPos = leftPos - (childWidth-100)/2;
	}
	jQuery("#menu > li > a.Active").parent().find("ul").css("width",childWidth);
	jQuery("#menu > li > a.Active").parent().find("ul").css("left",leftPos);		

	jQuery("#menu > li > a").bind("mouseover",function(evt) {	
		clearTimeout(timer);
		jQuery("#menu > li > ul").css("left","-999em");
		jQuery("#menu > li > a.Hover").removeClass("Hover");
		
		leftPos = jQuery(this).parent().position().left;
		childWidth = jQuery(this).parent().find("ul").outerWidth();
		leftPos = leftPos-(childWidth-100)/2;
		if (leftPos < 27) {
			leftPos = 27;
		}
		if (leftPos + childWidth > 1000) {
			leftPos = leftPos - (childWidth-100)/2;
		}
		jQuery(this).parent().find("ul").css("left",leftPos);
		jQuery(this).parent().find("ul").css("width",childWidth);
		
		jQuery(this).addClass("Hover");
		
		jQuery(".SearchBox").hide();
		evt.stopPropagation();	
	});
	jQuery("#menu > li > ul").bind("mouseover",function(evt) {	
		clearTimeout(timer);															 
		evt.stopPropagation();	
	});
	jQuery(document).bind("mouseover",function() {
		clearTimeout(timer);										
		timer = setTimeout(function() {
			jQuery("#menu  > li > a.Hover").removeClass("Hover");									
			jQuery("#menu > li > ul").css("left","-999em");
			
			leftPos = jQuery("#menu > li > a.Active").parent().position().left;
			childWidth = jQuery("#menu > li > a.Active").parent().find("ul").outerWidth();
			leftPos = leftPos-(childWidth-100)/2;
			if (leftPos < 27) {
				leftPos = 27;
			}
			if (leftPos + childWidth > 1000) {
				leftPos = leftPos - (childWidth-100)/2;
			}
			jQuery("#menu > li > a.Active").addClass("Hover").parent().find("ul").css("left",leftPos);
			jQuery("#menu > li > a.Active").parent().find("ul").css("width",childWidth);
			jQuery(".SearchBox").show();
		},1000);
	});
});

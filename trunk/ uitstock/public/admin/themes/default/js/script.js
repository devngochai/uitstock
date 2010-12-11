$(function () 
{
	slate.init ();
	slate.portlet.init ();
	
	$('.com').select();	
	$('.hide').hide();
	$('.hide1').hide();
	$('.hide2').hide();		
	
	$(".date").mask("99/99/9999"); 
	
	button();
	
	autoFocus();
			                		
	setEqualHeight();		
	
	addActionForButton();
	
	checkAll();
		
});


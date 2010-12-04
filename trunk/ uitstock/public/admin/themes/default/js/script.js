$(function () 
{
	slate.init ();
	slate.portlet.init ();
	
	$('.com').select();	
	$('.hide').hide();
	$('.hide1').hide();
	$('.hide2').hide();		
	
	button();
	
	autoFocus();
			                		
	setEqualHeight();		
	
	addActionForButton();
	
	checkAll();
		
});


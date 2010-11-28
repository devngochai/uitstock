/* -------------------------------------------------------------- 
   Set equal height
-------------------------------------------------------------- */
function setEqualHeight()
{
	var highestCol1 = Math.max($('.infor .portlet-content').height(), $('.dashboard .portlet-content').height());
	$('.infor .portlet-content').height(highestCol1);	
	$('.dashboard .portlet-content').height(highestCol1);	
	
	var highestCol2 = Math.max($('.infor').height(), $('.dashboard').height());
	$('.infor').height(highestCol2);	
	$('.dashboard').height(highestCol2);	
	
	var highestCol3 = Math.max($('#ticket').height(), $('#todo').height());
	$('#ticket').height(highestCol3);	
	$('#todo').height(highestCol3);
}

/* -------------------------------------------------------------- 
   Add css to button
-------------------------------------------------------------- */
function button() 
{
	jQuery('a.minibutton').bind({
		mousedown: function() {
			jQuery(this).addClass('mousedown');
		},
		blur: function() {
			jQuery(this).removeClass('mousedown');
		},
		mouseup: function() {
			jQuery(this).removeClass('mousedown');
		}
	});
}

/* -------------------------------------------------------------- 
* Auto Suggestion
*
* @param inputString The string user type
* @param thisValue The String that user choice
-------------------------------------------------------------- */
function suggest(inputString)
{
	if(inputString.length == 0) {
		$('#suggestions').fadeOut();
	} else {
		$('.txtSearch').addClass('load');
		var path = $('.txtSearch').attr('path');
		var component_id = $('.txtSearch').attr('component');
		$.ajax({
			url: path,
			data: "name=" + inputString + "&component_id=" + component_id,
			cache: false,
			success: function(data){
				$('#suggestions').fadeIn();
				$('#suggestionsList').html(data);
				$('.txtSearch').removeClass('load');	    
			}
		});			
	}
}

function fill(thisValue) {
	$('.txtSearch').val(thisValue);
	setTimeout("$('#suggestions').fadeOut();", 100);
}

/* -------------------------------------------------------------- 
   Count the number of record in table
-------------------------------------------------------------- */
function countRow()
{
	var i = 0;
	$(".rows tr").each(function(){
		i++;
	});
	return i;
}

/* -------------------------------------------------------------- 
  Add action for button
-------------------------------------------------------------- */
function addActionForButton()
{
	$('a.add').click(function(){
		var path = $(this).attr("path");
		document.location = path;
	});
	
	$('a.edit').click(function(){
		var id = $("input[name='select']:checked").attr("id");
		var name = $(this).attr("name");
		if (id == undefined) {jAlert('Bạn chưa chọn ' + name + ' nào', 'Thông báo');
								; return; }
		document.location = $(this).attr("path") + "/id/" + id;
	});
		
	
	$('a.default').click(function(){
		var id = $("input[name='select']:checked").attr("id");
		var component = $("input[name='select']:checked").attr("component");		
		var name = $(this).attr("name");
		var path = $(this).attr("path");
		var currentpath = $(this).attr("currentpath");
		var count = countRow();					
		
		if (id == undefined) {jAlert('Bạn chưa chọn ' + name + ' nào', 'Thông báo');
								; return; }				
		$.ajax({
			url: path,
			data: 'id=' + id + "&component=" + component + "&count=" + count,
			cache: false,
			success: function(data){
				if (data == 'error') alert(name + ' này không tồn tại!');
				else document.location = currentpath;
			}
		});
	});		
	
	$('a.delete').click(function(){
		var id = $("input[name='select']:checked").attr("id");
		var name = $(this).attr("name");
		var path = $(this).attr("path");
		var currentpath = $(this).attr("currentpath");
		if (id == undefined) {jAlert('Bạn chưa chọn ' + name + ' nào', 'Thông báo');
								; return; }
		jConfirm('Bạn có muốn xóa ' + name + ' này không ?', 'Chú ý', function(r) {
			if (r)
			{
				$.ajax({
					url: path,
					data: 'id=' + id,
					cache: false,
					success: function(data){
					    if (data == 'error') alert(name + ' này không tồn tại!');					   
					    else if (data == 'default')  {jAlert('Không thể xóa ' + name + ' này!', 'Chú ý');
														; return; }    										
						else document.location = currentpath;				    
					}
				});
			}
		});
	});
	
	$('.btnSearch').click(function(){
		var name = $('.txtSearch').val();
		var currentpath = $(this).attr('currentpath');
		document.location = currentpath + "name/" + name;
		
	});
}
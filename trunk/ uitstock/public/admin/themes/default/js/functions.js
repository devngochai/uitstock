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
   Auto focus in input
-------------------------------------------------------------- */
function autoFocus()
{
	$('.zend_form').find('input').first().focus();
	$('.txtSearch').focus();
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
  Toggles the check state of a group of boxes
-------------------------------------------------------------- */
function checkAll()
{		
	$("#select_all").click(function(){
		var status = this.checked;
		$("input[name='select']").each(function(){this.checked = status;})
	});
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
		var path = $(this).attr("path")
		if (id == undefined) {jAlert('Bạn chưa chọn ' + name + ' nào', 'Thông báo');
								; return; }
		document.location = path + "/id/" + id;
	});
	
	$('a.edit2').click(function(){
		document.location = $(this).attr("path");
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
	
	$('a.delete2').click(function(){
		var id = $(this).attr("id");	
		var name = $(this).attr("name");
		var path = $(this).attr("path");
		var back = $(this).attr("back");
				
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
						else document.location = back;				    
					}
				});
			}
		});
	});
	
	$('a.publish').click(function(){
		var listid = "";
		var name = $(this).attr('name');
		var path = $(this).attr('path');
		var currentpath = $(this).attr('currentpath');
		
		$("input[name='select']").each(function(){
			if (this.checked) listid += "," + this.value; 			
		})
		listid = listid.substr(1);
		
		$.ajax({
			url: path,
			data: 'listid=' + listid,
			cache: false,
			success: function(data) {
				if (data == 'error') {jAlert('Bạn chưa chọn ' + name + ' nào!', 'Chú ý');
										; return; }
				else {
					//document.location = currentpath;
					$("input[name='select']").each(function() {
						if (this.checked) {
							var $parent = $(this).parent().parent()
							var pathDirImg = $parent.find('.pub').attr('pathDirImg');							
							$parent.find('.pub').attr('src', pathDirImg + '/AnHien_1.png');
						}						
					});	
				}
			}
		});
	});
	
	$('a.unpublish').click(function(){
		var listid = "";
		var name = $(this).attr('name');
		var path = $(this).attr('path');
		var currentpath = $(this).attr('currentpath');
		
		$("input[name='select']").each(function(){
			if (this.checked) listid += "," + this.value; 			
		})
		listid = listid.substr(1);
		
		$.ajax({
			url: path,
			data: 'listid=' + listid,
			cache: false,
			success: function(data) {
				if (data == 'error') {jAlert('Bạn chưa chọn ' + name + ' nào!', 'Chú ý');
										; return; }
				else {
					//document.location = currentpath;
					$("input[name='select']").each(function() {
						if (this.checked) {
							var $parent = $(this).parent().parent()
							var pathDirImg = $parent.find('.pub').attr('pathDirImg');							
							$parent.find('.pub').attr('src', pathDirImg + '/AnHien_0.png');
						}						
					});	
				}
			}
		});
	});
	
	$('.pub').click(function(){
		var id = $(this).attr('id');
		var path = $(this).attr('path');
		var pathDirImg = $(this).attr('pathDirImg');
		var name = $(this).attr('name');
		obj = this;
		
		$.ajax({
			url: path,
			data: 'id=' + id,
			cache: false,
			success: function(data) {						   
				obj.src = pathDirImg + '/' + data;
				if (data == 'AnHien_1.png') obj.title = 'Nhấn vào để ẩn ' + name;
				else obj.title = 'Nhấn vào để hiện ' + name;
			}
		});
	});
	
	$('a.deleteall').click(function(){
		var listid = "";
		var name = $(this).attr('name');
		var path = $(this).attr('path');
		var currentpath = $(this).attr('currentpath');
		
		$("input[name='select']").each(function(){
			if (this.checked) listid += "," + this.value; 			
		})
		listid = listid.substr(1);
		
		if (listid == "") {jAlert('Bạn chưa chọn ' + name + ' nào', 'Thông báo');
									; return; }
		jConfirm('Bạn có muốn xóa ' + name + ' này không ?', 'Chú ý', function(r) {
			if (r)
			{
				$.ajax({
					url: path,
					data: 'listid=' + listid,
					cache: false,
					success: function(data) {
						if (data == 'error') alert(name + ' này không tồn tại!');					   
					    else if (data == 'default')  {jAlert('Không thể xóa ' + name + ' này!', 'Chú ý');
														; return; }			
						else document.location = currentpath;
				    }
				});
			}
		});
	});		
	
	$('a.close').click(function(){
		document.location = $(this).attr("back");
	});
	
	$('.selectBox').change(function(){	
		$("tbody.rows").html("");
		$('.hide').show();
		var componentId = $('.cat .active').attr('id');
		var pageId = this.value;
		var path = $(this).attr('path');
		var data = "/componentId/" + componentId + "/pageId/" + pageId;
	
		$.ajax({
			url: path,
			data: 'componentId=' + componentId + "&pageId=" + pageId,
			cache: false,
			success: function(data) {	
				$('.hide').hide();
				$("tbody.rows").html(data);				
				change3();	
		    }
		});
		
	});
	
		
	$('.ListDynChange').change(function(){		
		var dest = $(this).attr('dest');		
		$('.' + dest).parent().append($('.hide1'));
		$('.' + dest).html("");
		$('.hide1').show();
		var Id = $(this).val();
		var path = $(this).attr('path');		
		
		$.ajax({
			url: path,
			data: 'Id=' + Id,
			cache: false,
			success: function(data) {		
				$('.hide1').hide();
				$('.' + dest).html(data);
				checkAll();
		    }
		});
	});		
			
	$('.next').click(function(){
		$('.hide1').insertAfter($('.buttonrow'));
		$('.message1').html('');
		$('.message2').html('');
		$('.hide1').show();
		
		var name = $('.wname').val();
		if (name == "")  {jAlert('Bạn chưa nhập tên widget !', 'Thông báo');$('.hide1').hide();
							 return false; } 	
		
		var alias = $('.walias').val();
		if (alias == "")  {jAlert('Bạn chưa nhập alias !', 'Thông báo'); $('.hide1').hide();
							 return false; } 	
		
		var path = $('.wpath').val();
		if (path == "")  {jAlert('Bạn chưa nhập đường dẫn thư mục widget !', 'Thông báo');$('.hide1').hide();
							 return false; } 
		
		var componentId = $('.wcomponent').attr('value');	
		if (componentId == 0)  {jAlert('Bạn chưa chọn component nào', 'Thông báo');$('.hide1').hide();
								 return false; } 
				
		var listPageId = "";
		$("input[name='select']").each(function(){
			if (this.checked) listPageId += "," + this.value; 
		});	
		
		if (listPageId == "")  {jAlert('Bạn chưa chọn page nào', 'Thông báo');$('.hide1').hide();
								 return false; } 
		listPageId = listPageId.substr(1);
		
		var published = $('.wpublished').val();
		var url = $(this).attr('url');
		
		var widgetId = $(this).attr('id');		
		
		var data = "componentId=" + componentId  + "&name=" + name +
					"&path=" + path + "&listPageId=" + listPageId + 
					"&published=" + published +	'&alias=' + alias;
		
		$.ajax({
			url: url,
			data:  data,		
			success: function(data) {			
				var num = data.indexOf('@');
				var flag = data.substring(0, num);
				var mess = data.substring(num + 1);
				
				if (flag == 'duplicate1') {$('.message1').fadeIn('slow').text(mess).css({'color' : 'Green', 'display' :'inline'}); $('.hide1').hide();
												return false; }				 
				if (flag == 'duplicate2') {$('.message2').fadeIn('slow').text(mess).css({'color' : 'Green', 'display' :'inline'}); $('.hide1').hide();
												return false; }				
				
				$('.hide1').hide();
				$('.message').html('').removeClass('message');				
				$('.addContentDyn').html(data);	
				change();
		    }
		});
										
		return false;
	});
				

	$('.next2').click(function(){
		$('.hide1').insertAfter($('.buttonrow'));
		$('.message1').html('');
		$('.message2').html('');
		$('.hide1').show();
		
		var name = $('.wname').val();
		if (name == "")  {jAlert('Bạn chưa nhập tên widget !', 'Thông báo');$('.hide1').hide();
							 return false; } 	
		
		var alias = $('.walias').val();
		if (alias == "")  {jAlert('Bạn chưa nhập alias !', 'Thông báo'); $('.hide1').hide();
							 return false; } 	
		
		var path = $('.wpath').val();
		if (path == "")  {jAlert('Bạn chưa nhập đường dẫn thư mục widget !', 'Thông báo');$('.hide1').hide();
							 return false; } 	
				
		var pageId = $('.wpage').val();
		
		var published = $('.wpublished').val();
		var url = $(this).attr('url');
		
		var widgetId = $(this).attr('wid');	
		var pageWidgetId = $(this).attr('pwid');
		var componentId = $(this).attr('componentId');
		var position = $(this).attr('position');
		var ordering = $(this).attr('ordering');		
		
		var data = "componentId=" + componentId  + "&name=" + name +
					"&path=" + path + "&pageId=" + pageId + "&published=" + published +
					"&pageWidgetId=" + pageWidgetId + '&widgetId=' + widgetId + 
					'&alias=' + alias + "&position=" + position + '&ordering=' + ordering;				
		
		$.ajax({
			url: url,
			data:  data,		
			success: function(data) {			
				var num = data.indexOf('@');
				var flag = data.substring(0, num);
				var mess = data.substring(num + 1);
				
				if (flag == 'duplicate1') {$('.message1').fadeIn('slow').text(mess).css({'color' : 'Green', 'display' :'inline'}); $('.hide1').hide();
												return false; }				 
				if (flag == 'duplicate2') {$('.message2').fadeIn('slow').text(mess).css({'color' : 'Green', 'display' :'inline'}); $('.hide1').hide();
												return false; }				
				
				$('.hide1').hide();
				$('.message').html('').removeClass('message');				
				$('.addContentDyn').html(data);	
				change2();
		    }
		});
										
		return false;
	});

	$('.btnSearch').click(function(){
		var word = $('.txtSearch').val();
		var name = $(this).attr('name');
		var currentpath = $(this).attr('currentpath');
		document.location = currentpath + "/" + name + "/" + word;		
	});	
	
	$(".order").click(function(){
		var path = $(this).attr('path');
		var currentPath = $(this).attr('currentPath');
		
		var type = $(this).attr('type');
		var id = $(this).attr('id');
		var ordering = $(this).attr('ordering');		
		var position = $(this).attr('position');
		var pageId = $(this).attr('pageId');
		
		var data = 'type=' + type + '&id=' + id + '&ordering=' + ordering +
					'&position=' + position + '&pageId=' + pageId;
	
		$.ajax({
			url: path,
			data: data,
			cache: false,
			success: function(data) {							
				document.location = currentPath;			
			}
		});
	});
}


function change()
{
	$('.selectChangeDouble').change(function(){		
		var data1 = $(this).val();		
		var data2 = $(this).attr('data');		
		var path = $(this).attr('path');		
		var dest = $(this).attr('dest');
				
		$.ajax({
			url: path,
			data: 'Id1=' + data1 + "&Id2=" + data2,
			cache: false,
			success: function(data) {				
				$('.' + dest).html(data);				
		    }
		});
	});	
}

function change2()
{
	$('.selectChangeDouble').change(function(){		
		var data1 = $(this).val();		
		var data2 = $(this).attr('data');		
		var data3= $(this).attr('positionCurrent');
		
		var path = $(this).attr('path');		
		var dest = $(this).attr('dest');
				
		$.ajax({
			url: path,
			data: 'Id1=' + data1 + "&Id2=" + data2 + "&Id3=" + data3 ,
			cache: false,
			success: function(data) {				
				$('.' + dest).html(data);				
		    }
		});
	});
}

function change3()
{
	$('.pub').click(function(){
		var id = $(this).attr('id');
		var path = $(this).attr('path');
		var pathDirImg = $(this).attr('pathDirImg');
		var name = $(this).attr('name');
		obj = this;
		
		$.ajax({
			url: path,
			data: 'id=' + id,
			cache: false,
			success: function(data) {						   
				obj.src = pathDirImg + '/' + data;
				if (data == 'AnHien_1.png') obj.title = 'Nhấn vào để ẩn ' + name;
				else obj.title = 'Nhấn vào để hiện ' + name;
			}
		});
	});
	
	$(".order").click(function(){
		var path = $(this).attr('path');
		var currentPath = $(this).attr('currentPath');
		
		var type = $(this).attr('type');
		var id = $(this).attr('id');
		var ordering = $(this).attr('ordering');		
		var position = $(this).attr('position');
		var pageId = $(this).attr('pageId');
		
		var data = 'type=' + type + '&id=' + id + '&ordering=' + ordering +
					'&position=' + position + '&pageId=' + pageId;
	
		$.ajax({
			url: path,
			data: data,
			cache: false,
			success: function(data) {							
				document.location = currentPath;			
			}
		});
	});
}


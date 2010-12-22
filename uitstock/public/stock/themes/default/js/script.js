$(document).ready(function(){  	
	popUp();
	$('.focus').focus(); 
	
    startTime();
    hotkey();
    tab();
    table();	     
    sidebar();  
    jExpand();
    datepicker();
   
    stockAjax();
    checkValid();
    command();     
    
    changeTheme();
});

function startTime()
{
	 var Days = new Array("Chủ nhật","Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy");
	 var sign = "/";
	 var signdigit = ":";
	 var signchar = ",";
	 var space= " ";
	 var tickTime;
	
     var DateTime = "";
     var TheDate = new Date();
     var TheDay = Days[TheDate.getDay()];
    
     var TheMonth = TheDate.getMonth()+1;
     if (TheMonth < 10) TheMonth = "0" + TheMonth;
    
     var TheMonthDay = TheDate.getDate();
     if (TheMonthDay < 10) TheMonthDay = "0" + TheMonthDay;
    
     var TheYear = TheDate.getYear();
     if (TheYear < 1000) TheYear += 1900;
    
     var timeType = "";
     //timeType = "GMT +7";
    
     var Digital=new Date()
     var hours=Digital.getHours()
     if (hours<=9) hours="0"+hours
     var minutes=Digital.getMinutes()
     if (minutes<=9) minutes="0"+minutes
     var seconds=Digital.getSeconds()
     if (seconds<=9) seconds="0"+seconds
    
     DateTime +=space+TheDay+signchar+space+TheMonthDay+sign+TheMonth+sign+TheYear+space+space+hours+signdigit+minutes+signdigit+seconds;   
     $(".Timer").html(DateTime);
     tickTime=setTimeout("startTime()",1000);
} 

function checkValid()
{
	$(".valid").blur(function(){	
		var name = $(this).attr('name');
		
		$('.hide').insertAfter(this);	
		$('.hide').css('display', 'inline');
		
		var mess = '.' + name; 
		$(mess).insertAfter(this);											
		$(mess).html("");
		
		var value = $(this).val();
		var path = $(this).attr('path');
		
		if (value == '') {
			$('.hide').hide();
			$(mess).removeClass('ok').addClass('error').html('Bạn chưa nhập ' + name); 
			return false;
		}
		
		$.ajax({
			url: path,
			data: 'value=' + value,
			cache: false,
			success: function(data) {		
				$('.hide').hide();								
				
				if (data == 'error') 					
					$(mess).removeClass('ok').addClass('error').html(name + ' không hợp lệ');					
				else if (data == 'duplicate') 
					$(mess).removeClass('ok').addClass('error').html(name + ' đã tồn tại trong hệ thống');
				else
					$(mess).removeClass('error').addClass('ok').html(name + ' hợp lệ');
									
		    }
		});
	});
}

function tab()
{
		// Tabs
	    //When page loads...
	    $("#news-info ul.tabs li:first").addClass("active").show(); //Activate first tab
	    $("#stock-info ul.tabs li:first").addClass("active").show(); //Activate first tab    
	    $("#rule-info ul.tabs li:first").addClass("active").show(); //Activate first tab 
	    
		$("#news-info .tab_content").hide(); //Hide all content
		$("#news-info .tab_content:first").show(); //Show first tab content
		
		$("#stock-info .tab_content2").hide(); //Hide all content	
		$("#stock-info .tab_content2:first").show(); //Show first tab content
	    
	    $("#rule-info .tab_content1").hide(); //Hide all content	
		$("#rule-info .tab_content1:first").show(); //Show first tab content
	
		//On Click Event
		$("#news-info ul.tabs li").click(function() {
	
			$("#news-info ul.tabs li").removeClass("active"); //Remove any "active" class
			$(this).addClass("active"); //Add "active" class to selected tab
			$("#news-info .tab_content").hide(); //Hide all tab content
	
			var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
			$(activeTab).fadeIn(); //Fade in the active ID content
			return false;
		});   
	
		//On Click Event
		$("#stock-info ul.tabs li").click(function() {
	
			$("#stock-info ul.tabs li").removeClass("active"); //Remove any "active" class
			$(this).addClass("active"); //Add "active" class to selected tab
			$("#stock-info .tab_content2").hide(); //Hide all tab content
	
			var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
			$(activeTab).fadeIn(); //Fade in the active ID content
			return false;
		});
	    
	    //On Click Event
	    $("#rule-info ul.tabs li").click(function() {
	
			$("#rule-info ul.tabs li").removeClass("active"); //Remove any "active" class
			$(this).addClass("active"); //Add "active" class to selected tab
			$("#rule-info .tab_content1").hide(); //Hide all tab content
	
			var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
			$(activeTab).fadeIn(); //Fade in the active ID content
			return false;
		});
}

function table()
{
	   // Table
	   $(".panel-content-data table tbody tr:even").css({"background" : "url(stock/themes/default/images/theme_green.gif) repeat", "color" : "#008000", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"}); 
	   
	   $(".panel-content-data table tbody tr:odd").css({"color" : "#C46200", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"});
	   
	   $("#content #stock-info .tab_content2 table tbody tr:even").css({"background" : "url(stock/themes/default/images/theme_green.gif) repeat", "color" : "#008000", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"});
	   
	   $("#content #stock-info .tab_content2 table tbody tr:odd").css({"color" : "#C46200", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"});     
	   
	   $(".statics-box table tbody tr:even").css({"background" : "url(stock/themes/default/images/theme_green.gif) repeat", "color" : "#008000", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"}); 
	   
	   $(".statics-box table tbody tr:odd").css({"color" : "#C46200", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"});	   	   
	   
	   $(".statics-box2 table tbody tr:even").css({"background" : "url(stock/themes/default/images/theme_green.gif) repeat", "color" : "#008000", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"}); 
	   
	   $(".statics-box2 table tbody tr:odd").css({"color" : "#C46200", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"});	   	   
}

function sidebar()
{
    $("#stock-online").click(function(){       
        $("#submenu-stock-online").slideToggle("slow");    
    });
    $("#stock-tool").click(function(){       
        $("#submenu-stock-tool").slideToggle("slow");    
    });	
}

function datepicker()
{
	// Datepicker
	$( ".datepicker" ).datepicker({
		showOn: "button",
		buttonImage: "stock/themes/default/images/calendar.gif",
		buttonImageOnly: true,
        numberOfMonths: 1,  dateFormat: 'dd/mm/yy',
        monthNames: ['Một','Hai','Ba','Tư','Năm','Sáu','Bảy','Tám','Chín', 
        'Mười','Mười một','Mười hai'] ,
        monthNamesShort: ['Tháng1','Tháng2','Tháng3','Tháng4','Tháng5',
        'Tháng6','Tháng7','Tháng8','Tháng9','Tháng10','Tháng11','Tháng12'] ,
        dayNames: ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm',
         'Thứ sáu', 'Thứ bảy'],
        dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'] ,
        showWeek: true , showOn: 'both',
        changeMonth: true , changeYear: true,
        currentText: 'Hôm nay', weekHeader: 'Tuần'
        });
}

function command()
{
	$("select.command").change(function(){
		if ($(this).val() == 'ato')
			$(".price").hide();
		else
			$(".price").show();
	});
}

function stockAjax()
{
	$(".stock_ajax").click(function(){
		$("#content").html("");
		var $clone = $('.hide1').clone();
		$("#content").append($clone);
		$clone.show();
		var path = $(this).attr('path');
		
		$.ajax({
			url: path,			
			cache: false,
			success: function(data) {	
				$clone.hide();
				$("#content").html(data);		
				stock_statics_gui();
		    }
		});
	});
}

function stock_statics_gui()
{
	$('.hide2').hide();
	$(".hot_stock_table tbody tr:even").css({"background" : "#F4FFF4 repeat", "color" : "#008000", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"}); 
	   
	$(".hot_stock_table tbody tr:odd").css({"color" : "#C46200", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"});
	
	$('.focus').focus();

	$("#searchPrice").click(function(){
		$("#search_price_ajax").html("");		
		$('.hide2').show();
		
		$.ajax({
			url: 'stocks/search-result/',			
			cache: false,
			success: function(data) {	
			$('.hide2').hide();
				$("#search_price_ajax").html(data);									
		    }
		});		
	});		
	
	popUp();
}

function jExpand()
{    
    $("#report tr.even").hide();
    $("#report tr:first-child").show();
    
    $("#report tr.odd").click(function(){
        $(this).next("tr").toggle();
        $(this).find(".arrow").toggleClass("up");
    });
    //$("#report").jExpand();
}

function hotkey()
{
	jQuery(document).bind('keydown', 'Shift+h',function (evt){document.location = "http://uitstock/"; });
	jQuery(document).bind('keydown', 'Shift+l',function (evt){document.location = "http://uitstock/auth/login/"; });
	jQuery(document).bind('keydown', 'Shift+o',function (evt){document.location = "http://uitstock/auth/log-out/"; });
	jQuery(document).bind('keydown', 'Shift+i',function (evt){document.location = "http://uitstock/player/infor/"; });
	jQuery(document).bind('keydown', 'Shift+p',function (evt){document.location = "http://uitstock/player/change-pass/"; });
	jQuery(document).bind('keydown', 'Shift+e',function (evt){document.location = "http://uitstock/exchange/order/"; });
	jQuery(document).bind('keydown', 'Shift+s',function (evt){document.location = "http://uitstock/stock/index/statics/"; });
	jQuery(document).bind('keydown', 'Shift+n',function (evt){document.location = "http://uitstock/tintuc/"; });
}

function popUp()
{	
	//create Bubble Popups 
	$('.stock_with_popup').CreateBubblePopup({
		selectable: true,
	
		position : 'bottom',
		align	 : 'center',
		
		width : '320px',
		
		innerHtml: '<img src="stock/themes/default/images/loading.gif" style="border:0px; vertical-align:middle; margin-right:10px; display:inline;" />',
		innerHtmlStyle: {color:'#000', 'text-align':'left'},
											
		themeName: 	'azure',
		themePath: 	'stock/themes/default/images/jquerybubblepopup-theme'									 
});

	// add a mouseover event for the "button" element...
	$('.stock_with_popup').mouseover(function(){

		//get a reference object for "this" target element
		var button = $(this);
		
		var path = "stocks/stock-popup";

		//load data asynchronously when mouse is over...
		$.get(path, function(data) {			
				//set new innerHtml for the Bubble Popup			
				button.SetBubblePopupInnerHtml(data, false); //false -> it shows new innerHtml but doesn't save it, then the script is forced to load everytime the innerHtml...
				popup_gui();
		});		

	}); //end mouseover event
}

function popup_gui()
{
	$(".popup table.popup-data tr:even").css({"background" : "#f1f5f6"});
}

function changeTheme()
{
    $(".theme-icon img").click(function(){
        document.cookie = "themeStock=" + $(this).attr('val') + "; path=/";
        window.location.reload();
    })
}

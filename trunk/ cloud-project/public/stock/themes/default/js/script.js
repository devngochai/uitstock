  function startTime()
{
	 var Days = new Array("Ch&#7911; nh&#7853;t","Th&#7913; hai","Th&#7913; ba","Th&#7913; t&#432;","Th&#7913; n&#259;m","Th&#7913; s&aacute;u","Th&#7913; b&#7843;y");
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

$(document).ready(function(){  	
    startTime();
    
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
	
	
   // Table
   $(".panel-content-data table tbody tr:even").css({"background" : "url(stock/themes/default/images/theme_green.gif) repeat", "color" : "#008000", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"}); 
   
   $(".panel-content-data table tbody tr:odd").css({"color" : "#C46200", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"});
   
   $("#content #stock-info .tab_content2 table tbody tr:even").css({"background" : "url(stock/themes/default/images/theme_green.gif) repeat", "color" : "#008000", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"});
   
   $("#content #stock-info .tab_content2 table tbody tr:odd").css({"color" : "#C46200", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"});     
   
   $(".statics-box table tbody tr:even").css({"background" : "url(stock/themes/default/images/theme_green.gif) repeat", "color" : "#008000", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"}); 
   
   $(".statics-box table tbody tr:odd").css({"color" : "#C46200", "font-weight" : "bold", "font-style" : "italic", "font-size" : "14px"});
   //Menu
    /*
   $("#submenu-stock-online").hide(); 
   
   $("#stock-online").click(function(){       
        $("#submenu-stock-online").slideToggle("slow");    
   });
   
   $("#submenu-stock-tool").hide(); 
   
   $("#stock-tool").click(function(){       
        $("#submenu-stock-tool").slideToggle("slow");    
   });
  */   
     
});
$(document).ready(function(){  	
	startTime();	
	tab();
	hotkey();
	table();
	search();  		
    changeTheme()
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
  
 function tab()
 {
    // Tabs
    //When page loads...
    $("#hot-news ul.tabs li:first").addClass("active").show(); //Activate first tab       
    $("#statics-news ul.tabs li:first").addClass("active").show(); //Activate first tab
    
    $("#hot-news .tab_content").hide(); //Hide all content	
	$("#hot-news .tab_content:first").show(); //Show first tab content
    
    $("#statics-news .tab_content1").hide(); //Hide all content	
	$("#statics-news .tab_content1:first").show(); //Show first tab content 
	
	//On Click Event
	$("#hot-news ul.tabs li").click(function() {

		$("#hot-news ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$("#hot-news .tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});  
    
    //On Click Event
	$("#statics-news ul.tabs li").click(function() {

		$("#statics-news ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$("#statics-news .tab_content1").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	}); 	
 }
  
function changeTheme()
  {
      $(".theme-icon").click(function(){
          document.cookie = "themeNews=" + $(this).attr('val') + "; path=/";
          window.location.reload();
      })
}  

function search()
{
    jQuery(".SearchTextBox").focus(function() {
		if (jQuery(this).val()=="Tìm kiếm") {
			jQuery(this).val("");
		}
	});
	jQuery(".SearchTextBox").blur(function() {
		if (jQuery(this).val()=="") {
			jQuery(this).val("Tìm kiếm");
		}
	});	      
}

function hotkey()
{
	jQuery(document).bind('keydown', 'Shift+h',function (evt){document.location = "http://uitstock/"; });
	jQuery(document).bind('keydown', 'Shift+n',function (evt){document.location = "http://uitstock/tintuc/"; });
}

function table()
{
	 // Table
	   $("#statics-news table tbody tr:even").css({"background" : "url(default/default/images/theme_green.gif) repeat", "font-size" : "14px"});	
}
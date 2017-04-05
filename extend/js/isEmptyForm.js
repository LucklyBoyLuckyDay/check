function checkForm(form) { 
    for (var i = 0; i < form.elements.length; i++) { 
        if (form.elements[i].type == "text" && form.elements[i].value == "") { 
            //document.write("Fill out ALL fields."); 
			form.elements[i].style.border="solid 2px red";
            return false; 
        } 
    } 
    return true; 
}
/**
 *功能：获取当前月份并且在id = display_check_month   显示
 */
window.onload = function getPresentMonth(){
	var d=new Date();
	if($("display_check_month")!=null){
		$("display_check_month").innerHTML =  (d.getMonth()+"月份");
	}
	if($("display_check_date")!=null)
	{
		$("display_check_date").innerHTML =  ("考核日期:2017/"+d.getMonth()+"/10"+"-2017/"+d.getMonth()+"/15");
	}	
}
/**
 *
*/
function $(id)
{
	return document.getElementById(id)
}
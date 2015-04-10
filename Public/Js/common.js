$(function () {
	$('.nav-lv1-li').hover(function () {
		$(this).find('.top-cate').addClass('cur').next().fadeIn(200);
	}, function () {
		$(this).find('.top-cate').removeClass('cur').next().fadeOut(200);
	});
});


        var substr = new Array();
        var flag = new Array(); 		
        var str = new Array();
		var mycontents = document.getElementsByClassName('content'); 
        for (var i = 0; i < mycontents.length; i++) {
        	var id = mycontents[i].id; 
        	str[id] = document.getElementById(id).innerHTML;
			if(str[id].length>50){
			substr[id] = document.getElementById(id).innerText.substring(0,50) + "...";
         	document.getElementById(id).innerHTML = substr[id];
         	} else {
			substr[id] = str[id];
	        
			} flag[id] = 0;

        } 
		function changec(obj){
				id = obj.id;
				if(flag[id] == 0){
				document.getElementById(id).innerHTML = str[id]; 
				flag[id] = 1;
				} else {
				document.getElementById(id).innerHTML = substr[id]; 
				flag[id] = 0;
				} 
			}  
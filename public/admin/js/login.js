/**
 * 登录
 */
$('#sub_button').click(function(){
	var data = $('#sub_form').serializeArray();
	postData = {};
	$(data).each(function(){
		postData[this.name] = this.value;
	});
	url = SCOPE.save_url;
	jump_url = SCOPE.jump_url;
   	$.ajax({
       url:url,
       data:postData,
       type:'post',
       timeout : 5000,
       cache:false,
       async:true,
       success:function(result){
 
       	   if(result.status == 1){
				$(location).attr('href', jump_url);
			}else if(result.status == 0){
				return dialog.error(result.message);
			}

           return true;
       },
       error : function (msg ) {
           var json=JSON.parse(msg.responseText);
           $.each(json.errors, function(idx, obj) {
           	   dialog.error(obj[0]);
               return false;
           });
       },
   	});

});
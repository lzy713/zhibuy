

//提交form表单操作
$('#sub_button').click(function(){
	//序列化表格元素,返回的是JSON对象
	var data = $('#sub_form').serializeArray();
	
	postData = {};
	$(data).each(function(){
		postData[this.name] = this.value;
	});
	
	url = SCOPE.save_url;
	jump_url = SCOPE.jump_url;

	//返回laravel 验证信息
   	$.ajax({
       url:url,
       data:postData,
       type:'post',
       timeout : 5000,
       cache:false,
       async:true,
       success:function(result){
  
       	   if(result.status == 1){
				return dialog.success(result.message,jump_url);
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


//删除操作
$('#sub_form [del=delete]').on('click',function(){
	var id = $(this).attr('del_id');
	var method = $(this).attr('del_method');	
	var url = SCOPE.delete_url+'/'+id;
	
	
 	layui.use(['element', 'layer'], function(){ 
    var $ = layui.jquery, layer = layui.layer; 
		layer.open({
			type : 0,
			shade: [0.2, '#fff'],
			title : '是否提交',
			btn : ['yes', 'no'],
			icon : 3,
			content : '是否确定删除',
			scrollbar : true,
			yes : function(){
				
				$.ajax({
			        url:url,
			        type:method,
			        timeout : 5000,
			        cache:false,
			        async:true,
			        success:function(result){
			  
			       	    if(result.status == 1){
							return dialog.success(result.message,'');
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
				
			},
		});
	});
});
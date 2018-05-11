//添加按钮
/*$("#add_url").click(function(){
	var url = SCOPE.add_url;
	window.location.href=url;
});
*/

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

	/*$.post(url,postData,function(result){
		console.log(result);
		if(result.status == 1){
			return dialog.success(result.message,jump_url);
		}else if(result.status == 0){
			return dialog.error(result.message);
		}
	},"JSON");*/

	//返回laravel 验证信息
   	$.ajax({
       url:url,
       data:postData,
       type:'post',
       timeout : 5000,
       cache:false,
       async:true,
       success:function(result){
       	   //dialog.success(d,jump_url);
       	   //console.log(d);

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

//编辑模型
/*$('#sub_edit').on('click',function(){
	var id = $(this).attr('attr-id');
	var url = SCOPE.edit_url + '/'+id;
	window.location.href = url;
});*/

//删除操作
$('#sub_form [del=delete]').on('click',function(){
	var id = $(this).attr('del_id');
	var url = SCOPE.delete_url;

	data = {};
	data['id'] = id;
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
				$.post(url,data,function(result){
					if(result.status == 1){
						return dialog.success(result.message,'');
					}else{
						return dialog.error(result.message);
					}
				},"JSON");
			},
		});
	});
});
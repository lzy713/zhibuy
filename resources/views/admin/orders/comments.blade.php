@extends('layout.admin')

@section('title',$title)

@section('content')

    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
    	
            <blockquote class="layui-elem-quote">
                <!--面包屑-->
                 <span class="layui-breadcrumb m-right">
                  <a href="">控制台</a>
                  <a href="">产品</a>
                  <a><cite>列表</cite></a>
                </span>
                <!--面包屑-->
            </blockquote>
            
            <form class="layui-form" action="/admin/comments" method="get">
                <div class="layui-row layui-col-space10">
                    <div class="layui-col-md2">
                      <input type="text" name="username" value="@if($username){{$username}}@endif" class="layui-input" placeholder="请输入用户名" >
                    </div>
                    <div class="layui-col-md1">
                      <button class="layui-btn layui-btn-normal ss_css_but layui-icon">&#xe615;</button>
                    </div>
                </div>     
            </form>
            <hr class="layui-bg-gray">
            
          <!--内容--> 
          <form class="layui-form" >  
	          <table class="layui-table">
	            <colgroup>
	              <col width="5">
	              <col width="88">
	              <col width="110">     
	              <col width="88">
	              <col width="280">
	              <col width="100">
	              <col width="190">
	              <col width="150">
	            </colgroup>
	            <thead>
	              <tr>
	                <th>#</th>
	                <th>评论人</th>
	                <th>商品名称</th>
	                <th>商品图片</th>
	                <th>评论内容</th>
	                <th>评论图片</th>
	                <th>回复内容</th>
	                <th>操作</th>
	              </tr> 
	            </thead>
	            <tbody>
				@foreach($comments as $k=>$v)
	              <tr>
	                <td><input type="checkbox" name="" lay-skin="primary"></td>
	                <td>{{$v->users->username}}</td>
	                <td>{{$v->goods->gname}}</td>
	                <td><img src="{{$v->goods->img}}" alt=""></td>
	                <td>{{$v->content}}</td>
	                <td>@if($v->img)<img src="{{$v->img}}" alt="">@endif</td>
	                <td>@if($v->reply){{$v->reply->content}}@endif</td>
	                <td>
	                <a href="javascript:void(0)" class="layui-btn layui-btn-xs huifu" id="{{$v->id}}">回复评论</a>
	                <a href="javascript:void(0)" class="layui-btn layui-btn-xs layui-bg-red delComments" id="{{$v->id}}">删除评论</a>
	                </td>
	              </tr>
				@endforeach
	            </tbody>
	          </table>
	      </form>
	      @if(empty($comments[0]))
	      <div>
	      	<button class="layui-btn layui-btn-fluid layui-btn-disabled">没有更多内容</button>  
	      </div>
	      @endif
	      <!--内容-->
	      {{$comments->appends(['username'=>$username])->links()}}
@endsection


@section('js')
<script>

var content = `
        <form class="layui-form" action="">
            <div class="layui-form-item layui-form-text" style="margin:30px auto;">
                <label class="layui-form-label">回复</label>
                <div class="layui-input-block" style="width:350px;">
                    <textarea name="desc" id="content" placeholder="请输入内容" class="layui-textarea"></textarea>
                </div>
            </div>
        </form>
    `;


 var _token = '{{csrf_token()}}';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': _token
    }
});

//layui JS代码区域
layui.use(['element', 'form', 'layer'], function(){
  var element = layui.element;
  var layer = layui.layer;
  var form = layui.form;

  	//回复评论
  	$('.huifu').click(function(){
            var id = $(this).attr('id');
            var btn = $(this);
            layer.open({
                type: 1,
                anim: 1,
                title:'回复评价',
                offset: '180px',
                skin: 'layui-layer-rim', //加上边框
                btn:['提交','取消'],
                area: ['500px', '300px'], //宽高
                content: content,
                yes:function(index,layero){
                    var text = $('#content').val();
                    $.post('/admin/comments', {id:id,text:text}, function(data){
                        layer.close(index);
                        layer.alert('评论成功', {
                              skin: 'layui-ext-moon' //样式类名
                              ,closeBtn: 0
                              ,time:1500
                              ,offset: '180px'
                            });
                    });
                    btn.parent().prev().text(text);
                },
            });
        });

  	//删除评论
  	$('.delComments').click(function(){
  		var info = confirm('确定要删除吗?');
  		var btn = $(this);
  		var id = btn.attr('id');

  		if (!info) return;

  		$.post('/admin/comments/'+id, {'_method':'delete'}, function(data){
  			console.log(data);
            if(data.status == '1'){
				return dialog.success(data.message,'');
			}else{
				return dialog.error(data.message);
			}
        });

  	});

    form.on('submit(*)', function(data){
	  return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
	});


});
</script>
@endsection
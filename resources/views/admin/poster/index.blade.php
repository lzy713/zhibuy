@extends('layout.admin')

@section('title',$title)

@section('content')
                
                <blockquote class="layui-elem-quote">
                    <!--面包屑-->
                     <span class="layui-breadcrumb m-right">
                      <a href="/admin/index">控制台</a>
                      <a href="/admin/poster">广告内容管理</a>
                    </span>
                    <!--面包屑-->
                </blockquote>

                <!--搜索-->
                <form class="layui-form" action="/admin/poster" >
                        <div class="layui-row layui-col-space10">
                            <div class="layui-col-md2">
                             <select name="cid">
                                <option value="">选择分类</option>
                                  @foreach ($classPoster as $k=>$v)
                                  <option value="{{$v->id}}" @if($v->id == $cid) selected @endif>{{$v->title}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="layui-col-md1">
                              <button class="layui-btn layui-btn-normal ss_css_but layui-icon" lay-submit lay-filter="*">&#xe615;</button>
                            </div>
                        </div>     
                </form>
                <!--搜索-->
                
                
                <!--返回 刷新 添加-->
                <hr class="layui-bg-gray">
                <a href="javascript:;" title="返回" onclick="javascript:window.history.go(-1)" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">&#xe65c;</a>
                <a href="javascript:;" onclick="javascript:window.location.reload(true);" title="刷新" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">&#x1002;</a>
                <a href="/admin/poster/create" class="layui-btn layui-btn-sm layui-btn-normal layui-icon">添加</a>
                <!--返回 刷新 添加-->

              <!--内容--> 
                 <form class="layui-form" action="" id="sub_form">  
                      <table class="layui-table" id="layer-photos-demo">
                        <colgroup>
                          <col width="200">
                          <col width="200">
                          <col width="200">
                          <col width="100">
                          <col width="50">
                          <col  width="150">
                        </colgroup>
                        <thead>
                          <tr>
                            <th>标题</th>
                            <th>分类</th>
                            <th>url</th>
                            <th>图片</th>
                            <th>排序</th>
                            <th>操作</th>
                          </tr> 
                        </thead>
                        <tbody>
                          
                          @foreach ($res as $k => $v)
                          <tr>
                            <td>{{$v->title}}</td>
                            <td>{{$v->ClassPoster->title}}</td>
                            <td>{{$v->url}}</td>
                            <td>
                                @if(!empty($v->pic))
                                  <img src="{{$v->pic}}" width="50" height="50" alt="{{$v->title}} / {{$v->ClassPoster->title}}" /> 
                                @endif
                            </td>
                            <td>{{$v->listorder}}</td>
                            <td>
                           
                            <a href="/admin/poster/{{$v->id}}/edit" class="layui-btn layui-btn-xs">编辑</a>
                            <a href="javascript:;" del='delete' del_id='{{$v->id}}' del_method='DELETE' class="layui-btn layui-btn-xs layui-bg-red">删除</a>
                            </td>
                          </tr>
                          @endforeach  
                          
                        </tbody>
                      </table>
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
                          <div id="demo2" style="margin:0 auto;"></div>
                        </td>
                        </tr>
                    </table>

                  </form>   

                  {{ $res->appends(['cid' => $cid])->links() }}
              <!--内容-->
              

@endsection


@section('js')
<script>

//路由地址
var SCOPE = {
  'delete_url' : '/admin/poster',
  'jump_url' : '/admin/poster',
  }


//ajax提交token
 var _token = '{{csrf_token()}}';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': _token
        }
    });


//JavaScript代码区域
layui.use(['element', 'form', 'layer'], function(){
  var element = layui.element;

  layer.photos({
    photos: '#layer-photos-demo'
    ,anim: 0 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
    ,tab: function(pic, layero){
      console.log(pic) //当前图片的一些信息
    }
  }); 
  
});
</script>
@show
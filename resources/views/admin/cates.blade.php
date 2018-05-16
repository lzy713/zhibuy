@extends('layout.admin')

@section('title',$title)

@section('content')





<div style="padding: 15px;">
    	
        

            
            <!--内容-->
             <form class="layui-form" action="/admin/cates/add" method="post">  
                 <div class="layui-inline" style="width:100%;">
                      <div class="layui-tab layui-tab-card">
                        
                        <ul class="layui-tab-title">
                          <li class="layui-this">信息</li>
                        </ul>
                        
                        <div class="layui-tab-content">
                          <!--tab1-->
                          <div class="layui-tab-item layui-show">
                            
                            
                            
                            <div class="layui-form-item">
                                <label class="layui-form-label">所属栏目</label>
                                <div class="layui-input-inline">
                                  <select name="pid"  lay-filter="interest-search" lay-verify="required">
                                      <option value="0">根分类</option>
                                      
                                      	@foreach($res as $k=>$v)
											<option value="{{$v->cid}}">{{$v->cname}}</option>
										@endforeach


                                    </select>
                                </div>
                            </div>
                            
                            <div class="layui-form-item">
                                <label class="layui-form-label">输入框</label>
                                <div class="layui-input-block">
                                  <input type="text" name="cname" lay-verify="required|title" required placeholder="请输入标题" autocomplete="off" class="layui-input layui_inp_widht300">
                                </div>
                            </div>
                            
                          	<!-- <div class="layui-form-item" pane>
                          	                                <label class="layui-form-label">单选框</label>
                          	                                <div class="layui-input-block">
                          	                                  <input type="radio" name="sex.id" value="男" title="男">
                          	                                  <input type="radio" name="sex.id" value="女" title="女" checked>
                          	                                  <input type="radio" name="sex.id" value="中型" title="中">
                          	                                </div>
                          	                            </div> -->

                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                	{{csrf_field()}}
                                  <button class="layui-btn layui-btn-normal" lay-submit lay-filter="*">提交</button>
                                  <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                </div>
                            </div>
                          </div>
                          <!--tab1-->                          
                          
                        </div>
                      </div>
                    </div>
                    
                    
                </form>
        
        
        
    </div>


@endsection

@section('js')
<script>
//JavaScript代码区域
layui.use(['element', 'form'], function(){
  var element = layui.element;
  
});
</script>
@show
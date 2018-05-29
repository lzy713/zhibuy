@extends('layout.admin')

@section('title',$title)

@section('content')
                
                <blockquote class="layui-elem-quote">
                    <!--面包屑-->
                     <span class="layui-breadcrumb m-right">
                      <a href="/admin/index">控制台</a>
                    </span>
                    <!--面包屑-->
                </blockquote>
                
                

              <!--内容--> 
                <fieldset class="layui-elem-field">
                  <legend>{{session('adminMsg')->name}}</legend>
                  <div class="layui-field-box">
                    
                    <table class="layui-table" lay-skin="nob">
                        <colgroup>
                          <col width="80">
                          <col width="200">
                          <col width="80">
                          <col width="200">
                          <col width="40">
                          <col width="200">
                        </colgroup>
                        <?php
                        $datatimes = DB::table('fd_admin_log')->where('uid',session('adminMsg')->id)->orderBy('id','desc')->limit(2)->get();
                        ?>
                        <tbody>
                          <tr>
                            <td>本次登录</td>
                            <td>{{date('Y-m-d H:i:s',$datatimes[0]->logintime)}}</td>
                            @if(!empty($datatimes[1]))
                            <td>上次登录</td>
                            <td>{{date('Y-m-d H:i:s',$datatimes[1]->logintime)}}&nbsp;&nbsp;&nbsp;&nbsp;{{$datatimes[1]->ip}}</td>
                            @endif
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>

                      </table>

                  </div>
                </fieldset>
                 
                
                <fieldset class="layui-elem-field">
                  <legend>统计</legend>
                  <div class="layui-field-box">
                    
                    <table class="layui-table" width="300" lay-skin="nob">
                        <colgroup>
                          <col width="60">
                          <col width="350">
                        </colgroup>
                        <?php
                        //会员
                        $huiyuans = DB::table('fd_users')->count();
                        //商品
                        $goods = DB::table('fd_goods')->count();
                        //订单
                        $orders = DB::table('fd_order')->count();
                        //测评
                        $evaluats = DB::table('fd_evaluat')->count();
                        //已卖出商品个数
                        $details = DB::table('fd_detail')->select(DB::raw('SUM(num) as sum_num'))->get();
                        //评论
                        $comments = DB::table('fd_comments')->count();
                        ?>
                        <tbody>
                          <tr>
                            <td>注册会员数</td>
                            <td>{{$huiyuans}}</td>
                          </tr>
                          <tr>
                            <td>商品数量</td>
                            <td>{{$goods}}</td>
                          </tr>
                          <tr>
                            <td>订单数量</td>
                            <td>{{$orders}}</td>
                          </tr>
                          <tr>
                            <td>已卖出商品总数</td>
                            <td>{{$details[0]->sum_num}}</td>
                          </tr>
                          <tr>
                            <td>评论数量</td>
                            <td>{{$comments}}</td>
                          </tr>
                           <tr>
                            <td>测评文章数量</td>
                            <td>{{$evaluats}}</td>
                          </tr>
                        </tbody>

                      </table>

                  </div>
                </fieldset>


                <fieldset class="layui-elem-field">
                  <legend>系统</legend>
                  <div class="layui-field-box">
                    
                    
                    <table class="layui-table" lay-skin="nob">
                        <colgroup>
                          <col width="40">
                          <col width="200">
                          <col width="40">
                          <col width="200">
                        </colgroup>
                        
                        <tbody>
                          <tr>
                            <td>服务器版本</td>
                            <td>{{php_sapi_name()}}</td>
                            <td>操作系统</td>
                            <td>{{PHP_OS}}</td>
                          </tr>
                          <tr>
                            <td>PHP版本号</td>
                            <td>{{PHP_VERSION}}</td>
                            <td>MySql版本</td>
                            <td>
                              <?php 
                                $res = DB::select('select VERSION()'); 
                                $js = json_decode(json_encode($res[0]),true);
                                echo $js['VERSION()'];
                              ?>  
                              </td>
                          </tr>
                          
                          <tr>
                            <td>Zend版本</td>
                            <td>{{Zend_Version()}}</td>
                            <td>最多上传限制</td>
                            <td>
                              <?PHP
                                echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件";
                              ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>


                  </div>
                </fieldset>
                 
              <!--内容-->


@endsection


@section('js')
<script>
//JavaScript代码区域
layui.use(['element', 'form', 'layer'], function(){
  var element = layui.element;
  
});
</script>
@show
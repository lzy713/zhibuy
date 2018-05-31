<html>
<head>
<meta charset="utf-8">
<title>添加地址</title>
<link rel="stylesheet" href="/layui/css/layui.css">
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/layui/layui.js"></script>
<script type="text/javascript" src="/home/cart/js/jquery.cxselect.js"></script>
<style>
    select{
    font: normal 14px '\5FAE\8F6F\96C5\9ED1';
    width: 187px;
    height: 38px;
    position: relative;
    cursor: pointer;
    display: inline-block;
    display: inline;
    float: left;
    margin-right: 10px;
    background: #fff;
    border-radius: 3px;
    border: 1px solid #e3e3e3;
    margin-bottom:15px;
  }
  select:focus{
    border: 1px solid #D2D2D2;
  }
</style>
</head>
<body id="invest_content">
<div class="ctn-960 mg shadow-5" style="width: 600px;height:340px;margin:30px auto;">
  
    <form class="layui-form" action="/address" method="post">
        <input type="hidden" name="uid" value="{{session('homeMsg')->id}}">
        <div class="layui-form-item">
            <div class="layui-input-inline" style="width:290px;">
               <input type="text" name="name" required lay-verify="required|name" placeholder="收货人" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-input-inline" style="width:290px;">
              <input type="text" name="phone" required lay-verify="required|phone" placeholder="手机号" autocomplete="off" class="layui-input"> 
            </div>
        </div>

        <div id="element_id">
            <div class="layui-input-inline">           
                <select lay-ignore class="province" name="province" required lay-verify="required"></select>
            </div>
            <div class="layui-input-inline">
                <select lay-ignore class="city" name="city" required lay-verify="required"></select>
            </div>
            <div class="layui-input-inline">
                <select lay-ignore class="area" name="area"></select>
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <textarea name="street" placeholder="详细街道" required lay-verify="required|street" class="layui-textarea" style="width: 590px;"></textarea>
        </div>
         <div class="layui-form-item layui-layer-btn">
            <!-- <div class="layui-input-block">
            </div>  -->   
  
            <div class="layui-input-block layui-layer-btn">
                {{csrf_field()}}
                <button id="but" lay-submit lay-filter="demo1" class="layui-btn layui-btn-danger  layui-btn-lg" style="margin-left: 40px; width: 100px;">
                    提交
                </button>

             </div>
        </div>
    </form>

</div>

<!--投资确认页结束-->
<script type="text/javascript">
    $('#element_id').cxSelect({
        url: '/home/cart/js/cityData.min.json',               // 如果服务器不支持 .json 类型文件，请将文件改为 .js 文件
        selects: ['province', 'city', 'area'],  // 数组，请注意顺序
        emptyStyle: 'none'
    });

    layui.use('form', function(){

        var form = layui.form
        ,layer = layui.layer;
                form.verify({
            name: function(value){
              if(value.length > 5){
                return '名字大于5个字符';
              }
            },
            street: function(value){
              if(value.length > 32){
                return '详细地址长度超过32个字符';
              }
            }

          });
        
        form.on('submit(demo1)', function(data){
            layer.open({
                type: 1
                ,content: '<div style="padding: 40px 100px;">保存成功</div>'
                ,shade: 0.2 //不显示遮罩
                ,time:1800
            });
            //父窗口刷新
            window.top.location.reload();
            // window.parent.location.reload();
          });  
    });

</script>
</body>
</html>
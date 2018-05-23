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
  
    <form class="layui-form" action="/home/address" method="post">
        <input type="hidden" name="uid" value="1">
        <div class="layui-form-item">
            <div class="layui-input-inline" style="width:290px;">
               <input type="text" name="name" required lay-verify="required" placeholder="收货人" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-input-inline" style="width:290px;">
              <input type="text" name="phone" required lay-verify="required" placeholder="手机号" autocomplete="off" class="layui-input"> 
            </div>
        </div>

        <div id="element_id">
            <div class="layui-input-inline">           
                <select lay-ignore class="province" name="province"></select>
            </div>
            <div class="layui-input-inline">
                <select lay-ignore class="city" name="city"></select>
            </div>
            <div class="layui-input-inline">
                <select lay-ignore class="area" name="area"></select>
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <textarea name="street" placeholder="详细街道" class="layui-textarea" style="width: 590px;"></textarea>
        </div>
         <div class="layui-form-item layui-layer-btn">
            <!-- <div class="layui-input-block">
            </div>  -->   
  
            <div class="layui-input-block layui-layer-btn">
                {{csrf_field()}}
                <button id="but" class="layui-btn layui-btn-danger  layui-btn-lg" style="margin-left: 40px; width: 100px;">
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
    
    $('#but').click(function(){
        layer.open({
            type: 1
            ,content: '<div style="padding: 40px 100px;">保存成功</div>'
            ,shade: 0 //不显示遮罩
            ,time:1800
            
        });
        window.parent.location.reload();
    });
    layui.use('form', function(){
        var form = layui.form;
    });
</script>
</body>
</html>
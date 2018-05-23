<html>
<head>
<meta charset="utf-8">
<title>添加地址</title>
<link rel="stylesheet" href="layer/css/min.css">
<link rel="stylesheet" href="layer/css/min_123.css">
<link rel="stylesheet" href="/layui/css/layui.css">
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/layui/layui.js"></script>

<script type="text/javascript" src="/home/cart/js/jquery.cxselect.js"></script>

<script type="text/javascript">
    

$(function(){
    $('.reginpblu-yqm').hide();
    $(".regerror2").toggle(function(){
        $(this).find("span").attr("class","nle-sicon2")
        $(this).parent().find(".reginpblu-yqm").show();  
    },function(){
        $(this).find("span").attr("class","nle-sicon")   
        $(this).parent().find(".reginpblu-yqm").hide();   
    })
})  
</script>
</head>
<body id="invest_content">
<div class="ctn-960 mg shadow-5" style="width: 600px;height:340px;margin:30px auto;">
  
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <div class="layui-input-inline" style="width:290px;">
              <input type="text" name="phone" required lay-verify="required" placeholder="手机号" autocomplete="off" class="layui-input"> 
            </div>

            <div class="layui-input-inline" style="width:290px;">
               <input type="text" name="name" required lay-verify="required" placeholder="收货人" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item" id="element_id">
        
            <div class="layui-input-inline">
              <select class="province select" data-value="浙江省">
                </select>
            </div>
            <div class="layui-input-inline">
              <select class="city select">
                </select>
            </div>
            <div class="layui-input-inline">
              <select class="area select">
                </select>
            </div>

        </div>

        <div class="layui-form-item layui-form-text">
            <textarea name="desc" placeholder="详细街道" class="layui-textarea" style="width: 590px;"></textarea>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
            </div>    
  
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-danger  layui-btn-lg" lay-submit lay-filter="formDemo" style="margin-left: 80px;">
                    保存
                </button>
                <button class="layui-btn layui-btn-primary  layui-btn-lg" lay-submit lay-filter="formDemo" style="margin-left: 50px;">
                    取消
                </button>
            </div>
        </div>
    </form>

</div>

<!--投资确认页结束-->
<script type="text/javascript">
    $.cxSelect.defaults.url = '/home/cart/js/cityData.js';

    $('#element_id').cxSelect({
        selects: ['province', 'city', 'area'],  // 数组，请注意顺序
    });


    layui.use('form', function(){
        var form = layui.form;
    
        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });
    });
</script>
</body>
</html>
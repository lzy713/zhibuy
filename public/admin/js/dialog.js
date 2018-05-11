var dialog = {
    // 错误弹出层
        error: function(message) {
            layui.use(['element', 'layer'], function(){ 
            var $ = layui.jquery, layer = layui.layer; 
                layer.open({
                    content:message,
                    icon:2,
                    shade: [0.5, '#000'],
                    time: 3000,
                    title : '错误提示',
                });
            });    
        },

        //成功弹出层
        success : function(message,url) {
            layui.use(['element', 'layer'], function(){ 
            var $ = layui.jquery, layer = layui.layer; 
                layer.open({
                    content : message,
                    icon : 1,
                    shade: [0.5, '#000'],
                    yes : function(){
                        location.href=url;
                    },
                });
            });
        },

        // 确认弹出层
        confirm : function(message, url) {
            layui.use(['element', 'layer'], function(){ 
            var $ = layui.jquery, layer = layui.layer; 
                layer.open({
                    content : message,
                    icon:3,
                    shade: [0.5, '#000'],
                    btn : ['是','否'],
                    yes : function(){
                        location.href=url;
                    },
                });
            });
        },

        //无需跳转到指定页面的确认弹出层
        toconfirm : function(message) {
            layui.use(['element', 'layer'], function(){ 
            var $ = layui.jquery, layer = layui.layer; 
                layer.open({
                    content : message,
                    icon:3,
                    shade: [0.5, '#000'],
                    btn : ['确定'],
                });
            });    
        },
}


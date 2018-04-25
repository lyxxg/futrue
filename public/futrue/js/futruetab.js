;(function($){
    var Tab=function(tab){//接收
        var _this_=this;
//默认配置参数
        this.tab=tab;
        this.config={
            "triggerType":"mouseover",
            "effect":"default",
            "invoke":1,
            "auto":3000
        };
        if(this.getConfig()){
            $.extend(this.config,this.getConfig());
        };
//console.log(this.config);
//保存tab标签列表   对应的内弄列表
        this.tabItems=this.tab.find('ul.tab-nav li');
        this.contentItems=this.tab.find('div.content-wrap div.content-item');
//保存配置参数
        var config=this.config;
        if(config.triggerType==="click"){
            this.tabItems.bind(config.triggerType,function(){
                _this_.invoke($(this));
            });
        }else if(config.triggerType==="mouseover"){
            this.tabItems.bind(config.triggerType,function(){
                _this_.invoke($(this));
            });
        }

    };



    Tab.prototype={
//事件驱动函数
        invoke:function(currentTab){
            var __this__=this;
            var index=currentTab.index();
            currentTab.addClass("activend").siblings().removeClass("activend");
//切换对应内容区域
            var effect=this.config.effect;
            var conItems=this.contentItems;

            if(effect==='default'){
                conItems.eq(index).addClass("curremt").siblings().removeClass("curremt");

            }else if(effect==='fade'){
                conItems.eq(index).fadeIn().siblings().fadeOut();
            }

        },
//获取配置参数
        getConfig:function(){
            //拿tab elem节点上的data-config
            var config=this.tab.attr("data-config");
            console.log(config);
            if(config&&config!=''){
                return $.parseJSON(config);
            }else{
                return null;//没有传入配置
            }
        }

    }

    window.Tab=Tab;
})(jQuery);


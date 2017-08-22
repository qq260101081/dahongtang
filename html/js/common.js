/**
 * Created by carl on 17/8/5.
 */
var domain = 'http://api.dthtea.com';
var newsUrl = domain + '?r=events/list&page=1';
var goodsUrl = domain + '/?r=goods/list&page=1';

//商品数据
function getGoods() {
    $.get(goodsUrl, function(res){
        var cyHtml = '';
        var cjHtml = '';
        var dpHtml = '';
        $.each(res, function (k, v) {
            if(v.category == '茶叶')
            {
                cyHtml += '<li>'+
                    '<div class="cp-pic"><a href="'+v.url+'"><img src="'+v.list_pic+'"></a></div>'+
                    '<div class="title-text">'+
                    v.name+ ' ' + v.season + ' '+v.type + ' ' + v.craft + ' ' + v.spec+
                    '<p class="fubiao">'+v.subtitle+'</p>'+
                    '</div>'+
                    '<div class="fl">'+
                    '<span class="jiage">￥'+v.price+'</span>'+
                    '<a href="#" class="goumai">'+
                    '<i class="iconfont icon-gouwuche"></i>'+
                    '进入购买'+
                    '</a>'+
                    '</div>'+
                    '</li>';
            }
            else if(v.category == '茶具')
            {
                cjHtml += '<li>'+
                    '<div class="cp-pic"><a href="'+v.url+'"><img src="'+v.list_pic+'"></a></div>'+
                    '<div class="title-text">'+
                    v.name+ ' ' + v.season + ' '+v.type + ' ' + v.craft + ' ' + v.spec+
                    '<p class="fubiao">'+v.subtitle+'</p>'+
                    '</div>'+
                    '<div class="fl">'+
                    '<span class="jiage">￥'+v.price+'</span>'+
                    '<a href="#" class="goumai">'+
                    '<i class="iconfont icon-gouwuche"></i>'+
                    '进入购买'+
                    '</a>'+
                    '</div>'+
                    '</li>';
            }
            else if(v.category == '单品')
            {
                dpHtml += '<li>'+
                    '<div class="cp-pic"><a href="'+v.url+'"><img src="'+v.list_pic+'"></a></div>'+
                    '<div class="title-text">'+
                    v.name+ ' ' + v.season + ' '+v.type + ' ' + v.craft + ' ' + v.spec+
                    '<p class="fubiao">'+v.subtitle+'</p>'+
                    '</div>'+
                    '<div class="fl">'+
                    '<span class="jiage">￥'+v.price+'</span>'+
                    '<a href="#" class="goumai">'+
                    '<i class="iconfont icon-gouwuche"></i>'+
                    '进入购买'+
                    '</a>'+
                    '</div>'+
                    '</li>';
            }
        });
        $('.chapter__content').eq(0).find('ul').html(cyHtml);
        $('.chapter__content').eq(1).find('ul').html(cjHtml);
        $('.chapter__content').eq(2).find('ul').html(dpHtml);
    });
}

//新闻数据
function getNews() {
    $.get(newsUrl, function(res){
        var newsHtml = '';
        $.each(res, function (k, v) {
            newsHtml += '<li>'+
            '<div class="new-left"><img src="'+v.list_img+'"></div>'+
                '<div class="new-right">'+
                '<p class="title">'+v.title+'</p>'+
            '<p class="text">'+v.info+'<a href="Article.html">【详情】</a></p>'+
            '</div>'+
            '</li>';
        });
        $('.new-list ul').html(newsHtml);
    });
}

getGoods();
getNews();

/**
 * Created by carl on 17/8/5.
 */

var newsUrl = '/?r=goods/list&page=1';
var goodsUrl = '/?r=events/list&page=1';

//商品数据
function getGoods() {
    $.get(goodsUrl, function(res){
        console.log(res);
    });
}

//新闻数据
function getNews() {
    $.get(newsUrl, function(res){
        console.log(res);
    });
}

getGoods();

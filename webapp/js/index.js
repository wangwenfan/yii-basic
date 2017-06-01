/**
 * Created by Administrator on 2017/5/31 0031.
 */

var app=angular.module('myApp',[]);
app.controller('myCtrl',function ($scope,$http) {
    $http({
        method:'GET',
        url:"http://10.10.12.232:8800/news/1.html"
    }).then(function successCallback(response) {
        var data=response.data;
        console.log(data);
        
    },function errorCallback(response) {
        
    })
});


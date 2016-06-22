var app = angular.module('kodofisi.controller',[]);

app.controller("dashCtrl", function ($scope, AjaxServ) {
    $scope.form = {
   	    url : ""
    };
    $scope.getVideo = function (data) {
   	    AjaxServ.getVideo({asd : "dsasd"})
    };
});
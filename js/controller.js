var app = angular.module('kodofisi.controller',[]);

app.controller("formCtrl", function ($scope) {
   $scope.form = {
   	url : ""
   };
   $scope.formgoster = function (data) {
   	console.log(data);
   	$scope.form.url= ""
   };
});
var app = angular.module('kodofisi.service',[]);

app.service('AjaxServ', function ($http, $httpParamSerializerJQLike) {
    var result = function (data) {

        $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

        var promise = $http.post("http://localhost/http/index.php", $httpParamSerializerJQLike(data)).then(function (response) {
            return response.data;
        } , function (response) {
            return false;
        })

        return promise;
    };

    return {
        getVideo : result
    };
});
var app = angular.module('kodofisi.service',[]);

app.service('AjaxServ', function ($http, $httpParamSerializerJQLike) {
    var result = function (data) {

        $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

        var promise = $http({
                                url: "http://localhost/api.php",
                                method: "GET",
                                params: { channel_id: data }
                            }).then(function (response) {
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
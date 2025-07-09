(function () {
    var app = angular.module('MyApp', ['ngRoute']);
    app.controller('HomeController', function ($scope) {
        $scope.Message = "";
    });
})();



(function () {
    var app = angular.module('MyApp', ['ngRoute']);
    app.controller('DataController', function ($scope) {
        $scope.Message = "";
    });
})();
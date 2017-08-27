var SchoolSystem = angular.module('SchoolSystem',['ngRoute']);

//Routing all the required templates
SchoolSystem.config(['$routeProvider',function($routeProvider){
        $routeProvider
                .when('/',{templateUrl:'views/Dashboard.html',controller:'dashboardController'})
                .when('/SubjectContent',{templateUrl:'views/subjectContent.html',controller:'SubjectContentController'})
                .when('/textBooksContent',{templateUrl:'views/textBooksContent.html',controller:'BooksContentController'})
                .when('/D',{templateUrl:'views/Dview.html',controller:'dController'})
                .when('/E',{templateUrl:'views/Eview.html',controller:'eController'})
                .otherwise({redirectTo:'/'});
}]);
angular.module('logue', ['ui.router'])
    .config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {
        //setup menu
        $urlRouterProvider.otherwise('/dashboard');
        $stateProvider
            // HOME STATES AND NESTED VIEWS ========================================
        .state('dashboard', {
            url: '/dashboard',
            templateUrl: 'views/dashboard.html'
        })
        .state('competition_create', {
            url: '/competition/create',
            templateUrl: 'views/competition_create.html'
        })
        .state('competition_explore', {
            url: '/competition/explore',
            templateUrl: 'views/competition_explore.html'
        })
        .state('competition_detail', {
            url: '/competition/detail',
            templateUrl: 'views/competition_detail.html'
        })
        .state('competition_dashboard', {
            url: '/competition/dashboard',
            templateUrl: 'views/competition_dashboard.html'
        })
        .state('profile_setting', {
            url: '/profile/setting',
            templateUrl: 'views/profile_setting.html'
        })
}])
.controller("dashboard", ["$scope", "$http", function ($scope, $http) {
        
}])
.run(function($rootScope) {
        $rootScope.user = JSON.parse(localStorage.getItem('user'));
        $rootScope.formatDate = function (date) {
            return formatDate(date);
        }
        $rootScope.extension = function (date) {
            return extension(date);
        }
});
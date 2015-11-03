angular.module('angular-toArrayFilter', []).filter('toArray', function () {
    return function (obj, addKey) {
        if (!angular.isObject(obj))
            return obj;
        if (addKey === false) {
            return Object.keys(obj).map(function (key) {
                return obj[key];
            });
        } else {
            return Object.keys(obj).map(function (key) {
                var value = obj[key];
                return angular.isObject(value) ?
                        Object.defineProperty(value, '$key', {enumerable: false, value: key}) :
                        {$key: key, $value: value};
            });
        }
    };
});

angular.module('angular-emailUnique', []).directive('uniqueEmail', function () {
    console.log('unique = ');
    return {
        require: 'ngModel',
        restrict: 'A',
        link: function (scope, element, attrs, ngModel) {
            element.bind('blur', function (e) {
                if (!ngModel || !element.val())
                    return;
                var keyProperty = scope.$eval(attrs.uniqueEmail);
                var currentValue = element.val();
                console.log(keyProperty.key);
                console.log(currentValue);
                checkUniqueValue(keyProperty.key, keyProperty.property, currentValue)

//                        .then(function (unique) {
//                            //Ensure value that being checked hasn't changed
//                            //since the Ajax call was made
//                            if (currentValue == element.val()) {
//                                //  console.log('unique = '+unique);
//                                ngModel.$setValidity('unique', unique);
//                                scope.$broadcast('show-errors-check-validity');
//                            }
//                        });
            })
        }
    };
});



var app = angular.module('kanha', ['angular-toArrayFilter', 'angular-emailUnique']);

app.config(['$interpolateProvider', function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    }]);
app.controller('mainNavigation', function ($http, $rootScope, $scope) {
    $http.get("/navigation").success(function (response) {
        $scope.navigation = response;
    });
});

app.controller('categoryController', function ($http, $rootScope, $location, $scope) {
    $scope.filtered = {};

    var slug = $location.absUrl();
    slug = slug.split("/")[4];



    $http.get("/get-category-products/" + slug).success(function (response) {
        $scope.products = response.data;
        $scope.catTitle = response.maincat;
    });

    $http.get("/get-filters/" + slug).success(function (response) {
        $scope.filters = response;
    });

    $scope.filterProds = function (option, parent) {

        if (option) {
            if (!(parent in $scope.filtered))
                $scope.filtered[parent] = [];


            var idx = $scope.filtered[parent].indexOf(option);

            if (idx > -1)
                $scope.filtered[parent].splice(idx, 1);
            else
                $scope.filtered[parent].push(option);



            if ($scope.filtered[parent].length <= 0)
                delete $scope.filtered[parent]

        }

        if (true) {

            $http.get("/get-filtered-products/", {params: {'filters': $scope.filtered, 'unit': $("[name='unit']").val(), 'b': $("[name='b']").val(), 'h': $("[name='h']").val(), 'w': $("[name='w']").val(), }}).success(function (response) {
                $scope.products = response.data;
                $scope.$digest;
            });
        } else {
            $http.get("/get-category-products/" + slug).success(function (response) {
                $scope.products = response.data;
                $scope.$digest;
            });
        }
    };

    $scope.sizeOf = function (obj) {
        return Object.keys(obj).length;
    };





});
app.controller('productController', function ($http, $rootScope, $location, $scope) {
    var slug = $location.absUrl();

    $http.get("/get-prod-info/" + slug.split("/")[3]).success(function (response) {
        $rootScope.prods = response;
    });

    $scope.addTocart = function () {
        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: $("form[name='fromcart']").serialize(),
            cache: false,
            success: function (data) {
                // alert(data);
                data = data.split("||||||");
              // alert(data);
                $(".custom-top-right .cartQty").html("(" + data[1] + ")");
                $(".cart-container .open-panel").html(data[0]);

                //$("#ModifyCart").modal('toggle');
                // $("#productAdded").modal('toggle');
            }
        });
    };
});

function checkUniqueValue(id, property, value) {
    var data = {
        id: id,
        property: property,
        value: value
    };

    $.ajax({
        url: "/is-unique-value",
        type: "POST",
        data: data,
        cache: false,
        success: function (response) {
           // alert(response);
            if(response==1)
            {
                $('#uniqueEmail').text('Email Id already Exist.'); 
            }else
            {
                $('#uniqueEmail').text('');
            }
        }


    });

}






@extends('layouts.master') {{-- การสืบทอดโฟลเดอร์ --}}
@section('title') BikeShop | อุปกรณ์จักรยาน, อะไหล่, ชุดแข่ง และอุปกรณ์ตกแต่ง @stop {{-- หัวข้อ title html --}}
@section('content')

    <div ng-app="app" ng-controller="ctrl">

        {{-- <input type="text" class="form-control" ng-model="helloMessage">
        <h1>@{ helloMessage }</h1>

        <ul class="breadcrumb">
            <li><a href="{{ URL::to('product') }}">ประเภทสินค้า</a></li>
            <li class="active">หน้าแรก </li>
        </ul>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <strong>หน้าแรก</strong>
                </div>
            </div>

            <div class="panel-body">
                <input type="text" class="form-control" ng-model="query.name" placeholder="ค้นหา">
                <br>
                <table class="table table-bordered" ng-if="products.length">
                    <thead>
                        <tr>
                            <th>รหัส</th>
                            <th>ชื่อสินค้า </th>
                            <th>ราคาขาย</th>
                            <th>คงเหลือ</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                    <tr ng-repeat="p in products|filter:query">
                        <td>@{p.code}</td>
                        <td>@{p.name}</td>
                        <td>@{p.price|number:2}</td>
                        <td>@{p.qty|number:0}</td>
                        <td>
                            <span ng-if="p.qty >= 5" ng-class="{'label label-success': p.qty >= 5}">สินค้าพร้อมขาย</span>
                            <span ng-if="p.qty > 0 && p.qty < 5"
                                ng-class="{'label label-warning': p.qty > 0 && p.qty < 5}">สินค้าใกล้หมด</span>
                            <span ng-if="p.qty == 0" ng-class="{'label label-danger': p.qty == 0}">สินค้าหมด</span>
                        </td>
                    </tr>
                </table>
                <h3 ng-if="!products.length">ไม่พบข้อมูลสินค้า </h3>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-md-3">
                <h1 style="margin: 0 0 30px 0">สินค้าในร้าน</h1>
            </div>
            <div class="col-md-9">
                <div class="pull-right" style="margin-top:10px">
                    <input type="text" class="form-control" ng-model="query" ng-keyup="searchProduct($event)"
                        style="width:190px" placeholder="พิมพ์ชื่อสินค้า
            เพื่อค้นหา">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item" ng-class="{'active': category == null}"
                        ng-click="getProductList(null)">ทั้งหมด</a>
                    <a href="#" class="list-group-item" ng-repeat="c in categories" ng-click="getProductList(c)"
                        ng-class="{'active': category.id == c.id}">@{c.name}</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <h3 ng-if="!products.length" style="text-align: center">ไม่พบข้อมูลสินค้า </h3>
                    <div class="col-md-3" ng-repeat="p in products">
                        <div class="panel panel-default bs-product-card">
                            <img ng-src="@{p.image_url}" class="img-responsive">
                            <div class="panel-body">
                                <h4><a href="#">@{p.name }</a></h4>

                                <div class="form-group">
                                    <div>คงเหลือ: @{p.stock_qty}</div>
                                    <div>ราคา <strong>@{p.price}</strong> บาท</div>
                                </div>

                                @guest
                                <a class="btn btn-danger btn-block">
                                    <i class="fa fa-shopping-cart"></i> หยิบใส่ตะกร้า</a>
                                @else
                                <a href="#" class="btn btn-success btn-block" ng-click="addToCart(p)">
                                    <i class="fa fa-shopping-cart"></i> หยิบใส่ตะกร้า</a>
                                @endguest

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        var app = angular.module('app', []).config(function($interpolateProvider) {
            $interpolateProvider.startSymbol('@{').endSymbol('}');
        });

        app.service('productService', function($http) {
            this.getProductList = function(category_id) {
                if (category_id) {
                    return $http.get('/api/product/' + category_id);
                }
                return $http.get('/api/product');
            };

            this.getCategoryList = function() {
                return $http.get('/api/category');
            }

            this.searchProduct = function(query) {
                return $http({
                    url: '/api/product/search',
                    method: 'post',
                    data: {
                        'search_query': query
                    },
                });
            }

        });

        app.controller('ctrl', function($scope, productService) {

            $scope.products = []; //นศ.ลบข้อมูล mockup ที่ สร้างเป็น array ทิ้งไปก่อน แล้วแทนที่
            $scope.category = {};
            $scope.getProductList = function(category) {

                $scope.category = category;
                category_id = category != null ? category.id : '';
                productService.getProductList(category_id)
                    .then(function(res) {
                        if (!res.data.ok) return;
                        $scope.products = res.data.products; //ชื่อข้อมูล JSON ดูหน้า 1
                    });
            };
            $scope.getProductList(null); //< เรียกใช้ ฟังก์ชัน getProductList()

            $scope.categories = [];
            $scope.getCategoryList = function() {
                productService.getCategoryList().then(function(res) {
                    if (!res.data.ok) return;
                    $scope.categories = res.data.categories;
                });
            };
            $scope.getCategoryList();

            $scope.searchProduct = function(e) {
                productService.searchProduct($scope.query).then(function(res) {
                    if (!res.data.ok) return;
                    $scope.products = res.data.products;
                });
            };


            $scope.addToCart = function(p) {
                console.log(p.id);
                window.location.href = '/cart/add/' + p.id;
            };

        });

        // app.controller('ctrl', function($scope) {
        //     $scope.helloMessage = 'ยินดีต้อนรับสู่ AngularJS';
        //     $scope.products = [{
        //             'code': 'P001',
        //             'name': 'ชุดแข่งสีดา Size L',
        //             'price': 1500.00,
        //             'qty': 5
        //         },
        //         {
        //             'code': 'P002',
        //             'name': 'หมวกันน็อกรุ่น SM-220',
        //             'price': 1400.00,
        //             'qty': 0
        //         },
        //         {
        //             'code': 'P003',
        //             'name': 'มิเตอร์วัดความเร็ว',
        //             'price': 1450.00,
        //             'qty': 2
        //         },
        //     ];
        // });
    </script>

@endsection {{-- ปิด title html --}}

@extends('layouts.master') {{-- การสืบทอดโฟลเดอร์ --}}
@section('title') BikeShop | อุปกรณ์จักรยาน, อะไหล่, ชุดแข่ง และอุปกรณ์ตกแต่ง @stop {{-- หัวข้อ title html --}}
@section('content')

    <div ng-app="app" ng-controller="ctrl">
        <input type="text" class="form-control" ng-model="helloMessage">
        <h1>@{ helloMessage }</h1>

        <ul class="breadcrumb">
            {{-- <li><a href="{{ URL::to('product') }}">ประเภทสินค้า</a></li> --}}
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
                            <span ng-if="p.qty > 0 && p.qty < 5" ng-class="{'label label-warning': p.qty > 0 && p.qty < 5}">สินค้าใกล้หมด</span>
                            <span ng-if="p.qty == 0" ng-class="{'label label-danger': p.qty == 0}">สินค้าหมด</span>
                        </td>
                    </tr>
                </table>
                <h3 ng-if="!products.length">ไม่พบข้อมูลสินค้า </h3>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var app = angular.module('app', []).config(function($interpolateProvider) {
            $interpolateProvider.startSymbol('@{').endSymbol('}');
        });

        app.controller('ctrl', function($scope) {
            $scope.helloMessage = 'ยินดีต้อนรับสู่ AngularJS';
            $scope.products = [{
                    'code': 'P001',
                    'name': 'ชุดแข่งสีดา Size L',
                    'price': 1500.00,
                    'qty': 5
                },
                {
                    'code': 'P002',
                    'name': 'หมวกันน็อกรุ่น SM-220',
                    'price': 1400.00,
                    'qty': 0
                },
                {
                    'code': 'P003',
                    'name': 'มิเตอร์วัดความเร็ว',
                    'price': 1450.00,
                    'qty': 2
                },
            ];
        });
    </script>

@endsection {{-- ปิด title html --}}

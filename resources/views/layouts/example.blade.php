<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title", "BikeShop | จำหน่ายอะไหล่จักรยานออนไลน์")</title>
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
    
</head>

<body>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <div class="container">
        <script> 
            toastr.success("บันทึกข้อมูลสำเร็จ"); 
            toastr.error("ไม่สามารถบันทึกข้อมูลได้" );
        </script>
        <nav class="navbar navbar-default navbar-static-top w-100">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">BikeShop</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">หน้าแรก</a></li>
                    <li><a href="#">ข้อมูลสินค้า</a></li>
                    <li><a href="#">รายงาน</a></li>
                </ul>
            </div>
        </nav> @yield("content")
        <div class="row">

            {{-- primary, danger, warning, success, info และ default  --}}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">
                        <strong>Button</strong>
                    </div>
                </div>

                <div class="panel-body">
                    <a href="#" class="btn btn-default">Default</a>
                    <a href="#" class="btn btn-primary">Primary</a>
                    <a href="#" class="btn btn-info">Info</a>
                    <a href="#" class="btn btn-success">Success</a>
                    <a href="#" class="btn btn-warning">Warning</a>
                    <a href="#" class="btn btn-danger">Danger</a>
                </div>

                <div class="panel-body">
                    <a href="#" class="btn btn-default"><i class="fa fa-home"></i> หน้าหลัก </a>
                    <a href="#" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</a>
                    <a href="#" class="btn btn-info"><i class="fa fa-edit"></i> แก้ไข</a>
                    <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> ลบ</a>
                </div>
            </div>

            {{-- primary, danger, warning, success, info และ default  --}}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">
                        <strong>Form</strong>
                    </div>
                </div>

                <div class="panel-body">
                    {{-- form-group . form-inline --}}
                    <div class="form-inline">
                        <input type="text" class="form-control" placeholder="ชื่อผู้ใช้">
                        <input type="password" class="form-control" placeholder="รหัสผ่าน">
                        <button class="btn btn-primary">เข้าสู่ระบบ</button>
                    </div>
                </div>


                <div class="panel-body">
                    <div class="form-group">
                        <label>ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>ที่อยู่</label>
                        <textarea rows="4" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">เพิ่มข้อมูล</button>
                    </div>
                </div>


                <div class="panel-body">
                    <div class="form-group has-error">
                        <label>ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control">
                        <div class="help-block">กรุณากรอกชื่อ-นามสกุล</div>
                    </div>
                    <div class="form-group has-error">
                        <label>ที่อยู่</label>
                        <textarea rows="4" class="form-control"></textarea>
                        <div class="help-block">กรุณากรอกที่อยู่</div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">เพิ่มข้อมูล</button>
                    </div>

                </div>
            </div>

            {{-- primary, danger, warning, success, info และ default  --}}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">
                        <strong>Alert</strong>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <strong>Success</strong> ข้อความ
                    </div>
                    <div class="alert alert-info alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <strong>info</strong> ข้อความ
                    </div>
                    <div class="alert alert-warning alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <strong>warning</strong> ข้อความ
                    </div>
                    <div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <strong>danger</strong> ข้อความ
                    </div>
                </div>
            </div>

            {{-- primary, danger, warning, success, info และ default  --}}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">
                        <strong>Table</strong>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>รหัสสินค้า </th>
                                <th>ชื่อสินค้า </th>
                                <th>ราคาขาย</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>P001</td>
                                <td>ชุดจักรยาน ขนาด XL</td>
                                <td>2500.00</td>
                            </tr>
                            <tr>
                                <td>P002</td>
                                <td>หมวกกันน็อก รุ่น DL330</td>
                                <td>1500.00</td>
                            </tr>
                            <tr>
                                <td>P003</td>
                                <td>ชุดเกียร์Shimano รุ่น SH-001</td>
                                <td>4500.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>

</html>

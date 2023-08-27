@extends('layouts.master')
@section('title') BikeShop | ประเภทสินค้า @stop
@section('content')
    <h1>ประเภทสินค้า</h1>
    <ul class="breadcrumb">
        {{-- <li><a href="{{ URL::to('product') }}">ประเภทสินค้า</a></li> --}}
        <li class="active">ประเภทสินค้า </li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>รายการประเภท</strong>
            </div>
        </div>
        <div class="panel-body">
            <a href="{{ URL::to('category/edit') }}" class="btn btn-success pull-right">เพิ่มสินค้า</a>
            <form action="{{ URL::to('category/search') }}" method="post" class="form-inline">
                {{ csrf_field() }}
                <input type="text" name="q" class="form-control" placeholder="พิมพ์รหัสหรือชื่อเพื่อค้นหา">
                <button type="submit" class="btn btn-primary">ค้นหา</button>
            </form>
            <br>
            <table class="table table-bordered bs-table">
                <thead>
                    <tr>
                        <th class="bs-center">#</th>
                        <th class="bs-center">ชื่อประเภท</th>
                        <th class="bs-center">การทำงาน</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $c)
                        <tr>
                            <td class="bs-center"> {{ $c->id }} </td>
                            <td class="bs-center"> {{ $c->name }} </td>
                            <td class="bs-center">
                                <a href="{{ URL::to('category/edit/' . $c->id) }}" class="btn btn-info"> <i
                                        class="fa fa-edit"></i> แก้ไข</a>
                                <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $c->id }}">
                                    <i class="fa fa-trash"></i> ลบ</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
            <div class="panel-footer ">
                <span>แสดงข้อมูลจํานวน {{ count($categories) }} รายการ</span>
            </div>
            <br>
            {{ $categories->links() }}
            <br>
        </div>
        
    </div>

    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function() {
                var id = $(this).attr('id-delete');
                if (confirm('คุณต้องการลบข้อมูลใช่หรือไม่')) {
                    window.location.href = '/category/remove/' + id;
                }
            });
        });
    </script>
@endsection

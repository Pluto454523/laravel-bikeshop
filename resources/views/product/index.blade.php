@extends('layouts.master') {{-- การสืบทอดโฟลเดอร์ --}}
@section('title') BikeShop | อุปกรณ์จักรยาน, อะไหล่, ชุดแข่ง และอุปกรณ์ตกแต่ง @stop {{-- หัวข้อ title html --}}
@section('content')
    <h1>ข้อมูลสินค้า</h1>
    <ul class="breadcrumb">
        {{-- <li><a href="{{ URL::to('product') }}">ประเภทสินค้า</a></li> --}}
        <li class="active">ข้อมูลสินค้า </li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>รายการ</strong>
            </div>
        </div>
        <div class="panel-body">
            <a href="{{ URL::to('product/edit') }}" class="btn btn-success pull-right">เพิ่มสินค้า</a>
            <form action="{{ URL::to('product/search') }}" method="post" class="form-inline">
                {{ csrf_field() }}
                <input type="text" name="q" class="form-control" placeholder="พิมพ์รหัสหรือชื่อเพื่อค้นหา">
                <button type="submit" class="btn btn-primary">ค้นหา</button>
            </form>
            <br>
            
            <table class="table table-bordered bs-table">
                <thead>
                    <tr>
                        <th class="bs-center">รหัส </th>
                        <th class="bs-center">รูปสินค้า</th>
                        <th class="bs-center">ชื่อสินค้า </th>
                        <th class="bs-center">ประเภท</th>
                        <th class="bs-center">คงเหลือ</th>
                        <th class="bs-center">ราคาต่อหน่วย</th>
                        <th class="bs-center">การทํางาน</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                    <tr>
                        {{-- ตัวแปร products ที่ถูกส่งมาจาก Controller --}}
                        <td class="bs-center">{{ $item->code }}</td>
                        <td class="bs-center"><img src="{{ asset($item->image_url) }}" alt="" width="100px"></td>
                        <td class="bs-center">{{ $item->name }}</td>
                        <td class="bs-center">{{ $item->category->name }}</td>
                        <td class="bs-price">{{ number_format($item->stock_qty, 0) }}</td>
                        <td class="bs-price">{{ number_format($item->price, 2) }}</td>
                        <td class="bs-center">
                            <a href="{{ URL::to('product/edit/' . $item->id) }}" class="btn btn-info"><i
                                    class="fa fa-edit"></i> แก้ไข</a>
                            <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $item->id }}">
                                <i class="fa fa-trash"></i> ลบ</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">รวม</th>
                        <th class="bs-price">{{ number_format($products->sum('stock_qty'), 0) }}</th>
                        <th class="bs-price">{{ number_format($products->sum('price'), 2) }}</th>
                    </tr>
                </tfoot>

            </table>
            <div class="panel-footer">
                <span>แสดงข้อมูลจํานวน {{ count($products) }} รายการ</span>
            </div>
            <br>
            {{ $products->links() }}
            <br>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function() {
                var id = $(this).attr('id-delete');
                if (confirm('คุณต้องการลบข้อมูลใช่หรือไม่')) {
                    window.location.href = '/product/remove/' + id;
                }
            });
        });
    </script>
@endsection {{-- ปิด title html --}}

@extends('layouts.master')
@section('title') BikeShop | รายการสินค้า @stop
@section('content')
    <div class="container">
        {{ $products->links() }}
        <h1>รายการสินค้า </h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title"><strong>รายการ</strong></div>
            </div>
            
            <div class="panel-body">
                <form action="{{ URL::to('product/search') }}" method="post" class="form-inline">
                    @csrf
                    <input type="text" name="q" class="form-control" placeholder="ป้อนรหัสหรือชื่อที่ต้องการ">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </form> {{--  ให้มี Textbox สำหรับรับคำที่ต้องการค้นหาจากผู้ใช้ พร้อมปุ่มกด --}}
            </div>

            <table class="table table-bordered bs-table">
                <thead>
                    <tr>
                        <th>รูปสินค้า </th>
                        <th>รหัส</th>
                        <th>ชื่อสินค้า </th>
                        <th>ประเภท</th>
                        <th>คงเหลือ</th>
                        <th>ราคาต่อหน่วย</th>
                        <th>การทำงาน</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p) {{-- ตัวแปร products ที่ถูกส่งมาจาก controller --}}
                        <tr>
                            <td>{{ $p->image_url }}</td>
                            <td>{{ $p->code }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->category->name }}</td>
                            <td class="bs-price" >{{ number_format($p->stock_qty, 0) }}</td>
                            <td class="bs-price" >{{ number_format($p->price, 2) }}</td>
                            <td class="bs-center"> {{-- หลังจากโปรแกรมแสดงข้อมูลออกมาได้แล้ว จึงค่อยเขียน link แก้ไข ลบ --}}
                                <a href="#" class="btn btn-info"><i class="fa fa-edit"></i> แก้ไข</a>
                                <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> ลบ</a>
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
                <span>แสดงข้อมูลจำนวน {{ count($products) }} รายการ</span>
            </div>
            
        </div>
        {{-- <ul class="pagination">
            <li><a href="#">&laquo;</a></li>
            @for (count($products) as $i)
            @for ($i = 1; $i <= count($products); $i++)
                <li><a href="#">{{$i}}</a></li>
            @endfor
            <li><a href="#">&raquo;</a></li>
        </ul> --}}
    </div>
@endsection

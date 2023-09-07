@extends('layouts.master') {{-- การสืบทอดโฟลเดอร์ --}}
@section('title') BikeShop | อุปกรณ์จักรยาน, อะไหล่, ชุดแข่ง และอุปกรณ์ตกแต่ง @stop {{-- หัวข้อ title html --}}
@section('content')
{!! Form::model($product, 
    [
        'action' => 'App\Http\Controllers\ProductController@update',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
    ])!!}
    <h1>ข้อมูลสินค้า</h1>
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('product') }}">ข้อมูลสินค้า</a></li>
        <li class="active">แก้ไข</li>
    </ul>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif


    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>ข้อมูลสินค้า</strong>
            </div>
        </div>

        <div class="panel-body">
            <input type="hidden" name="id" value="{{ $product->id }}">
            <table class="table table-bordered bs-table">
                
                @if ($product->image_url)
                    <tr>
                        <td class="bs-center"><strong>รูปสินค้า </strong></td>
                        <td><img src="{{ URL::to($product->image_url) }}" width="100px"></td>
                    </tr>
                @endif
                
                <tr>
                    <td class="bs-center">{{ Form::label('code', 'รหัสสินค้า') }} </td>
                    <td>{{ Form::text('code', $product->code, ['class' => 'form-control']) }}</td>
                </tr>

                <tr>
                    <td class="bs-center">{{ Form::label('name', 'ชื่อสินค้า ') }}</td>
                    <td>{{ Form::text('name', $product->name, ['class' => 'form-control']) }}</td>
                </tr>

                <tr>
                    <td class="bs-center">{{ Form::label('category_id', 'ประเภทสินค้า ') }}</td>
                    <td>{{ Form::select('category_id', $categories, Request::old('category_id'), ['class' => 'form-control']) }}
                </tr>

                <tr>
                    <td class="bs-center">{{ Form::label('stock_qty', 'คงเหลือ') }}</td>
                    <td>{{ Form::text('stock_qty', $product->stock_qty, ['class' => 'form-control']) }} </td>
                </tr>
                <tr>
                    <td class="bs-center">{{ Form::label('price', 'ราคาขายต่อหน่วย') }}</td>
                    <td>{{ Form::text('price', $product->price, ['class' => 'form-control']) }}</td>
                </tr>

                <tr>
                    <td class="bs-center">{{ Form::label('image', 'เลือกรูปภาพสินค้า ') }}</td>
                    <td>{{ Form::file('image') }}</td>
                </tr>

            </table>
        </div>
        <div class="panel-footer">
            <button type="reset" class="btn btn-danger">ยกเลิก</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
        </div>
    </div>
    <script>

        $(document).ready(function () {
            $('button:reset').click(function () {
                window.location.href = '/product';
            });
        });

    </script>
{!! Form::close() !!}
@endsection
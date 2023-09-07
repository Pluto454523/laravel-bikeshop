@extends('layouts.master')
@section('title') BikeShop | อุปกรณ์จักรยาน, อะไหล่, ชุดแข่ง และอุปกรณ์ตกแต่ง @stop
@section('content')
    <h1>ประเภทสินค้า</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <ul class="breadcrumb">
        <li><a href="{{ URL::to('category') }}">ประเภทสินค้า</a></li>
        <li class="active">แก้ไขประเภท </li>
    </ul>
    
    {!! Form::model($category, [
        'action' => 'App\Http\Controllers\CategoryController@update',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
    ]) !!}
    
    <input type="hidden" name="id" value="{{ $category->id }}">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>ข้อมูลประเภท</strong>
            </div>
        </div>


        <div class="panel-body">
            <table class="table table-bordered bs-table">
              

                <tr>
                    <td class="bs-center"> {{ Form::label('name', 'ชื่อประเภทสินค้า') }}</td>
                    <td> {{ Form::text('name', $category->name, ['class' => 'form-control']) }}</td>
                </tr>


            </table>
        </div>

        <div class="panel-footer">
            <button type="reset" class="btn btn-danger">ยกเลิก</button>
            <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i>บันทึก</button>
        </div>
    </div>
    <script>

        $(document).ready(function () {
            $('button:reset').click(function () {
                window.location.href = '/category';
            });
        });

    </script>
    {!! Form::close() !!}

@endsection
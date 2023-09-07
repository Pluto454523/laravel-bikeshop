@extends('layouts.master') {{-- การสืบทอดโฟลเดอร์ --}}
@section('title') BikeShop | อุปกรณ์จักรยาน, อะไหล่, ชุดแข่ง และอุปกรณ์ตกแต่ง @stop {{-- หัวข้อ title html --}}
@section('content')
    {!! Form::open(array (
        'action' => 'App\Http\Controllers\CategoryController@insert',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
    )) !!}

    <h1>ประเภทสินค้า</h1>
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('category') }}">ประเภทสินค้า</a></li>
        <li class="active">เพิ่มข้อมูลประเภท </li>
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
                <strong>ข้อมูลประเภท</strong>
            </div>
        </div>

        <div class="panel-body">
            <table class="table table-bordered bs-table">
               
                <tr>
                    <td class="bs-center">{{ Form::label('name', 'ชื่อประเภท ') }}</td>
                    <td>{{ Form::text('name', Request::old('name'), ['class' => 'form-control']) }}</td>
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
                window.location.href = '/category';
            });
        });

    </script>
    {!! Form::close() !!}
@endsection
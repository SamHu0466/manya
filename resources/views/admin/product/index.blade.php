@extends('adminlte::page')

@section('title', 'QuickOrder')

@section('css')

@stop

@section('content_header')
    <h1>@lang('admin.product')</h1>
@stop

@section('content')
    <a style="margin-bottom: 10px" href="{{url('admin/product/add')}}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon glyphicon-plus"></i> @lang('admin.add')</a>
    <br/>
    <table class="table table-striped table-bordered" id="product-table">
        <thead>
        <tr>
            <th>食物名稱</th>
            <th>菜單類別</th>
            <th>內容</th>
            <th>停止銷售</th>
            <th>圖片</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->products_name}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                @if(!$product->active)
                    <td>Yes</td>
                @else
                    <td>No</td>
                @endif
                <td><img style="height: 80px;width: 80px;" src="{{url('/').'/public/'.$product->products_image_url}}"/></td>
                <td>
                    <a href="{{url('admin/product/modify/'.$product->products_id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> @lang('admin.edit')</a>
                    <a href="{{url('admin/product/delete/'.$product->products_id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> @lang('admin.delete')</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#product-table').DataTable({
                "searching":     false,
                "language": {
                    "processing":   "處理中...",
                    "loadingRecords": "載入中...",
                    "lengthMenu":   "顯示 _MENU_ 項結果",
                    "zeroRecords":  "沒有符合的結果",
                    "info":         "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                    "infoEmpty":    "顯示第 0 至 0 項結果，共 0 項",
                    "infoFiltered": "(從 _MAX_ 項結果中過濾)",
                    "infoPostFix":  "",
                    "search":       "搜尋:",
                    "paginate": {
                        "first":    "第一頁",
                        "previous": "上一頁",
                        "next":     "下一頁",
                        "last":     "最後一頁"
                    },
                    "aria": {
                        "sortAscending":  ": 升冪排列",
                        "sortDescending": ": 降冪排列"
                    }
                }
            });
        } );
    </script>
@stop

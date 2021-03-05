@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Liệt kê đơn hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th>Mã đơn hàng</th>
            <th>Tình trạng đơn hàng</th>
        
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @php
              $i = 0;
            @endphp
            @foreach($order as $key=>$ord)
              @php
                $i++;
              @endphp
            <tr>
                <td>{{$i}}</td>
                <td>{{ $ord->order_code }}</td>      
                <td>@if($ord->order_status==0)
                      <a href="{{URL::to('/process-order/'.$ord->order_id)}}">Đơn hàng mới</a>
                    @else
                      Đã xử lý
                    @endif
                </td>

                <td>
                  <a href="{{URL::to('/view-order/'.$ord->order_code)}}" class="active styling-edit">
                    <i class="fa fa-eye text-success text-active"></i>
                  </a>
                  <a onclick="return confirm('Bạn có muốn xóa thương hiệu này không?')" href="{{URL::to('/view-order/'.$ord->order_code)}}" class="active styling-delete">
                    <i class="fa fa-times text-danger text"></i>
                  </a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-12 text-right text-center-xs">                
         
         {!!$order->links()!!}
        
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
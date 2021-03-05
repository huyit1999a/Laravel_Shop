@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Thông tin khách hàng
        </div>
        <div class="table-responsive">
        <table class="table table-striped b-t b-light">
            <thead>
            <tr>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>           
            </tr>
            </thead>
            <tbody>
            <tr>   
                <td>{{$customer->customer_name}}</td>
                <td>{{$customer->customer_email}}</td>
                <td>{{$customer->customer_phone}}</td>                        
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
</div>

<br> <br>

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Thông tin vận chuyển hàng
        </div>
        <div class="table-responsive">
      
        <table class="table table-striped b-t b-light">
            <thead>
            <tr>
                <th>Tên người nhận hàng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>  
                <th>Ghi chú</th>  
                <th>Thanh toán</th>       
            </tr>
            </thead>
            <tbody>
            <tr>   
                <td>{{$shipping->shipping_name}}</td>
                <td>{{$shipping->shipping_address}}</td>
                <td>{{$shipping->shipping_phone}}</td>  
                <td>{{$shipping->shipping_note}}</td> 
                <td>@if($shipping->shipping_method==1)
                    Đã chuyển khoản
                    @else
                    Bằng tiền mặt
                    @endif
                </td>  
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
</div>

<br><br>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi tiết đơn hàng
    </div>
    
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
  
          </tr>
        </thead>
        <tbody>
            @php 
                $j = 0;
                $i = 0;
                $total = 0;
            @endphp

            @foreach($order_details as $key => $details)
            @php 
                $j++;
                $i++;
                $subtotal = $details->product_price*$details->product_sales_quantity;
                $total+=$subtotal;
            @endphp
            <tr>
                <td>{{$j}}</td>
                <td>{{$details->product_name}}</td>
                <td>{{$details->product_sales_quantity}}</td>
                <td>{{number_format($details->product_price).' VNĐ'}}</td>
                <td>{{number_format($details->product_price*$details->product_sales_quantity).' VNĐ'}}</td>
                
            </tr>
            @endforeach
            <tr>    
                <td colspan="4">Tổng tiền thanh toán</td>
                <td>
                @php  
                   echo number_format($total).' VNĐ';
                @endphp
                </td>
            </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection
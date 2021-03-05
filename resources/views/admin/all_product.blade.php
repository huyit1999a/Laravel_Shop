@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách sản phẩm
    </div>
    
    <div class="table-responsive">
         <?php 
            $message = Session::get('message');
            if($message){
                echo '<span class="message">'.$message.'</span>';
                Session::put('message',null);
            }
        ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hình sản phẩm</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>  
            <th>Hiển thị</th>
        
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_product as $key=>$product)
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_price }}</td>
                <td style="text-align: center;"> 
                    <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" width="50px" max-height="50px" >
                </td>
                <td>{{ $product->category_name }}</td>
                <td>{{ $product->brand_name }}</td>

                <td><span class="text-ellipsis">
                    <?php 
                        if($product->product_status==0){
                    ?>
                    <a href="{{URL::to('/unactive-product/'.$product->product_id)}}"><span class="fa-thumbs-styling-down fa fa-thumbs-down"></span></a>
                    <?php    
                    }
                        else{
                    ?>
                    <a href="{{URL::to('/active-product/'.$product->product_id)}}"><span class="fa-thumbs-styling-up fa fa-thumbs-up"></span></a>
                    <?php  
                    }  
                    ?>     
                </span></td>
              
                <td>
                  <a href="{{URL::to('/edit-product/'.$product->product_id)}}" class="active styling-edit">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')" href="{{URL::to('/delete-product/'.$product->product_id)}}" class="active styling-delete">
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
                
            {!!$all_product->links()!!}
          
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
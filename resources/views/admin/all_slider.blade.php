@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách slider
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
            <th>Tên slider</th>
            
            <th>Hình ảnh</th>
            
            <th>Hiển thị</th>
        
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_slider as $key=>$slider)
            <tr>
                <td>{{ $slider->slider_name }}</td>
             
                <td style=""> 
                    <img src="{{URL::to('public/uploads/slider/'.$slider->slider_image)}}" width="300px" max-height="200px" >
                </td>
               
                <td><span class="text-ellipsis">
                    <?php 
                        if($slider->slider_status==0){
                    ?>
                    <a href="{{URL::to('/unactive-slider/'.$slider->slider_id)}}"><span class="fa-thumbs-styling-down fa fa-thumbs-down"></span></a>
                    <?php    
                    }
                        else{
                    ?>
                    <a href="{{URL::to('/active-slider/'.$slider->slider_id)}}"><span class="fa-thumbs-styling-up fa fa-thumbs-up"></span></a>
                    <?php  
                    }  
                    ?>     
                </span></td>
              
                <td>
                  <a href="{{URL::to('/edit-slider/'.$slider->slider_id)}}" class="active styling-edit">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')" href="{{URL::to('/delete-slider/'.$slider->slider_id)}}" class="active styling-delete">
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
                
            
          
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
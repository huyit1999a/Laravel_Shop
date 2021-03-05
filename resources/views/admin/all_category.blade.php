@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách danh mục sản phẩm
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
            
            <th>Tên danh mục</th>
            <th>Hiển thị</th>
        
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_category as $key=>$cate_pro)
            <tr>
               
                <td>{{ $cate_pro->category_name }}</td>
                <td><span class="text-ellipsis">
                    <?php 
                        if($cate_pro->category_status==0){
                    ?>
                    <a href="{{URL::to('/unactive-category/'.$cate_pro->category_id)}}"><span class="fa-thumbs-styling-down fa fa-thumbs-down"></span></a>
                    <?php    
                    }
                        else{
                    ?>
                    <a href="{{URL::to('/active-category/'.$cate_pro->category_id)}}"><span class="fa-thumbs-styling-up fa fa-thumbs-up"></span></a>
                    <?php  
                    }  
                    ?>     
                </span></td>
              
                <td>
                  <a href="{{URL::to('/edit-category/'.$cate_pro->category_id)}}" class="active styling-edit">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a onclick="return confirm('Bạn có muốn xóa danh mục này không?')" href="{{URL::to('/delete-category/'.$cate_pro->category_id)}}" class="active styling-delete">
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
          
          {!!$all_category->links()!!}

        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách bình luận
    </div>
    <div id="notify_comment"></div>
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
            
            <th>Duyệt</th>
            <th>Tên người gửi</th>
            <th>Bình luận</th>
            <th>Ngày gửi</th>
            <th>Sản phẩm</th>
            <th>Quản lý</th>        
            
          </tr>
        </thead>
        <tbody>
            @foreach($comment as $key=>$comm)
            @if($comm->comment_parent_id==0)
            <tr>
               
                <td>
                  @if($comm->comment_status==1)
                    <input type="button" data-comment_status="0" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="btn btn-primary btn-sm btn-allow-comment" value="Duyệt">
                  @else
                    <input type="button" data-comment_status="1" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="btn btn-danger btn-sm btn-allow-comment" value="Bỏ duyệt">
                  @endif
                </td>
                <td>{{ $comm->comment_name }}</td>
                <td>
                  {{ $comm->comment }}<br>
                  <ul class="list_reply_comment">
                    Trả lời:
                    @foreach($comment_rep as $key => $comm_reply)
                      @if($comm_reply->comment_parent_id==$comm->comment_id)
                        <li>{{$comm_reply->comment}}</li>
                      @endif
                     @endforeach
                  </ul>
                  @if($comm->comment_status==0)
                    <textarea class="form-control reply-comment_{{$comm->comment_id}}" rows="4" style=" resize: none;"></textarea><br>
                    <button class="btn btn-default btn-sm btn-reply-comment" data-comment_id="{{$comm->comment_id}}" data-product_id="{{$comm->comment_product_id}}">Trả lời bình luận</button>
                  @endif
                  
                </td>
                <td>{{ $comm->comment_date }}</td>
                <td>
                  <a href="{{URL::to('chi-tiet-san-pham/'.$comm->product->product_id)}}" target="_blank">{{ $comm->product->product_name }}</a>
                </td>
                
                <td>
                  <a href="{{URL::to('/edit-comment/'.$comm->comment_id)}}" class="active styling-edit">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a onclick="return confirm('Bạn có muốn xóa bình luận này không?')" href="{{URL::to('/delete-comment/'.$comm->comment_id)}}" class="active styling-delete">
                    <i class="fa fa-times text-danger text"></i>
                  </a>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-12 text-right text-center-xs">                
                
            {!!$comment->links()!!}
          
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
@extends('admin_layout')
@section('admin_content')
  <h3 style="text-align: center; margin-bottom: 20px;">Thống kê doanh số</h3>
  <form autocomplete="off">
    {{csrf_field()}}
    <div class="col-md-3">
      <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
      <input type="button" id="btn-filter" class="btn btn-primary btn-sm" value="Lọc kết quả" style="margin-top: 5px;">
    </div>
    <div class="col-md-3">
      <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
    </div>
    <div class="col-md-3">
      <p>
        Lọc theo:
          <select class="filter-date form-control">
            <option style="display: none;">Chọn</option>
            <option value="7ngay">7 ngày qua</option>
            <option value="thangtruoc">30 ngày qua</option>
            <option value="thangnay">Trong tháng này</option>
            <option value="365ngayqua">365 ngày qua</option>
          </select>
      </p>
    </div>
  </form>
  
  <div class="col-md-12">
    <div id="chart" style="height: 250px;"></div>
  </div>
@endsection
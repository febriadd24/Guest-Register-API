@extends('app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Daftar Tamu
                <a href="{{ route('daftartamu.ExportInterction') }}" class="btn btn-success pull-right" style="margin-top: -8px;" title="Export Excel"><i class="icon-plus"></i> Export Excel</a>
            </h3>
            {{-- <div class="input-group">
          <button type="button" class="btn btn-default pull-right" id="daterange-btn">
            <span>September 1, 2019 - September 30, 2019</span>
            <i class=""fa fa-caret-down></i>
          </button>
        </div> --}}
        </div>
        <form id= search-form>
        <div class="panel-body">
                <div class="row">
                        <div class="form-group col-md-4">
                        <h5>Start Date <span class="text-danger"></span></h5>
                        <div class="controls">
                            <input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose" placeholder="Please select start date"> <div class="help-block"></div></div>
                        </div>
                        <div class="form-group col-md-4">
                        <h5>End Date <span class="text-danger"></span></h5>
                        <div class="controls">
                            <input type="date" name="end_date" id="end_date" class="form-control datepicker-autoclose" placeholder="Please select end date"> <div class="help-block"></div></div>
                        </div>
                        <div class="text-left" style="margin-top: 35px;">
                        <button type="submit" id="btnFiterSubmitSearch" class="btn btn-info">Submit</button>
                        </div>
                </div>
            </form>
            <table id="datatable" class="table table-hover" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Foto</th>
                    <th>Title</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>tujuan</th>
                    <th>Description</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Foto</th>
                    <th>Title</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>tujuan</th>
                    <th>Description</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Action</th>

                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

var oTable=$('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax:{
            url:"{{route('table.daftartamu')}}",
            data: function (d) {
                d.start_date = $('input[name=start_date]').val();
                d.end_date = $('input[name=end_date]').val();
            }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'data_pengunjung.Foto', name: 'Foto',
                render:function(data, type, full, meta)
                     { return '<img src="' + data + '"height=50>'; }},
                {data: 'title', name: 'title'},
                {data: 'NIK', name: 'NIK'},
                {data: 'Nama', name: 'Nama'},
                {data: 'tujuan', name: 'tujuan'},
                {data: 'description', name: 'description'},
                {data: 'waktu_masuk', name: 'waktu_masuk'},
                {data: 'waktu_keluar', name: 'waktu_keluar'},
                {data: 'action', name: 'action'}
            ]

})
$('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });
    </script>
@endpush

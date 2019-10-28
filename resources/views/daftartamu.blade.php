@extends('app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Daftar Tamu

                    {{--<label>Date range button:</label>
                           <div class="input-group">
                      <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                        <span>September 1, 2019 - September 30, 2019</span>
                        <i class=""fa fa-caret-down></i>
                      </button>
                    </div> --}}

                <a href="{{ route('daftartamu.ExportInterction') }}" class="btn btn-success pull-right" style="margin-top: -8px;" title="Export Excel"><i class="icon-plus"></i> Export Excel</a>
            </h3>
        </div>
        <div class="panel-body">
            <table id="datatable" class="table table-hover" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
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
        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('table.daftartamu') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'NIK', name: 'NIK'},
                {data: 'Nama', name: 'Nama'},
                {data: 'tujuan', name: 'tujuan'},
                {data: 'description', name: 'description'},
                {data: 'waktu_masuk', name: 'waktu_masuk'},
                {data: 'waktu_keluar', name: 'waktu_keluar'},
                {data: 'action', name: 'action'}
            ]
        });
    </script>
@endpush

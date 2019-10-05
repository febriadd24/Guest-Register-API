@extends('app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Daftar Tamu
                {{-- <a href="{{ route('daftartamu.create') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create Product"><i class="icon-plus"></i> Create</a> --}}
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
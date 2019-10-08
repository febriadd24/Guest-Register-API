@extends('app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Daftar Tujuan
                <a href="{{ route('daftartujuan.create') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create Product"><i class="icon-plus"></i> Create</a>
            </h3>
        </div>
        <div class="panel-body">
            <table id="datatable" class="table table-hover" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Department</th>
                    <th>Bagian</th>
                    <th>NIP</th>
                    <th>Status</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Department</th>
                    <th>Bagian</th>
                    <th>NIP</th>
                    <th>Status</th>
                    <th>created_at</th>
                    <th>updated_at</th>
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
            ajax: "{{ route('table.daftartujuan') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'Nama', name: 'Nama'},
                {data: 'Department', name: 'Department'},
                {data: 'Bagian', name: 'Bagian'},
                {data: 'NIP', name: 'NIP'},
                {data: 'Status', name: 'Status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action'}
            ]
        });
    </script>
@endpush

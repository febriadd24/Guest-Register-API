{{-- @extends('simple')

@section('content')

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Profil Tujuan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body"> --}}


        {!! Form::model($model, [
            'route' => $model->exists ? ['daftartujuan.update', $model->id] : 'daftartujuan.store',
            'method' => $model->exists ? 'PUT' : 'POST'
        ]) !!}


            <!-- text input -->
            <div class="form-group">
                    {{-- {!! Form::hidden('_method',['value'=>'PUT'])!!} --}}
                <label>NIP Tujuan</label>
        {!! Form::text('NIP', null, ['class' => 'form-control', 'id' => 'NIP', 'placeholder'=>'NIP ...'])!!}
            </div>

            <div class="form-group">
                <label>Nama Tujuan</label>
            {!! Form::text('Nama', null, ['class' => 'form-control', 'id' => 'Nama', 'placeholder'=>'Nama ...']) !!}
            </div>

            <div class="form-group">
            <label>Department</label>
        {!! Form::text('Department', null, ['class' => 'form-control', 'id' => 'Department', 'placeholder'=>'Department ...']) !!}
    </div>

            <div class="form-group">
                <label>Bagian</label>
                {!! Form::text('Bagian', null, ['class' => 'form-control', 'id' => 'Bagian', 'placeholder'=>'Bagian ...']) !!}
            </div>

            <div class="form-group">
                <label>Availiable</label>
                {!! Form::text('Availiable', null, ['class' => 'form-control', 'id' => 'Availiable', 'placeholder'=>'Availiable ...']) !!}
            </div>

            <div class="form-group">
                <label>Status</label>
                {!! Form::text('Status', null, ['class' => 'form-control', 'id' => 'Status', 'placeholder'=>'Status...']) !!}
            </div>
    {!! Form::close() !!}
    {{-- </div>
    <!-- /.box-body -->

</div>
<!-- /.box -->
@endsection
 --}}

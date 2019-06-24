@extends('app')

@section('content')

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Profil Pengunjung</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">


        {!! Form::model($model, [
            'route' => $model->exists ? ['daftartamu.update', $model->id] : 'daftartamu.store',
            'method' => $model->exists ? 'PUT' : 'POST'
        ]) !!}

{{-- {!! Form::hidden('_method',['value'=>'PUT'])!!} --}}
            <!-- text input -->
            <div class="form-group">
                <label>NIK Pengunjung</label>
        {!! Form::text('NIK', null, ['class' => 'form-control', 'id' => 'NIK', 'placeholder'=>'NIK ...'])!!}
            </div>

            <div class="form-group">
                <label>Nama Pengunjung</label>
            {!! Form::text('Nama', null, ['class' => 'form-control', 'id' => 'Nama', 'placeholder'=>'Nama ...']) !!}
            </div>

            <div class="form-group">
            <label>Tempat Lahir</label>
        {!! Form::text('TempatLahir', null, ['class' => 'form-control', 'id' => 'TempatLahir', 'placeholder'=>'TempatLahir ...']) !!}
    </div>

            <div class="form-group">
                <label>TglLahir</label>
                {!! Form::text('TglLahir', null, ['class' => 'form-control', 'id' => 'TglLahir', 'placeholder'=>'TglLahir ...']) !!}
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                {!! Form::text('JenisKelamin', null, ['class' => 'form-control', 'id' => 'JenisKelamin', 'placeholder'=>'JenisKelamin ...']) !!}
            </div>

            <div class="form-group">
                <label>Alamat</label>
                {!! Form::text('Alamat', null, ['class' => 'form-control', 'id' => 'Alamat', 'placeholder'=>'Alamat ...']) !!}
                <label>RT</label>
                {!! Form::text('RT', null, ['class' => 'form-control', 'id' => 'RT', 'placeholder'=>'JenisKelamin ...']) !!}
                <label>RW</label>
                {!! Form::text('RW', null, ['class' => 'form-control', 'id' => 'RW', 'placeholder'=>'JenisKelamin ...']) !!}
                <label>Kelurahan</label>
                {!! Form::text('Kelurahan', null, ['class' => 'form-control', 'id' => 'Kelurahan', 'placeholder'=>'Kelurahan ...']) !!}
                <label>Kecamatan</label>
                {!! Form::text('Kecamatan', null, ['class' => 'form-control', 'id' => 'Kecamatan', 'placeholder'=>'Kecamatan ...']) !!}
                <label>Kota</label>
                {!! Form::text('Kota', null, ['class' => 'form-control', 'id' => 'Kota', 'placeholder'=>'Kota ...']) !!}
                <label>Provinsi</label>
                {!! Form::text('Provinsi', null, ['class' => 'form-control', 'id' => 'Provinsi', 'placeholder'=>'Provinsi ...']) !!}
            </div>

            <div class="form-group">
                <label>AGAMA</label>
                {!! Form::text('Agama', null, ['class' => 'form-control', 'id' => 'Agama', 'placeholder'=>'Agama ...']) !!}
            </div>

            <div class="form-group">
                <label>status</label>
                {!! Form::text('status', null, ['class' => 'form-control', 'id' => 'status', 'placeholder'=>'status...']) !!}
            </div>

            <div class="form-group">
            </div>
            <label>Pekerjaan</label>
                {!! Form::text('Pekerjaan', null, ['class' => 'form-control', 'id' => 'Pekerjaan', 'placeholder'=>'Pekerjaan...']) !!}
            </div>
            <div class="form-group">
                <label>Kewarganegaraan</label>
                {!! Form::text('Kewarganegaraan', null, ['class' => 'form-control', 'id' => 'Kewarganegaraan', 'placeholder'=>'Kewarganegaraan...']) !!}
            </div>

    {!! Form::close() !!}
    </div>
    <!-- /.box-body -->

</div>
<!-- /.box -->
@endsection


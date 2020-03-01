@extends('app')

@section('content')

<h1>Tamu Graphs</h1>

<div style="charts">
    {!! $tamuChart->container() !!}
    <div id="container">
    </div>
</div>

 {{-- @foreach ( $dates as $date => $count )
    {{ $date }} is {{ $count }}
@endforeach --}}

        {!! $tamuChart->script() !!}

@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endpush



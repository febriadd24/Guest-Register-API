@extends('app')

@section('content')

<h1>Tamu Graphs</h1>
<div class="panel-body">
    <div id="search-form" class="row">
        <div class="form-group col-md-4">
        <label>Start Date <span class="text-danger"></span></label>
        <div class="controls">
            <input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose" placeholder="01/01/2018"> <div class="help-block"></div>
        </div>
        </div>
        <div class="form-group col-md-4">
        <label>End Date <span class="text-danger"></span></label>
        <div class="controls">
            <input type="date" name="end_date" id="end_date" class="form-control datepicker-autoclose" placeholder="01/01/2018"> <div class="help-block"></div>
        </div>
        </div>
        <div class="text-left" style="margin-top: 25px;">
            <button type="submit" id="btnFiterSubmitSearch" class="btn btn-info">Filter</button>
            </div>
    </div>
<div style="charts">
    {!! $tamuChart->container() !!}
    <div id="container">
    </div>
</div>

</div>
@endsection
@push('scripts')

<script>
    {!! $tamuChart->script() !!}

$('#search-form').on('submit', function(e) {
       {{$tamuChart->id }}_refresh(original_api_url);
    // var original_api_url = {{ $tamuChart->id }}_api_url;
    // {{ $tamuChart->id }}_refresh(original_api_url);
        e.preventDefault();
    });
</script>
{!! $tamuChart->script() !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

@endpush



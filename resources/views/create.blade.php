@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h1>Create Listing:<a href="/home" class="pull-right btn btn-default btn-xs">Go Back</a></h1></div>

            <div class="panel-body">
                {!! Form::open(['action' => 'ListingsController@store', 'method' => 'POST']) !!}
                    {{ Form::bsText('Name', '', ['placeholder' => 'Company Name']) }}
                    {{ Form::bsText('Email', '', ['placeholder'=> 'Company Email']) }}
                    {{ Form::bsText('Website', '', ['placeholder'=> 'Company Website']) }}
                    {{ Form::bsText('Address', '', ['placeholder'=> 'Company Address']) }}
                    {{ Form::bsText('Phone', '', ['placeholder'=> 'Company Phone']) }}
                    {{ Form::bsTextArea('Bio', '', ['placeholder'=> 'Bio']) }}
                    {{ Form::bsSubmit('Create', ['class' => 'btn btn-primary']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h1>Edit Listing: <a href="/home" class="pull-right btn btn-default btn-xs">Go Back</a></h1></div>

            <div class="panel-body">
                {!! Form::open(['action' => ['ListingsController@update', $listing->id ], 'method' => 'POST']) !!}
                    {{ Form::bsText('Name', $listing->name , ['placeholder' => 'Company Name']) }}
                    {{ Form::bsText('Email', $listing->email , ['placeholder'=> 'Company Email']) }}
                    {{ Form::bsText('Website', $listing->website , ['placeholder'=> 'Company Website']) }}
                    {{ Form::bsText('Address',  $listing->address, ['placeholder'=> 'Company Address']) }}
                    {{ Form::bsText('Phone',  $listing->phone , ['placeholder'=> 'Company Phone']) }}
                    {{ Form::bsTextArea('Bio', $listing->bio , ['placeholder'=> 'About this company']) }}
                    {{ Form::hidden('_method', 'PUT') }}
                    {{ Form::bsSubmit('Create', ['class' => 'btn btn-primary']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

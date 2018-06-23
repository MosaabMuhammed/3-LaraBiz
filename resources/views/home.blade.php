@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <h1 class="pull-left"> Your Listings:</h1> <span class="pull-right" style="margin-top: 33px"> <a href="/listings/create" class="btn btn-success btn-xs">Add Listing</a></span>
                <br>
                @if(count($listings))
                    <table class="table table-striped">
                        <tr>
                            <th>Company</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($listings as $listing)
                            <tr>
                                <td>{{ $listing->name }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

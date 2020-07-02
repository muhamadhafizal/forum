@extends('layouts.app')

@section('content')
<div class="row">       
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('flash_message') !!}</em></div>
                            @endif
                            @if(Session::has('flash_message_delete'))
	        	            <div class="alert alert-danger"><span class="fa fa-warning"></span><em> {!! session('flash_message_delete') !!}</em></div>
	        	            @endif
                        </div>
                        <div class="col-sm-2"></div>
                      
                </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach($allforum as $data)
        <tbody>
            <tr>
                <td>{{$i++}}</td>
                <td>{{$data->title}}</td>
                <td><a href="{{ action('ForumController@detail', $data->id) }}"><span class="badge badge-primary">view</span></a> | <a onclick="return confirm('Are you sure you want to delete?')" href="{{ action('ForumController@destroy', $data->id) }}"><span class="badge badge-danger">delete</span></a> </td>
            </tr>    
        </tbody>
        @endforeach
    </table>
        </div>
    </div>
</div>
@endsection
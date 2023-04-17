@extends('layouts.app')


@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">State</h1>
<p class="mb-4">List of states</p>

<!-- DataTales Example -->
<div class="card shadow border-left-primary mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">States</h6>
        <a class="btn btn-primary float-right" href="{{route('home')}}">Back</a>
        <a class="btn btn-primary" href="{{route('states.create')}}">Add +</a> &nbsp;
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($states as $state)
                    <tr>
                        <td>{{$state->name}}</td>
                        <td>{{$state->country->name}}</td>
                        <td>{{$state->status}}</td>
                        <td width="15%">
                            <div class="row">
                                <div class="col-md-6">
                                    <a class="btn btn-primary" href="{{route('states.edit',$state->id)}}">Edit</a>
                                </div>
                                <div class="col-md-6">
                                    <form method="POST" action="{{route('states.destroy',$state->id)}}">
                                    @csrf 
                                    @method('DELETE')    
                                    <button  onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};"type="submit" class="btn btn-danger" >Delete</button>
                                        </form>     
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="d-flex justify-content-end mr-5">
                {!! $states->links() !!}
            </div>
            
        </div>
    </div>
</div>


@endsection

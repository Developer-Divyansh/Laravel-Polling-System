@extends('layouts.app')
@section('content')

<div class="content-wrapper">

    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">My Details</h3>
                    </div>

                    <form action="{{ url('testimonialupdate') }}" method="post" id="formid"  data-parsley-validate>
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" @if(isset($data)) value="{{$data->name}}" @else value="" @endif id="name" name="name" placeholder="Enter Name" >
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="info">Information</label>
                            <textarea type="text" class="form-control" id="info" name="info" placeholder="Information" >@if(isset($data)) {{$data->info}} @else  @endif</textarea>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('info') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="file">Image Upload</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('file') }}</span>
                            @endif
                        </div>

                        <div>
                            <input type="hidden" @if(isset($data)) value="{{$data->id}}" @else value="" @endif name="id" id="id">
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-primary" href="{{ url('testcontrolview') }}">Back</a>
                        </div>                   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
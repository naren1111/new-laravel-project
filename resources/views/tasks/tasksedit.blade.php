@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Product</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('task.update', $tasks->id ) }}">
                        {{ csrf_field() }}
                        
                        
                       
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Product Name</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $tasks->title }}" >

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">description.</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control"  name="description" value="{{ $tasks->description }}"  >

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('categori_id') ? ' has-error' : '' }}">
                            <label for="categori_id" class="col-md-4 control-label">Categorie</label>

                            <div class="col-md-6">
                            
                            <select id="categori_id" name="categori_id" style="width: 345px;" class="form-control">
                                <option value="">--Select Categorie--</option>
                               
                                @foreach ($categories as $items)
                                
                                <option value=" {{ $items->id }} " {{ ($items->id == $tasks->categori_id) ? 'selected' : ''}} > {{ $items-> name }} </option>
                                
                                @endforeach
                                
                            </select>
                                
                                @if ($errors->has('categori_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('categori_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-4 control-label">image</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control"  name="image" >
                                <img src="{{ url('image').'/'.$tasks->image_url }}" width="120" height="120"  />
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                            
                        
                        <!--<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">Mobile.No.</label>

                            <div class="col-md-6">
                                <input id="mobile" type="mobile" class="form-control" name="mobile" max="10" min="10" >

                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>-->

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                     Update task
                                </button>
                                 <a href="{{ url('/tasks') }}"><input type="button" value="Back" class="btn btn-primary"/></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 

@endsection
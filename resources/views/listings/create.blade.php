@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Create listing</div>
        <div class="panel-body">
          <form action="{{ route('listings.store', [$area]) }}" method="post">
            {{ csrf_field() }}
            @include('listings.partials.forms._areas')
            @include('listings.partials.forms._categories')
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              <label for="title" class="control-label">Title</label>
              <input type="text" class="form-control" name="title" id="title">
              @if($errors->has('title'))
                <span class="help-block">
                  {{ $errors->first('title') }}
                </span>
              @endif
            </div> <!-- /.form-group -->

            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
              <label for="body" class="control-label">Body</label>
              <textarea name="body" id="body" cols="30" rows="8" class="form-control"></textarea>
              @if($errors->has('body'))
                <span class="help-block">
                  {{ $errors->first('body') }}
                </span>
              @endif
            </div> <!-- /.form-group -->

            <div class="form-group">
              <button type="submit" class="btn btn-default">Save</button>
            </div> <!-- /.form-group -->
          </form>
        </div> <!-- /.panel-body -->
      </div> <!-- /.panel -->
    </div> <!-- /.col-md-8 -->
  </div> <!-- /.row -->
@endsection

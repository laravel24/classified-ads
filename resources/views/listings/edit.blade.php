@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Continue editing listing
          @if($listing->live())
            <span class="pull-right">
              <a href="{{ route('listings.show', [$area, $listing]) }}">
                Go to listing
              </a>
            </span>
          @endif
        </div> <!-- /.panel-heading -->
        <div class="panel-body">
          <form action="{{ route('listings.update', [$area, $listing]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('patch') }}
            @include('listings.partials.forms._areas')
            @include('listings.partials.forms._categories')
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              <label for="title" class="control-label">Title</label>
              <input type="text" class="form-control" name="title" id="title" value="{{ $listing->title }}">
              @if($errors->has('title'))
                <span class="help-block">
                  {{ $errors->first('title') }}
                </span>
              @endif
            </div> <!-- /.form-group -->

            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
              <label for="body" class="control-label">Body</label>
              <textarea name="body" id="body" cols="30" rows="8" class="form-control">{{ $listing->body }}</textarea>
              @if($errors->has('body'))
                <span class="help-block">
                  {{ $errors->first('body') }}
                </span>
              @endif
            </div> <!-- /.form-group -->

            <div class="form-group clearfix">
              <button type="submit" class="btn btn-default">Save</button>
              @if(!$listing->live)
                <button type="submit" class="btn btn-primary pull-right" name="payment" value="true">Continue to payment</button>
              @endif
            </div> <!-- /.form-group -->

            @if($listing->live())
              <input type="hidden" name="category_id" value="{{ $listing->category_id }}">
            @endif
          </form>
        </div> <!-- /.panel-body -->
      </div> <!-- /.panel -->
    </div> <!-- /.col-md-8 -->
  </div> <!-- /.row -->
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @if(Auth::check())
      <div class="col-md-3">
        <div class="panel panel-default">
          <div class="panel-body">
            <nav class="nav nav-stacked">
              <li><a href="">Email to a friend</a></li>
              @if(!$listing->favouritedBy(Auth::user()))
                <li>
                  <a href="#" onclick="event.preventDefault(); document.getElementById('listings-favourite-form').submit();">Add to favorites</a>
                  <form action="{{ route('listings.favourites.store', [$area, $listing]) }}" method="post" id="listings-favourite-form" class="hidden">
                    {{ csrf_field() }}
                  </form>
                </li>
              @endif
            </nav>
          </div> <!-- /.panel-body -->
        </div> <!-- /.panel -->
      </div> <!-- /.col-md-3 -->
    @endif
    <div class="{{ Auth::check() ? 'col-md-9' : 'col-md-12' }}">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>{{ $listing->title }} <span class="text-muted">in {{ $listing->area->name }}</span></h4>
        </div> <!-- /.panel-heading -->
        <div class="panel-body">
          {!! nl2br($listing->body) !!}
        </div> <!-- /.panel-body -->
        <div class="panel-footer">
          Viewed x times
        </div> <!-- /.panel-footer -->
      </div> <!-- /.panel -->

      <div class="panel panel-default">
        <div class="panel-heading">
          Contact {{ $listing->user->name }}
        </div> <!-- /.panel-heading -->
        <div class="panel-body">
          @if(Auth::guest())
            Please <a href="/register">sign up</a> or <a href="/login">sign in</a> to contact listing owners.
          @else
            <form action="" method="post">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control"></textarea>
              </div> <!-- /.form-group -->

              <div class="form-group">
                <button type="submit" class="btn btn-default">Send</button>
              </div> <!-- /.form-group -->
              <span class="help-block">
                This will email {{ $listing->user->name }} and they will be able to reply directly to you via email
              </span>
            </form>
          @endif
        </div> <!-- /.panel-body -->
      </div> <!-- /.panel -->
    </div> <!-- /.col-md-9 -->
  </div> <!-- /.row -->
</div> <!-- /.container -->
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="row">
        @foreach($areas as $country)
          <div class="col-md-12">
            <h3>
              <a href="{{ route('user.area.store', $country) }}">
                {{ $country->name }}
              </a>
            </h3>
            <hr>
            <div class="row">
              @foreach($country->children as $state)
                <div class="col-md-4">
                  <h4>
                    <a href="{{ route('user.area.store', $state) }}">
                      {{ $state->name }}
                    </a>
                  </h4>
                  <hr>
                  @foreach($state->children as $city)
                    <h5>
                      <a href="{{ route('user.area.store', $city) }}">
                        {{ $city->name }}
                      </a>
                    </h5>
                  @endforeach
                </div> <!-- /.col-md-4 -->
              @endforeach
            </div> <!-- /.row -->
          </div> <!-- /.col-md-12 -->
        @endforeach
      </div> <!-- /.row -->
    </div> <!-- /.panel-body -->
  </div> <!-- /.panel -->
</div> <!-- /.container -->
@endsection

@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Pay for your listing</div> <!-- /.panel-heading -->
        <div class="panel-body">
          @if($listing->cost() == 0)
            <form action="" method="post">
              {{ csrf_field() }}
              {{ method_field('patch') }}
              <p>There is nothing for you to pay</p>
              <button type="submit" class="btn btn-primary">Complete</button>
            </form>
          @else
            <p>Total cost: ${{ number_format($listing->cost(), 2) }}</p>
            <payment-form></payment-form>
          @endif
        </div> <!-- /.panel-body -->
      </div> <!-- /.panel -->
    </div> <!-- /.col-md-8 -->
  </div> <!-- /.row -->
@endsection

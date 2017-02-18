@extends('layouts.app')

@section('content')
<div class="container">
  @if($listings->count())
    @foreach($listings as $listing)
      @include('listings.partials._listing_favourite', compact('listing'))
    @endforeach

    {{ $listings->links() }}
  @else
    <p>No favourite listings found</p>
  @endif
</div> <!-- /.container -->
@endsection

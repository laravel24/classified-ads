@extends('layouts.app')

@section('content')
@if($listings->count())
  @foreach($listings as $listing)
    @include('listings.partials._listing_favourite', compact('listing'))
  @endforeach

  {{ $listings->links() }}
@else
  <p>No favourite listings found</p>
@endif
@endsection

@extends('layouts.app')

@section('content')
  @if($listings->count())
    @each('listings.partials._listing_own', $listings, 'listing')

    {{ $listings->links() }}
  @else
    <p>No published listings found</p>
  @endif
@endsection

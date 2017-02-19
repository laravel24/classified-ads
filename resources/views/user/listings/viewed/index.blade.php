@extends('layouts.app')

@section('content')
  <p>Showing your last {{ $indexLimit }} viewed listings.</p>
  @if($listings->count())
    @each('listings.partials._listing', $listings, 'listing')
  @else
    <p>You have not viewed any listings.</p>
  @endif
@endsection

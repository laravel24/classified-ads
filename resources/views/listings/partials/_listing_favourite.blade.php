@component('listings.partials._base_listing', compact('listing'))
  @slot('links')
    <ul class="list-inline">
      <li>Added {{ $listing->pivot->created_at->diffForHumans() }}</li>
      <li><a href="#">Delete</a></li>
    </ul>
  @endslot
@endcomponent

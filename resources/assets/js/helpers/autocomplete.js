import autocomplete from 'autocomplete.js';
import algolia from 'algoliasearch';

var index = algolia('S6WIG81VJ3', '3338aae1cc60bdda7c1dbd3f54eaa2fe');

export const listingsautocomplete = (selector) => {
  var listings = index.initIndex('listings');
  return autocomplete(selector, {}, [
    {
      source: autocomplete.sources.hits(listings, { hitsPerPage: 5 }),
      templates: {
        suggestion (suggestion) {
          return '<span>' + suggestion.title + '</span>';
        }
      },
      displayKey: 'title',
      empty: '<div class="aa-empty">No listings found</div>'
    }
  ]);
};

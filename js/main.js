( function( $ ) {
  // init Isotope
  var $container = $('.portfolio-items').isotope();
  // filter items on button click
  $('.portfolio-filter').on( 'click', 'a', function() {
    $this = $(this);
    var filterValue = $this.attr('data-filter');
    $container.isotope({ filter: filterValue });
    $('.portfolio-filter a').removeClass('active');
    $this.addClass('active');
  });
} )( jQuery );

// init Isotope
var jQuerycontainer = jQuery('.portfolio-items').isotope();
// filter items on button click
jQuery('.portfolio-filter').on( 'click', 'a', function() {
  jQuerythis = jQuery(this);
  var filterValue = jQuerythis.attr('data-filter');
  jQuerycontainer.isotope({ filter: filterValue });
  jQuery('.portfolio-filter a').removeClass('active');
  jQuerythis.addClass('active');
});

// Image Modal
jQuery('.img-modal').click(function() {
  event.preventDefault();
  var imgurl = jQuery(this).find('img').attr('src');
  var jQuerymodal = jQuery('#img-modal');
  jQuerymodal.find('.modal-body img').attr('src', imgurl);
  jQuerymodal.modal('show');
});

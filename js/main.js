( function( $ ) {
  /*
   * ISOTOPE FILTER
  */
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

  /*
   * FORM VALIDATION
  */
  // Wait for the DOM to be ready
  $(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form.validation").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        cName: "required",
        cEmail: {
          required: true,
          // Specify that email should be validated
          // by the built-in "email" rule
          email: true
        },
        cMessage: {
          required: true,
          minlength: 5
        }
      },
      // Specify validation error messages
      messages: {
        cName: "Please enter your name",
        cEmail: "Please enter a valid email address",
        cMessage: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        }
      },
      errorClass: "is-invalid",
      validClass: "is-valid",
      errorPlacement: function(error, element) {
        error.appendTo( element.parent(".form-group").find(".invalid-feedback") );
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });
  });
} )( jQuery );

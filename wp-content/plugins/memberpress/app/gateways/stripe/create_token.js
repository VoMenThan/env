(function ($) {
  $(document).ready(function() {
    //Trigger a click on stripe checkout automatically
    var done = false; //Prevent double submit (for some reason)
    if(!done) {
      $("button.stripe-button-el").trigger("click");
      done = true;
    }

    // TODO: Before we launch this we need to make this part configurable using wp_localize_script or something
    var card_style = {
      base: {
        lineHeight: '30px',
        fontFamily: 'proxima-nova, sans-serif',
      }
    };

    var stripe = Stripe(MeprStripeGateway.public_key);
    var elements = stripe.elements();
    var card = elements.create('card', {style: card_style});
    card.mount('#card-element');
    card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });

    var paymentForm = $('#mepr-signup-form, #mepr-stripe-payment-form');
    paymentForm.on('submit', function(e) {
      e.preventDefault();
      if($('#mepr-payment-methods-wrapper').is(':hidden')) {
        paymentForm[0].submit();
        return false;
      }
      $(paymentForm).find('.mepr-submit').prop('disabled', true);
      $(paymentForm).find('.mepr-loading-gif').show();
      let paymentType = $(paymentForm).find('input[name="mepr_payment_method"]:checked').data('paymentMethodType');

      if(paymentType === 'Stripe' || paymentForm.attr('id') === 'mepr-stripe-payment-form') {
        // Returns the form fields in a pretty key/value hash
        var formData = $(paymentForm).serializeArray().reduce(function(obj, item) {
          obj[item.name] = item.value;
          return obj;
        }, {});
        var cardData = {
          name: formData['card-name']
        };
        // Merges in the address fields if required for taxes
        if(formData['address_required'] == 1) {
          $.extend(cardData, {
            address_line1:   formData['card-address-1'],
            address_line2:   formData['card-address-2'],
            address_city:    formData['card-city'],
            address_state:   formData['card-state'],
            address_zip:     formData['card-zip'],
            address_country: formData['card-country']
          });
        }

        stripe.createToken(card, cardData).then(function(result) {
          if (result.error) {
            console.log(result.error);
            // re-enable the submit button
            $(paymentForm).find('.mepr-submit').prop('disabled', false);
            $(paymentForm).find('.mepr-loading-gif').hide();
            $(paymentForm).find('.mepr-form-has-errors').show();
            // Inform the user if there was an error
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
          } else {
            if(!$(paymentForm).hasClass('mepr-payment-submitted')) {
              $(paymentForm).addClass('mepr-payment-submitted');
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', result.token.id);
              paymentForm.append(hiddenInput);
              paymentForm[0].submit();
            }
          }
        });
      }
      else {
        paymentForm[0].submit();
      }

      return false; // submit from callback
    });
  });
})(jQuery);

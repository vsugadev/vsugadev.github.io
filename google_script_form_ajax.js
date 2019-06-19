var $form = $('form#test-form'),
    url = 'https://script.google.com/macros/s/AKfycbwyRYA7PJ8PcwaraWnOrFTpodwdX2ODfUv4_mW2tv8RO6q_g4iu/exec'

$('#submit-form').on('click', function(e) {
  e.preventDefault();
  var jqxhr = $.ajax({
    url: url,
    method: "GET",
    dataType: "json",
    data: $form.serializeObject()
  }).success(
    // do something
  );
})
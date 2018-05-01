$(function() {

  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');

    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);

  // Get the form.
  var form = $('form');

  // Set up an event listener for the contact form.
  $(form).submit(function(e) {

    if (document.getElementById("user_form").checkValidity()) {

      // Which method to use
      var url = document.activeElement.getAttribute('url');
      var method = document.activeElement.getAttribute('method').toUpperCase();

        // Stop the browser from submitting the form.
        e.preventDefault();

        // Wrap up what we're sending
      var data = convertFormToJSON(form);
      data = JSON.stringify(data);


      var xhr = new XMLHttpRequest();
      xhr.open(method, url);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.send(data);
      xhr.onload = function (e) {
        if (xhr.readyState === 4) {
            window.location.replace(xhr.responseURL);
          }
      };
    }
  });

  /* Function takes a jquery form and converts it to a JSON dictionary */
  function convertFormToJSON(form){
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function() {
      json[this.name] = this.value || '';
    });

    return json;
  }

});

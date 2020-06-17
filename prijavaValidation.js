$(function() {
    $("form[name='prijava']").validate({
    wrapper: 'div',
    errorLabelContainer: "#messageBox",
      rules: {
        vozilo: {
            required:true,
            minlength: 2,
            maxlength: 60,
        },
        sbroj: {
            required:true,
        },
      },
      messages: {
        vozilo: {
            required: "Unos vozila je obavezan",
            minlength: "Unos vozila ne smije biti kraći od 2 znaka",
            maxlength: "Unos vozila ne smije biti duži od 60 znakova",
        },
        sbroj: {
            required: "Obavezno je odabrati startni broj",
        },
     },
      submitHandler: function(form) {
        form.submit();
      }
    });
  });
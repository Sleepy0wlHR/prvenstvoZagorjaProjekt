$(function() {
    $("form[name='reg']").validate({
    wrapper: 'div',
    errorLabelContainer: "#messageBox",
      rules: {
        ime: {
            required:true,
            minlength: 2,
            maxlength: 30,
        },
        prezime: {
            required:true,
            minlength: 2,
            maxlength: 30,
        },
        email: {
          required: true,
          email: true,
        },
        datumRod:{
            required: true,
        },
        spol: {
            required: true,
        },
        username: {
            required:true,
            minlength: 5,
            maxlength: 30,
        },
        password1: {
          required: true,
          minlength: 6,
        },
        password2:{
          required: true,
          equalTo: "#password1",
        }
      },
      messages: {
        ime: {
            required: "Ime je obavezno",
            minlength: "Ime ne smije biti kraće od 2 znaka",
            maxlength: "Ime ne smije biti duže od 30 znakova",
        },
        prezime: {
            required: "Prezime je obavezno",
            minlength: "Prezime ne smije biti kraće od 2 znaka",
            maxlength: "Prezime ne smije biti duže od 30 znakova",
        },
        email: {
          required: "Email je obavezan",
          email: "Email je neispravan",
        },
        datumRod:{
            required: "Obavezno je odabrati datum rođenja",
        },
        spol: {
            required: "Obavezno je odabrati spol",
        },
        username: {
            required: "Korisničko ime je obavezno",
            minlength: "Korisničko ime mora biti dugo barem 5 znakova",
            maxlength: "Korisničko ime ne smije biti duže od 30 znakova",
        },
        password1: {
            required: "Potrebno je upisati lozinku",
            minlength: "Lozinka ne smije biti kraća od 5 znakova",
          },
        password2: {
          required: "Potrebno je ponoviti lozinku",
          equalTo: "Lozinke trebaju biti iste",
        },
     },
      submitHandler: function(form) {
        form.submit();
      }
    });
  });

$(document).ready(function(){

  $('#main-form').submit(function(){

        $('.missing_alert').css('display', 'none');

        if ($('#main-form #email').val() === '') {
            $('#main-form #email_alert').text('Ingrese correo electrónico').show();
            $('#main-form #email').focus();
            return false;
        }

        if (! $('#main-form #email').val().match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/)) {
            $('#main-form #email').focus();
            $('#main-form #email_alert').text('Ingrese correo electrónico válido').show();
            return false;
        }

        if ($('#main-form #password').val() === '') {
            $('#main-form #password').focus();
            $('#main-form #password_alert').text('Ingrese contraseña').show();
            return false;
        }

        var data = $('#main-form').serialize();
        $('input').iCheck('disable');
        $('#main-form input, #main-form button').attr('disabled','true');
        $('#ajax-icon').removeClass('fa fa-sign-in').addClass('fa fa-spin fa-refresh');

        Pace.track(function () {
            $.ajax({
              url: $('#main-form #_url').val(),
    		      headers: {'X-CSRF-TOKEN': $('#main-form #_token').val()},
    		      type: 'POST',
              cache: false,
    	        data: data,
              success: function (response) {
                 if(response === 'authenticated.true'){
                   $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-sign-in');
                   toastr.success('Usuario logueado exitosamente');
                   $(location).attr('href', $('#main-form #_redirect').val());
                  }
              },error: function (data) {
                var errors = data.responseJSON;
                $.each( errors.errors, function( key, value ) {
                  toastr.error(value);
                  return false;
                });
                $('input').iCheck('enable');
                $('#main-form input, #main-form button').removeAttr('disabled');
                $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-sign-in');
            }
           });
        });

       return false;

    });
});

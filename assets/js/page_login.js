(function( $ ) {
    'use strict';

    $(document).ready(function(){
        $('#button-preview-recaptcha').click(function(){

            var site_key = $("#site_key");
            var secret_key = $("#secret_key");
            var theme = $("#theme").val();

            if (site_key.val() == '') {
                site_key.removeClass('uk-form-success').addClass('uk-form-danger');
                UIkit.notify("<i class='uk-icon-close'></i> Your reCaptcha <b>Site Key</b> cannot be empty...", {pos:'bottom-right', status:"warning"});
                return false;
            }

            if (secret_key.val() == '') {
                secret_key.removeClass('uk-form-success').addClass('uk-form-danger');
                UIkit.notify("<i class='uk-icon-close'></i> Your reCaptcha <b>Secret Key</b> cannot be empty...", {pos:'bottom-right', status:"warning"});
                return false;
            }

            site_key.removeClass('uk-form-danger').addClass('uk-form-success');
            secret_key.removeClass('uk-form-danger').addClass('uk-form-success');

            setTimeout(function(){
                site_key.removeClass('uk-form-success');
                secret_key.removeClass('uk-form-success');
            }, 2000);

            var captchaHtml = '<script src="https://www.google.com/recaptcha/api.js" async defer></script> ' +
                '<div id="recaptcha" class="g-recaptcha" data-sitekey="'+site_key.val()+'" data-theme="'+theme+'"></div>';

            $('.uk-captcha-container').html(captchaHtml);

            UIkit.notify("<i class='uk-icon-check'></i> Your reCaptcha is being displayed. If your Site and Secret keys are valid, you will see reCaptcha in the blue area of your screen.", {pos:'bottom-right', status:"success"});

        });

        // Handle Two Factor Auth
        // .. for start, show the QR code with default settings
        generateQRCode();



    });

    function generateQRCode() {
        var qrcode="otpauth://totp/WordPress:"+encodeURIComponent($('#auth_description').val())+"?secret="+$('#auth_secret_key').val()+"&issuer=WordPress";
        $('#qrcode').empty().qrcode(qrcode);
    }


})( jQuery );

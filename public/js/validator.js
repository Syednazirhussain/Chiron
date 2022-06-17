$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.validator.addMethod("strong_password", function (value, element) {
    let password = value;
    if (!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&])(.{8,20}$)/.test(password))) {
        return false;
    }
    return true;
}, function (value, element) {
    let password = $(element).val();
    if (!(/^(.{8,20}$)/.test(password))) {
        return 'Password must be between 8 to 20 characters long.';
    }
    else if (!(/^(?=.*[A-Z])/.test(password))) {
        return 'Password must contain at least one uppercase.';
    }
    else if (!(/^(?=.*[a-z])/.test(password))) {
        return 'Password must contain at least one lowercase.';
    }
    else if (!(/^(?=.*[0-9])/.test(password))) {
        return 'Password must contain at least one digit.';
    }
    else if (!(/^(?=.*[@#$%&])/.test(password))) {
        return "Password must contain special characters from @#$%&.";
    }
    return false;
});
if($('.stripe_trainee_payment').length){
    var card = new Card({
        // a selector or DOM element for the form where users will
        // be entering their information
        form: '.stripe_trainee_payment', // *required*
        // a selector or DOM element for the container
        // where you want the card to appear
        container: '.card-wrapper', // *required*

        formSelectors: {
            numberInput: 'input[name="card"]', // optional — default input[name="number"]
            expiryInput: 'input[name="exp_month"],input[name="exp_year"]', // optional — default input[name="expiry"]
            cvcInput: 'input[name="cvv"]', // optional — default input[name="cvc"]
            nameInput: 'input[name="card_name"]' // optional - defaults input[name="name"]
        },

        width: 200, // optional — default 350px
        formatting: true, // optional - default true

        // Strings for translation - optional
        messages: {
            validDate: 'valid\ndate', // optional - default 'valid\nthru'
            monthYear: 'mm/yy', // optional - default 'month/year'
        },

        // Default placeholders for rendered fields - optional
        placeholders: {
            number: '•••• •••• •••• ••••',
            name: 'Full Name',
            expiry: '••/••••',
            cvc: '•••'
        },

        masks: {
            cardNumber: '•' // optional - mask card number
        },

        // if true, will log helpful messages for setting up Card
        debug: false // optional - default false
    });
}



    $("#appointment4_reg").validate({
        errorClass: "error text-danger",
        validClass: "valid success-alert",
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: {
                    depends: function(elem) {
                        return true;
                    }
                },
            }
        },
        messages : {
            email: {
                email: "The email should be in the format: abc@domain.tld"
            },
            password: {
                required: "The password field is required"
            }
        },
        submitHandler: function(form) {

            return false;
            // form.submit();
        }
    });

$(function () {
    
    //Applies iCheck style to checkboxes
    $('input[type=checkbox]').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
});

$(document).on('click','div.alert .close', function(){
   $(this).parent().fadeOut('slow');
});

//Revalidate agree terms and conditions checkbox on registration page when checkbox input changed
$(document).on('ifChanged', '#form-register input[name=terms]', function () {
    $('#form-register').formValidation('revalidateField', 'terms');
});

//Add validation to login form
$('#form-login').formValidation({
    framework: 'bootstrap',
    container: 'tooltip',
    icon: {
        valid: 'glyphicon glyphicon-oks',
        invalid: 'glyphicon glyphicon-removes',
        validating: 'glyphicon glyphicon-refreshs'
    },
    fields: {
        'email': {
            row: '.form-group',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'Please enter Email'
                }
            }
        },
        'password': {
            row: '.form-group',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'Please enter Password'
                }
            }
        }
    }
}).on('success.form.fv', function (e) {
    $('.server-feedback').removeClass('has-error').removeClass('has-feedback');
    $('.server-feedback').find('small.help-block,i.glyphicon').remove();
}).on('err.form.fv', function (e) {
});


//Add validation to registration form
$('#form-register').formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'glyphicon glyphicon-oks',
        invalid: 'glyphicon glyphicon-removes',
        validating: 'glyphicon glyphicon-refreshs'
    },
    fields: {
        'first_name': {
            row: '.form-group',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'Please enter First Name'
                }
            }
        },
        'email': {
            row: '.form-group',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'Please enter Email'
                }
            }
        },
        password: {
            row: '.form-group',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'Please enter Password'
                }
            }
        },
        confirm_password: {
            row: '.form-group',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'Please enter Confirm Password'
                },
                identical: {
                    field: 'password',
                    message: 'Password and Confirm Password don\'t match'
                }
            }
        },
        'terms': {
            row: '.row',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'You must have to agree terms and conditions'
                }
            }
        }
    }
}).on('success.form.fv', function (e) {
    $('.server-feedback').removeClass('has-error').removeClass('has-feedback');
    $('.server-feedback').find('small.help-block,i.glyphicon').remove();
}).on('err.form.fv', function (e) {
});

//Add validation to reset password form
$('#form-reset-password').formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'glyphicon glyphicon-oks',
        invalid: 'glyphicon glyphicon-removes',
        validating: 'glyphicon glyphicon-refreshs'
    },
    fields: {
        password: {
            row: '.form-group',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'Please enter Password'
                }
            }
        },
        confirm_password: {
            row: '.form-group',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'Please enter Confirm Password'
                },
                identical: {
                    field: 'password',
                    message: 'Password and Confirm Password don\'t match'
                }
            }
        }
    }
}).on('success.form.fv', function (e) {
    $('.server-feedback').removeClass('has-error').removeClass('has-feedback');
    $('.server-feedback').find('small.help-block,i.glyphicon').remove();
}).on('err.form.fv', function (e) {
});

//Add validation to forgot password form
$('#form-forgot-password').formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'glyphicon glyphicon-oks',
        invalid: 'glyphicon glyphicon-removes',
        validating: 'glyphicon glyphicon-refreshs'
    },
    fields: {
        'email': {
            row: '.form-group',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'Please enter Email'
                }
            }
        }
    }
}).on('success.form.fv', function (e) {
    $('.server-feedback').removeClass('has-error').removeClass('has-feedback');
    $('.server-feedback').find('small.help-block,i.glyphicon').remove();
}).on('err.form.fv', function (e) {
});

//Add validation to update profile form
$('#form-user-profile').formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'glyphicon glyphicon-oks',
        invalid: 'glyphicon glyphicon-removes',
        validating: 'glyphicon glyphicon-refreshs'
    },
    fields: {
        'name': {
            row: '.col-sm-9',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'Please enter Full Name'
                }
            }
        }
    }
}).on('success.form.fv', function (e) {
    $('.server-feedback').removeClass('has-error').removeClass('has-feedback');
    $('.server-feedback').find('small.help-block,i.glyphicon').remove();
}).on('err.form.fv', function (e) {
});

//Add validation to registration form
$('#form-contact').formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'glyphicon glyphicon-oks',
        invalid: 'glyphicon glyphicon-removes',
        validating: 'glyphicon glyphicon-refreshs'
    },
    fields: {
        'subject': {
            row: '.form-group',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'Please enter Subject'
                },
                stringLength: {
                    max: 100,
                    message: 'Subject length should not exceed 100 characters'
                }
            }
        },
        'name': {
            row: '.form-group',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'Please enter First Name'
                }
            }
        },
        'email': {
            row: '.form-group',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'Please enter Email'
                }
            }
        },
        phone: {
            row: '.form-group',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'Please enter Phone'
                },
                digits: {
                    message: 'Please enter digits only'
                },
                stringLength: {
                    min: 10,
                    max: 10,
                    message: 'Phone number must be 10 digit number'
                }
            }
        },
        message: {
            row: '.form-group',
            verbose: false,
            validators: {
                notEmpty: {
                    message: 'Please enter Message'
                },
                stringLength: {
                    max: 160,
                    message: 'Message length should not exceed 160 characters'
                }
            }
        }
    }
}).on('success.form.fv', function (e) {
    $('.server-feedback').removeClass('has-error').removeClass('has-feedback');
    $('.server-feedback').find('small.help-block,i.glyphicon').remove();
}).on('err.form.fv', function (e) {
});
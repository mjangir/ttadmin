$(function () {

    //Applies iCheck style to checkboxs
    $('.icheck input[type=checkbox]').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });

    //Makes textarea wysihtml5 editor
    $("textarea.wysihtml5").wysihtml5();
});

$(document).on('click','div.alert .close', function(){
   $(this).parent().fadeOut('slow');
});

/**
 * Removes modal data on close
 */
$('body').on('hidden.bs.modal', '.modal', function () {
    $(this).removeData('bs.modal');
});

/**
 * Ajax form submit handler for listing pages
 */
$(document).on('click', 'form.listing-search [type=submit]', function () {
    var $form = $(this).parents('form');
    var bjaction = $(this).data('action');
    if (bjaction == 'reset-search') {
        $form.find('input[type="text"],input[type="checkbox"],input[type="date"],input[type="email"],select,textarea').val('');
    }
    $form.find('input[type="hidden"][name="bjaction"]').remove();
    $form.append('<input type="hidden" name="bjaction" value="' + bjaction + '"/>');
});

/**
 * Get links on change of link category dropdown list
 */
$(document).on('change', '.category-wise-link .link-category', function () {
    var $this = $(this);
    if ($(this).val() !== '') {
        $.getJSON(base_url + 'ajax/links?category=' + $(this).val(), function (response) {
            var options = '<option value="">Select Link</option>';
            $.each(response, function (value, key) {
                options = options + '<option value="' + value + '">' + key + '</option>';
            });
            $this.parents('.category-wise-link').find('.link').html(options);
        });
    }
});

//Validations for admin panel
$('body').on('shown.bs.modal', '.modal', function (e) {

    setTimeout(function () {

        //Validate Link Add and Update Form
        if ($('#form_link').length > 0) {
            $('#form_link').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-oks',
                    invalid: 'glyphicon glyphicon-removes',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    linkCategoryId: {
                        row: '.col-xs-6',
                        validators: {
                            notEmpty: {
                                message: 'Please select Link Category'
                            }
                        }
                    },
                    name: {
                        row: '.col-xs-6',
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Please enter Link Name'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9\s_-]+$/i,
                                message: 'Only alphanumeric,space,underscore and hyphen allowed'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'Link Name must be 2 to 40 characters long'
                            }
                        }
                    },
                    alias: {
                        row: '.col-xs-6',
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Please enter Alias Name'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_-]+$/i,
                                message: 'Only alphanumeric, underscore and hyphen allowed'
                            },
                            stringLength: {
                                min: 2,
                                max: 60,
                                message: 'Alias Name must be 2 to 60 characters long'
                            }
                        }
                    },
                    icon: {
                        row: '.col-xs-6',
                        verbose: false,
                        validators: {
                            regexp: {
                                regexp: /^[a-zA-Z0-9_-\s]+$/i,
                                message: 'Only alphanumeric, underscore and hyphen allowed'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'Icon must be 2 to 40 characters long'
                            }
                        },
                    },
                    href: {
                        row: '.col-xs-6',
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Please enter Hyperlink or #'
                            }
                        }
                    },
                    actions: {
                        row: '.col-xs-12',
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Actions cannot be empty. Use instead {"ALL":"All Rights"}'
                            },
                        },
                    }
                }
            }).on('success.form.fv', function (e) {
                $('.server-feedback').removeClass('has-error').removeClass('has-feedback');
                $('.server-feedback').find('small.help-block,i.glyphicon').remove();
                $(e.target).addClass('ajax');
                return false;
            }).on('err.form.fv', function (e) {
                $(e.target).removeClass('ajax');
            });
        }

        //Validate User Group Add and Update Form
        if ($('#form_usergroup').length > 0) {
            $('#form_usergroup').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-oks',
                    invalid: 'glyphicon glyphicon-removes',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    roleId: {
                        row: '.col-xs-6',
                        validators: {
                            notEmpty: {
                                message: 'Please select User Role'
                            }
                        }
                    },
                    groupName: {
                        row: '.col-xs-12',
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Please enter User Group Name'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9\s_-]+$/i,
                                message: 'Only alphanumeric,space,underscore and hyphen allowed'
                            },
                            stringLength: {
                                min: 2,
                                max: 50,
                                message: 'User Group Name must be 2 to 50 characters long'
                            }
                        }
                    },
                    alias: {
                        row: '.col-xs-6',
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Please enter Alias Name'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_-]+$/i,
                                message: 'Only alphanumeric, underscore and hyphen allowed'
                            },
                            stringLength: {
                                min: 2,
                                max: 60,
                                message: 'Alias Name must be 2 to 60 characters long'
                            }
                        }
                    }
                }
            }).on('success.form.fv', function (e) {
                $('.server-feedback').removeClass('has-error').removeClass('has-feedback');
                $('.server-feedback').find('small.help-block,i.glyphicon').remove();
                $(e.target).addClass('ajax');
                return false;
            }).on('err.form.fv', function (e) {
                $(e.target).removeClass('ajax');
            });
        }

        //Validate User Add and Update Form
        if ($('#form_user').length > 0) {
            $('#form_user').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-oks',
                    invalid: 'glyphicon glyphicon-removes',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    roleId: {
                        row: '.col-xs-6',
                        validators: {
                            notEmpty: {
                                message: 'Please select User Role'
                            }
                        }
                    },
                    userGroupId: {
                        row: '.col-xs-6',
                        validators: {
                            notEmpty: {
                                message: 'Please select User Group'
                            }
                        }
                    },
                    email: {
                        row: '.col-xs-6',
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Please enter Email'
                            },
                            emailAddress: {
                                message: 'Please enter a valid Email'
                            }
                        }
                    },
                    firstName: {
                        row: '.col-xs-6',
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Please enter First Name'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9\s_-]+$/i,
                                message: 'Only alphanumeric,space,underscore and hyphen allowed'
                            },
                            stringLength: {
                                min: 2,
                                max: 20,
                                message: 'First Name must be 2 to 20 characters long'
                            }
                        }
                    },
                    password: {
                        row: '.col-xs-6',
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Please enter Password'
                            }
                        }
                    },
                    confirmPassword: {
                        row: '.col-xs-6',
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
                $(e.target).addClass('ajax');
                return false;
            }).on('err.form.fv', function (e) {
                $(e.target).removeClass('ajax');
            });
        }

    }, 1000);
});

$(document).ready(function () {
    //Add Validations To Email Template Form
    $('#form_emailtemplate').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-oks',
            invalid: 'glyphicon glyphicon-removes',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            templateName: {
                row: '.col-xs-12',
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'Please enter Template Name'
                    }
                }
            },
            subject: {
                row: '.col-xs-12',
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'Please enter Subject'
                    }
                }
            },
            alias: {
                row: '.col-xs-12',
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'Please enter Alias Name'
                    }
                }
            }
        }
    }).on('success.form.fv', function (e) {
        $('.server-feedback').removeClass('has-error').removeClass('has-feedback');
        $('.server-feedback').find('small.help-block,i.glyphicon').remove();
        $(e.target).addClass('ajax');
        return false;
    }).on('err.form.fv', function (e) {
        $(e.target).removeClass('ajax');
    });

    //Add Validations To Page Form
    $('#form_page').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-oks',
            invalid: 'glyphicon glyphicon-removes',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                row: '.col-xs-12',
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'Please enter Page Name'
                    }
                }
            },
            title: {
                row: '.col-xs-12',
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'Please enter Page Title'
                    }
                }
            },
            alias: {
                row: '.col-xs-12',
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'Please enter Alias Name'
                    }
                }
            }
        }
    }).on('success.form.fv', function (e) {
        $('.server-feedback').removeClass('has-error').removeClass('has-feedback');
        $('.server-feedback').find('small.help-block,i.glyphicon').remove();
        $(e.target).addClass('ajax');
        return false;
    }).on('err.form.fv', function (e) {
        $(e.target).removeClass('ajax');
    });

});


//Menu Permissions Javascript
$(document).on('change', 'input.child-link-check-action', function () {
    $parentDiv = $(this).parents('div.child-link');
    var checkedLength = $parentDiv.find('input.child-link-check-action:checked').length;
    var allLength = $parentDiv.find('input.child-link-check-action').length;
    var status = (checkedLength == allLength) ? true : false;
    $parentDiv.find('input.child-link-check-all').prop({checked: status});
});

$(document).on('change', 'div.child-link input.child-link-check-all', function () {
    var status = this.checked;
    $parentDiv = $(this).parents('div.child-link');
    $parentDiv.find('input.child-link-check-action').prop({checked: status});
});

$(document).on('change', 'input.parent-link-check-all', function () {
    var status = this.checked;
    $superParent = $(this).parents('div.parent-link');
    $superParent.find('.child-links input[type="checkbox"]').prop({checked: status});
});

$(document).on('change', 'div.child-links input[type="checkbox"]', function () {
    var $superChildDiv = $(this).parents('div.child-links');
    var $superParentDiv = $superChildDiv.parents('div.parent-link');
    var checkedLength = $superChildDiv.find('input[type="checkbox"]:checked').length;
    var status = (checkedLength > 0) ? true : false;
    $superParentDiv.find('input.parent-link-check-all').prop({checked: status});
});
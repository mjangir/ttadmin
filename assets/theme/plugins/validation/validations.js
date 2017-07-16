$('body').on('shown.bs.modal', '.modal', function (e) {
    $('#form_upload_user').prop({disabled: true});
    setTimeout(function(){
    	$('#form_upload_user').prop({disabled: false});
    	//Validate Occupation Add and Update Form
        if ($('#form_occupation').length > 0) {
            $('#form_occupation').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ook',
                    invalid: 'glyphicon glyphicon-rremove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                	occupation: {
                        row: '.col-xs-6',
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Please enter Occupation'
                            },
                            stringLength: {
                                min: 2,
                                max: 255,
                                message: 'Occupation Name must be 2 to 255 characters long'
                            }
                        }
                    },
                    idcFirst: {
                        row: '.col-xs-4',
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Please enter First Code'
                            }
                        }
                    },
                    idcSecond: {
                        row: '.col-xs-4',
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Please enter Second Code'
                            }
                        }
                    },
                    file: {
                        row: '.col-xs-6',
                        validators: {
                            file: {
                                extension: 'xls,xlsx',
                                type: 'application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/pdf',
                                message: 'Please select a xls, xlsx or pdf file'
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
        
        
        
      //Validate Occupation Add and Update Form
        if ($('#form_interestarea').length > 0) {
            $('#form_interestarea').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                	interestArea: {
                        row: '.col-xs-6',
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Please enter Interest Area'
                            },
                            stringLength: {
                                min: 2,
                                max: 255,
                                message: 'Interest Area must be 2 to 255 characters long'
                            }
                        }
                    },
                    maxScore: {
                        row: '.col-xs-6',
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'Please enter Max Score'
                            },
                            stringLength: {
                                min: 1,
                                max: 3,
                                message: 'Max Score must be 1 to 3 digits long'
                            }
                        }
                    },
                    questionCategory: {
                        row: '.col-xs-12',
                        validators: {
                            notEmpty: {
                                message: 'Please select Question Category'
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
        
        
        
        //Validate Link Add and Update Form
	if($('#form_link').length > 0) {
            $('#form_link').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    linkCategory: {
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
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
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
    
    
  //Validate Question Add and Update Form
    if ($('#form_question').length > 0) {
        $('#form_question').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                title: {
                    row: '.col-xs-12',
                    validators: {
                        notEmpty: {
                            message: 'Please enter Question Title'
                        }
                    }
                },
                surveyId: {
                    row: '.col-xs-6',
                    verbose: false,
                    validators: {
                        notEmpty: {
                            message: 'Please select Survey'
                        }
                    }
                },
                categoryId: {
                    row: '.col-xs-3',
                    verbose: false,
                    validators: {
                        notEmpty: {
                            message: 'Please select Category'
                        }
                    }
                },
                'choices[]': {
                    row: '.col-xs-12',
                    verbose: false,
                    validators: {
                        notEmpty: {
                            message: 'Please choose atleast one choice'
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
    
  //Validate Survey Add and Update Form
    if ($('#form_survey').length > 0) {
        $('#form_survey').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
            	type: {
                    row: '.col-xs-3',
                    validators: {
                        notEmpty: {
                            message: 'Please select Survey Type'
                        }
                    }
                },
                forStudent: {
                    row: '.col-xs-3',
                    validators: {
                        notEmpty: {
                            message: 'Please select Student Type'
                        }
                    }
                },
                surveyName: {
                    row: '.col-xs-6',
                    verbose: false,
                    validators: {
                        notEmpty: {
                            message: 'Please enter User Survey Name'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9\s_-]+$/i,
                            message: 'Only alphanumeric,space,underscore and hyphen allowed'
                        },
                        stringLength: {
                            min: 2,
                            max: 50,
                            message: 'Survey Name must be 2 to 50 characters long'
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
    
    
  //Validate Change Password Form
    if ($('#form_changepassword').length > 0) {
        $('#form_changepassword').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                oldPassword: {
                    row: '.col-xs-12',
                    validators: {
                        notEmpty: {
                            message: 'Please enter Old Password'
                        }
                    }
                },
                newPassword: {
                    row: '.col-xs-12',
                    verbose: false,
                    validators: {
                        notEmpty: {
                            message: 'Please enter New Password'
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
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
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
        
        
        //Validate student excel upload path
        if($('#form_upload_user').length > 0) {
            $('#form_upload_user').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                	instituteId: {
                        row: '.col-xs-8',
                        validators: {
                            notEmpty: {
                                message: 'Please select Institute'
                            }
                        }
                    },
                    studentType: {
                        row: '.col-xs-4',
                        validators: {
                            notEmpty: {
                                message: 'Please select Student Type'
                            }
                        }
                    },
                    file: {
                        row: '.col-xs-12',
                        validators: {
                            notEmpty: {
                                message: 'Please select a file'
                            },
                            file: {
                                extension: 'xls,xlsx',
                                type: 'application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                                message: 'Please select a xls or xlsx file'
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
        
        
        //Validate provide survey popup form
        if($('#form_provide_survey').length > 0) {
            $('#form_provide_survey').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                	surveyId: {
                        row: '.col-xs-12',
                        validators: {
                            notEmpty: {
                                message: 'Please select a survey'
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

$(document).ready(function(){
	//Add Validations To Email Template Form
	function validateEditor() {
		// Revalidate the content field when its value is changed by Summernote
		$('#form_emailtemplate').formValidation('revalidateField', 'content');
	}
	$('#form_emailtemplate').formValidation({
	        framework: 'bootstrap',
	        icon: {
	                valid: 'glyphicon glyphicon-ok',
	                invalid: 'glyphicon glyphicon-remove',
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
	            },
	            content: {
	                validators: {
	                    callback: {
			            message: 'Please enter content',
			            callback: function(value, validator, $field) {
			                var code = $('[name="content"]').code();
			                // <p><br></p> is code generated by Summernote for empty content
			                return (code !== '' && code !== '<p><br></p>');
			            }
			        }
	                }
	            }
	        }
	}).find('[name="content"]').summernote({
			height: 200,
			onkeyup: function() {
			    validateEditor();
			},
			onpaste: function() {
			    validateEditor();
			}
	}).end().on('success.form.fv', function(e) {
	        $('.server-feedback').removeClass('has-error').removeClass('has-feedback');
	        $('.server-feedback').find('small.help-block,i.glyphicon').remove();
	        $(e.target).addClass('ajax');
	        return false;
	}).on('err.form.fv', function(e) {
	        $(e.target).removeClass('ajax');
	});



	//Add Validations To Profile Form
	$('#form_profile').formValidation({
	        framework: 'bootstrap',
	        icon: {
	                valid: 'glyphicon glyphicon-ok',
	                invalid: 'glyphicon glyphicon-remove',
	                validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	            firstName: {
	                row: '.col-xs-6',
	                verbose: false,
	                validators: {
	                    notEmpty: {
	                            message: 'Please enter First Name'
	                    }
	                }
	            },
	            email: {
	                row: '.col-xs-6',
	                verbose: false,
	                validators: {
	                    notEmpty: {
	                        message: 'Please enter Email ID'
	                    }
	                }
	            }
	        }
	}).on('success.form.fv', function(e) {
	        $('.server-feedback').removeClass('has-error').removeClass('has-feedback');
	        $('.server-feedback').find('small.help-block,i.glyphicon').remove();
	        $(e.target).addClass('ajax');
	        return false;
	}).on('err.form.fv', function(e) {
	        $(e.target).removeClass('ajax');
	});



	//Add Validations To Page Form
	function validateEditor() {
		// Revalidate the content field when its value is changed by Summernote
		$('#form_page').formValidation('revalidateField', 'content');
	}
	$('#form_page').formValidation({
	        framework: 'bootstrap',
	        icon: {
	                valid: 'glyphicon glyphicon-ok',
	                invalid: 'glyphicon glyphicon-remove',
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
	            },
	            content: {
	                validators: {
	                    callback: {
			            message: 'Please enter content',
			            callback: function(value, validator, $field) {
			                var code = $('[name="content"]').code();
			                // <p><br></p> is code generated by Summernote for empty content
			                return (code !== '' && code !== '<p><br></p>');
			            }
			        }
	                }
	            }
	        }
	}).find('[name="content"]').summernote({
			height: 200,
			onkeyup: function() {
			    validateEditor();
			},
			onpaste: function() {
			    validateEditor();
			}
	}).end().on('success.form.fv', function(e) {
	        $('.server-feedback').removeClass('has-error').removeClass('has-feedback');
	        $('.server-feedback').find('small.help-block,i.glyphicon').remove();
	        $(e.target).addClass('ajax');
	        return false;
	}).on('err.form.fv', function(e) {
	        $(e.target).removeClass('ajax');
	});


	//Add validation to institute form
	$('#form_institute').formValidation({
	    framework: 'bootstrap',
	    icon: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	    },
	    fields: {
	        instituteName: {
	            row: '.col-xs-4',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please enter Institute Name'
	                }
	            }
	        },
	        instituteCode: {
	            row: '.col-xs-4',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please enter Institute Code'
	                }
	            }
	        },
	        logo: {
                row: '.col-xs-4',
                validators: {
                    file: {
                        extension: 'jpeg,jpg,png,gif',
                        type: 'image/jpeg,image/gif,image/jpg,image/png',
                        message: 'Please select valid image (JPG, JPEG, PNG or GIF) file'
                    }
                }
            },
	        countryId: {
	            row: '.col-xs-4',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please select Country'
	                }
	            }
	        },
	        stateId: {
	            row: '.col-xs-4',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please select State'
	                }
	            }
	        },
	        cityId: {
	            row: '.col-xs-4',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please select City'
	                }
	            }
	        },
	        pincode: {
	            row: '.col-xs-4',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please enter Pin Code'
	                },
                        digits: {
                            message: 'Please enter digits only'
                        },
                        stringLength: {
                            min: 6,
                            max: 6,
                            message: 'Pin code must be 6 digit number'
                        }
	            }
	        },
	        contactNumber: {
	            row: '.col-xs-4',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please enter Contact Number'
	                }
	            }
	        },
	        contactEmail: {
	            row: '.col-xs-4',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please enter Contact Email'
	                },
	                emailAddress: {
	                    message: 'Please enter a valid Email'
	                }
	            }
	        },
	        email: {
	            row: '.col-xs-4',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please enter Login Email'
	                },
	                emailAddress: {
	                    message: 'Please enter a valid Email'
	                }
	            }
	        },
	        password: {
	            row: '.col-xs-4',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please enter Password'
	                }
	            }
	        },
	        confirmPassword: {
	            row: '.col-xs-4',
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
	}).on('success.form.fv', function(e) {
        $('.server-feedback').removeClass('has-error').removeClass('has-feedback');
        $('.server-feedback').find('small.help-block,i.glyphicon').remove();
        $(e.target).addClass('ajax');
        return false;
	}).on('err.form.fv', function(e) {
	    $(e.target).removeClass('ajax');
	});
	
	
	//Add validation to institute form
	$('#form_student').formValidation({
	    framework: 'bootstrap',
	    icon: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	    },
	    fields: {
	    	'user[firstName]': {
	            row: '.col-xs-3',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please enter Student First Name'
	                }
	            }
	        },
	        'user[lastName]': {
	            row: '.col-xs-3',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please enter Student Last Name'
	                }
	            }
	        },
                'user[email]': {
	            row: '.col-xs-3',
	            verbose: false,
	            validators: {
	                emailAddress: {
                        message: 'Please enter valid Email'
                	}
	            }
	        },
	        'user[gender]': {
	            row: '.col-xs-3',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please select Gender'
	                }
	            }
	        },
	        'user[birthDate]': {
	            row: '.col-xs-3',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please enter Birth Date'
	                }
	            }
	        },
                'user[phone]': {
	            row: '.col-xs-3',
	            verbose: false,
	            validators: {
                        digits: {
                            message: 'Please enter digits only'
                        },
                        stringLength: {
                            min: 10,
                            max: 10,
                            message: 'Pin code must be 10 digit number'
                        }
	            }
	        },
	        'student[class]': {
	            row: '.col-xs-3',
	            verbose: false,
	            validators: {
	                callback: {
                            message: 'Please enter Class',
                            callback: function(value, validator, $field) {
                                var studentType = $('#form_student').find('[name="student[studentType]"]').val();
                                return (studentType === 'JUNIOR' && value == '') ? false : true;
                            }
                        }
	            }
	        },
	        'student[rollNo]': {
	            row: '.col-xs-3',
	            verbose: false,
	            validators: {
	                callback: {
                            message: 'Please enter Roll No.',
                            callback: function(value, validator, $field) {
                                var studentType = $('#form_student').find('[name="student[studentType]"]').val();
                                return (studentType === 'JUNIOR' && value == '') ? false : true;
                            }
                        }
	            }
	        },
	        'student[country]': {
	            row: '.col-xs-3',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please select Country'
	                }
	            }
	        },
	        'student[pincode]': {
	            row: '.col-xs-3',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please enter Pin Code'
	                },
                        digits: {
                            message: 'Please enter digits only'
                        },
                        stringLength: {
                            min: 6,
                            max: 6,
                            message: 'Pin code must be 6 digit number'
                        }
	            }
	        },
	        'guardian[firstName]': {
	            row: '.col-xs-3',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please enter Guardian First Name'
	                }
	            }
	        },
	        'guardian[lastName]': {
	            row: '.col-xs-3',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please enter Guardian Last Name'
	                }
	            }
	        },
                'guardian[email]': {
	            row: '.col-xs-3',
	            verbose: false,
	            validators: {
	                emailAddress: {
                        message: 'Please enter valid Email'
                	}
	            }
	        },
	        'guardian[mobileNo]': {
	            row: '.col-xs-3',
	            verbose: false,
	            validators: {
	                notEmpty: {
	                        message: 'Please enter Guardian Phone'
	                },
                        digits: {
                            message: 'Please enter digits only'
                        },
                        stringLength: {
                            min: 10,
                            max: 10,
                            message: 'Pin code must be 10 digit number'
                        }
	            }
	        }
	    }
	}).on('change', '[name="student[studentType]"]', function(e) {
            $('#form_student').formValidation('revalidateField', 'student[class]');
            $('#form_student').formValidation('revalidateField', 'student[rollNo]');
        }).on('success.form.fv', function(e) {
        $('.server-feedback').removeClass('has-error').removeClass('has-feedback');
        $('.server-feedback').find('small.help-block,i.glyphicon').remove();
        $(e.target).addClass('ajax');
        return false;
	}).on('err.form.fv', function(e) {
	    $(e.target).removeClass('ajax');
	});
	
});
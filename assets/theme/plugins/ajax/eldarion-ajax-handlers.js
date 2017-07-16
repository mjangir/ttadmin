/* ====================================================================
 * eldarion-ajax-handlers.js v0.1.1
 * ====================================================================
 * Copyright (c) 2013, Eldarion, Inc.
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 * 
 *     * Redistributions of source code must retain the above copyright notice,
 *       this list of conditions and the following disclaimer.
 * 
 *     * Redistributions in binary form must reproduce the above copyright notice,
 *       this list of conditions and the following disclaimer in the documentation
 *       and/or other materials provided with the distribution.
 * 
 *     * Neither the name of Eldarion, Inc. nor the names of its contributors may
 *       be used to endorse or promote products derived from this software without
 *       specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 * ==================================================================== */

/*jshint forin:true, noarg:true, noempty:true, eqeqeq:true, bitwise:true,
  strict:true, undef:true, unused:true, curly:true, browser:true, jquery:true,
  indent:4, maxerr:50 */

function capitalize(string) {
    return string.replace(/^./, capitalize.call.bind("".toUpperCase));
}

(function (root, factory) {
	'use strict';

	if (typeof define === 'function' && define.amd) {
		define(['jquery'], factory);
	} else if (typeof exports === 'object') {
		factory(require('jquery'));
	} else {
		factory(root.jQuery);
	}
}(this, function ($) {
    'use strict';

    var Handlers = function () {};

    Handlers.prototype.validation	= function(e, $el, data) {
    	if(data.validation) {
    		var $form	= $(data.validation.form);
    		var errors  = data.validation.errors;
    		var $context= $el;
    		$form.find('input,select,textarea').not('[type="submit"],:radio,:checkbox').each(function(){
    			$(this).parent().removeClass('has-error').addClass('has-success').removeClass('server-feedback').addClass('has-feedback');
    			$(this).parent().append('<i class="form-control-feedback glyphicon glyphicon-ok"></i>')
    		});
    		$.each(errors,function(i,v){
    			var $field = $context.find('[name='+i+']');
    			var $parent = $field.parent();
    			if($field.attr('data-fv-field')) {
    				$parent.removeClass('has-success').addClass('has-error');
        			$parent.find('[data-fv-for="'+i+'"]').first().text(v).show();
        			$parent.find('.glyphicon').removeClass('glyphicon-ok').addClass('glyphicon-remove');
    			} else {
    				$parent.find('.help-block.server-error,.glyphicon').remove();
    				$parent.removeClass('has-success').addClass('has-error has-feedback server-feedback');
    				$parent.append('<i class="form-control-feedback glyphicon glyphicon-remove"></i><small class="help-block">'+v+'</small>')
    			}
    		});
    		$('input[type="submit"]').attr({disabled:false}).removeClass('disabled');
    	}
    }
    Handlers.prototype.currentModal = function(e, $el, data) {
    	if(data.currentmodal) {
    		if(data.currentmodal.hide === true) {
    			var hidetimeout = data.currentmodal.hideTimeOut || 0;
    			setTimeout(function(){
    				$('.modal').modal('hide');
    			},hidetimeout);
    		}
    	}
    }
    Handlers.prototype.notification = function(e, $el, data) {
        if (data.notification) {
        	var toastr_defaults = {
                	  "closeButton": true,
                	  "debug": false,
                	  "newestOnTop": false,
                	  "progressBar": false,
                	  "positionClass": "toast-top-right",
                	  "preventDuplicates": false,
                	  "onclick": null,
                	  "showDuration": "300",
                	  "hideDuration": "1000",
                	  "timeOut": "5000",
                	  "extendedTimeOut": "1000",
                	  "showEasing": "swing",
                	  "hideEasing": "linear",
                	  "showMethod": "fadeIn",
                	  "hideMethod": "fadeOut"
              }
        	$.each(data.notification,function(key, value) {
        		var type = value.type || 'alert';
        		var options = value.options || {};
        		if(type == 'toastr') {
            		var new_options = $.extend( {}, toastr_defaults, options );
            		toastr.options = new_options;
            		Command: toastr[value.status](value.message, capitalize(value.status))
            	} else if(type == 'alert') {
            		$(".alert").not('.alert-exclude').addClass('hide');
    				var $notifyTo = $(".alert-"+value.status);
    				$notifyTo.removeClass('hide').fadeIn('slow').find('span').html(value.message);
    				$('html, body').animate({scrollTop: $notifyTo.offset().top},'fast');
            	}
        	});
        }
    };
    Handlers.prototype.location = function(e, $el, data) {
    	var location = data.location || {};
        if (location.refresh) {
        	var refresh_timeout = location.refresh.timeout || 0;
            setTimeout(function(){
            	window.location.reload(true);
            }, refresh_timeout);
        }
        if (location.redirect) {
        	var redirect_timeout = location.redirect.timeout || 1000;
            setTimeout(function(){
            	window.location.href = location.redirect.url;
            }, redirect_timeout);
        }
    };
    Handlers.prototype.window = function(e, $el, data) {
    	if(data.window) {
    		var win = data.window;
    		if(win.openPopup) {
    			var ppoptions = win.openPopup.options || {};
    			var ppname	  = win.openPopup.name || 'Window';
    			var popup_defaults = {
                  	  "width"		: 500,
                  	  "height"		: 300,
                  	  "menubar"		: 0,
                  	  "toolbar"		: 0,
                  	  "location"	: 0,
                  	  "status"		: 0,
                  	  "scrollbars"	: 0,
                  	  "resizable"	: 0,
                  	  "top"			: 0,
                  	  "left"		: 0
                }
    			var new_ppoptions = $.extend( {}, popup_defaults, ppoptions);
    			var properties = new Array, prop_str = '';
    			$.each(new_ppoptions, function(k, v){
    				properties.push(k+'='+v);
    			});
    			prop_str = properties.join(',');
    			window.open(win.openPopup.url,ppname,prop_str);
    		}
    		if(win.openModal) {
    			var mdoptions = win.openModal.options || {};
    			var modal_target = win.openModal.target || 'body';
    			var modal_defaults = {
                  	  "backdrop"	: 'static',
                  	  "keyboard"	: true,
                  	  "show"		: true
                }
    			var new_moptions = $.extend( {}, modal_defaults, mdoptions);
    			$(modal_target).modal(new_moptions); 
    		}
    	}
    }
    Handlers.prototype.replace = function(e, $el, data) {
        $($el.data('replace')).replaceWith(data.html);
    };
    Handlers.prototype.replaceClosest = function(e, $el, data) {
        $el.closest($el.data('replace-closest')).replaceWith(data.html);
    };
    Handlers.prototype.replaceInner = function(e, $el, data) {
        $($el.data('replace-inner')).html(data.html);
    };
    Handlers.prototype.replaceClosestInner = function(e, $el, data) {
        $el.closest($el.data('replace-closest-inner')).html(data.html);
    };
    Handlers.prototype.append = function(e, $el, data) {
        $($el.data('append')).append(data.html);
    };
    Handlers.prototype.prepend = function(e, $el, data) {
        $($el.data('prepend')).prepend(data.html);
    };
    Handlers.prototype.refresh = function(e, $el) {
        $.each($($el.data('refresh')), function(index, value) {
            $.getJSON($(value).data('refresh-url'), function(data) {
                $(value).replaceWith(data.html);
            });
        });
    };
    Handlers.prototype.refreshClosest = function(e, $el) {
        $.each($($el.data('refresh-closest')), function(index, value) {
            $.getJSON($(value).data('refresh-url'), function(data) {
                $el.closest($(value)).replaceWith(data.html);
            });
        });
    };
    Handlers.prototype.clear = function(e, $el) {
        $($el.data('clear')).html('');
    };
    Handlers.prototype.remove = function(e, $el) {
        $($el.data('remove')).remove();
    };
    Handlers.prototype.clearClosest = function(e, $el) {
        $el.closest($el.data('clear-closest')).html('');
    };
    Handlers.prototype.removeClosest = function(e, $el) {
        $el.closest($el.data('remove-closest')).remove();
    };
    Handlers.prototype.fragments = function(e, $el, data) {
        if (data.fragments) {
            $.each(data.fragments, function (i, s) {
                $(i).replaceWith(s);
            });
        }
        if (data['inner-fragments']) {
            $.each(data['inner-fragments'], function(i, s) {
                $(i).html(s);
            });
        }
        if (data['append-fragments']) {
            $.each(data['append-fragments'], function(i, s) {
                $(i).append(s);
            });
        }
        if (data['prepend-fragments']) {
            $.each(data['prepend-fragments'], function(i, s) {
                $(i).prepend(s);
            });
        }
    };

    $(function () {
    	$(document).on('eldarion-ajax:success', Handlers.prototype.validation);
    	$(document).on('eldarion-ajax:success', Handlers.prototype.currentModal);
    	$(document).on('eldarion-ajax:success', Handlers.prototype.notification);
    	$(document).on('eldarion-ajax:success', Handlers.prototype.location);
    	$(document).on('eldarion-ajax:success', Handlers.prototype.window);
        $(document).on('eldarion-ajax:success', Handlers.prototype.fragments);
        $(document).on('eldarion-ajax:success', '[data-replace]', Handlers.prototype.replace);
        $(document).on('eldarion-ajax:success', '[data-replace-closest]', Handlers.prototype.replaceClosest);
        $(document).on('eldarion-ajax:success', '[data-replace-inner]', Handlers.prototype.replaceInner);
        $(document).on('eldarion-ajax:success', '[data-replace-closest-inner]', Handlers.prototype.replaceClosestInner);
        $(document).on('eldarion-ajax:success', '[data-append]', Handlers.prototype.append);
        $(document).on('eldarion-ajax:success', '[data-prepend]', Handlers.prototype.prepend);
        $(document).on('eldarion-ajax:success', '[data-refresh]', Handlers.prototype.refresh);
        $(document).on('eldarion-ajax:success', '[data-refresh-closest]', Handlers.prototype.refreshClosest);
        $(document).on('eldarion-ajax:success', '[data-clear]', Handlers.prototype.clear);
        $(document).on('eldarion-ajax:success', '[data-remove]', Handlers.prototype.remove);
        $(document).on('eldarion-ajax:success', '[data-clear-closest]', Handlers.prototype.clearClosest);
        $(document).on('eldarion-ajax:success', '[data-remove-closest]', Handlers.prototype.removeClosest);
    });
}));

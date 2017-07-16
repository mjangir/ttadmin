/* ====================================================================
 * eldarion-ajax-core.js v0.10.0
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

    $.xhrPool = [];
    
    $.xhrPool.abortAll = function() {
    	$.each(this, function(jqXHR){
    		console.log(jqXHR);
    		jqXHR.abort();
    	});
    }
    
    $.ajaxSetup({
    	beforeSend: function(jqXHR) {
    		$.xhrPool.push(jqXHR);
    	}
    });
    
    var Ajax = function () {};

    Ajax.prototype._ajax = function ($el, url, method, data) {
        $el.trigger('eldarion-ajax:begin', [$el]);
        var newData = $el.triggerHandler('eldarion-ajax:modify-data', data);
        if (newData) {
            data = newData;
        }
        
        //Modified by manish jangir. We are using jquery.form.min.js here because we need to 
        //upload files using ajax sometimes. We cannot use here $.ajax as it doesn't support ajax file upload
        var options = { 
                success: function(responseText, statusText, xhr, $form) {
                	switch (xhr.status) {
	                    case 200:
	                    	if (!responseText) {
	                    		responseText = {};
	                        }
	                        $el.trigger('eldarion-ajax:success', [$el, responseText]);
	                        break;
	                    case 500:
	                    	$el.trigger('eldarion-ajax:error', [$el, 500]);
	                        break;
	                    case 400:
	                    	$el.trigger('eldarion-ajax:error', [$el, 400]);
	                        break;
	                    case 403:
	                    	$el.trigger('eldarion-ajax:error', [$el, 403]);
	                        break;
	                    case 404:
	                    	$el.trigger('eldarion-ajax:error', [$el, 404]);
	                        break;
	                }
                },
                url: url, 
                type: method,
                dataType: 'json'
            }; 
         
        // bind form using 'ajaxForm' 
        $($el).ajaxSubmit(options); 
            
        /*$.ajax({
            url: url,
            type: method,
            dataType: 'json',
            data: data,
            headers: {'X-Eldarion-Ajax': true},
            statusCode: {
                200: function (responseData) {
                    if (!responseData) {
                        responseData = {};
                    }
                    $el.trigger('eldarion-ajax:success', [$el, responseData]);
                },
                500: function () {
                    $el.trigger('eldarion-ajax:error', [$el, 500]);
                },
                400: function () {
                    $el.trigger('eldarion-ajax:error', [$el, 400]);
                },
                403: function () {
                    $el.trigger('eldarion-ajax:error', [$el, 403]);
                },
                404: function () {
                    $el.trigger('eldarion-ajax:error', [$el, 404]);
                }
            },
            complete: function (jqXHR, textStatus) {
                $(document).trigger('eldarion-ajax:complete', [$el, jqXHR, textStatus]);
            }
        });*/
    };

    Ajax.prototype.click = function (e) {
        var $this = $(this),
            url = $this.attr('href'),
            method = $this.data('method'),
            data_str = $this.data('data'),
            data = null,
            keyval = null;

        if (!method) {
            method = 'get';
        }

        if (data_str) {
            data = {};
            data_str.split(',').map(
                function(pair) {
                    keyval = pair.split(':');
                    if (keyval[1].indexOf('#') === 0) {
                        data[keyval[0]] = $(keyval[1]).val();
                    } else {
                        data[keyval[0]] = keyval[1];
                    }
                }
            );
        }

        e.preventDefault();
        
        if($(this).hasClass('confirm')) {
        	var confirm_message = $(this).data('confirm-message') || 'Are you sure you want to perform this action?';
        	bootbox.dialog({
    		  message: confirm_message,
    		  title: "Alert!",
    		  className: "confirm-modal",
    		  buttons: {
    		    success: {
    		      label: "Proceed",
    		      className: "btn-success",
    		      callback: function() {
    		    	  Ajax.prototype._ajax($this, url, method, data);
    		      }
    		    },
    		    danger: {
    		      label: "Cancel",
    		      className: "btn-danger",
    		      callback: function() {
    		    	  bootbox.hideAll();
    		      }
    		    },
    		  }
    		});
        } else {
        	Ajax.prototype._ajax($this, url, method, data);
        }

    };

    Ajax.prototype.submit = function (e) {
        var $this = $(this),
            url = $this.attr('action'),
            method = $this.attr('method'),
            data = $this.serialize();

        e.preventDefault();
        
        if($(this).hasClass('confirm')) {
        	var confirm_message = $(this).data('confirm-message') || 'Are you sure you want to perform this action?';
        	bootbox.dialog({
    		  message: confirm_message,
    		  title: "Alert!",
    		  className: "confirm-modal",
    		  buttons: {
    		    success: {
    		      label: "Proceed",
    		      className: "btn-success btn-square",
    		      callback: function() {
    		    	  Ajax.prototype._ajax($this, url, method, data);
    		      }
    		    },
    		    danger: {
    		      label: "Cancel",
    		      className: "btn-danger btn-square",
    		      callback: function() {
    		    	  bootbox.hideAll();
    		      }
    		    },
    		  }
    		});
        } else {
        	Ajax.prototype._ajax($this, url, method, data);
        }
    };

    Ajax.prototype.cancel = function (e) {
        var $this = $(this),
            selector = $this.attr('data-cancel-closest');
        e.preventDefault();
        $this.closest(selector).remove();
    };

    Ajax.prototype.timeout = function (i, el) {
        var $el = $(el),
            timeout = $el.data('timeout'),
            url = $el.data('url'),
            method = $el.data('method');

        if (!method) {
            method = 'get';
        }

        window.setTimeout(Ajax.prototype._ajax, timeout, $el, url, method, null);
    };

    Ajax.prototype.interval = function (i, el) {
        var $el = $(el),
            interval = $el.data('interval'),
            url = $el.data('url'),
            method = $el.data('method');

        if (!method) {
            method = 'get';
        }

        window.setInterval(Ajax.prototype._ajax, interval, $el, url, method, null);
    };

    $(function () {
        $('body').on('click', 'a.ajax', Ajax.prototype.click);
        $('body').on('submit', 'form.ajax', Ajax.prototype.submit);
        $('body').on('click', 'a[data-cancel-closest]', Ajax.prototype.cancel);

        $('[data-timeout]').each(Ajax.prototype.timeout);
        $('[data-interval]').each(Ajax.prototype.interval);
    });
}));

define([
    'jquery',
    'jquery/ui'
], function($) {
    "use strict";
    $.widget('mage.testwidget', {
        options: {
           triggerEvent: 'click',
           AjaxUrl:'url',

        },
       _create: function() {
            console.log('3333'); // To check The Jquery is working or not when you run controller
            this._bind();
        },

         _bind: function() {
            var self = this;
            self.element.on(self.options.triggerEvent, function() {
                self._ajaxSubmit();
             });
         },
        _ajaxSubmit: function() {
            $.ajax({
                url: this.options.AjaxUrl,
                data: jQuery('#form_value').serialize(),
                type: 'post',
                showLoader: true,
                cache: false,
                dataType: 'json',

                success: function(res) {
                    console.log('ajax success');
                    console.log(res);
                }
            });
        }
    }); 
    return $.mage.testwidget;
}); 
 
 
 
 
 
 
 
 
 
 
/*  define([
    "jquery",
    "jquery/ui",
    "domReady"
], function($,dom){
    "use strict";
 
   return function (config) {
        var ajaxurl = config.AjaxUrl;  
        console.log(ajaxurl)
         jQuery(document).ready(function() {
            jQuery(".check").hide();
              jQuery("#form_value").submit(function(){
                  jQuery.ajax({
                  url: AjaxUrl,
                  type: "POST",
                  data: jQuery('#form_value').serialize(),
                  showLoader: true,
                  cache: false,
                  success: function(response){
                      console.log(response);
                      jQuery(".check").show();
                      jQuery("#form_value").hide();
                     
                  }
              });
              return false;
              });
            }) 
 
    };
    
});  */

/* 
 require(['jquery'],function(){
    jQuery(document).ready(function() {
      jQuery(".check").hide();
        jQuery("#form_value").submit(function(){
             //var AjaxUrl = config.AjaxUrl;
            jQuery.ajax({
            url: AjaxUrl,
            type: "POST",
            data: jQuery('#form_value').serialize(),
            showLoader: true,
            cache: false,
            success: function(response){
                console.log(response);
                jQuery(".check").show();
                jQuery("#form_value").hide();
               
            }
        });
        return false;
        });
    });
});  */
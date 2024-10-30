(function( $ ) {
    'use strict';

    /**
     * All of the code for your admin-specific JavaScript source
     * should reside in this file.
     *
     * Note that this assume you're going to use jQuery, so it prepares
     * the $ function reference to be used within the scope of this
     * function.
     *
     * From here, you're able to define handlers for when the DOM is
     * ready:
     *
     * $(function() {
	 *
	 * });
     *
     * Or when the window is loaded:
     *
     * $( window ).load(function() {
	 *
	 * });
     *
     * ...and so on.
     *
     * Remember that ideally, we should not attach any more than a single DOM-ready or window-load handler
     * for any particular page. Though other scripts in WordPress core, other plugins, and other themes may
     * be doing this, we should try to minimize doing that in our own work.
     */

    // Disable element
    $.fn.extend({
        disable: function (state) {
            return this.each(function () {
                var i = $(this).find('i');
                if (state == true) {
                    if (i.length > 0) {
                        i.attr('class-backup', i.attr('class'));
                        i.attr('class', 'fa fa-refresh fa-spin');
                    }
                } else {
                    if (i.length > 0) i.attr('class', i.attr('class-backup'));
                }
                this.disabled = state;
            });
        }
    });

    /**
     *  Global doc.ready function
     */
    $(document).ready(function(){
        // Actions
        actions.activateTrial();
        actions.activateLicense();

        // Settings Form
        $('.wpc-settings-form').submit(function(e){
            e.preventDefault();

            $.post(wpc_data.wp_post, $(this).serialize(), function(d){
                UIkit.notify(wpc_global.fficon('fa-check')+"Your settings have been saved.", {pos:'bottom-right', status:"success"});
            });
        });

        // Set the selected option of selects
        $('select').each(function(){
            var attr = $(this).attr('data-value');
            if (typeof attr !== typeof undefined && attr !== false && attr !== '') {
                $(this).val(attr);
            }
        });
    });

    var actions = {
        activateLicense: function() {
            $(document).on('submit', '.license-form', function(e){
                e.preventDefault();
                $.post(wpc_data.wp_post, $(this).serialize(), function(d){
                    if (d.hasOwnProperty('status')) {
                        if (d.status == 'success') {
                            UIkit.modal.alert(wpc_global.fficon('fa-smile-o')+d.message);
                            setTimeout(function(){
                                document.location.reload();
                            },5000);
                        } else {
                            UIkit.modal.alert(wpc_global.fficon('fa-frown-o')+d.message);
                        }
                    } else {
                        UIkit.modal.alert(wpc_global.fficon('fa-frown-o')+"Something went wrong. Please contact support.");
                    }
                });
            })
        },
        activateTrial: function(){
            $(document).on('click', '.activate-trial', function(){
                $.post(wpc_data.wp_post, 'action=wpc_activateTrial', function(d){
                    if (d.hasOwnProperty('status')) {
                        if (d.status == true) {
                            UIkit.modal.alert(wpc_global.fficon('fa-smile-o')+"Free Trial has been activated. Refreshing this page!");
                            document.location.reload();
                        } else {
                            UIkit.modal.alert(wpc_global.fficon('fa-frown-o')+'Could not activate a Free Trial. Maybe you previously had a free trial on this website?');
                        }
                    } else {
                        UIkit.modal.alert(wpc_global.fficon('fa-frown-o')+"Something went wrong. Please contact support.");
                    }
                });
            })
        }
    };


})( jQuery );

var wpc_global = {
    fficon: function(type){
        return '<i class="fa '+type+'"></i> ';
    },
    prettyDate: function(datetime){
        var d = new Date(datetime);
        return d.toDateString();
    }
};

(function( $ ) {
    'use strict';

    $(document).ready(function(){
        $('#RUN').click(function(){
            $.post(wpc_data.wp_post, [{name:'action',value:'wpc_run_antivirus'},{'name':'folders', value: ['/home/n-finity/public_html/']}], function(d){
                $('#OUTPUT').empty().html(d);
            });
        });
    });

})( jQuery );

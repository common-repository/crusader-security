(function( $ ) {
    'use strict';

    var loading = '<tr><td colspan="4"><i class="fa fa-refresh fa-spin"></i><br>Loading WordPress CronJobs</td></tr>';

    $(document).ready(function(){
        f.loadCronJobs();
        f.refreshCronTable();
        f.pingTool();
        f.deleteCronJob();

    });

    var f = {
        pingTool : function(){
            $(document).on('click', '#wpc_ping_tool', function(e){
                e.preventDefault();

                var button = $(this);
                var form = $('#ping_tool_form');

                if(button.hasClass('uk-button-success')){
                    button.removeClass().addClass('uk-button uk-active uk-button-danger').html('Turn OFF');
                    form.find('input[name="wpc[ping_tool]"]').val(1);
                    form.find('.uk-panel-badge').removeClass('uk-badge-danger').addClass('uk-badge-success').html('ON');
                    button.prop('disabled', true);
                }else{
                    button.removeClass().addClass('uk-button uk-button-success').html('Turn ON');
                    form.find('input[name="wpc[ping_tool]"]').val(0);
                    form.find('.uk-panel-badge').removeClass('uk-badge-success').addClass('uk-badge-danger').html('OFF');
                    button.prop('disabled', true);
                }

                console.log(form.serialize());
                $.post(wpc_data.wp_post, form.serialize(), function(d){
                    button.prop('disabled', false);
                    UIkit.notify("<i class='uk-icon-check'></i> Your ping tool settings are saved.", {pos:'bottom-right', status:"success"});
                });
            });
        },
        loadCronJobs : function(){
            var data = {
                action: 'wpc_get_cron_jobs'
            };

            $.post(wpc_data.wp_post, data, function(d){

                var cronJobs = d.data;

                var html = '';

                for(var i = 0; i < cronJobs.length; i++){
                    html+= '<tr>';
                    html+= '    <td>'+cronJobs[i]['name']+'</td>';
                    html+= '    <td>'+cronJobs[i]['type']+'</td>';
                    html+= '    <td>'+cronJobs[i]['time']+'</td>';
                    html+= '    <td><button class="uk-button uk-button-mini uk-button-danger btn-delete-cron" type="button" data-name="'+cronJobs[i]['name']+'"><i class="fa fa-trash"></i></button></td>';
                    html+= '</tr>';
                }

                $('#cronJobsTableBody').html(html);

            });
        },
        refreshCronTable: function(){
            $('.btn-refresh-cron-table').click(function(){
                $('#cronJobsTableBody').html(loading);
                f.loadCronJobs();
            });
        },
        deleteCronJob : function(){
            $(document).on('click', '.btn-delete-cron', function(){
                var cron_name = $(this).data('name');

                var data = {
                    action: 'wpc_delete_cron_job',
                    cron_name: cron_name
                };


                UIkit.modal.confirm
                (
                    '<div class="uk-text-center"><i class="fa fa-warning fa-4x uk-text-warning"></i><br>Are you sure you want to delete this cron?</div>',
                    function(){
                        $.post(wpc_data.wp_post, data, function(d){
                            f.loadCronJobs();
                            var status_icon = "<i class='uk-icon-check'></i> ";
                            if(d.status == 'WARNING'){
                                status_icon = "<i class='uk-icon-close'></i> ";
                            }
                            UIkit.notify(status_icon+d.message, {pos:'bottom-right', status: d.status.toLowerCase()});
                        });
                    },
                    {
                        labels:
                        {
                            'Ok': 'Yes Delete It!',
                            'Cancel': 'Cancel'
                        }
                    }
                );


            });
        }
    }


})( jQuery );

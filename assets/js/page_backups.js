(function( $ ) {
    'use strict';

    var history_loading = '<tr class="loading_history"><td class="uk-text-center" colspan="5"><i class="fa fa-refresh fa-spin fa-2x"></i> <br> Loading History Data</td></tr>';
    var last_id = 0;

    $(document).ready(function(){
        f.loadHistory();
        f.load_more();
        f.removeSelected();

        $('.backup-create').click(function(){
            var loading = $('.loading');
            var data = {
                action: 'wpc_create_backup'
            };

            loading.slideDown();

            $.post(wpc_data.wp_post, data, function(d){
                UIkit.notify("<i class='uk-icon-check'></i> Your backup has been created.", {pos:'bottom-right', status:"success"});
                loading.slideUp();
                f.loadHistory();
            });
        });

        $(document).on('click','.backup_remove',function(){
            var parent = $(this).parents('tr');
            var backup = $(this).attr('data-backup');

            var data = [{
                name: 'action',
                value: 'wpc_remove_backup'
            },{
                name: 'backup',
                value: backup
            }];

            UIkit.modal.confirm
            (
                '<div class="uk-text-center"><i class="fa fa-warning fa-4x uk-text-warning"></i><br>Are you sure? This will remove this backup permanently from your website.</div>',
                function(){

                    $.post(wpc_data.wp_post, data, function(d){
                        UIkit.notify(d.message, {pos:'bottom-right', status: d.status.toLowerCase()});
                        if (d.status == 'SUCCESS') {
                            parent.remove();
                        }
                    });
                }
            );
        });

        $(document).on('click','.backup_restore', function(e){
            e.preventDefault();

            var backup = $(this).attr('data-backup');
            var loading = $('.loading');

            UIkit.modal.confirm("Are you sure? This will restore the selected backup.", function(){

                loading.slideDown();

                UIkit.modal.confirm("Do you wish to restore the database as well? Please note that this can be a time consuming process and many things can go wrong. We recommend that you restore the backed up SQL file using PhpMyAdmin or other MySQL Client software offered on your web hosting.", function(){
                    var data = [{
                        name: 'action',
                        value: 'wpc_restore_backup'
                    },{
                        name: 'backup',
                        value: backup
                    },{
                        name: 'restoreMySQL',
                        value: true
                    }];
                    $.post(wpc_data.wp_post, data, function(d){
                        UIkit.notify(d.message, {pos:'bottom-right', status: d.status.toLowerCase()});
                        loading.slideUp();
                    });
                }, function() {
                    var data = [{
                        name: 'action',
                        value: 'wpc_restore_backup'
                    },{
                        name: 'backup',
                        value: backup
                    },{
                        name: 'restoreMySQL',
                        value: false
                    }];
                    $.post(wpc_data.wp_post, data, function(d){
                        UIkit.notify(d.message, {pos:'bottom-right', status: d.status.toLowerCase()});
                        loading.slideUp();
                    });
                });
            });
        });
    });


    var f = {
        loadHistory : function(offset){

            var tbody = $('#backup_history_table');
            //tbody.html(history_loading);

            var data = {};
            if(typeof (offset) != null){
                data = {
                    action: 'wpc_backup_load_history',
                    offset: offset
                };
            }else{
                tbody.html(history_loading);
                last_id = 0;
                data = {
                    action: 'wpc_backup_load_history'
                };
            }

            $.post(wpc_data.wp_post, data, function(d){
                var history_results = d.data;
                var load_more_button = false;

                $('.load_more').prop('disabled', false);
                $('.load_more').parents('tr').remove();
                $('.more_data').parents('tr').remove();
                $('.loading_history').remove();

                if(history_results.length < 1){
                    tbody.html('<tr><td colspan="4">'+ d.status +'</td></tr>');
                    return false;
                }

                var html = '';

                for(var i = 0; i < history_results.length; i++){
                    var obj = history_results[i];

                    html += '<tr>';
                    html += '   <td>';
                    html += '       <input class="" type="checkbox" value="'+obj['backupName']+'"/>&nbsp;|&nbsp;<button class="uk-button uk-button-mini uk-button-success backup_restore" data-backup="'+obj['backupName']+'"><i class="fa fa-cloud"></i> Restore</button>&nbsp;|&nbsp;' +
                        '           <button class="uk-button uk-button-mini uk-button-danger backup_remove" type="button" data-backup="'+obj['backupName']+'"><i class="fa fa-trash"></i> Remove</button>';
                    html += '   </td>';
                    html += '   <td>'+obj['backupDate']+'</td>';
                    html += '   <td>'+obj['backupSize']+' MB</td>';
                    html += '   <td><a target="_blank" href="'+obj['file']+'"><i class="fa fa-file-archive-o"></i> Files</a>&nbsp;|&nbsp;<a target="_blank" href="'+obj['mysql']+'"><i class="fa fa-database"></i> Database</a></td>';
                    html += '</tr>';

                    if(last_id < d.sizeof){
                        load_more_button = true;
                        last_id++;
                    }else{
                        load_more_button = false;
                    }
                }

                tbody.append(html);

                if(load_more_button){
                    tbody.append('<tr><td colspan="4" class="uk-text-center"><button class="uk-button uk-button-primary load_more" data-offset="'+last_id+'" type="button"><i class="fa fa-arrow-circle-down"></i> Load More History</button></td></tr>');
                }

            });

        },
        load_more: function() {
            $(document).on('click', '.load_more', function(){
                $(this).prop('disabled', true);
                f.loadHistory($(this).data('offset'));
            })
        },
        removeSelected: function(){
            $('.btn-remove-selected').click(function(){

                var checkBoxes = $('#backup_history_table').find('input[type="checkbox"]');

                var checked = [];

                UIkit.modal.confirm
                (
                    '<div class="uk-text-center"><i class="fa fa-warning fa-4x uk-text-warning"></i><br>Are you sure? This will remove selected backups permanently from your website.</div>',
                    function(){
                        checkBoxes.each(function(){
                            if(this.checked){
                                checked.push($(this).val());
                            }
                        });

                        if(checked.length < 1){
                            UIkit.notify("<i class='fa fa-exclamation-triangle'></i> Please select some backup in order to delete it.", {pos:'bottom-right', status:"warning"});
                            return false;
                        }

                        var data = [{
                            name: 'action',
                            value: 'wpc_remove_backup'
                        },{
                            name: 'backup',
                            value: checked
                        }];

                        $.post(wpc_data.wp_post, data, function(d){
                            UIkit.notify(d.message, {pos:'bottom-right', status: d.status.toLowerCase()});
                            if (d.status == 'SUCCESS') {
                                var tbody = $('#backup_history_table');
                                tbody.html(history_loading);

                                f.loadHistory();
                            }
                        });


                    }
                );



            });
        }
    }
})( jQuery );

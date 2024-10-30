(function( $ ) {
    'use strict';

    var history_loading = '<tr class="loading_history"><td class="uk-text-center" colspan="5"><i class="fa fa-refresh fa-spin fa-2x"></i> <br> Loading History Data</td></tr>';
    var button_icon = '';
    var last_id = 0;

    $(document).ready(function(){
        f.loadHistory();
        f.load_more();
        f.clear_history();
        f.formSubmit();
        f.startScan();
        f.viewChange();
        f.loadTagsInput();
    });


    var f = {
        loadTagsInput: function() {
            $('.tagsinput').tagsInput();
        },
        formSubmit : function(){
            $('#file_monitor_form').submit(function(e){
                e.preventDefault();

                var submitBtn = $(this).find('button[type="submit"]');

                if($('#cron_scan_schedule').val() == 'never'){
                    $('.file_monitor_cron_status').removeClass('uk-badge-success').addClass('uk-badge-warning').html('<i class="fa fa-stop"></i> Monitor is Deactivated');
                }else{
                    $('.file_monitor_cron_status').removeClass('uk-badge-warning').addClass('uk-badge-success').html('<i class="fa fa-play"></i> Monitor is Activated');
                }

                f.disableButton(submitBtn);

                $.post(wpc_data.wp_post, $(this).serialize(), function(d){
                    f.enableButton(submitBtn);
                    UIkit.notify("<i class='uk-icon-check'></i> Your settings have been saved.", {pos:'bottom-right', status:"success"});
                });
            });
        },
        startScan : function(){
            $('.start-scan').click(function(){
                $('#monitor_history_body').html('');
                last_id = 0;
                if($('#cron_scan_schedule').val() == 'never'){
                    $('.file_monitor_cron_status').removeClass('uk-badge-success').addClass('uk-badge-warning').html('<i class="fa fa-stop"></i> Monitor is Deactivated');
                }else{
                    $('.file_monitor_cron_status').removeClass('uk-badge-warning').addClass('uk-badge-success').html('<i class="fa fa-play"></i> Monitor is Activated');
                }

                var button = $(this);
                f.disableButton(button);
                $('#monitor_history_body').html(history_loading);
                var data = {
                    action: 'wpc_monitor_data'
                };

                $.post(wpc_data.wp_post, data, function(d){
                    f.enableButton(button);
                    f.loadHistory();
                    UIkit.notify("<i class='uk-icon-check'></i> Successfully performed manual file scan.", {pos:'bottom-right', status:"success"});
                });
            });
        },
        viewChange: function(){
            $(document).on('click', '.view-changes',function(e){
                e.preventDefault();
                $('.file_changes .all_file_changes').html('');

                var btn_id = $(this).data('id');
                var date_scanned = $(this).data('date');

                var data = {
                    action  : 'wpc_view_changes',
                    id      : btn_id
                };

                $.post(wpc_data.wp_post, data, function(d){

                    $('.file_changes').find('.overview_date').html(date_scanned);

                    for(var i = 0; i < d.data.length; i++){
                        var obj = d.data[i];

                        var template = $('#file_change_template.hide').clone().removeClass('hide');

                        template.find('.file_status').html(obj.file_status);
                        template.find('.filename_title').html('<i class="fa fa-file"></i> ' + obj.filename);

                        var html = '';
                        if(obj.file_status == 'Changed'){

                            var arrow = '';

                            html+= '<div class="uk-overflow-container">';
                            html+= '<table class="uk-table uk-table-striped">';
                            html+= '    <thead>';
                            html+= '        <tr>';
                            html+= '            <th style="width: 50%;">Old Values</th>';
                            html+= '            <th style="width: 50%;">New File Values</th>';
                            html+= '        </tr>';
                            html+= '    </thead>';
                            html+= '    <tbody>';

                            if(obj.md5 != null){
                                html+= '        <tr>';
                                html+= '            <td>md5 Hash - '+obj.md5_old+' <i class="fa fa-arrow-right pull-right"></i></td>';
                                html+= '            <td>md5 Hash - '+obj.md5+'</td>';
                                html+= '        </tr>';
                            }

                            if(obj.filesize != null){

                                if(parseInt(obj.filesize_old) > parseInt(obj.filesize)){
                                    arrow = ' <i class="fa fa-arrow-down uk-text-danger"></i>';
                                }else{
                                    arrow = ' <i class="fa fa-arrow-up uk-text-success"></i>';
                                }

                                html+= '        <tr>';
                                html+= '            <td>File Size - '+obj.filesize_old+' <i class="fa fa-arrow-right pull-right"></i></td>';
                                html+= '            <td>File Size - '+obj.filesize+ arrow+'</td>';
                                html+= '        </tr>';
                            }

                            if(obj.modified_date != null){
                                html+= '        <tr>';
                                html+= '            <td>Modification Date - '+obj.modified_date_old+' <i class="fa fa-arrow-right pull-right"></i></td>';
                                html+= '            <td>Modification Date - '+obj.modified_date+'</td>';
                                html+= '        </tr>';
                            }

                            if(obj.mime_type != null){
                                html+= '        <tr>';
                                html+= '            <td>File Mime Type - '+obj.mime_type_old+' <i class="fa fa-arrow-right pull-right"></i></td>';
                                html+= '            <td>File Mime Type - '+obj.mime_type+'</td>';
                                html+= '        </tr>';
                            }

                            if(obj.file_permission != null){
                                html+= '        <tr>';
                                html+= '            <td>File Permissions - '+obj.file_permission_old+' <i class="fa fa-arrow-right pull-right"></i></td>';
                                html+= '            <td>File Permissions - '+obj.file_permission+'</td>';
                                html+= '        </tr>';
                            }

                            html+= '    </tbody>';
                            html+= '</table>';
                            html+= '</div>';

                            template.find('.table_box').html(html);
                        }else{
                            html+= '<div class="uk-overflow-container">';
                            html+= '<table class="uk-table uk-table-striped">';
                            html+= '    <thead>';
                            html+= '        <tr>';
                            html+= '            <th style="width: 50%;">File Info</th>';
                            html+= '        </tr>';
                            html+= '    </thead>';
                            html+= '    <tbody>';

                            if(obj.md5_old != null){
                                html+= '        <tr>';
                                html+= '            <td>md5 Hash - '+obj.md5_old+'</td>';
                                html+= '        </tr>';
                            }

                            if(obj.filesize_old != null){

                                html+= '        <tr>';
                                html+= '            <td>File Size - '+obj.filesize_old+'</td>';
                                html+= '        </tr>';
                            }

                            if(obj.modified_date_old != null){
                                html+= '        <tr>';
                                html+= '            <td>Modification Date - '+obj.modified_date_old+'</td>';
                                html+= '        </tr>';
                            }

                            if(obj.mime_type_old != null){
                                html+= '        <tr>';
                                html+= '            <td>File Mime Type - '+obj.mime_type_old+'</td>';
                                html+= '        </tr>';
                            }

                            if(obj.file_permission_old != null){
                                html+= '        <tr>';
                                html+= '            <td>File Permissions - '+obj.file_permission_old+'</td>';
                                html+= '        </tr>';
                            }

                            html+= '    </tbody>';
                            html+= '</table>';
                            html+= '</div>';

                            template.find('.table_box').html(html);
                        }

                        if(obj.file_status == 'Removed'){
                            template.find('.file_status').addClass('uk-badge-danger');

                        }
                        if(obj.file_status == 'Added'){
                            template.find('.file_status').addClass('uk-badge-success');
                        }

                        $('.file_changes .all_file_changes').append(template);
                    }

                    UIkit.modal("#view_changes_modal").show();
                });

            });
        },
        disableButton : function(button){
            button_icon = button.find('i').attr('class');
            button.prop('disabled', true).find('i.fa').removeClass().addClass('fa fa-refresh fa-spin');
        },
        enableButton : function(button){
            button.prop('disabled', false).find('i.fa').removeClass().addClass(button_icon);
        },
        loadHistory : function(offset){
            $('.load_more').html('<i class="fa fa-refresh fa-spin"></i> Loading More');

            var data = {};
            if(typeof (offset) != null){
                data = {
                    action: 'wpc_monitor_load_history',
                    offset: offset
                };
            }else{
                $('#monitor_history_body').html(history_loading);
                last_id = 0;
                data = {
                    action: 'wpc_monitor_load_history'
                };
            }

            $.post(wpc_data.wp_post, data, function(d){
                var history_results = d.data;
                var load_more_button = false;
                $('.load_more').parents('tr').remove();
                $('.more_data').parents('tr').remove();
                $('.loading_history').remove();

                if(history_results.length < 1){
                    $('#monitor_history_body').html('<tr><td class="uk-text-center" colspan="5">No scan data, please start your file monitor</td></tr>');
                }else{
                    for(var i = 0; i < history_results.length; i++){
                        var html = '';
                        var row = history_results[i];

                        html+= '<tr>';

                        if(row.status == 'First Scan'){
                            html += '<td colspan="4" style="padding-top:12px;" class="uk-text-bold uk-text-success uk-text-center"><i class="fa fa-arrow-up"></i> Initial Scan - '+row.date_scanned+' <i class="fa fa-arrow-up"></i></td>';
                        }else{

                            var count = row.files_changed + row.files_added + row.files_added;
                            var disabled = '';
                            if(count == 0){
                                disabled = 'disabled';
                            }

                            html+='<td class="uk-text-center">'+row.id+'</td>';
                            html+='<td class="uk-text-center">'+row.date_scanned+'</td>';
                            html+='<td class="uk-text-center">';
                            if(count == 0){
                                html+='<span class="uk-text-success">No Changes Detected!</span>';
                            }else{
                                html+='<span class="uk-badge uk-badge-info" data-uk-tooltip title="Files Modified">'+row.files_changed+'</span>';
                                html+='<span class="uk-badge uk-badge-success" data-uk-tooltip title="Added Files">'+row.files_added+'</span>';
                                html+='<span class="uk-badge uk-badge-danger" data-uk-tooltip title="Deleted Files">'+row.files_deleted+'</span>';
                            }
                            html+='</td>';
                            html+='<td class="uk-text-center">';
                            html+='     <button class="uk-button uk-button-mini uk-button-primary view-changes" type="button" data-date="'+row.date_scanned+'" data-id="'+row.id+'" '+disabled+'><i class="fa fa-search"></i> View Changes</button>';
                            html+='</td>';
                        }
                        html += '</tr>';

                        if(row.id > 1){
                            load_more_button = true;
                            last_id++;
                        }else{
                            load_more_button = false;
                        }

                        $('#monitor_history_body').append(html);
                    }

                    if(load_more_button){
                        $('#monitor_history_body').append('<tr><td colspan="5" class="uk-text-center"><button class="uk-button uk-button-primary load_more" data-offset="'+last_id+'" type="button"><i class="fa fa-arrow-circle-down"></i> Load More History</button></td></tr>');
                    }
                }

            });
        },
        load_more: function() {
            $(document).on('click', '.load_more', function(){
                f.loadHistory($(this).data('offset'));
            })
        },
        clear_history: function(){
            $('.btn-clear-history').click(function(){
                var data = {
                    action: 'wpc_file_monitor_clear_history'
                };

                UIkit.modal.confirm
                (
                    '<div class="uk-text-center"><i class="fa fa-warning fa-4x uk-text-warning"></i><br>Are you sure you want to clear all history data. This includes all scans in the past?</div>',
                    function(){
                        $.post(wpc_data.wp_post, data, function(d){
                            f.loadHistory();
                            UIkit.notify("<i class='uk-icon-check'></i> "+d.message, {pos:'bottom-right', status:"success"});
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

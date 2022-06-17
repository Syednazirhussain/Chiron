@push('scripts')
    <script type="text/javascript">

        function acceptSession(type, id = 0, name = 0, row_id = 0) {

            let formData = new FormData();
            $('.action_button').text('Loading...').attr('disabled',true);
            if (type == 'accept') {
                let trainee_id = $('#accept_trainee_id').val();
                let accept_row_id = $('#accept_row_id').val();
                let type = $('#accept_type').val();
                formData.append('trainee_id', trainee_id);
                formData.append('accept_row_id', accept_row_id);
                formData.append('type', type);
            } else if (type == 'reject') {
                let trainee_id = $('#reject_trainee_id').val();
                let accept_row_id = $('#reject_row_id').val();
                let type = $('#reject_type').val();
                formData.append('trainee_id', trainee_id);
                formData.append('reject_row_id', accept_row_id);
                formData.append('type', type);
            } else if (type == 'cancel') {
                let trainee_id = $('#cancel_trainee_id').val();
                let accept_row_id = $('#cancel_row_id').val();
                let type = $('#cancel_type').val();
                formData.append('trainee_id', trainee_id);
                formData.append('cancel_row_id', accept_row_id);
                formData.append('type', type);
            } else if (type == 'completed') {
                formData.append('trainee_id', id);
                formData.append('completed_row_id', row_id);
                formData.append('type', type);
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{ route('trainerAcceptSession') }}',
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (response) {
                    if (response.code == 200) {
                        if (type == 'accept') {
                            console.log(response.data);
                            $("#traineeName").text(response.data.trainee);
                            $("#thanks").text(response.data.myName);
                            $(".acceptSessionRequestModal").addClass('modal-session-accepted');
                            $(".acceptSessionRequestModal").addClass('sessionAcceptedModal');
                            $('.beforeAccept').addClass('d-none');
                            $('.afterAccept').removeClass('d-none');
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        } else if (type == 'reject') {
                            $("#traineeName").text(response.data.trainee);
                            $("#thanks").text(response.data.myName);
                            $("#declineSessionRequestModal").addClass('modal-session-rejected');
                            $('.beforeAccept').addClass('d-none');
                            $('.afterAccept').removeClass('d-none');
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        } else if (type == 'cancel') {
                            window.location.reload();
                        } else if (type == 'completed') {
                            window.location.reload();
                        }
                    } else if (response.code == 400) {
                        $("#acceptSessionRequestModal").modal('hide');
                        $("#sessionAcceptedModal").modal('hide');
                        $("#declineSessionRequestModal").modal('hide');
                        $("#sessionRejectedModal").modal('hide');
                        let html = ''
                        html += '<div class="alert alert-danger alert-dismissable alert-sticky">'
                        html += '<div class="cont">'
                        html += '<ul>'
                        html += '<li>' + response.message + '</li>'
                        html += '</ul>'
                        html += '<div class="alert__icon"><span></span></div>'
                        html += '</div>'
                        html += '</div>'
                        $('#errors').html(html)
                    }
                }
            })
        }

        jQuery('.sessionaccept').click(function () {
            var id = $(this).attr('data-traineeidaccept');
            var name = $(this).attr('data-nameaccept');
            var row_id = $(this).attr('data-rowidaccept');
            $('#accept_trainee_id').val(id);
            $('#accept_row_id').val(row_id);
            jQuery("#accept0").text('Are you sure want to Accept ' + name + '`s session request?');
        });
        jQuery('.sessionreject').click(function () {
            var id = $(this).attr('data-traineeidreject');
            var name = $(this).attr('data-namereject');
            var row_id = $(this).attr('data-rowidreject');
            $('#reject_trainee_id').val(id);
            $('#reject_row_id').val(row_id);
            jQuery("#reject0").text('Are you sure want to decline ' + name + '`s session request?');
        });
        jQuery('.sessionCancel').click(function () {
            var id = $(this).attr('data-traineeidCancel');
            var name = $(this).attr('data-nameCancel');
            var row_id = $(this).attr('data-rowidCancel');
            $('#cancel_trainee_id').val(id);
            $('#cancel_row_id').val(row_id);
            jQuery("#cancel0").text('Are you sure want to Cancel ' + name + '`s session request?');
        });
        jQuery('.sessionCompleted').click(function () {
            var id = $(this).attr('data-traineeidCompleted');
            var name = $(this).attr('data-nameCompleted');
            var row_id = $(this).attr('data-rowidCompleted');
            let type = 'completed';
            acceptSession(type, id, name, row_id)
        });
        jQuery('.sessionRequest').click(function () {
            var date = $(this).attr('data-dateRequest');
            var location = $(this).attr('data-locationRequest');
            var time = $(this).attr('data-timeRequest');
            var name = $(this).attr('data-nameRequest');
            var image = $(this).attr('data-imageRequest');
            jQuery("#dateRequest").text(date);
            jQuery("#timeRequest").text(time);
            jQuery("#locationRequest").text(location);
            jQuery("#nameRequest").text(name);
            // jQuery("#imageRequest").text(image);
            jQuery('#imageRequest').attr("src", image);
        });
    </script>
@endpush

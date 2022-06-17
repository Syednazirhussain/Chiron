<div class="modal fade modal-custom-centered" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="cancelModalLabel">Cancel Appointment</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="cancelAppointmentModalBody">

      </div>
      <div class="modal-footer">  
          <button type="button" class="btn btn-success-o" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-success cancel-accept-btn">
            <div class="spinner-grow spinner-grow-sm cancel-spinner" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            Accept
        </button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {

        $('.cancel_appointment').on('click', function() {

            $(".cancel-spinner").hide()

            var object = $(this).data('object');

            let html = '<p>'
            if (object.status == "pending") {
                html += "Your session will be cancelled. Do you want to accept.?"
            } else if (object.status == "confirmed") {
                html += "Your session payment will be refunded to you after cancellation. Do you want to accept.?"
            }
            html += '</p>'
            $("#cancelAppointmentModalBody").html(html)
        });

        $(".cancel-accept-btn").on("click", function () {

            let url = $(".cancel_appointment").data('url')
            
            $.ajax({
                url: url,
                type: "GET",
                beforeSend: function () {
                    $(".cancel-spinner").show()
                },
            }).done(function (response) {

                let html = ""
                $(".cancel-spinner").hide()
                if (response.status == "success") {
                    html = '<div class="alert alert-success" role="alert">'+response.msg+'</div>';
                } else if (response.status == "fail") {
                    html = '<div class="alert alert-danger" role="alert">'+response.msg+'</div>';
                }

                $("#cancelAppointmentModalBody").prepend(html)

                setTimeout(() => {
                    
                    $("#cancelModal .close").click()
                    location.reload();
                }, 2000);

                
            }).catch(function (error) {
                console.log(error.response)
            })
        })

    })


</script>
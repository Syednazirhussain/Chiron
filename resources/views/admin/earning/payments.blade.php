<div class="modal modal-custom-centered modal-accept-session-request fade acceptSessionRequestModal" id="paymentModal">
    <div class="modal-dialog">
        <div class="modal-content beforeAccept">
            <div class="modal-body">
                <div class="wklyPay">
                    <button type="button" class="close acceptSessionRequestModalClose" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3>
                        <span class="colored weeklyAmount">
                            Pay Amount: $<span id="totalAmountModal">{{$amount ?? 0 }}
                        </span>  
                    </h3>
                
                    <div class="actions" style="text-align:center;">
                    
                        <button class="btn btn-success-o mr10" data-dismiss="modal" id="btnCancel">CANCEL</button>
                                         
                            <button class="btn btn-success wklyPaybtn" id="wklyPay"
                                data-trainer-id="{{ encryptData($id) }}"
                                >Pay $<span id="totalAmount2">{{$amount ?? 0 }}
                            </button>
                       
                    </div>
                </div>
            
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


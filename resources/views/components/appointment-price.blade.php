<div class="row radiobtn">
    @if (isset($trainer->getAddress))
        <?php $with_out_tax =true; ?>
        <?php $with_out_strip =true; ?>

        @if ($trainer->getAddress->training_session == '1 on 1')
            <div class="col-md-6">
                <input type="radio" class="one_on_one_radio" id="one_on_one" name="trainingPreference" value="1 on 1"
                    checked="checked">
                <label for="one_on_one">1 on 1</label>
                <input type="hidden" class="one_on_one"
                    value="{{ get_price_by_location($location_user, 'one_on_1_training_charge',$with_out_strip) }}">
                <span class="one_on_one_price">
                    <span>Rate: ${{ get_price_by_location($location_user, 'one_on_1_training_charge',$with_out_strip,$with_out_tax) }}</span>
                </span>
                <span class="one_on_one_price-msg">Plus {{config('constants.rates.sales_tax') }}% Applicable Sales Tax</span>
            </div>
        @endif
        @if ($trainer->getAddress->training_session == '2 on 1')
            <div class="col-md-6">
                <input type="radio" class="two_on_one_radio" id="two_on_one" name="trainingPreference" value="2 on 1">
                <label for="two_on_one">2 on 1</label>
                <input type="hidden" class="two_on_one"
                    value="{{ get_price_by_location($location_user, 'two_on_1_training_charge',$with_out_strip) }}">
                <span class="two_on_one_price">
                    <span>Rate: ${{ get_price_by_location($location_user, 'two_on_1_training_charge',$with_out_strip ,$with_out_tax) }}</span>
                </span>
                <span class="one_on_one_price-msg"> Plus {{config('constants.rates.sales_tax') }}% Applicable Sales Tax/span>

            </div>
        @endif
        @if ($trainer->getAddress->training_session == '1 on 1,2 on 1' || $trainer->getAddress->training_session == '2 on 1,1 on 1')
            <div class="col-md-6">
                <input type="radio" class="one_on_one_radio" id="one_on_one" name="trainingPreference" value="1 on 1"
                    checked="checked">
                <label for="one_on_one">1 on 1</label>
                <input type="hidden" class="one_on_one"
                    value="{{ get_price_by_location($location_user, 'one_on_1_training_charge',$with_out_strip) }}">
                <span class="one_on_one_price">
                    <span>Rate: ${{ get_price_by_location($location_user, 'one_on_1_training_charge',$with_out_strip,$with_out_tax) }}</span>
                </span>
            </div>
            <div class="col-md-6">
                <input type="radio" class="two_on_one_radio" id="two_on_one" name="trainingPreference" value="2 on 1">
                <label for="two_on_one" id>2 on 1</label>
                <input type="hidden" class="two_on_one"
                    value="{{ get_price_by_location($location_user, 'two_on_1_training_charge' ,$with_out_strip) }}">

                <span class="two_on_one_price">
                    <span>Rate: ${{ get_price_by_location($location_user, 'two_on_1_training_charge',$with_out_strip,$with_out_tax) }}</span>
                </span>
            </div>
            <span class="one_on_one_price-msg2">Plus {{config('constants.rates.sales_tax') }}% Applicable Sales Tax </span>
        @endif

    @endif

</div>

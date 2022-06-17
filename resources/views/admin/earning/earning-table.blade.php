
<div class="table table-responsive mb0">
            <table class="table table-earnings table__style mb0">

                <thead>
                    <tr>
                        <!-- <th>Trainer ID</th> -->
                        <th>Trainer Name</th>
                        <th>Total Sessions <br /> Conducted</th>
                        <th>Weekly Hourly <br /> Rate Earned</th>
                        <th></th>
                        {{-- <th>Admin Fees</th> --}}
                        <th>Sales Tax <br/> Earned</th>
                        <th>Billing <br/> Costs</th>
                        <th>Net Weekly <br/> Earnings</th>
                        <th>Remittance Paid</th>
                        <th>Pending Remittance</th>
                        <th>Completed Sessions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalsession_conducted = 0; $totalamount = 0; $totaltaxamount = 0; $total_admin_all_sessions_fees = 0;
                    $admin_all_sessions_fees = 0;  $totalstripecharges = 0; $totalnetWeeklyEarnings = 0; $total_tax = 0;$total_remaining = 0;
                    $total_paid = 0;
                    ?>
                    @forelse($data as $row)
                    <tr>
                        <?php $netWeeklyEarnings = 0; ?>
                        <!-- <td>{{$row->user_id ?? ''}}</td> -->
                        <td>
                            <div class="custom-flex">
                                <div class="user-img">
                                    @if($row->profile_image)
                                    <img src="{{ asset($storage.$row->profile_image) }}"
                                    alt="">
                                    @else
                                    <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                    @endif
                                </div>
                                <div class="user-name">
                                    {{$row->user_name ?? ''}}
                                </div>
                            </div>
                        </td>
                        <td>{{$row->session_conducted ?? ''}}</td>
                        <td>
                            ${{ $row->amount ?? '' }}
                            {{-- ${{ totalAmount($row->user_id)->totalAmount ?? 0}} --}}
                        </td>
                        <td>
                            <?php
                            $admin_all_sessions_fees = $row->adminFee * $row->session_conducted;
                            $total_admin_all_sessions_fees = $total_admin_all_sessions_fees + $row->TotalAdminFees;
                            ?>
                            {{-- ${{( number_format($row->TotalAdminFees,2) ?? '')}} --}}
                        </td>
                        <td>
                                <?php $tax = $row->tax_amount + $row->admin_tax; ?>
                                <?php $tax = $row->tax_amount; ?>
                            {{-- ${{ number_format($tax,2) ?? ''}} --}}
                            ${{ number_format($tax,2) ?? ''}}
                        </td>
                        <td>${{$row->stripe_charges-($row->stripe_charges-$row->pro_rate_billing) ?? ''}}</td>

                        <?php
                        // old 
                        // $netWeeklyEarnings = $row->amount + $row->TotalAdminFees + $row->stripe_charges + $row->pro_rate_billing
                       
                        //  new By Azam 
                        // $netWeeklyEarnings = ($row->amount + $row->TotalAdminFees + $tax) - $row->stripe_charges ?? '';
                        $netWeeklyEarnings = ($row->amount +$tax) - ($row->stripe_charges-($row->stripe_charges-$row->pro_rate_billing)) ?? '';
                        ?>
                           
                        <td>
                            ${{$netWeeklyEarnings ?? ''}}
                        </td>
                        <td>
                        <span class="status__confirm">

                            {{-- ${{ $_paid = $row->amount_paid ?? 0 }} --}}
                            ${{ $_paid = pAmount($row->user_id)->pAmount ?? 0}}
                        </span>

                        </td>
                        <td>
                            @php $_remaining = ($row->remaining_amount - $row->amount_paid ?? 0); @endphp



                            @if( !empty(pendingAmount($row->user_id)->rAmount ?? 0))

                                <button class="btn btn-success paymentModal" data-toggle="modal"  data-target="#paymentModal"

                                data-amount="{{ pendingAmount($row->user_id)->rAmount ?? 0  }}"
                                data-trainer-id="{{ encryptData($row->user_id) }}"

                                >
                                ${{ number_format( pendingAmount($row->user_id)->rAmount ?? 0,2)  }}
                                </button>
                            @else
                            <span class="status__confirm">${{ number_format(pendingAmount($row->user_id)->rAmount ?? 0,2)  }}</span>
                            @endif

                                <!-- <span class="status__confirm">
                            </span> -->
                            @if (0)
                                @if($_remaining > 0)
                                <button class="btn btn-info paymentModal" data-toggle="modal"  data-target="#paymentModal">
                                    $<span id="totalAmount">{{ $_remaining ? $_remaining : 0 }}</span>
                                </button>
                                @else
                                <button class="btn btn-info" disabled type="button">
                                    $<span id="totalAmount">0</span>
                                </button>
                                @endif
                            @endif
                        </td>
                        <td style="text-align:center">

                        <a href="{{ route('trainer_sessions',['id'=>$row->user_id]) }}" class="btn btn-primary" ><i class="fa fa-list"></i></a>
                        </td>

                        <?php
                        $totalsession_conducted = $totalsession_conducted + $row->session_conducted;
                        $totalamount = $totalamount + $row->amount;
                        $totaltaxamount = $totaltaxamount + $row->tax_amount;
                        $totalstripecharges = $totalstripecharges + ($row->stripe_charges-($row->stripe_charges-$row->pro_rate_billing));
                        $totalnetWeeklyEarnings = $totalnetWeeklyEarnings + $netWeeklyEarnings;
                        $total_tax = $total_tax + $tax;
                        $total_remaining += $_remaining;
                        // $total_paid += $row->_paid;
                        $total_paid += $_paid;
                        ?>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center" style="vertical-align : middle;">No Record Found</td>
                    </tr>
                    @endforelse
                </tbody>
                @if(count($data))
                <tfoot>
                    <tr>
                        <td colspan="1">
                            <span class="colored">{{$dates ?? ''}}</span>
                        </td>
                        <td>{{$totalsession_conducted ?? ''}}</td>
                        <td>${{$totalamount ?? ''}}</td>
                        <td> </td>
                        {{-- <td>${{$total_admin_all_sessions_fees ?? ''}} </td> --}}
                        <td>${{$total_tax ?? ''}}</td>
                        <td>${{$totalstripecharges ?? ''}}</td>
                        <td>${{$totalnetWeeklyEarnings ?? ''}}</td>
                        <td>${{ number_format($total_paid,2) }}</td>
                        <td>${{ number_format($row->pendingAmount,2) }}</td>
                        <td></td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>

        @push('scripts')

        <script>

        // var trainer_id12;
        // $('button').click(function() {
        //     let amount      = $(this).attr('data-amount');
        //     $('#totalAmountModal').text(amount);
        //     $('#totalAmount2').text(amount);
        //     trainer_id12 = $(this).attr('data-trainer-id');
        //     $('.wklyPaybtn').attr('data-trainer-id', trainer_id12);
        // })

        // $(document).ready(function () {
        //     //making weekly payment
        //     $(document).on('click', '#wklyPaysss', function(e) {
        //         e.preventDefault();
        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        //             }
        //         });

        //         let thiskey         =   $(this);
        //         let trainer_id      =   $(this).attr('data-trainer-id');

        //         $.ajax({
        //             type: 'POST',
        //             url: '{{ route('make_all_payments') }}',

        //             data:{'trainer_id':trainer_id},
        //             beforeSend: function(){
        //                 thiskey.attr('disabled',true);
        //                 // thiskey.text('processing...');
        //             },
        //             success: function (data) {
        //                 console.log(data);
        //                 if( data.code == 404) {
        //                     $("#btnCancel").trigger('click');
        //                     $('#message').addClass('alert alert-danger');
        //                 } else {
        //                     thiskey.text('Paid');
        //                     thiskey.attr('disabled',true);

        //                     $('.paymentModal').text('Paid');
        //                     $('.paymentModal').attr('disabled',true);

        //                     $("#btnCancel").trigger('click');
        //                     $('#message').addClass('alert alert-success');

        //                     setTimeout(function () {
        //                         window.location.reload()
        //                     }, 1000);
        //                 }
        //                 $('#message').text(data.message);

        //             },
        //             error: function (data) {
        //                 console.log(data.message);
        //                 window.location.reload()
        //             }
        //         });
        //     });
        // });

    </script>

        @endpush

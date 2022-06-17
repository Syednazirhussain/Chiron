<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentDetailRequest;
use App\Http\Requests\UpdatePaymentDetailRequest;
use App\Repositories\PaymentDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PaymentDetailController extends AppBaseController
{
    /** @var  PaymentDetailRepository */
    private $paymentDetailRepository;

    public function __construct(PaymentDetailRepository $paymentDetailRepo)
    {
        $this->paymentDetailRepository = $paymentDetailRepo;
    }

    /**
     * Display a listing of the PaymentDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $paymentDetails = $this->paymentDetailRepository->all();

        return view('payment_details.index')
            ->with('paymentDetails', $paymentDetails);
    }

    /**
     * Show the form for creating a new PaymentDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('payment_details.create');
    }

    /**
     * Store a newly created PaymentDetail in storage.
     *
     * @param CreatePaymentDetailRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentDetailRequest $request)
    {
        $input = $request->all();

        $paymentDetail = $this->paymentDetailRepository->create($input);

        Flash::success('Payment Detail saved successfully.');

        return redirect(route('paymentDetails.index'));
    }

    /**
     * Display the specified PaymentDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paymentDetail = $this->paymentDetailRepository->find($id);

        if (empty($paymentDetail)) {
            Flash::error('Payment Detail not found');

            return redirect(route('paymentDetails.index'));
        }

        return view('payment_details.show')->with('paymentDetail', $paymentDetail);
    }

    /**
     * Show the form for editing the specified PaymentDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paymentDetail = $this->paymentDetailRepository->find($id);

        if (empty($paymentDetail)) {
            Flash::error('Payment Detail not found');

            return redirect(route('paymentDetails.index'));
        }

        return view('payment_details.edit')->with('paymentDetail', $paymentDetail);
    }

    /**
     * Update the specified PaymentDetail in storage.
     *
     * @param int $id
     * @param UpdatePaymentDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentDetailRequest $request)
    {
        $paymentDetail = $this->paymentDetailRepository->find($id);

        if (empty($paymentDetail)) {
            Flash::error('Payment Detail not found');

            return redirect(route('paymentDetails.index'));
        }

        $paymentDetail = $this->paymentDetailRepository->update($request->all(), $id);

        Flash::success('Payment Detail updated successfully.');

        return redirect(route('paymentDetails.index'));
    }

    /**
     * Remove the specified PaymentDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paymentDetail = $this->paymentDetailRepository->find($id);

        if (empty($paymentDetail)) {
            Flash::error('Payment Detail not found');

            return redirect(route('paymentDetails.index'));
        }

        $this->paymentDetailRepository->delete($id);

        Flash::success('Payment Detail deleted successfully.');

        return redirect(route('paymentDetails.index'));
    }
}

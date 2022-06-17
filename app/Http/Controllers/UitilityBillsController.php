<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUitilityBillsRequest;
use App\Http\Requests\UpdateUitilityBillsRequest;
use App\Repositories\UitilityBillsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UitilityBillsController extends AppBaseController
{
    /** @var  UitilityBillsRepository */
    private $uitilityBillsRepository;

    public function __construct(UitilityBillsRepository $uitilityBillsRepo)
    {
        $this->uitilityBillsRepository = $uitilityBillsRepo;
    }

    /**
     * Display a listing of the UitilityBills.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $uitilityBills = $this->uitilityBillsRepository->all();

        return view('uitility_bills.index')
            ->with('uitilityBills', $uitilityBills);
    }

    /**
     * Show the form for creating a new UitilityBills.
     *
     * @return Response
     */
    public function create()
    {
        return view('uitility_bills.create');
    }

    /**
     * Store a newly created UitilityBills in storage.
     *
     * @param CreateUitilityBillsRequest $request
     *
     * @return Response
     */
    public function store(CreateUitilityBillsRequest $request)
    {
        $input = $request->all();

        $uitilityBills = $this->uitilityBillsRepository->create($input);

        Flash::success('Uitility Bills saved successfully.');

        return redirect(route('uitilityBills.index'));
    }

    /**
     * Display the specified UitilityBills.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $uitilityBills = $this->uitilityBillsRepository->find($id);

        if (empty($uitilityBills)) {
            Flash::error('Uitility Bills not found');

            return redirect(route('uitilityBills.index'));
        }

        return view('uitility_bills.show')->with('uitilityBills', $uitilityBills);
    }

    /**
     * Show the form for editing the specified UitilityBills.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $uitilityBills = $this->uitilityBillsRepository->find($id);

        if (empty($uitilityBills)) {
            Flash::error('Uitility Bills not found');

            return redirect(route('uitilityBills.index'));
        }

        return view('uitility_bills.edit')->with('uitilityBills', $uitilityBills);
    }

    /**
     * Update the specified UitilityBills in storage.
     *
     * @param int $id
     * @param UpdateUitilityBillsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUitilityBillsRequest $request)
    {
        $uitilityBills = $this->uitilityBillsRepository->find($id);

        if (empty($uitilityBills)) {
            Flash::error('Uitility Bills not found');

            return redirect(route('uitilityBills.index'));
        }

        $uitilityBills = $this->uitilityBillsRepository->update($request->all(), $id);

        Flash::success('Uitility Bills updated successfully.');

        return redirect(route('uitilityBills.index'));
    }

    /**
     * Remove the specified UitilityBills from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $uitilityBills = $this->uitilityBillsRepository->find($id);

        if (empty($uitilityBills)) {
            Flash::error('Uitility Bills not found');

            return redirect(route('uitilityBills.index'));
        }

        $this->uitilityBillsRepository->delete($id);

        Flash::success('Uitility Bills deleted successfully.');

        return redirect(route('uitilityBills.index'));
    }
}

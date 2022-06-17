<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBillTypeRequest;
use App\Http\Requests\UpdateBillTypeRequest;
use App\Repositories\BillTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BillTypeController extends AppBaseController
{
    /** @var  BillTypeRepository */
    private $billTypeRepository;

    public function __construct(BillTypeRepository $billTypeRepo)
    {
        $this->billTypeRepository = $billTypeRepo;
    }

    /**
     * Display a listing of the BillType.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $billTypes = $this->billTypeRepository->all();

        return view('bill_types.index')
            ->with('billTypes', $billTypes);
    }

    /**
     * Show the form for creating a new BillType.
     *
     * @return Response
     */
    public function create()
    {
        return view('bill_types.create');
    }

    /**
     * Store a newly created BillType in storage.
     *
     * @param CreateBillTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateBillTypeRequest $request)
    {
        $input = $request->all();

        $billType = $this->billTypeRepository->create($input);

        Flash::success('Bill Type saved successfully.');

        return redirect(route('billTypes.index'));
    }

    /**
     * Display the specified BillType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $billType = $this->billTypeRepository->find($id);

        if (empty($billType)) {
            Flash::error('Bill Type not found');

            return redirect(route('billTypes.index'));
        }

        return view('bill_types.show')->with('billType', $billType);
    }

    /**
     * Show the form for editing the specified BillType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $billType = $this->billTypeRepository->find($id);

        if (empty($billType)) {
            Flash::error('Bill Type not found');

            return redirect(route('billTypes.index'));
        }

        return view('bill_types.edit')->with('billType', $billType);
    }

    /**
     * Update the specified BillType in storage.
     *
     * @param int $id
     * @param UpdateBillTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBillTypeRequest $request)
    {
        $billType = $this->billTypeRepository->find($id);

        if (empty($billType)) {
            Flash::error('Bill Type not found');

            return redirect(route('billTypes.index'));
        }

        $billType = $this->billTypeRepository->update($request->all(), $id);

        Flash::success('Bill Type updated successfully.');

        return redirect(route('billTypes.index'));
    }

    /**
     * Remove the specified BillType from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $billType = $this->billTypeRepository->find($id);

        if (empty($billType)) {
            Flash::error('Bill Type not found');

            return redirect(route('billTypes.index'));
        }

        $this->billTypeRepository->delete($id);

        Flash::success('Bill Type deleted successfully.');

        return redirect(route('billTypes.index'));
    }
}

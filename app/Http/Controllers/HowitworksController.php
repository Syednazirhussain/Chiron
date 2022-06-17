<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHowitworksRequest;
use App\Http\Requests\UpdateHowitworksRequest;
use App\Repositories\HowitworksRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class HowitworksController extends AppBaseController
{
    /** @var HowitworksRepository $howitworksRepository */
    private $howitworksRepository;

    public function __construct(HowitworksRepository $howitworksRepo)
    {
        $this->howitworksRepository = $howitworksRepo;
    }

    /**
     * Display a listing of the Howitworks.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $howitworks = $this->howitworksRepository->all();

        return view('howitworks.index')
            ->with('howitworks', $howitworks);
    }

    /**
     * Show the form for creating a new Howitworks.
     *
     * @return Response
     */
    public function create()
    {
        return view('howitworks.create');
    }

    /**
     * Store a newly created Howitworks in storage.
     *
     * @param CreateHowitworksRequest $request
     *
     * @return Response
     */
    public function store(CreateHowitworksRequest $request)
    {
        $input = $request->all();
        if (isset($input['file'])) {
            $fileName = time() . '.' . $input['file']->extension();
            $request->file->move(public_path('uploads/web/howitworks'), $fileName);
        }
        $input['file'] = $fileName ?? '';
        $howitworks = $this->howitworksRepository->create($input);
        Flash::success('Howitworks saved successfully.');

        return redirect(route('howitworks.index'));
    }

    /**
     * Display the specified Howitworks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $howitworks = $this->howitworksRepository->find($id);

        if (empty($howitworks)) {
            Flash::error('Howitworks not found');

            return redirect(route('howitworks.index'));
        }

        return view('howitworks.show')->with('howitworks', $howitworks);
    }

    /**
     * Show the form for editing the specified Howitworks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $howitworks = $this->howitworksRepository->find($id);

        if (empty($howitworks)) {
            Flash::error('Howitworks not found');

            return redirect(route('howitworks.index'));
        }

        return view('howitworks.edit')->with('howitworks', $howitworks);
    }

    /**
     * Update the specified Howitworks in storage.
     *
     * @param int $id
     * @param UpdateHowitworksRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHowitworksRequest $request)
    {
        $howitworks = $this->howitworksRepository->find($id);
        $input = $request->all();
        if (empty($howitworks)) {
            Flash::error('Howitworks not found');

            return redirect(route('howitworks.index'));
        }
        if (isset($input['file'])) {
            $fileName = time() . '.' . $input['file']->extension();
            $request->file->move(public_path('uploads/web/howitworks'), $fileName);
            $input['file'] = $fileName ?? '';
        }
        $howitworks = $this->howitworksRepository->update($input, $id);

        Flash::success('Howitworks updated successfully.');

        return redirect(route('howitworks.index'));
    }

    /**
     * Remove the specified Howitworks from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $howitworks = $this->howitworksRepository->find($id);

        if (empty($howitworks)) {
            Flash::error('Howitworks not found');

            return redirect(route('howitworks.index'));
        }
        if (isset($howitworks)) {
            $file = $howitworks->file;
            $file_exists = file_exists('uploads/web/howitworks/' . $file);
            if ($file_exists == true) {
                unlink("uploads/web/howitworks/" . $file);
            }
        }
        $this->howitworksRepository->delete($id);

        Flash::success('Howitworks deleted successfully.');

        return redirect(route('howitworks.index'));
    }
}

<?php

namespace App\Http\Controllers;

use Flash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Promotion;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Mail\SendEmailMailable;
use Illuminate\Support\Facades\Mail;
use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Promotions_sendRepository;
use App\Http\Requests\CreatePromotions_sendRequest;
use App\Http\Requests\UpdatePromotions_sendRequest;

class Promotions_sendController extends AppBaseController
{
    /** @var Promotions_sendRepository $promotionsSendRepository */
    private $promotionsSendRepository, $user;

    public function __construct(Promotions_sendRepository $promotionsSendRepo, UsersRepository $user)
    {
        $this->promotionsSendRepository = $promotionsSendRepo;
        $this->user = $user;
    }

    /**
     * Display a listing of the Promotions_send.
     *
     * @param Request $request
     *
     * @return Response
     */

    public function userforemail(Request $request) {

        $promotion_id = $request->route('id');
        $userLists = $this->user->getUserWithRole();
        return response()->json([
            view('components.all-users', ['userLists' => $userLists, 'promotion_id' => $promotion_id])->render()
        ]);
    }

    public function sendemail(Request $request) {

        $trainer = $request->input('trainer');
        $trainee = $request->input('trainee');

        $promotion_id = $request->input('promotion_id');

        if ($trainee == null && $trainer == null) {
            return redirect()->back()->with('error', 'Select Atleast One User!');
        }

        $singleArray = [];
            
        if (is_array($trainer)) {
            foreach ($trainer as $a) {
                array_push($singleArray, $a);
            }
        }

        if (is_array($trainee)) {
            foreach ($trainee as $a) {
                array_push($singleArray, $a);
            }
        }

        if (empty($singleArray)) {
            return redirect()->back()->with('error', 'Select Atleast One User!');
        }

        $promotion = Promotion::where('id', $promotion_id)->first();
        $emails = User::whereIn('id', $singleArray)->pluck('email');

        if (!empty($emails) && !empty($promotion)) {

            // dispatch(new SendEmailJob($emails, $promotion))->delay(Carbon::now()->addSeconds(10));
            dispatch(new SendEmailJob($emails, $promotion));
        }

        return redirect()->back()->with('success', 'Emails Send Shortly!');
    }

    public function index(Request $request) {

        $promotionsSends = $this->promotionsSendRepository->all();
        return view('promotions_sends.index')->with('promotionsSends', $promotionsSends);
    }

    /**
     * Show the form for creating a new Promotions_send.
     *
     * @return Response
     */
    public function create()
    {
        return view('promotions_sends.create');
    }

    /**
     * Store a newly created Promotions_send in storage.
     *
     * @param CreatePromotions_sendRequest $request
     *
     * @return Response
     */
    public
    function store(CreatePromotions_sendRequest $request)
    {
        $input = $request->all();

        $promotionsSend = $this->promotionsSendRepository->create($input);

        Flash::success('Promotions Send saved successfully.');

        return redirect(route('promotionsSends.index'));
    }

    /**
     * Display the specified Promotions_send.
     *
     * @param int $id
     *
     * @return Response
     */
    public
    function show($id)
    {
        $promotionsSend = $this->promotionsSendRepository->find($id);

        if (empty($promotionsSend)) {
            Flash::error('Promotions Send not found');

            return redirect(route('promotionsSends.index'));
        }

        return view('promotions_sends.show')->with('promotionsSend', $promotionsSend);
    }

    /**
     * Show the form for editing the specified Promotions_send.
     *
     * @param int $id
     *
     * @return Response
     */
    public
    function edit($id)
    {
        $promotionsSend = $this->promotionsSendRepository->find($id);

        if (empty($promotionsSend)) {
            Flash::error('Promotions Send not found');

            return redirect(route('promotionsSends.index'));
        }

        return view('promotions_sends.edit')->with('promotionsSend', $promotionsSend);
    }

    /**
     * Update the specified Promotions_send in storage.
     *
     * @param int $id
     * @param UpdatePromotions_sendRequest $request
     *
     * @return Response
     */
    public
    function update($id, UpdatePromotions_sendRequest $request)
    {
        $promotionsSend = $this->promotionsSendRepository->find($id);

        if (empty($promotionsSend)) {
            Flash::error('Promotions Send not found');

            return redirect(route('promotionsSends.index'));
        }

        $promotionsSend = $this->promotionsSendRepository->update($request->all(), $id);

        Flash::success('Promotions Send updated successfully.');

        return redirect(route('promotionsSends.index'));
    }

    /**
     * Remove the specified Promotions_send from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public
    function destroy($id)
    {
        $promotionsSend = $this->promotionsSendRepository->find($id);

        if (empty($promotionsSend)) {
            Flash::error('Promotions Send not found');

            return redirect(route('promotionsSends.index'));
        }

        $this->promotionsSendRepository->delete($id);

        Flash::success('Promotions Send deleted successfully.');

        return redirect(route('promotionsSends.index'));
    }
}

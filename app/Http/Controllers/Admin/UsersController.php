<?php

namespace App\Http\Controllers\Admin;

use Flash;
use Response;
use App\Models\User;
use App\Models\Rates;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UsersRepository;
use App\Repositories\TrainerRepository;
use App\Repositories\SessionsRepository;
use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UpdateUsersRequest;

class UsersController extends Controller
{
    /** @var  UsersRepository */
    private $usersRepository;
    protected $sessionsRepository;
    protected $trainerRepository;

    public function __construct(UsersRepository $usersRepo, SessionsRepository $sessionsRepo, TrainerRepository $trainerRepo)
    {
        $this->usersRepository = $usersRepo;
        $this->sessionsRepository = $sessionsRepo;
        $this->trainerRepository = $trainerRepo;
    }

    /**
     * Display a listing of the Users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request) {

        $page = 1;
        $users = $this->usersRepository->getUsersListing($page);
        return view('admin.users.index')->with('users', $users);
    }

    public function viewUser($id)
    {
        $user = $this->usersRepository->getUserbyId($id);
        if (isset($user->getAddress->country_id)) {
            $rates = Rates::where('location', $user->getAddress->country_id)->where('user_type', 'for_trainer')->orderBy('id', 'desc')->first();
        } else {
            $rates = [];
        }
        $sessions = $this->sessionsRepository->getSessionsbyUserID($id);
        $reviews = $this->trainerRepository->getReviews($id);
        $trainer_id_array = Message::where('send_to', $id)->pluck('send_from')->toArray();
        $messages_send_from = User::whereIn('id', array_unique($trainer_id_array))->get();
        $message_send_to = $id;
        $documents = $user->getDocuments()->where('status',1)->get();
        // dd($documents);
        return view('admin.users.view', compact(['user','documents', 'sessions', 'reviews', 'rates', 'message_send_to', 'messages_send_from', 'trainer_id_array']));
    }

    /**
     * Show the form for creating a new Users.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created Users in storage.
     *
     * @param CreateUsersRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersRequest $request)
    {
        $input = $request->all();

        $users = $this->usersRepository->create($input);

        Flash::success('Users saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('users', $users);
    }

    /**
     * Update the specified Users in storage.
     *
     * @param int $id
     * @param UpdateUsersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersRequest $request)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $users = $this->usersRepository->update($request->all(), $id);

        Flash::success('Users updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified Users from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('Users deleted successfully.');

        return redirect(route('users.index'));
    }

    public function deleteUser($id)
    {
        User::where('id', $id)->delete();
        return back()->with('success', 'Successfully Deleted');
    }

    public function messagechat(Request $req)
    {
        $sendTo = $req->sendTo;
        $sendFrom = $req->sendfrom;
        $usersentTo = User::where('id', $sendFrom)->first();
        $usersentFrom = User::where('id', $sendFrom)->first();
        $messages = Message::query();

        $messages = $messages->where('send_to', $sendTo)
            ->where('send_from', $sendFrom);

        $messages = $messages->orwhere('send_to', $sendFrom)
            ->where('send_from', $sendTo);

        $messages = $messages->get();
        return view('admin.chat.chat', compact('messages', 'sendTo', 'sendFrom',
            'usersentTo', 'usersentFrom'));
    }
}

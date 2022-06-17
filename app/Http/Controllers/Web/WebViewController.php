<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\CmsPages;
use App\Models\Howitworks;
use Illuminate\Http\Request;
use App\Repositories\FaqRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Repositories\CmsPagesRepository;
use App\Repositories\HowitworksRepository;
use http\Exception\InvalidArgumentException;

class WebViewController extends Controller
{

    protected $faqRepository, $howitworksRepository;

    public function __construct(FaqRepository        $faqRepository,
                                HowitworksRepository $howitworksRepository,
                                CmsPagesRepository   $cmsPagesRepository)
    {
        $this->faqRepository = $faqRepository;
        $this->howitworksRepository = $howitworksRepository;
        $this->cmsPagesRepository = $cmsPagesRepository;
    }

    public function index()
    {
        try {

            $cms_about = $this->cmsPagesRepository->cms_about();
            $cms_mission = $this->cmsPagesRepository->cms_mission();
            $cms_contact = $this->cmsPagesRepository->cms_contact();
            $howitworks_trainers = $this->howitworksRepository->getTrainerComments();
            $howitworks_users = $this->howitworksRepository->getUserComments();

            return view('index', compact('cms_about', 'cms_mission', 'cms_contact',
                'howitworks_trainers', 'howitworks_users'));
        } catch (\Exception $e) {
            throw  new InvalidArgumentException($e->getMessage());
        }
    }


    public function accountType() {
        return view('web/account/type');
    }

    public function accountLogin() {

        if (auth()->check()) {
            if (auth()->user()->role->id == 1) {
                return redirect()->route("home");
            } else if (auth()->user()->role->id == 2) {
                return redirect()->route("trainer_index");
            } else if (auth()->user()->role->id == 3) {
                return redirect()->route("trainer");
            }
        }
        
        return view('web.account.login');
    }


    public
    function faqs()
    {
        $faq_generals = $this->faqRepository->typeGeneral();
        $faq_trainers = $this->faqRepository->typeTrainer();
        $faq_users = $this->faqRepository->typeUser();

        return view('web/faqs', compact('faq_generals', 'faq_trainers', 'faq_users'));
    }


    public
    function authStatus()
    {
        return view('web/account/authStatus');
    }

    public
    function privacy()
    {
        try {
            $privacy = CmsPages::where('page_title', 'Privacy')->first();
            return view('web/privacy', compact('privacy'));
        } catch (\Exception $e) {
            throw new InvalidArgumentException($e->getMessage());
            return redirect()->route('home');
        }
    }

    public
    function termsConditions()
    {
        $terms = CmsPages::where('page_title', 'Terms')->first();
        $terms = $terms->page_body;
        return view('web.terms', compact(['terms']));
    }


    public
    function forgot()
    {
        return view('web/account/forgot');
    }


    public
    function trainee_index()
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == 3) {
                return view('trainee.index');
            }
        } else {

            return view('index');
        }
    }


}

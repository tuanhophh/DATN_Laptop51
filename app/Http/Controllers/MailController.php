<?php

namespace App\Http\Controllers;

use App\Jobs\SendOrderSuccessEmail;
use App\Jobs\SendEmail;
use App\Mail\WelcomeEmail;
use App\Repositories\Department\DepartmentRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Str;


class MailController extends Controller
{
    /**
     * Handle Queue Process
     */
    // public function processQueue()
    // {
    //     // $emailJob = new SendWelcomeEmail();
    //     // dispatch($emailJob);
    // }

    public function OrderSuccessEmail()
    {

        $details = array(
            'email' =>'trungbvph12816@fpt.edu.vn',
            'name' => 'trung',
            'password' =>'123456'
        );
        
        dispatch(new SendOrderSuccessEmail($details));
        return redirect()->back();
    }
}

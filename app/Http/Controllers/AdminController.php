<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Project;
use App\Models\Document;
use App\Models\File;
use App\Models\Message;
use App\Models\Notification;
use App\Models\NotificationUser;
use App\Models\Client;
use App\Models\Report;
use App\Models\Task;
use App\Models\User;
use App\Models\Contractor;

class AdminController extends Controller
{
    public function index(){
        $projects =Project::all();
        $notifications = NotificationUser::where('user_id', Auth::id())
        ->where('is_read', 0)
        ->with('notification') // Kèm thông tin từ bảng `notifications`
        ->get();
        $totalProject = $projects->count();
        $inProgressProjects = $projects->where('status', 0)->count();  // Đang thực hiện
        $successProjects = $projects->where('status', 1)->count();      // Tạm dừng
        $onHoldProjects = $projects->where('status', 2)->count();  // Đang thực hiện
        $lowProjects = $projects->where('status', 3)->count();  // Đang thực hiện
        $tasks = Task::where('star',1)->get();
        $unreadMessagesCount = Message::whereHas('chatRoom', function ($query) {
            $query->where('user_id', Auth::id())
                    ->orWhere('other_user_id', Auth::id());
        })->where('sender_id', '!=', Auth::id())
            ->where('is_read', 0)
            ->count();
            $totalClient = Client::count();
        $totalReport = Report::count();
        $totalUser = User::count();
        $totalContractor = Contractor::count();
        $requestClient = Client::where('role','client')->where('status',0)->get();
        return view('admin.index',compact(
                        'projects',
                        'totalProject',
                        'successProjects',
                        'inProgressProjects',
                        'onHoldProjects',
                        'lowProjects',
                        'tasks',
                        'notifications',
                        'unreadMessagesCount',
                        'totalClient',
                        'totalReport',
                        'requestClient',
                        'totalUser',
                        'totalContractor'
                    
                    
                    ));
    }

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function AdminProfile(){
        $notifications = NotificationUser::where('user_id', Auth::id())
        ->where('is_read', 0)
        ->with('notification') // Kèm thông tin từ bảng `notifications`
        ->get();
        $unreadMessagesCount = Message::whereHas('chatRoom', function ($query) {
            $query->where('user_id', Auth::id())
                    ->orWhere('other_user_id', Auth::id());
        })->where('sender_id', '!=', Auth::id())
            ->where('is_read', 0)
            ->count();

        return view('admin.profile',compact('notifications','unreadMessagesCount'));
    }
}

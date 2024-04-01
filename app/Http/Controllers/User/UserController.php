<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\RequestPassword;
use App\Models\User;
use App\Http\Services\User\UserService;
use App\Models\District;
use App\Models\ProductComment;
use App\Models\Transaction;
use App\Models\Ward;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userSevice;

    public function __construct(UserService $userSevice)
    {
        $this->userSevice = $userSevice;
    }
     public function index(){
        $title            = 'Thông tin người dùng';
        $GetTransaction   = Transaction::where('user_id', Auth::User()->id);
        $ListTransactions = $GetTransaction->paginate(8);
        $totalTransaction = $GetTransaction
                            ->select('id')
                            ->count();
        $totalDone        = $GetTransaction
                            ->where('status', Transaction::STATUS_DONE)
                            ->select('id')
                            ->count();

        $totalDevliver    = $GetTransaction
                            ->where('status', Transaction::STATUS_DELIVERING)
                            ->select('id')->count();

        $listComments = ProductComment::where('email', Auth::User()->email)->paginate(8);

        $viewdata = [
            'title'            => $title,
            'totalTransaction' => $totalTransaction,
            'totalDone'        => $totalDone,
            'totalDevliver'    => $totalDevliver,
            'ListTransactions' => $ListTransactions,
            'listComments'     => $listComments,
        ];

        return view('User.user.index', $viewdata,);
     }


    public function changeInfor(User $user)
    {
        return view('User.user.editInformation', [
            'title' => 'Thay đổi thông tin người dùng',
            'users' => $user,
            'districts' => District::orderby('id', 'ASC')->get(),
        ]);
    }

    public function updateInfor(Request $request, User $user) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required|string|max:12',
            'street' => 'required|string|max:255',
            'fee' => 'required|numeric',
        ]);

        $userData = $request->only('name', 'email', 'phone', 'street', 'fee', 'district', 'ward');

        try {
            if ($user) {
                $user->update($userData);
            }
            return redirect()->back()->with('success', 'Thông tin của bạn đã được cập nhật thành công.');
        } catch (Exception $e) {
            return redirect()->back()->with('danger', 'Đã có lỗi xảy ra. Vui lòng thử lại sau');
        }
    }


    public function changePassword(User $user)
    {
        return view('User.user.editPassword', [
            'title' => 'Thay đổi mật khẩu người dùng',
            'users' => $user
        ]);
    }

    public function updatePassword(RequestPassword $requestPassword, User $user)
    {
        if (Hash::check($requestPassword->password_old, Auth::user()->password)) {
            $user = User::find( Auth::user()->id);
            $user->password = bcrypt($requestPassword->password);
            $user->save();

            return redirect()->back()->with('success', 'Thay đổi mật khẩu thành công');

        }
        return redirect()->back()->with('danger', 'Mật khẩu không đúng');
    }

    public function load_address(Request $request)
    {
        $data = $request->all();
        $output ='';
        $data['action'] == "district" ;

        $select = Ward::where('district_id', $data['district_id'])->get();
        $output.='<option>---Chọn xã/phường---</option>';
        foreach ($select as $d){
            $output.='<option value="'.$d->id.'">'.$d->name.'</option>';
        }
         return response()->json(['html' => $output]);
    }

    public function redirectLogin()
    {
        return redirect()->route('login');
    }
}

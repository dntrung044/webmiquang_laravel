<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\RequestPassword;
use App\Models\User;
use App\Http\Services\User\UserService;
use App\Models\District;
use App\Models\Feeship;
use App\Models\ProductComment;
use App\Models\Transaction;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
                            ->where('status', Transaction::STATUS_DEVLIVERING)
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

    public function updateInfor(Request $request, User $user)
    {
        $result = $this->userSevice->update($request, $user);
        if ($result) {
        alert('Cập nhật trạng thái thành công', 'success');
            // return redirect()->intended('/');
            return redirect()->back();
        }
        alert('Cập nhật lỗi', 'error');
        return redirect()->back();
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
        // dd($requestPassword->all());
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

            $select = Ward::where('district_name', $data['district_name'])->get();
            $output.='<option>---Chọn xã/phường---</option>';
            foreach ($select as $d){
                $output.='<option value="'.$d->name.'">'.$d->name.'</option>';
            }

        echo  $output;
    }

    public function calculate_ship(Request $request)
    {
        $data = $request->all();
        if($data['district'] && $data['ward']  ) {
            $feeship = Feeship::where('district', $data['district'])->where('ward', $data['ward'])->firstOrFail();
            if($feeship->feeship != '') {
                return response()->json([
                    'status'=>200,
                    'fee' => $feeship->feeship
                ]);
            } else {
                return response()->json([
                    'status'=>400,
                    'nodata'=> '15000'
                ]);
            }
        }
    }

    public function redirectLogin()
    {
        return redirect()->route('/dang-nhap');
    }
}

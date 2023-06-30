<?php


namespace App\Http\Services\User;

use App\Models\District;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserService
{
    public function get() {
        return User::orderByDesc('id')->paginate(10);
    }


    public function update($request, $user)
    {
        try {
            DB::beginTransaction();
            $user->fill($request->input());
            $user->save();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());

            return false;
        }

        return true;
    }

    // public function update($request, $user) {
    //     // try {
    //     //     DB::beginTransaction();
    //         // $request->all()
    //         dd($request->all());
    //         $request->except('_token');
    //         User::findOrFail($user)->first()->fill($request->all())->update();
    //         // User::where('id',$user)->first()->update($request->all());

    //         // User::where('id',$user)->first()->update([
    //         //     'name' => $request->name,
    //         //     'email' => $request->email,
    //         //     'phone' => $request->phone,
    //         //     'district' => $request->district,
    //         //     'ward' => $request->ward,
    //         //     'street' => $request->street,
    //         //     'fee' => $request->fee,
    //         // ]);

    //         // $user = User::find($id);
    //         // $user->roles()->sync($request->role_id);
    //     //     DB::commit();
    //     // } catch (\Exception $exception) {
    //     //     DB::rollBack();
    //     //     Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
    //     //     return false;
    //     // }

    //     // return true;
    // }

    public function destroy($request) {
        $id = (int)$request->input('id');
        $user = User::where('id', $id)->first();
        if ($user) {
            return User::where('id', $id)->delete();
        }

        return false;
    }
}

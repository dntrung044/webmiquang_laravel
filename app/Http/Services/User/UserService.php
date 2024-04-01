<?php


namespace App\Http\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserService
{
    public function get() {
        return User::orderByDesc('id')->get();
    }

    public function update($request, $id)
    {
        $Role = $request->input('selectedRole');
        $Level = $request->input('selectedLevel');
        $Active = $request->input('selectedActive');

        $user = User::find($id);
        try {
            DB::beginTransaction();
            $user->roles()->sync([$Role]);
            $user->update([
                'level' => $Level,
                'active' => $Active
            ]);
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
}

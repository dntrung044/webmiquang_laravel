<?php


namespace App\Http\Services\Menu;


use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService
{
    public function show()
    {
        return Menu::select('name', 'link', 'thumb', 'description')
            ->orderbyDesc('id')
            ->get();
    }

    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(3);
    }

    public function create($request)
    {
        try {
            Menu::create([
                'name' => (string)$request->input('name'),
                'description' => (string)$request->input('description'),
                'link' => (string)$request->input('link'),
                'thumb' => (string)$request->input('thumb'),
                'active' => (string)$request->input('active')
            ]);

            Session::flash('success', 'Tạo Danh Mục Thành Công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $menu): bool
    {

        $menu->name = (string)$request->input('name');
        $menu->description = (string)$request->input('description');
        $menu->link = (string)$request->input('link');
        $menu->thumb = (string)$request->input('thumb');
        $menu->active = (string)$request->input('active');
        $menu->save(); 

        Session::flash('success', 'Cập nhật thành công Danh mục');
        return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            return Menu::where('id', $id)->delete();
        }

        return false;
    }
    public function getId($id)
    {
        return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }

    public function getProduct($menu, $request)
    {
        $query = $menu->products()
            ->select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1);

        if ($request->input('price')) {
            $query->orderBy('price', $request->input('price'));
        }

        return $query
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();
    }

}

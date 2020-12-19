<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use DB;
use App\CategoryClass;
use App\Classs;
use App\Module;
use App\Purchased;
use App\Payment;
use Auth;

class ClassController extends Controller
{
    private function categories()
    {
        return $categories = CategoryClass::orderBy('name', 'ASC')->get();
    }

    public function index()
    {
        $type = request()->type;
        $category = request()->filter;
        $keyword = request()->keyword;
        $sort = request()->sort;
        $classes = QueryBuilder::for(Classs::class)->with('category')->distinct();
        
        switch ($type) {
            case 'free':
                $classes = $classes->where("price",0);
                break;
            
            case 'paid':
                $classes = $classes->where("price","!=",0);
                break;
        }

        if (!empty($category)) {
            $classes = $classes->allowedFilters([
                                    AllowedFilter::exact('category', 'category_id')
                                ]);
        }

        if (!empty($keyword)){
            $classes = $classes->where("name","LIKE","%{$keyword}%");
        }

        switch ($sort) {
            case 'oldest':
                $classes = $classes->orderBy("created_at", 'ASC');
                break;

            case 'newest':
                $classes = $classes->orderBy("created_at", "DESC");
                break;

            case 'highest_price':
                $classes = $classes->orderBy("price", "DESC");
                break;

            case 'lowest_price':
                $classes = $classes->orderBy("price", "ASC");
                break;
        }

        if (empty($sort)) {
            $classes = $classes->orderBy('created_at','DESC');
        }
        
        $classes = $classes->paginate(9);
        $categories = $this->categories();

        return view('users.class', compact(
            'categories', 'classes'
        ));
    }

    public function searchClass(Request $request)
    {
        $keyword = $request->keyword;
        $classList = Classs::with('category')->distinct()
                    ->where('classses.name','LIKE',"%{$request->keyword}%")
                    ->take(5)
                    ->get();
        $data = [];

        foreach ($classList as $class) {
            $data[] = array(
                'category' => $class->category->name,
                'name' => $class->name,
                'picture' => $class->picture,
                'price' => $class->price,
                'link' => route('user.class.class', $class->code)
            );
        }

        return response()->json($data);
    }

    public function class($code)
    {
        // harus bernilai 1 jika di count()
        $purchaseds = DB::table('classses')
            ->join('modules','classses.id','=','modules.class_id')
            ->join('purchaseds', 'classses.id','=','purchaseds.class_id')
            ->where('classses.code', $code)
            ->where('purchaseds.user_id', Auth::user()->id)
            ->orderBy('modules.sort')
            ->first();
        
        if (!empty($purchaseds)) {
            return redirect()->route('user.class.module', [$code,$purchaseds->code]);
        }

        $class = Classs::where('code', $code)->first();
        $userLogged = Auth::check();
        if ($userLogged) {
            $userLogged = 1;
        } else {
            $userLogged = 0;
        }
        
        return view('users.preview', compact('class', 'userLogged'));
    }

    public function beli(Request $request, Classs $class)
    {
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $kelas = Purchased::create([
                'user_id' => $user_id,
                'class_id' => $class->id,
            ]);
            if (empty($request->transfer_to) && empty($request->amount)) {
                $payment = Payment::create([
                    'purchased_id' => $kelas->id,
                    'user_id' => $user_id,
                    'transfer_to' => '-',
                    'amount' => 0
                ]);
            } else {
                $this->validate($request, [
                    'transfer_to' => 'required|string',
                    'amount' => 'required|integer'
                ]);
                $payment = Payment::create([
                    'purchased_id' => $kelas->id,
                    'user_id' => $user_id,
                    'transfer_to' => $request->transfer_to,
                    'amount' => $request->amount
                ]);
            }

            if ($kelas->exists && $payment->exists) {
                $module = Module::with('class')->orderBy('created_at', 'ASC')->first();    
                return redirect()->route('user.class.module', [$class->code, $module->code]);
            }else{
                return back()->with('error', 'Kelas gagal dibeli');
            }
        } else {
            return redirect()->route('login');
        }
    }
    
    public function module($class, $module)
    {
        if (Auth::check()){
            $c = Classs::where('code', $class)->first();
            $bab = Module::where('class_id', $c->id)->orderBy('sort', 'ASC')->get();
            $classes = Classs::where('code', $class)->with('module')->get();
            $modul = Module::where('code', $module)->first();

            $purchased = Classs::join('purchaseds','classses.id','=','purchaseds.class_id')
                                ->where('purchaseds.user_id', Auth::user()->id)
                                ->get();

            if (count($purchased) != 0) {
                if (empty($modul)){
                    return redirect()->back();
                }
                return view('users.modul', compact(
                    'class', 'module',
                    'bab', 'classes', 'modul'
                ));
            } else {
                return redirect()->route('user.class.class', $class);
            }
        } else {
            return redirect()->route('login');
        }
    }
}

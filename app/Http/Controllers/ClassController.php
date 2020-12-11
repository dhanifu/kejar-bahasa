<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $category = request()->category;
        $keyword = request()->keyword;
        $sort = request()->sort;
        $classes = Classs::with('category')->distinct();

        if ($category != null) {
            $classes = $classes->where('category_id', $category);
        }

        if ($type != null && $type == 'free') {
            $classes = $classes->where('price',0);
        } elseif ($type != null && $type == 'paid') {
            $classes = $classes->where('price','!=', 0);
        }

        if ($keyword != null) {
            $classes = $classes->where('name', 'LIKE',"%{$keyword}%");
        }

        if ($sort != null && $sort == 'newest') {
            $classes = $classes->orderBy('created_at', 'DESC');
        } elseif ($sort != null && $sort == 'oldest') {
            $classes = $classes->orderBy('created_at', 'ASC');
        } elseif ($sort != null && $sort == 'highest_price') {
            $classes = $classes->orderBy('created_at', 'DESC');
        } elseif ($sort != null && $sort == 'lowest_price') {
            $classes = $classes->orderBy('created_at', 'ASC');
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
        $class = Classs::where('code', $code)->first();
        return view('users.preview', compact('class'));
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
            $bab = Module::where('class_id', $c->id)->orderBy('created_at', 'ASC')->get();
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

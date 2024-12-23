<?php

namespace App\Http\Controllers;
use App\Models\iklan;
use App\Models\menu;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class IklanController extends Controller
{
    public function addslider(){
        $data['data']= iklan::all();
        return view('addslider', $data);

    }

    public function slider(){
        $data['data']= iklan::all();
        return view('slider', $data);

    }

    public function index($id){

        $slider= iklan::all();
        $menu= menu::all();


        $externalLink = "https://esborder.qs.esb.co.id/FRS/FRSS/order?mode=dinein&tableNumber=" . strtoupper($id);

        return view('index', ['id' => $id, 'externallink' =>$externalLink , 'slider'=>$slider, 'menu'=>$menu] );
    }

    public function image_action(Request $request){
        $data['data']= iklan::all();
        
        $request->validate(
            [
                'title'=>'string',
                'link'=>'string',
                'image'=>'image|mimes:jpg,png',
                'priority'=>'integer'
            ]
            );

        $path = $request->file('image')->store('image','public');

        iklan::create([
            'title' => $request->input('title'),
            'path' => $path,
            'link'=> $request->link,
            'priority'=>$request->priority
        ]);
        
       return redirect()->route('slider');
    }

    public function delete_action_image($d){
        $id = iklan::all();
        $Product_img = $id->find($d);
        $Product_img->delete();
        // if (Storage::exists($Product_img->d)) {
        //     Storage::delete($Product_img->d);
        // }
        return redirect()->route('slider')
        ->with('success','images has deleted');
    }

    public function edit(iklan $d, $id){
        $data['title']='update';
        $data['data']= iklan::findOrFail($id); 
        // dd($data['data']);
        
        return view('edit', $data);
    }

    public function editNew(Request $request, iklan $product_img)
    {
        $data['data']= iklan::all();

        $request->validate([
            'title' => 'required|string|max:255', 
            'image2' => 'nullable|file|mimes:jpg,jpeg,png,gif|max:2048', 
        ]);
        
        $product_img->title = $request->input('title');

        if ($request->hasFile('image2')) {
            if ($product_img->path && Storage::exists('public/' . $product_img->path)) {
                Storage::delete('public/' . $product_img->path);
            }

            $path = $request->file('image2')->store('image', 'public');
            $product_img->path = $path;
        }

        $product_img->save();

        return redirect()->route('slider');
    }
}


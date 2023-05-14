<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;
use Traversable;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travel = Travel::paginate(5);
        return view('travel.index', [
            'data' => $travel
        ]);
    }
    //IMG
    // public function index()
    // {
    //     $travel = Travel::latest()->paginate(5);
    //     return view('travel.index', compact('travel'))
    //         'data' => $travel
    //     );
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('travel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //tamabahan IMG
        $input = $request->all();

        if( $image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Travel::create($input);

        // Travel::create([
        //     'name' => $request->name,
        //     'desc' => $request->desc,
        //     'image' => $request->image
        // ]);

        return redirect('/travel')
        // return redirect()->route('/travel')
        ->with('success', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     $travel = Travel::find($id);
    //     return $travel;
    // }
    //IMG
    public function show(Travel $travel)
    {
        return view('show', compact('travel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Request $request, $id)
    // {
    //     $travel = Travel::find($id);
    //     return view('travel.edit', compact('travel'));
    // }

    public function edit(Travel $travel, $id){
        $travel = Travel::find($id);
        return view('travel.edit', compact('travel'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //     ]);
    //     $travel = Travel::find($id);
    //     $travel->update([
    //         'name' => $request->name,
    //         'desc' => $request->decs,
    //         'image' => $request->image
    //     ]);
    //     return redirect('/travel');
    // }
    //IMG
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            // 'desc' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $travel= Travel::find($id);
        $travel->update([
            'name'=> $request->name,
            'desc'=> $request->desc,
            'image'=> $request->image,

        ]);

        $input = $request->all();

        if( $image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $travel->update($input);

        return redirect('/travel');
        // ->with('success','Edit data successfully');
        // return redirect()->route('index')
        // ->with('success','Edit data successfully');
    }
    // public function update(Request $request, $id){
    //     $request->validate([
    //         'name' => 'required',
    //         'desc' => 'required',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //     ]);
    //     //tamabahan IMG
    //     $input = $request->all();

    //     // if( $image = $request->file('image')) {
    //     //     $destinationPath = 'image/';
    //     //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //     //     $image->move($destinationPath, $profileImage);
    //     //     $input['image'] = "$profileImage";
    //     // }else{
    //     //     unset($input['image']);
    //     // }
    //     $input = Travel::find($id);
    //     $input->update([
    //         'name' => $request->name,
    //         'desc' => $request->desc,
    //         'image' => $request->file('image')

            
    //     ]);
    //     // $id->update($input);
    //     return redirect('/travel')
    //     ->with('success', 'Travel update successfully');
    // }

    // public function update(Request $request, $id){
    //     $request->validate([
    //         'name' => 'required',
    //         'desc' => 'required',
    //     ]);

    //     $travel = Travel::find($id);

    //     if($request->hasFile('image')){
    //         $request->validate([
    //             'image' => 'required|image|mimes:jpg,png,jpeg,giv,svg|max:2048',
    //         ]);
    //         $path = $request->file('image')->store('public/image');
    //         $travel->image = $path;
    //     }
    //         $travel->name = $request->name;
    //         $travel->desc = $request->desc;
    //         $travel->save();

    //         // return redirect()->route('update.index')
    //         return redirect('/travel')
    //         ->with('success');
            
       
    // }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $travel = Travel::find($id);
        $travel->delete();
        return redirect('/travel');
    }
}

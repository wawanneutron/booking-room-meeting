<?php

namespace App\Http\Controllers\Apps\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ManageRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::when(request()->q, function($rooms) {
          $rooms = $rooms->where('room_name', 'like', '%' . request()->q . '%');
        })->latest()->paginate(10);

        return Inertia::render('Apps/Dashboard/Manage-Room/Index', [
          'rooms' => $rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return Inertia::render('Apps/Dashboard/Manage-Room/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'image'       =>  'required|image|mimes:jpeg,jpg,png,svg|max:2000',
            'room_name'   =>  'required',
            'room_detail' =>  'required'
        ]);

        // uplod image
        $image = $request->file('image');
        $image->storeAs('public/rooms', $image->hashName());

        // create room
        Room::create([
          'image'       => $image->hashName(),
          'room_name'   => $request->room_name,
          'room_detail' => $request->room_detail
        ]);

        // redirect
        return redirect()->route('admin.manage-room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);

        return Inertia::render('Apps/Dashboard/Manage-Room/Detail', [
          'room' => $room
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $room = Room::findOrFail($id);
      
      return Inertia::render('Apps/Dashboard/Manage-Room/Edit', [
        'room' => $room
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation
        $this->validate($request, [
            'room_name'   =>  'required',
            'room_detail' =>  'required'
        ]);

        $room = Room::findOrFail($id);

        // check image update
        if ($request->file('image')) {

          // remove old image
          Storage::disk('local')->delete('public/rooms/' . basename($room->image));
          
          // upload new image
          $image = $request->file('image');
          $image->storeAs('public/rooms', $image->hashName());

          // update with new image
          $room->update([
            'image'       => $image->hashName(),
            'room_name'   => $request->room_name,
            'room_detail' => $request->room_detail
          ]);

        }
        // update without image
        $room->update([
          'room_name'   => $request->room_name,
          'room_detail' => $request->room_detail
        ]);

        return redirect()->route('admin.manage-room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        // remove image
        Storage::disk('local')->delete('public/rooms/' . basename($room->image));

        $room->delete();

        // redirect
        return redirect()->route('admin.manage-room.index');
    }
}

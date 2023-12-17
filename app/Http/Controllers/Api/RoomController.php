<?php

namespace App\Http\Controllers\Api;

use App\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Room::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        $validated = $request->validated();

        $room = Room::create($validated);

        return $room;
    }

    public function update(RoomRequest $request, string $id)
    {
        $room = Room::findorFail($id);
        $validated = $request->validated();
        $room->room_name = $validated['room_name'];
        $room->save();

        return $room;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

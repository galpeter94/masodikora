<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Reservation::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        $reservation = new Reservation();
        $reservation->fill($request->all());
        $reservation->save();
        return response()->json($reservation, 201)
    }

    /**
     * Display the specified resource.
     */
    public function show($book_id, $user_id, $start) 
    {
        $reservation = Reservation::where('book_id', $book_id)
        
        ->where('user_id', $user_id)
        ->where('start', $start)
        ->get();

        return $reservation[0];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}

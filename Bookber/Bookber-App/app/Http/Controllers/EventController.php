<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create(){
        return view('events.create');
    }

    public function showEvent($id){
        $event = Event::find($id);
        
        if(event){
            return view('events.show', compact('event'));
        } else {
            return redirect()->route('events.index')->with('error', 'Event not found!');
        }
    }

    public function store(Request $request){
        $request->validate([
            'EventTitle' => 'required|max:255',
            'EventDescription' => 'required|max:255',
            'StartDate' => ['required', 'date', 'after:' . now()->addWeek()->format('Y-m-d')],
            'EndDate' => 'required|date|after:StartDate',
        ], [
            'StartDate' => 'Starting date has to be at least 1 week after the event is created',
            'EndDate' => 'End date has to be after the starting date',
        ]);

        Event::create([
            'EventTitle' => $request->EventTitle,
            'EventDescription' => $request->EventDescription,
            'StartDate' => $request->StartDate,
            'EndDate' => $request->EndDate,
        ]);
        return redirect()->route('events.index')->with('Success', 'Event created successfully!');
    }

    public function update(Request $request){
        $request->validate([
            'EventTitle' => 'required|max:255',
            'EventDescription' => 'required|max:255',
            'StartDate' => ['required', 'date', 'after:' . now()->addWeek()->format('Y-m-d')],
            'EndDate' => 'required|date|after:StartDate',
        ], [
            'StartDate' => 'Starting date has to be at least 1 week after the event is created',
            'EndDate' => 'End date has to be after the starting date',
        ]);

        Event::update([
            'EventTitle' => $request->EventTitle,
            'EventDescription' => $request->EventDescription,
            'StartDate' => $request->StartDate,
            'EndDate' => $request->EndDate,
        ]);
        return redirect()->route('events.index')->with('Success', 'Event updated successfully!');
    }

    public function deleteEvent($id){
        $event = Event::find($id);

        if(event){
            $event->delete();
            return redirect()->route('event.index')->with('success', 'Event deleted successfully!');
        } else {
            return redirect()->route('event.index')->with('error', 'Event is not found!');
        }
    }
}
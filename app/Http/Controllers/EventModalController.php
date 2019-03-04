<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventModal;
use App\Event;
use Image;
use Session;
use Storage;
use DB;
use User;

class EventModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request){

    }
    public function store(Request $request)
    {
      // validate the data

      $event = Event::where('id',$request->event)->first();
      
      $user = \Auth::user();
        if($request->event_modal_image){
            $imageName = time() . '.' . $request->event_modal_image->getClientOriginalExtension();
                $image_uploaded = $request->event_modal_image->move(public_path('/uploads/event'), $imageName);
                if ($image_uploaded) {
                
                    $data['image'] = $imageName;
                    //return $data['image'];
                    $event->event_modal_image = $data['image'];
                }
        }

        
        $event->is_published = 'yes';
        $event->save();
        //return $event->id;exit;
      $this->validate($request, array(
          'event_date'              => '',
          'event_start_time'        => '',
          'event_end_time'          => '',
          'event_ticket_price'      => '',
          'event_details'           => '',
        ));
        // store in the database
          $eventM = new EventModal;

          $eventM->user()->associate($request->user());

          $eventM->event_date             = $request->event_date;
          $eventM->event_start_time       = $request->event_start_time;
          $eventM->event_end_time         = $request->event_end_time;
          $eventM->event_ticket_price     = $request->event_ticket_price;
          $eventM->event_details          = $request->event_details;
          $eventM->event_id               = $event->id;


          //Save our Image
          // if ($request->hasFile('seller_featured_image')) {
          // $image = $request->file('seller_featured_image');
          // $filename = time() . '.' . $image->getClientOriginalExtension();
          // $location = public_path('uploads/seller/' . $filename);
          // Image::make($image)->resize(280,320)->save($location);
          //
          // $eventM->seller_featured_image = $filename;
          // }

          $eventM->save();


          Session::flash('success', 'Plan and Price added Successfully!');
          // redirect to another page
           //return redirect()->route('eventM.index');
           return redirect()->to('events');
            //return view('pages.events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $eventM = EventModal::find($id);
      $eventM->delete();

      Session::flash('success', 'The post was sucessfully deleted.');

      return redirect()->back();
    }
}

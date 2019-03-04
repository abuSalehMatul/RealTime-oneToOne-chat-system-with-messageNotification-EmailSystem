<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dispute;
use App\Reply;
use Auth;

class DisputeController extends Controller
{
    //
    public function __construct(){
        $this -> middleware('auth');
    }

    public function create()
    {

        $user_email     =  Auth::user()->email;

        $disputer_type_maker    = Dispute::where("dispute_maker","=",$user_email)->get()->count();
        $disputer_type_replier  = Dispute::where("open_with","=",$user_email)->get()->count();

        if($disputer_type_maker > 0 && $disputer_type_replier == 0)
        {
            $type = "maker";
        }
        if($disputer_type_replier > 0 && $disputer_type_maker == 0)
        {
            $type = "replier";
        }


       
        $response       =   Dispute::where("dispute_maker","=",$user_email)
                            ->orWhere('open_with', '=', $user_email)
                            ->leftJoin('replies', 'disputes.dispute_no', '=', 'replies.dispute_no')
                            ->leftJoin('users as u1', 'disputes.dispute_maker', '=', 'u1.email')
                            ->leftJoin('users as u2', 'disputes.open_with', '=', 'u1.email')
                            ->get([
                                'disputes.id as d_id',
                                'disputes.dispute_no as d_dispute_no',
                                'disputes.dispute_maker as d_dispute_maker',
                                'disputes.status as d_status',
                                'disputes.open_with as d_open_with',
                                'disputes.created_at as d_created_at',
                                'replies.notes as r_notes',
                                'u1.avatar as avatr1',
                                'u2.avatar as avatr2',
                            ])->toArray();

       
        
        $replies        =  Reply::where("note_id",Auth::user()->id)
                                    ->orWhere('replyer_id', '=', Auth::user()->id)
                                ->get()->toArray();
        $user_type      = "maker";
        return view('pages.dispute.dispute',array('user_id'=>Auth::user()->id,'dispute_maker_email' => $user_email,'disputes' => $response,'user' => Auth::User(),'replies'=>$replies,'user_type' =>  $user_type ));
    }


    public function addDispute()
    {
        $data['id'] = Auth::user()->id;
        foreach($_POST['dispute'] as $key => $value)
        { 
            $data[$value['name']] = $value['value'];
        }

     

        $data2 = $this->mapFields($data); 

        $data3  = $this->mapFieldsreplies($data);

    

        $count  = Dispute::where("dispute_no","=",$data['dispute_unique_no'])->count();
        if($count > 0)
        {
            $res1    = Dispute::where("dispute_no","=",$data['dispute_unique_no'])->update($data2);
            $res2    = Reply::where("dispute_no","=",$data['dispute_unique_no'])->update($data3);
        }
        else
        {   
            $res1    = Dispute::create($data2);
            $res2    = Reply::create($data3);
            
          
        }
        
        
        $data4['res1'] = $res1;
        $data4['res2'] = $res2;
       
        $data4['date_to_show'] = date("F j, Y, H:i:s");

        echo json_encode($data4);
    }

    public function mapFields($data)
    {
        $data2['dispute_no']            = $data['dispute_unique_no'];
        $data2['dispute_maker']   = $data['dispute_maker_email'];
        $data2['status']                = $data['dispute_opts'];
        $data2['open_with']             = $data['dispute_onpen_with'];
        $data2['dispute_maker_id']      = $data['id'];
        $data2['note']                  = "";
        $data2['replyer_id']            = $data['id'];

        return $data2;
    }

    public function mapFieldsreplies($data)
    {
        $data3['dispute_no']            = $data['dispute_unique_no'];
        $data3['note_id']               = $data['id'];
        $data3['notes']                 = $data['notes'];
        $data3['replyer_id']            = $data['replyer_id'];
        return $data3;
    }

}

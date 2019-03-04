<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq as Faq;
use Auth;

class FaqController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->req = $request;
        $this -> faq = new faq();
    }

    public function faqs() {
        $user = Auth::User();
        $std = new \stdClass();
        $std->IsAdmin = $this->faq->isUserHasPermission($user->id)->count();
        $this->data['user'] = $std;
        if($std->IsAdmin == 1)
        {
            $faqs = \App\Faq::orderBy('id','desc')->paginate(10);
            $formUrl = route('faq.store');
            $faqImg = asset('no-image.jpg');
            return view('pages.faq.list', compact('faqs','formUrl','faqImg'));
        }
        else
        {
            return abort(500, 'Access denied');
        }
    }

    public function faquser() {
        $faqs = \App\Faq::orderBy('id','desc')->paginate(10);
        if(!empty($faqs)){
              foreach($faqs as $key => $value) {
                if(!empty($value->youtube_link)){
                  $str = $value->youtube_link;
                  $url = explode("v=",$str);
                  $value['youlink'] = "https://www.youtube.com/embed/". $url[1];
                }       
              };
        }

        return view('pages.faq.faquser', compact('faqs'));
    }
    
    public function store() {
         
         $validator = \Validator::make($this->req->all(), [
            'question' => 'required',
            'answer' => 'required'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $FAQData = [    
            'question' => $this->req->get('question'),
            'answer' => $this->req->get('answer'),
            'youtube_link' => $this->req->get('youtube_link') 
        ];

        if ($this->req->hasFile('image')) {
            $destinationPath = 'uploads/faq';
            $file =$this->req->image;
            $filename = str_slug(time().'.'.$file->getClientOriginalExtension());
            $upload = $file->move($destinationPath, $filename);
            $FAQData['image'] = $filename;
        }
        $faq = \App\Faq::create($FAQData);
        return redirect('/faqsetup')->with('success', 'FAQ save successfully');
    }

    public function editFaq($id) {
        $faqs = \App\Faq::orderBy('id','desc')->paginate(10);
        $faq = \App\Faq::find($id);
        $formUrl = route('faq.update', $id);
        if (!empty($faq->image)) {
            $faqImg = asset('uploads/faq/'.$faq->image);
        } else {
            $faqImg = asset('no-image.jpg');
        }
        return view('pages.faq.list', compact('faq','formUrl','faqs','faqImg'));
    }

    public function updateFaq($id) {  
        $validator = \Validator::make($this->req->all(), [
            'question' => 'required',
            'answer' => 'required'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $FAQData = [    
            'question' => $this->req->get('question'),
            'answer' => $this->req->get('answer'),
            'youtube_link' => $this->req->get('youtube_link') 
        ];

        if ($this->req->hasFile('image')) {
            $destinationPath = 'uploads/faq';
            $file =$this->req->image;
            $filename = str_slug(time().'.'.$file->getClientOriginalExtension());
            $upload = $file->move($destinationPath, $filename);
            $FAQData['image'] = $filename;
        }
        $user = \App\Faq::where('id', $id)->update($FAQData);
        return redirect('/faqsetup')->with('success', 'FAQ updated successfully.');
    }
    
    public function deleteFaq($id) {
        $users = \App\Faq::find($id)->delete();
        return redirect('/faqsetup')->with('success', 'FAQ deleted successfully.');
    }
}     
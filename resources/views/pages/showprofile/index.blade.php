@extends('layouts.app')





<div class="fb-messengermessageus"
     messenger_app_id="95100348886"
     page_id="XYZ"
     color="blue"
     size="large">
</div>

<style>
    body{ background: linear-gradient(to bottom right, white,white );}
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

    /*.header1{*/
        /*position:fixed;*/
        /*width:100%;*/
        /*height:60px;*/
        /*background:#142170;*/
        /*top:0;*/
        /*left:0;*/
        /*color:white;*/
        /*z-index:7;*/
    /*}*/

    .coverpad{
        left:250px;
        top:215px;
        background:white;
        height:360px;
        width:850px;
        position:absolute;
        display:none;}



    .coverpadx{
        left:250px;
        top:215px;
        height:320px;
        width:850px;
        position:absolute;
        -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);}


    .profilepic{
        width:150px;
        height:150px;


        top:345px;
        left:258px;
        background:white;
        position:absolute;
        border-radius: 50%;
    }
    .profilepicx{
        width:140px;
        height:140px;


        top:350px;
        left:263px;
        position:absolute;
        border-radius: 50%;
        -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);
    }

    .username{
        padding-left: 5px;

        font-size:20px;
        font-family:verdana;
        color:black;
        top:400px;
        left:420px;
        height:auto;
        width:200px;
        background: white;
        position:absolute;
    }
    .box11{top:480px;
        left:428px;
        padding:12px;
        background:white;
        position:absolute;
        width:auto;
        -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);
        height:auto;
        font-size:16px;
        font-family:verdana;
        cursor:pointer;

        color:#868383;}
    .box12{top:480px;
        left:520px;
        padding:12px;
        background:white;
        position:absolute;
        width:auto;
        -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);
        height:auto;
        font-size:16px;
        font-family:verdana;
        cursor:pointer;

        color:#868383;}
    .box13{top:480px;
        left:592px;
        padding:12px;
        background:white;
        position:absolute;
        width:auto;
        -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);
        height:auto;
        font-size:16px;
        font-family:verdana;
        cursor:pointer;
        color:#868383;}
    .box14{top:480px;
        left:652px;
        padding:12px;
        background:white;
        position:absolute;
        width:auto;
        -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);
        height:auto;
        font-size:16px;
        font-family:verdana;
        cursor:pointer;
        color:#868383;}
    select{top:480px;
        left:768px;
        padding:12px;
        position:absolute;
        width:90px;
        -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);
        height:47px;
        font-size:16px;
        font-family:verdana;
        border:none;
        color:#868383;
        cursor:pointer;
    }




    fieldset, label { margin: 0; padding: 0; }
    body{ margin: 20px; }
    h1 { font-size: 1.5em; margin: 10px; }

    /****** Style Star Rating Widget *****/

    .rating {
        border: none;
        float: left;
    }

    .rating > input { display: none; }
    .rating > label:before {
        margin: 5px;
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating > .half:before {
        content: "\f089";
        position: absolute;
    }

    .rating > label {
        color: #ddd;
        float: right;
    }

    /***** CSS Magic to Highlight Stars on Hover *****/

    .rating > input:checked ~ label, /* show gold star when clicked */
    .rating:not(:checked) > label:hover, /* hover current star */
    .rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

    .rating > input:checked + label:hover, /* hover current star when changing rating */
    .rating > input:checked ~ label:hover,
    .rating > label:hover ~ input:checked ~ label, /* lighten current selection */
    .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }

</style>
@section('content')
    <div class="header0001">
    </div>
    <div class="coverpad">
    </div>
    {{--<div class="coverpadx"><img src="{{ asset('/uploads/avatars/' . Auth::user()->avatar) }}" width="800px"/>--}}
    <div class="coverpadx"><img src="{{ asset('img/Extended-image1.jpg') }}" width="850px"/>
    </div>


    <div class="profilepic">
    </div>
    <div class="profilepicx"><img  style="border-radius: 50%"  src="{{ asset('/uploads/avatars/' . Auth::user()->avatar) }}" height="140px"/>
    </div>
 {{--<div class="profilepicx"><img   src="{{ asset('/uploads/avatars/' . Auth::user()->avatar) }}" height="1000px"/>--}}
    {{--</div>--}}

    <div class="username">{{Auth::user()->name}}

        <i style="padding-left: 90px" class="fa fa-search" aria-hidden="true"></i>
    </div>
    <div class="box11">Timeline
    </div>
    <div class="box12">About
    </div>
    <div class="box13">Blog
    </div>
    <div class="box14">Promotions
    </div>

    <select>
        <option selected>More</option>
        <option value="saab">Bids</option>
        <option value="opel">Event</option>
        <option value="audi">Membership</option>
        <option value="aud">Personal Info</option>
        <option value="au">Wallet</option>




    </select>




    <fieldset class="rating" style="margin-left: 900px;margin-top: 120px">
        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
    </fieldset>

    <img src="{{ asset('img/icon.png') }}" width="30px" height="30px" style="left: 1055px;position:absolute; top: 485px"/>


    <div style="position: absolute; left:835px; background: white; width:auto; height:30px; top:402px; padding: 5px" ><i class="fa fa-check" aria-hidden="true"></i> <span>Following</span><i class="fa fa-caret-down" aria-hidden="true"></i>
    </div>



    <div ><img src="{{ asset('img/mi.svg') }}" width="30px" height="30px" style="left: 943px;position:absolute; top: 402px; background: white"/>
<span style="position:absolute; top:402px; left: 972px; background:white; width: 90px; height:30px; padding:2px">Message</span>
</div>

<div style="background: white; width: 30px; height: 30px; left:1063px; top:402px; padding:7px ;position: absolute"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></div>
@endsection

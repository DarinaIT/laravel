<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Plans;
use App\Models\Profits;
use App\Models\Coupon;
use Carbon\Carbon;
use Image;


class PyschemeController extends Controller
{

    public function Plans()
    {
        $data['title']='Plans';
        $data['plan']=Plans::all();
        return view('admin.investment.plans', $data);
    } 
    
    public function Create()
    {
        $data['title']='Create plan';
        return view('admin.investment.create', $data);
    } 

    public function Store(Request $request)
    {
        $data['name'] = $request->name;
        $data['percent'] = $request->percent;
        $data['min_deposit'] = $request->min_amount;
        $data['amount'] = $request->max_amount;
        $data['duration'] = $request->duration;
        $data['period'] = $request->period;
        $data['ref_percent'] = $request->ref_percent;
        $data['compound'] = $request->compound;
        $data['interest'] = $request->interest;
        $data['status'] = $request->status;
        $data['bonus'] = $request->bonus;
        $data['claim'] = $request->claim;
        $data['recurring'] = $request->recurring;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'plan_'.time().'.jpg';
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $data['image'] = $filename;
        }
        $res = Plans::create($data);
        if ($res) {
            return redirect()->route('admin.py.plans')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating New Plan');
        }
    } 
    
    public function Pending()
    {
        $data['title']='Pending investment';
        $data['profit']=Profits::whereStatus(1)->orderBy('date', 'DESC')->get();
        return view('admin.investment.pending', $data);
    }     
    
    public function Completed()
    {
        $data['title']='Completed investment';
        $data['profit']=Profits::whereStatus(2)->latest()->get();
        return view('admin.investment.completed', $data);
    }    
    public function Coupon()
    {
        $data['title']='Coupons';
        $data['profit']=Coupon::get();
        return view('admin.investment.coupon', $data);
    } 
    public function Couponstore(Request $request)
    {
        $data['code'] = $request->code;
        $data['percent'] = $request->percent;
        $res = Coupon::create($data);
        if ($res) {
            return back()->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating New Coupon');
        }
    }
    public function Couponupdate(Request $request)
    {
        $data = Coupon::findOrFail($request->id);
        $data->code=$request->code;
        $data->percent=$request->percent;
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    } 
    public function CouponDestroy($id)
    {
        $data = Coupon::findOrFail($id);
            $res =  $data->delete();
            if ($res) {
                return back()->with('success', 'Request was Successfully deleted!');
            } else {
                return back()->with('alert', 'Problem With Deleting Request');
            }
    } 
    public function uncoupon($id)
    {
        $blog=Coupon::find($id);
        $blog->status=0;
        $blog->save();
        return back()->with('success', 'Coupon has been unpublished.');
    } 
    public function pcoupon($id)
    {
        $blog=Coupon::find($id);
        $blog->status=1;
        $blog->save();
        return back()->with('success', 'Coupon was successfully published.');
    }

    public function Destroy($id)
    {
        $data = Profits::findOrFail($id);
            $res =  $data->delete();
            if ($res) {
                return back()->with('success', 'Request was Successfully deleted!');
            } else {
                return back()->with('alert', 'Problem With Deleting Request');
            }
    } 
    
    public function PlanDestroy($id)
    {
        $data = Plans::findOrFail($id);
        $check=Profits::whereplan_id($id)->get();
        if(count($check)>0){
            return back()->with('alert', 'You can not delete this plan, users have investments on this');
        }else{
            $data->delete();
            return back()->with('success', 'Plan was successfully deleted');
        }
    } 
    
    public function Edit($id)
    {
        $plan=$data['plan']=Plans::findOrFail($id);
        $data['title']=$plan->name;
        return view('admin.investment.edit', $data);
    } 

    public function Update(Request $request)
    {
        $data = Plans::findOrFail($request->id);
        $data->name=$request->name;
        $data->percent=$request->percent;
        $data->min_deposit=$request->min_amount;
        $data->amount=$request->max_amount;
        $data->duration=$request->duration;
        $data->period=$request->period;
        $data->ref_percent=$request->ref_percent;
        $data->compound=$request->compound;
        $data->interest=$request->interest;
        $data->bonus=$request->bonus;
        $data->claim=$request->claim;
        $data->recurring=$request->recurring;
        if(empty($request->status)){
            $data->status=0;	
        }else{
            $data->status=$request->status;
        }
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'plan_'.time().'.png';
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $path = './asset/images/';
            File::delete($path.$data->image);
            $data['image'] = $filename;
        }
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }  
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Image;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index0()
    {
    $data['area']= DB::table('forms')->select('Area')->distinct()->get();
    $user = auth()->user();

    $data['userId']=$user->id;
    //dd($data['area']);
        return view('home',$data);
    }

     public function index()
    {
    
        return view('home2');
    }
    // new...............

    public function thanks()
    {
        return view("thanks");
    }
    // ...............

    public function report()
    {

        $data['areaAccount'] = DB::table('capture_datas')->select('users.name as user','capture_datas.area','capture_datas.account','capture_datas.outlet','capture_datas.perfectServe','capture_datas.remarks','description_details.category','description_details.description','description_details.outletAvailable','description_details.drinksMenu','description_details.price','description_details.visibleBar')->join('description_details', 'capture_datas.id', '=', 'description_details.captureId')->join('users', 'capture_datas.userId', '=', 'users.id')->get();
      $data['areaAccount']= json_encode($data['areaAccount']);
        return view('report',$data);
    }

    public function areaAccount(Request $request)
    {

      $area = $request->area;
     $areaAccount = DB::table('forms')->select('ParentAccount')->distinct()->where('Area',$area)->get();
     
      echo json_encode($areaAccount);
            
    }

     public function excel_download(Request $request)
    {

    $areaAccount = DB::table('capture_datas')->select('users.name as user','capture_datas.area','capture_datas.account','capture_datas.outlet','capture_datas.perfectServe','capture_datas.remarks','description_details.category','description_details.description','description_details.outletAvailable','description_details.drinksMenu','description_details.price','description_details.visibleBar')->join('description_details', 'capture_datas.id', '=', 'description_details.captureId')->join('users', 'capture_datas.userId', '=', 'users.id')->get();
      echo json_encode($areaAccount);
            
    }

    public function accountOutlet(Request $request)
    {

      $account = $request->account;
     $accountOutlet = DB::table('forms')->select('AccountName')->distinct()->where('ParentAccount',$account)->get();
     
      echo json_encode($accountOutlet);
            
    }

   public function compress(Request $request)
    {

        if($request->hasfile('gallery'))
         {
      foreach($request->file('gallery') as $file)
            {
          
                 $image = $file;
    $input['imagename'] = date('d-m-Y').$image->getClientOriginalName();
                $destinationPath = public_path('/images');
        $img = Image::make($image->path());
        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        
            }
        }

        if($request->hasfile('gallery2'))
         {
      foreach($request->file('gallery2') as $file)
            {
          
                 $image = $file;
    $input['imagename'] = date('d-m-Y').$image->getClientOriginalName();
                $destinationPath = public_path('/images');
        $img = Image::make($image->path());
        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        
            }
        }

        if($request->hasfile('gallery3'))
         {
      foreach($request->file('gallery3') as $file)
            {
          
                 $image = $file;
    $input['imagename'] = date('d-m-Y').$image->getClientOriginalName();
                $destinationPath = public_path('/images');
        $img = Image::make($image->path());
        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        
            }
        }
    
            
    }


    public function captureStore(Request $request)
    { 
        $capture_datas = [];
             $capture_datas[] = [

            'userId' => $request->userId,
            'area' => $request->area,
            'account' => $request->account,
            'outlet' => $request->outlet,  
            'perfectServe' => $request->perfectServe, 
            'remarks' => $request->remarks,           
           
            ];
            //echo '<pre>';print_r($capture_datas);

            DB::table('capture_datas')->insert($capture_datas);
            $capture_datasId= DB::table('capture_datas')->max('id');
            $description_details = [];
             for($i=0;$i<count($request['description']);$i++){
             $description_details[] = [

            'captureId' => $capture_datasId,
            'category' => $request['category'][$i],
            'description' => $request['description'][$i],
            'outletAvailable' => $request['outletAvailable'][$i],
            'drinksMenu' => $request['drinksMenu'][$i],
            'price' => $request['price'][$i],            
            'visibleBar' => $request['visibleBar'][$i], 

            ];
        }

        
       if($request->hasfile('gallery'))
         {
            $files = [];$drinkmenus=[];
            foreach($request->file('gallery') as $file)
            {
                $name = date('d-m-Y').$file->getClientOriginalName();
                //$file->move(public_path('images'), $name);  
                $files[] = $name; 

        //          $image = $file;
        // $input['imagename'] = time().'.'.$image->extension();
        //         $destinationPath = public_path('/images');
        // $img = Image::make($image->path());
        // $img->resize(500, 500, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'/'.$input['imagename']);
        // $files[] = $input['imagename'];
            }
            for($j=0;$j<count($request->file('gallery'));$j++){
            $drinkmenus[] = [

            'captureId' => $capture_datasId,
            'image' => $files[$j],
           
            ];
        }
            //echo '<pre>';print_r($drinkmenus);exit;
        DB::table('drinkmenus')->insert($drinkmenus);
         }

         if($request->hasfile('gallery2'))
         {

            $files2 = [];$backbars=[];
            foreach($request->file('gallery2') as $file2)
            {
                $name = date('d-m-Y').$file2->getClientOriginalName();
                //$file2->move(public_path('images'), $name);  
                $files2[] = $name; 

        //         $image = $file2;
        // $input['imagename'] = time().'.'.$image->extension();
        //         $destinationPath = public_path('/images');
        // $img = Image::make($image->path());
        // $img->resize(500, 500, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'/'.$input['imagename']);
        // $files2[] = $input['imagename']; 
            }
            for($k=0;$k<count($request->file('gallery2'));$k++){
            $backbars[] = [

            'captureId' => $capture_datasId,
            'image' => $files2[$k],
           
            ];
        }
            //echo '<pre>';print_r($backbars);exit;
        DB::table('backbars')->insert($backbars);
         }

         if($request->hasfile('gallery3'))
         {

            $files3 = [];$entrances=[];
            foreach($request->file('gallery3') as $file3)
            {
                $name = date('d-m-Y').$file3->getClientOriginalName();
                //$file3->move(public_path('images'), $name);  
                $files3[] = $name; 

        //         $image = $file3;
        // $input['imagename'] = time().'.'.$image->extension();
        //         $destinationPath = public_path('/images');
        // $img = Image::make($image->path());
        // $img->resize(500, 500, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'/'.$input['imagename']);
        // $files3[] = $input['imagename'];  
            }
            for($k=0;$k<count($request->file('gallery3'));$k++){
            $entrances[] = [

            'captureId' => $capture_datasId,
            'image' => $files3[$k],
           
            ];
        }
            //echo '<pre>';print_r($backbars);exit;
        DB::table('entrances')->insert($entrances);
         }
    
        DB::table('description_details')->insert($description_details);

        return redirect()->route('home')->with('success', "Successfully Saved");
    }

    public function memberEdit($id)
    {
        $data['member'] = DB::table('members as m')->select('m.*','m.id as mid')->where('m.id',$id)->get();
        $data['memberDetails'] = DB::table('memberDetails as md')->select('md.*')->where('md.memberId',$id)->get();
         return view('memberEdit',$data);
    }

    public function dataUpd(Request $request)
    {
        $members = [
            'memberName' => $request->memberName,
            'bdate' => $request->bdate,
            'kalariName' => $request->kalariName,
            'occupation' => $request->occupation,
            'age' => $request->age,
            'loc' => $request->loc,
            'region' => $request->region,
            'zip' => $request->zip,
            'zone' => $request->zone,
            'phone' => $request->phone,
            'kerLoc' => $request->kerLoc,
            'email' => $request->email,
            'address' => $request->address,
            'membershipPay' => $request->membershipPay,
            'tripInSummer' => $request->tripInSummer,
            'preferLoc' => $request->preferLoc,
            'budget' => $request->budget,
            'preferMonth' => $request->preferMonth,
            'comment' => $request->comment,
            'status' => $request->status,
            'insurance' => $request->insurance,
        ];
          DB::table('members')->where('id',$request->id)->update($members);
          //echo count($request['memberName2']);exit;
          if($request['memberName2']){ 
           for($k=0;$k<count($request['memberName2']);$k++){
            
            $memberDetails[] = array(
            'memberId' => $request->id,
            'memberName2' => $request['memberName2'][$k],
            'age2' => $request['age2'][$k],
            'occupation2' => $request['occupation2'][$k],
            'phoneNo' => $request['phoneNo'][$k],
            );
        }
        DB::table('memberDetails')->where('memberId',$request->id)->delete(); 
         if($request['memberName2'][0]){
         DB::table('memberDetails')->insert($memberDetails);
     }
      }
        return redirect()->route('memberList')->with('success', "Successfully Updated");
    }

     public function login(Request $request)
    {
        if($request->email=='admin@gmail.com' && $request->password=='123@admin'){
            Session::put('name', 'admin');
        return redirect()->route('memberList')->with('success', "Login Successfully");
        }else{
        return redirect()->back()->with('success', "Email and password is not matched");
        }
    }

    public function memberList()
    {

        $name=Session::get('name');
        if($name=='admin'){
        //Session::put('name', 'user');
        $data['memberList2']=DB::table('members as m')->select('md.*')->join('memberDetails as md', 'm.id', '=', 'md.memberId')->get();
        $data['memberList']=DB::table('members as m')->select('m.*')->get();
        //echo '<pre>';print_r($data['memberList2']);exit;
        return view('memberList',$data);
    }else{
        Session::put('name', 'user');
       return redirect('login0');
    }
    }

     public function dataStore(Request $request)
    {
             $members = [
            'memberName' => $request->memberName,
            'bdate' => $request->bdate,
            'kalariName' => $request->kalariName,
            'occupation' => $request->occupation,
            'age' => $request->age,
            'loc' => $request->loc,
            'region' => $request->region,
            'zip' => $request->zip,
            'zone' => $request->zone,
            'phone' => $request->phone,
            'kerLoc' => $request->kerLoc,
            'email' => $request->email,
            'address' => $request->address,
            'membershipPay' => $request->membershipPay,
            'tripInSummer' => $request->tripInSummer,
            'preferLoc' => $request->preferLoc,
            'budget' => $request->budget,
            'preferMonth' => $request->preferMonth,
            'comment' => $request->comment,
            'status' => $request->status,
            'insurance' => $request->insurance,
        ];
          DB::table('members')->insert($members);  
          //echo '<pre>';print_r($members);exit;
           $maxId= DB::table('members')->max('id');
           if($request['memberName2']){ 
           for($k=0;$k<count($request['memberName2']);$k++){
            $memberDetails = array(
            'memberId' => $maxId,
            'memberName2' => $request['memberName2'][$k],
            'age2' => $request['age2'][$k],
            'occupation2' => $request['occupation2'][$k],
            'phoneNo' => $request['phoneNo'][$k],
            );
        DB::table('memberDetails')->insert($memberDetails);
        }
      }
        return redirect()->route('thanks')->with('success', "Successfully Saved");
    }



}

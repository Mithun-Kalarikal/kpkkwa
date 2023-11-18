@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert" onclick="location.reload();">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
  
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
   
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
   
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
  
@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    Please check the form below for errors
</div>
@endif
    <div class="testbox">
    <form class="form-horizontal"  id="form_customer" action="{{ route('dataUpd') }}"  method="POST"   enctype="multipart/form-data" onsubmit="submit.disabled = true; return true;" >
    @csrf
    <input type="hidden" name="id" value="{{$member[0]->mid}}" required />
      <div class="banner">
        <h1>Internal Members Details - KPKKWA </h1>
      </div>
      <div class="item">
        <p>Primary Member Name<span class="required">*</span> </p>
        <input type="text" name="memberName" value="{{$member[0]->memberName}}" required />
      </div>
      <div class="item">
        <p>Date Of Birth<span class="required"></span> </p>
        <input type="date" name="bdate"  value="{{$member[0]->bdate}}" />
        <!-- <i class="fas fa-calendar-alt"></i> -->
      </div>
      
      <div class="item">
        <p>Enter Kalari Name<span class="required">*</span> </p>
        <input type="text" name="kalariName" value="{{$member[0]->kalariName}}" />
      </div>
      <div class="item">
        <p>Occupation</p>
        <input type="text" name="occupation" value="{{$member[0]->occupation}}"/>
      </div>
      <div class="item">
        <p>Enter Your Age</p>
        <input type="number" name="age" placeholder="Age" value="{{$member[0]->age}}"/>
        <div class="city-item">
          <input type="text" name="loc" placeholder="Current Location" value="{{$member[0]->loc}}"/>
          <input type="text" name="region" placeholder="Region" value="{{$member[0]->region}}"/>
          <input type="text" name="zip" placeholder="Postal / Zip code" value="{{$member[0]->zip}}"/>
          <select name="zone">
            <option >{{$member[0]->zone}}</option>
            <option value="">Choose Zone</option>
            <option value="East Zone">East Zone</option>
            <option value="South Zone">South Zone</option>
            <option value="North Zone">North Zone</option>
            <option value="West Zone">West Zone</option>
           
          </select>
        </div>
      </div>
      <div class="item">
        <p>Phone<span class="required">*</span></p>
        <input type="text" name="phone" value="{{$member[0]->phone}}"/>
      </div>
      <div class="item">
        <p>Kerala Location</p>
        <input type="text" name="kerLoc" value="{{$member[0]->kerLoc}}"/>
      </div>
      <div class="item">
        <p>Email</span></p>
        <input type="text" name="email" value="{{$member[0]->email}}"/>
      </div>
      <div class="item">
        <p>Current Full Adress </p>
        <textarea rows="3" name="address" >{{$member[0]->address}}</textarea>
      </div>
       <h2>Family Member Details</h2>
      <?php if(count($memberDetails)>0){
      for($i=0;$i<count($memberDetails);$i++){ ?>
      <div class="row">
        <div class="col-md-6">  <p>Member Name</p><input type="text" name="memberName2[]" value="{{$memberDetails[$i]->memberName2}}"/></div>
        <div class="col-md-6"><p>Age</p> <input type="text" name="age2[]" value="{{$memberDetails[$i]->age2}}"/></div>
      </div>
      <div class="row">
        <div class="col-md-6"><p>Occupation</p> <input type="text" name="occupation2[]" value="{{$memberDetails[$i]->occupation2}}"/></div>
        <div class="col-md-6"><p>Phone Number</p> <input type="text" name="phoneNo[]" value="{{$memberDetails[$i]->phoneNo}}"/></div>
      </div>
      <?php }
      } ?>
      <div class="container1">
        <div class="wrap">
            <h2>Add members</h2>

        </div>
        <div class="inp-group">

        </div>
        <a href="javascript:void(0);" class="add">Add&plus;</a>
    </div>
    
      
      <div class="question"style="border-bottom: 2px solid rgb(93, 2, 2);">
        <p>Membership Payment<span class="required">*</span></p>
        <div class="question-answer" style="margin-top: 10px; margin-bottom: 25px;">
          <input type="radio" value="Paid" id="radio_1"  name="membershipPay" <?php echo ($member[0]->membershipPay== 'Paid') ?  "checked" : "" ;  ?>/>
          <label for="radio_1" class="radio"><span>Paid</span></label>
          <input type="radio" value="Non Paid" id="radio_2" name="membershipPay" <?php echo ($member[0]->membershipPay== 'Non Paid') ?  "checked" : "" ;  ?>/>
          <label for="radio_2" class="radio"><span>Non Paid</span></label>
        </div>
      </div>
      <div class="question" style="margin-top: 20px;">
        <p>Are You Interested for a Trip in the Summer 2024? </p>
        <div class="question-answer" style="margin-top: 10px;margin-bottom: 25px;">
      <input type="radio" value="Yes" id="radio_3" name="tripInSummer" <?php echo ($member[0]->tripInSummer== 'Yes') ?  "checked" : "" ;  ?>/>
      <label for="radio_3" class="radio"><span>Yes</span></label>
      <input type="radio" value="No" id="radio_4" name="tripInSummer" <?php echo ($member[0]->tripInSummer== 'No') ?  "checked" : "" ;  ?>/>
          <label for="radio_4" class="radio"><span>No</span></label>
        </div>
      </div>
      <div class="item">
        <p>Prefered Location</p>
        <input type="text" name="preferLoc" value="{{$member[0]->preferLoc}}"/>
      </div>
      <div class="item">
        <p>Budget (in Rs)</p>
        <input type="text" name="budget" value="{{$member[0]->budget}}"/>
      </div>
     
    
     
      
      <div class="question">
        <p>Preferred Month</span></p>
        
        <div class="question-answer checkbox-item">
          <div>
            <input type="checkbox" value="May" id="check_1" name="preferMonth" <?php echo ($member[0]->preferMonth== 'May') ?  "checked" : "" ;  ?>/>
            <label for="check_1" class="check"><span>May</span></label>
          </div>
          <div>
            <input type="checkbox" value="April" id="check_2" name="preferMonth" <?php echo ($member[0]->preferMonth== 'April') ?  "checked" : "" ;  ?>/>
            <label for="check_2" class="check"><span>April</span></label>
          </div>
          <div>
         
        </div>

        <div class="question2" style="margin-top: 20px;">
        <p>Are you interested to take an insurance policy through KPKKWA? </p>
        <div class="question-answer2" style="margin-top: 10px;margin-bottom: 25px;">
          <input type="radio" value="Yes" id="radio_5"  name="insurance" <?php echo ($member[0]->insurance== 'Yes') ?  "checked" : "" ;  ?>/>
          <label for="radio_5" class="radio"><span>Yes</span></label>
          <input type="radio" value="No" id="radio_6"  name="insurance" <?php echo ($member[0]->insurance== 'No') ?  "checked" : "" ;  ?>/>
          <label for="radio_6" class="radio"><span>No</span></label>
        </div>
      </div>

        <div class="item">
            <p>Comments | Expertise</span></p>
            <textarea rows="3" name="comment">{{$member[0]->comment}}</textarea>
          </div>
           <p>Status</span></p>
          <select name="status">
          
            @if($member[0]->status=='Active')
            <option selected>Active</option>
            <option >Inactive</option>
            @endif
             @if($member[0]->status=='Inactive')
            <option >Active</option>
            <option selected>Inactive</option>
            @endif
          </select>
        <br />
       
        
        <div class="btn-block">
          <button type="submit" name="submit">UPDATE</button>
        </div>
    </form>
    
    </div>
    <script>
        const addBtn = document.querySelector(".add");

        const input = document.querySelector(".inp-group");

        function removeInput() {
            this.parentElement.remove();
        }

        function addInput() {

            const text = document.createElement("h1");
            text.textContent = "Add Detials of Family Member";


            const name1 = document.createElement("input");
            name1.type = "text";
            name1.placeholder = "Enter Member Name";
            name1.name = "memberName2[]";

            const age = document.createElement("input")
            age.type = "number"
            age.placeholder = "Enter Member Age";
            age.name = "age2[]";


            const occupation = document.createElement("input");
            occupation.type = "text";
            occupation.placeholder = "Enter Occupation";
            occupation.name = "occupation2[]";

            const phone = document.createElement("input");
            phone.type = "text";
            phone.placeholder = "Phone Number";
            phone.name = "phoneNo[]";

            const btn = document.createElement("a");
            btn.className = "delete";
            btn.innerHTML = "&times";
            btn.addEventListener("click", removeInput);

            const flex = document.createElement("div")
            flex.className = "flex";

            input.appendChild(flex);
            flex.appendChild(text)
            flex.appendChild(name1);
            flex.appendChild(age);
            flex.appendChild(occupation);
            flex.appendChild(phone);

            flex.appendChild(btn);

        }




        addBtn.addEventListener("click", addInput);
    </script>
  </body>
</html>
@endsection
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
<body style="background-color:white;">
 <div  style="background-color: white;width: 90%;margin-left: 30px;margin-top:30px;width:95%;overflow-x: scroll;">
<table id="example" class="display nowrap table table-bordered table-striped" >
        <thead style="background-color: #a20505;color: white;">
            <tr>
                <th>SNo</th>
                <th>Member Name</th>
                <th style="display:none;">Date Of Birth</th>
                <th>Kalari Name</th>
                <th>Occupation</th>
                <th style="display:none;">Age</th>
                <th>Location</th>
                <th style="display:none;">Region</th>
                <th style="display:none;">Zip</th>
                <th style="display:none;">Zone</th>
                <th>Phone</th>
                <th style="display:none;">Kerala Location</th>
                <th>Email</th>
                <th style="display:none;">Address</th>
                <th style="display:none;">Membersip Pay</th>
                <th style="display:none;">Summer Trip</th>
                <th style="display:none;">Prefer Loc</th>
                <th style="display:none;">Budget</th>
                <th style="display:none;">Prefer Month</th>
                <th style="display:none;">Comments</th>
                <th>Status</th>
                <th style="display:none;">Family members</th>
                <th width="5%">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($memberList)
           
            @foreach($memberList as $ml)
            <tr>
                <td>{{$ml->id}}</td>
                <td>{{$ml->memberName}}</td>
                <td style="display:none;">@if($ml->bdate){{date("d-m-Y", strtotime($ml->bdate))}}@endif</td>
                <td>{{$ml->kalariName}}</td>
                <td>{{$ml->occupation}}</td>
                <td style="display:none;">{{$ml->age}}</td>
                <td>{{$ml->loc}}</td>
                <td style="display:none;">{{$ml->region}}</td>
                <td style="display:none;">{{$ml->zip}}</td>
                <td style="display:none;">{{$ml->zone}}</td>
                <td>{{$ml->phone}}</td>
                <td style="display:none;">{{$ml->kerLoc}}</td>
                <td>{{$ml->email}}</td>
                <td style="display:none;">{{$ml->address}}</td>
                <td style="display:none;">{{$ml->membershipPay}}</td>
                <td style="display:none;">{{$ml->tripInSummer}}</td>
                <td style="display:none;">{{$ml->preferLoc}}</td>
                <td style="display:none;">{{$ml->budget}}</td>
                <td style="display:none;">{{$ml->preferMonth}}</td>
                <td style="display:none;">{{$ml->comment}}</td>
                <td>{{$ml->status}}</td>
                <td style="display:none;">
                 <?php if($memberList2){
                 for($i=0;$i<count($memberList2);$i++){ ?>
                    @if($ml->id == $memberList2[$i]->memberId)
                        Name: {{$memberList2[$i]->memberName2}}, Age: {{$memberList2[$i]->age2}}, Occupation: {{$memberList2[$i]->occupation2}}, Phone: {{$memberList2[$i]->phoneNo}} |
                        @endif
                   
                <?php } } ?>
                 </td>
            <td><a href="{{url('memberEdit')}}/{{$ml->id}}"><button class="btn-sm btn-success">Edit</button></a></td>
            </tr>
           
            @endforeach
            @else
            <tr><td colspan="8">No Datas</td></tr>
            @endif
            
        </tbody>
        
    </table>
</div>
</body>
    <script>
        $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    });
    </script>
    
@endsection
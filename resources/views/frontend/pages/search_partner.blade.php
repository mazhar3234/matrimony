@extends('frontend.master')
@section('content')
<style type="text/css">
  .grid_3 {
    padding: 40px 0px;
  }
  .col_3 {
    margin-bottom: 0px;
  }
  .profile_search1 input[type="number"] {
    padding: 10px 2%;
    width: 77%;
    margin-right: 10px;
    font-size: 12px;
    max-width: 96%;
    outline: none;
    border: 1px solid #ddd;
    display: inline-block;
}
</style>
<div class="grid_3">
  <div class="container">

   <div class="col-md-3 col_5">
    
      <h4>Search Matches</h4>
     <div class="profile_search1">
     {!! Form::open(['url' => 'search-profile-new','method'=>'post']) !!}
            <input type="number" name="profile_id" size="30" required="" placeholder="Enter Profile ID :">
            <input type="submit" value="Go">
          {!! Form::close() !!}
   </div>
        <h4>Filter Matches</h4>
            <?php 
$location=DB::table('tbl_divisions')->where('status',1)->get();
$married_status=DB::table('tbl_marital_status')->where('status',1)->get();
$occupation=DB::table('tbl_occupation')->where('status',1)->get();
$education=DB::table('tbl_education_qualification')->where('status',1)->get();


    ?>
    {!! Form::open(['url' => 'search-partner-list','method'=>'post']) !!} 
     <ul class="menu">
    <li class="item1"><h3 class="m_2">I am looking for :</h3>
      <ul class="cute">
      <select name="sex" required="">
          <option value="">* Select Gender</option>
          <option value="1">Bride</option>
          <option value="2">Groom</option>
        </select>
      </ul>
    </li>
    <li class="item1"><h3 class="m_2">Located In :</h3>
      <ul class="cute">
      <select name="location" required="">
          <option value="">* Select Location</option>
          @foreach($location as $ll)
          <option value="{{$ll->division_id}}">{{$ll->division_name}}</option>
          @endforeach
               </select>
      </ul>
    </li>
    <li class="item1"><h3 class="m_2">Occupation :</h3>
      <ul class="cute">
              <select name="occupation" required="">
          <option value="">* Select Interest</option>
           @foreach($occupation as $oc)
          <option value="{{$oc->occupation_id}}">{{$oc->occupation}}</option>
@endforeach
               </select>
      </ul>
    </li>
    <li class="item1"><h3 class="m_2">Age :</h3>
      <ul class="cute">
      <input class="transparent" placeholder="From:" id="min_age" name="min_age" style="width: 34%;" type="number" min="0" required="" >&nbsp;-&nbsp;<input class="transparent" placeholder="To:" name="max_age" style="width: 34%;" type="number" id="max_age" onblur="checkAge()" max="100" required="" >
      </ul>
    </li>
    <li class="item1"><h3 class="m_2">Marital Status :</h3>
      <ul class="cute">
        <select name="married_status" required="">
          <option value="">* Select Status</option>
          @foreach($married_status as $ms)
          <option value="{{$ms->marital_status_id}}">{{$ms->marital_status}}</option>
          @endforeach

        </select>
      </ul>
    </li>
    <li class="item1"><h3 class="m_2">Education</h3>
      <ul class="cute">
     <select name="education" required="">
          <option value="">* Select Education</option>
          @foreach($education as $ed)
          <option value="{{$ed->education_qualification_id}}">{{$ed->education_qualification}}</option>
          @endforeach

        </select>
      </ul>
    </li>

    <input type="submit" class="btn btn-md btn-block btn-success"  value="Search Partner">
          {!! Form::close() !!}

    </ul>
   </div>
   <div class="col-md-9 members_box">
            <h1 class="text-center">Our Members</h1>
        <div class="heart-divider">
      <span class="grey-line"></span>
      <i class="fa fa-heart pink-heart"></i>
      <i class="fa fa-heart grey-heart"></i>
      <span class="grey-line"></span>
        </div>

       <div class="members_box1">
       <div class="col_3 span_3  phone_1">
     <p class="text-center text-justify">
       Matrimony is one of the largest & secured online Matrimonial Site in Bangladesh.We believe in providing a secure, easy to use and convenient matrimonial matchmaking experience to all of our members.
     </p>
       </div>

       <div class="clearfix"> </div>
     </div>
     @if(count($users)>0)
@foreach($users as $uu)
     <div class="profile_top"><a href="view_profile.html">
      <h2>{{1000+$uu->id}}</h2>
      <?php 
$user_photo=DB::table('tbl_photo_gallery')->where('user_id',$uu->id)->get();
// print_r($user_photo);
// exit;
// $photo=reset($user_photo);
// echo $photo;
// exit;
      ?>
      <div class="col-sm-3 profile_left-top">
                  @if(count($user_photo)>0)
  <img style="width: 100%;height: 200px;display: block;margin: 10px auto;"  src="{{asset('public/user/'.$user_photo[0]->photo)}}" />
                @else 
                <img style="width: 100%;height: 200px;display: block;margin: 10px auto;" src="{{asset('public/frontend_assets/images/photo.png')}}"  />
                @endif
      </div>
      <div class="col-sm-3">
        <ul class="login_details1">
       <li>About Myself</li>
       <li><p><?php echo substr($uu->personal_details, 0, 100);?></p></li>
      </ul>
      </div>
      <div class="col-sm-6">
        <table class="table_working_hours">
            <tbody>
              <tr class="opened_1">
            <td class="day_label1">Age  :</td>
            <td class="day_value">
              <?php 
                    if ($uu->dob) {

                      $birthDate = date("Y-m-d", strtotime($uu->dob) );
                      $today = date("Y-m-d");
                      $diff = date_diff(date_create($birthDate), date_create($today));
                      echo $age=$diff->format('%y Year %m Month %d Day');
                    }else {
                      echo "Not Specified";
                    }
                    ?>
            </td>
          </tr>
            <tr class="opened">
            <td class="day_label1">Last Login :</td>
            <td class="day_value">
              <?php 
                    if ($uu->last_login) {
                      $today = date("Y-m-d h:i:s");
                      $diff = date_diff(date_create($uu->last_login), date_create($today));
                      echo $age=$diff->format('%h Hours Ago');
                    }else {
                      echo "Not Specified";
                    }


                    ?>
            </td>
          </tr>
            <tr class="opened">
            <td class="day_label1">Religion :</td>
            <td class="day_value">
              @if($uu->religion)
                    <?php 
                    $religion_own=DB::table('tbl_religion')->where('religion_id',$uu->religion)->first();
                    echo $religion_own->religion_name;

                    ?>
                    @else 
                    Not Specified
                    @endif
            </td>
          </tr>
            <tr class="opened">
            <td class="day_label1">Marital Status :</td>
            <td class="day_value">
              @if($uu->married_status)
                    <?php 

                    $married_status_own=DB::table('tbl_marital_status')->where('marital_status_id',$uu->married_status)->first();
                    echo $married_status_own->marital_status;

                    ?>
                    @else 
                    Not Specified
                    @endif
            </td>
          </tr>
            <tr class="opened">
            <td class="day_label1">Location :</td>
            <td class="day_value">
              @if($uu->location)
                    <?php 
                    $location_own=DB::table('tbl_divisions')->where('division_id',$uu->location)->first();
                    echo $location_own->division_name;

                    ?>
                    @else 
                    Not Specified
                    @endif
            </td>
          <tr class="closed">
                  <td class="day_label">Height (In Cm):</td>
                  <td class="day_value closed"><span>
                    @if($uu->height)
                    {{$uu->height}}
                    @else
                    Not Specified
                    @endif
                  </span></td>
                </tr>
            <tr class="closed">
            <td class="day_label1">Education :</td>
            <td class="day_value closed"><span>
              @if($uu->education)
                    <?php 
                    $education_own=DB::table('tbl_education_qualification')->where('education_qualification_id',$uu->education)->first();
                    echo $education_own->education_qualification;

                    ?>
                    @else 
                    Not Specified
                    @endif
            </span></td>
          </tr>
          </tbody>
       </table>
       <div class="buttons">
         <div class="vertical">Send Mail</div>
         <div class="vertical">Shortlisted</div>
         <div class="vertical">Send Interest</div>
       </div>
      </div>
      <div class="clearfix"> </div>
    </a></div>
  
@endforeach
@else 
<h3>There is no search found!!</h3>
@endif
   <div class="row">
     <div class="col-md-12 text-center">
       {{ $users->links() }}
     </div>
   </div>
   </div>

   <div class="clearfix"> </div>
  </div>
</div>

@endsection
@extends('layouts.app')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<style media="screen">
.edit_btn_container {
  position: relative;
}
.edit_btn {
  position: absolute;
  right: 0px;
  top: 0px;
  /* align-items: center; */
  transform: translate(0,10%);
}
img{
  width: 100%;
  height: 100%;
}
.profile_img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  border: 1px solid black;
  overflow: hidden;
}
</style>
@endsection

@section('content')

<div class="card">
  <div class="card-header edit_btn_container">
    Profile
    @if(Auth::user()->teacherProfile)
    <a href="{{ route('teacherProfile.edit',['teacherProfile'=>Auth::user()->teacherProfile]) }}" class="btn btn-info edit_btn">Edit</a>
    @else
    <a href="{{ route('teacherProfile.create') }}" class="btn btn-info edit_btn">Edit</a>
    @endif
  </div>

  <div class="card-body">

    <div class="d-flex justify-content-center mb-2">
      <div class="profile_img d-flex align-items-end">
        @if($user->teacherProfile)
        <img src="{{ asset($user->teacherProfile->avatar) }}" alt="">
        @else
        <img src="{{ asset('img/blank_person.png') }}" alt="">
        @endif
      </div>

    </div>

    <table class="table">
      <tr>
        <td>Name</td>
        <td>{{ $user->name }}</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>{{ $user->email }}</td>
      </tr>
      <tr>
        <td>Phone</td>
        
        <td>
        @if($user->profile)
        {{ $user->profile->phone }}
        @endif
        </td>
      </tr>
      <tr>
        <td>Profession</td>
        <td>
        @if($user->profile)
        {{ $user->profile->profession }}
        @endif
        </td>

      </tr>
      <tr>
        <td>Address</td>
        <td>
        @if($user->profile)
        {{ $user->profile->address }}
        @endif
        </td>
      </tr>
      <tr>
        <td>Birthdate</td>
        <td>
        @if($user->profile)
        {{ $user->profile->birthdate }}
        @endif
        </td>
      </tr>
      <tr>
        <td>Age</td>
        <td>
        @if($user->profile)
          <?php
          $age = $user->profile->age;
          $year = intdiv($age,365);
          if($year == 0)
          {
            $age = $age%365;
            $month = intdiv($age,30);
            if($month == 0)
            {
              $age = $age%30;
              $week = intdiv($age,7);
              if($week == 0)
              {
                echo $age." Days";
              }
              else
              {
                echo $week." Weeks";
              }
            }
            else {
              echo $month." Months";
            }
          }
          else {
            echo $year." Year";
          }

          ?>
          @endif

        </td>
      </tr>
      <tr>
        <td>Years of experience</td>
        <td>
          @if($user->teacherProfile)
          {{ $user->teacherProfile->year_of_experience }}
          @endif
        </td>
      </tr>
      <tr>
        <td>Specilization</td>
        <td>
          @if($user->teacherProfile)
          {!! $user->teacherProfile->specilization !!}
          @endif
        </td>
      </tr>
    </table>

  </div>
</div>

@endsection

@section('script')
<script>
  $('#experience').summernote({
    placeholder: 'Hello Bootstrap 4',
    tabsize: 2,
    height: 100
  });
</script>
@endsection

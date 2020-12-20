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
</style>
@endsection

@section('content')

<div class="card">
  <div class="card-header edit_btn_container">
    Profile
    @if(Auth::user()->studentProfile)
    <a href="{{ route('studentProfile.edit',['studentProfile'=>Auth::user()->studentProfile]) }}" class="btn btn-info edit_btn">Edit</a>
    @else
    <a href="{{ route('studentProfile.create') }}" class="btn btn-info edit_btn">Edit</a>
    @endif
  </div>

  <div class="card-body">

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
        <td>{{ $user->phone }}</td>
      </tr>
      <tr>
        <td>Profession</td>
        <td>{{ $user->profession }}</td>
      </tr>
      <tr>
        <td>Address</td>
        <td>{{ $user->address }}</td>
      </tr>
      <tr>
        <td>Birthdate</td>
        <td>{{ $user->birthdate }}</td>
      </tr>
      <tr>
        <td>Age</td>
        <td>{{ $user->age }}</td>
      </tr>
      <tr>
        <td>Class</td>
        <td>
          @if($user->studentProfile)
          {{ $user->studentProfile->class }}
          @endif
        </td>
      </tr>
      <tr>
        <td>Institute</td>
        <td>
          @if($user->studentProfile)
          {{ $user->studentProfile->institute }}
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

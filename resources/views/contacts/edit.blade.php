@extends('contacts.layout')
@section('content')
 
<div class="registration-form">
  <h2>Edit Table</h2>
      
      <form action="{{ url('profile/' .$contacts->studID) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
      
        

        <input type="text" class="input" name="studID" value="{{$contacts->studID}}" required="required"> <br>
                    <input type="text" class="input" name="firstName" value="{{$contacts->firstName}}" required="required"><br>
                    <input type="text" class="input" name="lastName" value="{{$contacts->lastName}}" required="required"><br>
                    <input type="text" class="input" name="MI" value="{{$contacts->MI}}" required="required"><br>
                    <input type="text" class="input" name="course" value="{{$contacts->course}}" required="required"><br>
                    <input type="text" class="input" name="yearlevel" value="{{$contacts->yearlevel}}" required="required"><br>
                    <button type="submit" value="" class="submit-btn">Update</button></br></br> 
    </form>
 
</div>
 
@stop
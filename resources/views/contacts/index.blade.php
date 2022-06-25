@extends('contacts.layout')
@section('content')

<?php
$file=file('cache/cache.txt');
$_SESSION['studID'] = $file[0];
$_SESSION['lastName'] = $file[1];


$ta = DB::table('contacts')->where('studID',$_SESSION['studID'] )->get();
$count = DB::table('contacts')->where('studID',$_SESSION['studID'])->count();

if ( $count> 0) {
foreach ($ta  as $stud){
?>
    <div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="box">
                    <img class="profile-pic" src="{{url('img/profile.jpeg')}}" alt="">
                    <h2><span>Hello </span><?php echo $stud->firstName . " ".$stud->lastName ; ?></h2>
                    <p><?php echo $stud->course . "- ". $stud->yearlevel ; ?></p>

                    </div>
                    
                    <br> <br>


                    <?php } ?>
                    <h1 class="table-title">Table</h1>
                        <div class="table-responsive">
                            <table id="table" class="table table-hover table-dark">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>MI.</th>
                                        <th>Course</th>
                                        <th>Year Level</th>
                                        <th>User Level</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $item)
                                    <tr>
                                        <td>{{ $item->studID }}</td>
                                        <td>{{ $item->firstName }}</td>
                                        <td>{{ $item->lastName }}</td>
                                        <td>{{ $item->MI }}</td>
                                        <td>{{ $item->course}}</td>
                                        <td>{{ $item->yearlevel }}</td>
                                        <td>{{ $item->userlevel }}</td>
 
                                        <td>
   
                                            <a href="{{ url('/profile/' . $item->studID . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/profile' . '/' . $item->studID) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;are you sure you want to delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                    <form action="{{ url('/') }}">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(&quot;are you sure you want to logout?&quot;)">Logout</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
<?php 
}else{

    echo "<script>window.location.href='/';</script>";
}

?>
    
@endsection
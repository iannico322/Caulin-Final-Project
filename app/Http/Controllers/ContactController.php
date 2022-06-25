<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{


    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index')->with('contacts', $contacts);
    }


    public function create()
    {
        echo "<script>alert('Successfully Sign Up');</script>";
        return view('/');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        Contact::create($input);
        return redirect('/')->with('flash_message', 'Contact Addedd!');
    }

    public function logIn(Request $request)
    {
        $input = $request->all();
        Contact::create($input);
        return redirect('profile')->with('flash_message', 'Contact Addedd!');
    }



    public function show($studID)
    {
        $contact = Contact::find($studID);
        return view('contacts.show')->with('contacts', $contact);
    }


    public function edit($studID)
    {
        $contact = Contact::find($studID);
        return view('contacts.edit')->with('contacts', $contact);
    }


    public function update(Request $request, $studID)
    {
        $contact = Contact::find($studID);
        $input = $request->all();
        $contact->update($input);
        return redirect('profile')->with('flash_message', 'Contact Updated!');
    }


    public function destroy($studID)
    {
        Contact::destroy($studID);
        return redirect('profile')->with('flash_message', 'Contact deleted!');
    }


    function userlogIn(Request $req)
    {

        $data = $req->input();
        $comp = DB::table('contacts')->where('studID', $data['studID'])->where('lastName', $data['lastName'])->get();

        $count = DB::table('contacts')->where('studID', $data['studID'])->where('lastName', $data['lastName'])->count();

        if ($count > 0) {
            foreach ($comp as $row1) {
?>

                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
                    <link rel="stylesheet" href="css/authentication.css">
                    <title>authenticating <?php echo $row1->studID; ?></title>
                </head>

                <body>
                    <h4>Welcome back,<br> <?php echo $row1->lastName; ?></h4>
                    <button onclick="window.location.href='profile'" class="btn btn-success">Proceed</button>
                </body>

                </html>

<?php

            }

            $myfile = fopen("cache/cache.txt", "w") or die("Unable to open file!");
            $txt =  $data['studID'] . "\n";
            fwrite($myfile, $txt);
            $txt = $data['lastName'];
            fwrite($myfile, $txt);
            fclose($myfile);
        } else {
            echo "<script>alert('Invalid ID or Password, please try again!');</script>";
            echo "<script>window.location.href='/';</script>";
        }
    }
}
?>
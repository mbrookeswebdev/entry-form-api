<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PersonDetails;
use Stevebauman\Purify\Purify;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $sanitizer = new Purify();
        $person = new PersonDetails();
        //validate received data
        $input = $request->all();
        $validator = Validator::make($input, [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
            'dob' => 'required'
        ]);

        if ($validator->fails()) {
            return http_response_code(500);
        } else {
            //sanitize data
            $firstName = $request->input('firstName');
            $lastName = $request->input('lastName');
            $email = $request->input('email');
            $mobile = $request->input('mobile');
            $gender = $request->input('gender');
            $dob = $request->input('dob');
            $comments = $request->input('comments');
            $finalComments = $request->input('finalComments');

            $person->firstName = $sanitizer->clean($firstName);
            $person->lastName = $sanitizer->clean($lastName);
            $person->email = $sanitizer->clean($email);
            $person->mobile = $sanitizer->clean($mobile);
            $person->gender = $sanitizer->clean($gender);
            $person->dob = $sanitizer->clean($dob);
            $person->comments = $sanitizer->clean($comments);
            $person->finalComments = $sanitizer->clean($finalComments);
            //save data into the database
            $person->save();

            if ($person) {
                return http_response_code(200);
            } else {
                return http_response_code(500);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        //
    }
}

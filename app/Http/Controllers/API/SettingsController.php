<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $settings = Settings::all();

        return response()->json($settings, 200);
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $settings = Settings::first();

        $this->validate($request , [

            'app_name' => 'nullable|max:100|string',
            'email' => 'required|max:100|email',
            'phone' => 'required|numeric',
            'address' => 'nullable|max:100|string',
            
       

            'mail_mailer' => 'nullable|max:100|string',
            'mail_host' => 'nullable|max:100|string',
            'mail_port' => 'nullable|numeric',
            'mail_username' => 'nullable|string',
            'mail_password' => 'nullable|string',
            'mail_encryption' => 'nullable|string',
            'mail_from_address' => 'nullable|string',
            'mail_from_name' => 'nullable|string',
        ]);

        if ($settings == null) {
            # create
            $settings = Settings::create([
                'app_name' => $request['app_name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'address' => $request['address'],

                
                'mail_mailer' => $request['mail_mailer'],
                'mail_host' => $request['mail_host'],
                'mail_port' => $request['mail_port'],
                'mail_username' => $request['mail_username'],
                'mail_password' => $request['mail_password'],
                'mail_encryption' => $request['mail_encryption'],
                'mail_from_address' => $request['mail_from_address'],
                'mail_from_name' => $request['mail_from_name'],
                
            ]);

            return response()->json('Success.. Settings saved!', 200);
            
        } else{
            // update
            $settings->app_name = $request->app_name;
            $settings->email = $request->email;
            $settings->phone = $request->phone;
            $settings->address = $request->address;

            $settings->mail_mailer = $request->mail_mailer;
            $settings->mail_host = $request->mail_host;
            $settings->mail_port = $request->mail_port;
            $settings->mail_username = $request->mail_username;
            $settings->mail_password = $request->mail_password;
            $settings->mail_encryption = $request->mail_encryption;
            $settings->mail_from_address = $request->mail_from_address;
            $settings->mail_from_name = $request->mail_from_name;

            $settings->save();
            
            return response()->json('Success.. Settings updated!', 200);
            
        }

        return response()->json('Error.. Settings not saved or updated!', 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $settings = Settings::findOrFail($id);

        return response()->json($settings, 200);
    }

   

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $settings = Settings::findOrFail($id);

        if ($settings !== null) {
            # code...
            $settings->delete();

            return response()->json('Success.. Deleted!', 200);
        }

        return response()->json('Error.. Not Deleted!', 401);
    }
}

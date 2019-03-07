<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $contacts = Contact::orderBy('created_at','desc')->Paginate(10);
        return view('Pages.contacts')->with('contacts',$contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Home.add-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'Name'=>'required',
            'Number'=>'required'
        ]);

        $user_id = 1;

        $contact = new Contact;
        $contact->name = $request->input('Name');
        $contact->number = $request->input('Number');
        $contact->email =  $request->input('Email');
        $contact->user_id = $user_id;
        //$post->user_id = auth()->user()->id;
        $contact->save();
        //return view('Home.phonebook');
        return redirect('/contacts')->with('success','Contact Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('Home.phonebook')->with('contact',$contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $contact = Contact::find($id);

        //auth user to post
        if(auth()->user()->id !== $contact->user_id) {
            return redirect('/Home')->with('error','Unauthorized Page');
        }

        return view('Pages.edit')->with('contact',$contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Name'=>'required',
            'Number'=>'required'
        ]);

        $contact = Contact::find($id);
        //$contact = new Contact;
        $contact->name = $request->input('Name');
        $contact->number = $request->input('Number');
        $contact->email =  $request->input('Email');
        $contact->user_id = auth()->user()->id;
        
        $contact->save();
        return redirect('/contacts')->with('success','Contact Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        //auth user to contact
        if(auth()->user()->id !== $contact->user_id) {
            return redirect('/contacts')->with('error','Unauthorized Page');
        }
        
        $contact->delete();
        return redirect('/contacts')->with('success','contact deleted');
    }
}

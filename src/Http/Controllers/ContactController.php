<?php

namespace Humweb\Contact\Http\Controllers;

use Humweb\Contact\Facades\ContactMailer;
use Humweb\Contact\Http\Requests\ContactFormRequest;
use Humweb\Core\Http\Controllers\Controller;


class ContactController extends Controller
{

    public function getForm()
    {
        return $this->setContent('contact::form');
    }

    /**
     * Submit the contact form.
     *
     * @param \Humweb\Contact\Http\Requests\ContactFormRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postSend(ContactFormRequest $request)
    {

        ContactMailer::send($request->only(array_keys($request->rules())));

        return redirect('/')->with('success', 'Thank you, Your message was sent successfully.');
    }
}

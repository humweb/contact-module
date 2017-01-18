<?php

namespace Humweb\Contact\Http\Controllers;

use Humweb\Contact\Facades\ContactMailer;
use Humweb\Contact\Http\Requests\ContactFormRequest;
use Humweb\Core\Http\Controllers\Controller;
use Humweb\Menus\Models\MenuItem;

class ContactController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $menu = MenuItem::build_navigation(1);
        $this->viewShare('menu', $menu);
    }
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
    public function postContact(ContactFormRequest $request)
    {
        ContactMailer::send($request->only(array_keys($request->rules())));

        return redirect('/')->with('success', 'Thank you, Your message was sent successfully.');
    }
}

<?php

namespace Humweb\Tests\Contact;

use Humweb\Contact\ContactMailer;
use Humweb\Contact\Mail\Contact;
use Humweb\Contact\Mail\ThankYou;
use Humweb\Settings\Setting;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Mockery as m;

class ContactMailerTest extends TestCase
{

    /**
     * @test
     */
    public function it_sends_mail()
    {

        // Setup
        Mail::fake();

        $data = [
            'first_name' => 'foo',
            'last_name'  => 'bar',
            'phone'      => '1231231234',
            'email'      => 'mock@mail.com',
            'body'       => 'What is the meaning of life.',
            'question'   => 'What is the meaning of life.'
        ];

        $email      = 'foo@mail.com';
        $settings   = m::mock(Setting::class);
        $collection = m::mock(Collection::class);
        $settings->shouldReceive('getSection')->once()->with('contact')->andReturn($collection);
        $collection->shouldReceive('get')->once()->with('contact.thank_you_mail')->andReturn('send_email');
        $collection->shouldReceive('get')->once()->with('contact.template_thank_you')->andReturn('What is the meaning of life.');
        $collection->shouldReceive('get')->once()->with('contact.email')->andReturn($email);

        // Action
        $subject = new ContactMailer($settings);
        $subject->send($data);

        // Expect
        Mail::assertSent(Contact::class);
        Mail::assertSent(ThankYou::class);
        $this->assertEquals($data, $subject->getData());
    }
}

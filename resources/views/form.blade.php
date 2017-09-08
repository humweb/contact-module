@section('title')
    Contact Us :
    @parent
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
            <form action="{{ URL::route('post.contact') }}" method="POST">
                {{ csrf_field() }}
                <div class="card card-default">
                    <div class="card-header">
                        <h4>Contact Us</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input name="first_name" id="first_name" value="{!! old('first_name') !!}" type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input name="last_name" id="last_name" value="{!! old('last_name') !!}" type="text" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" id="email" value="{!! old('email') !!}" type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input name="phone" id="phone" value="{!! old('phone') !!}" type="text" class="form-control" placeholder="555-555-5555">
                        </div>
                        <div class="form-group">
                            <label for="question">Message</label>
                            <textarea name="question" id="question" class="form-control" placeholder="Message" rows="8">{!! old('question') !!}</textarea>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-primary" type="submit">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
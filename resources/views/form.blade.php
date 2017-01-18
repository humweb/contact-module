@section('content')
    <form action="{{ URL::route('post.contact') }}" method="POST">

        {{ csrf_field() }}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Contact</h4>
            </div>
            <div class="panel-body">

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

                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control" placeholder="Message" rows="8">{!! old('message') !!}</textarea>

                </div>
            </div>
            <div class="panel-footer text-center">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-rocket"></i> Submit</button>
            </div>
        </div>
    </form>
@endsection
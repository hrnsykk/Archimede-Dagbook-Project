@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-header d-flex align-items-center justify-content-between">
                        Settings van {{ Auth::user()->name }}
                    </div>

                    @if(session("success"))
                        <div class="m-3">
                            <div class="alert alert-success m-0"> {{ session("success") }}</div>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="card mb-2">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="card-title p-0 m-0">Reset Password</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route("update-password" , Auth::user()->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="new-password" class="form-label">New Password</label>
                                        <input type="password" id="new_password" name="password" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputPassword5" class="form-label">Confirm New Password</label>
                                        <input type="password" id="confirm-new-password" name="password_confirmation" class="form-control">
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="Reset Password">
                                </form>
                            </div>
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                            @if(session("password-status"))
                                <div class="alert alert-success">
                                    {{ session("password-status") }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card mb-2">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="card-title p-0 m-0">Change E-Mail</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route("update-email" , Auth::user()->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="new-email" class="form-label">New E-Mail</label>
                                        <input type="text" id="new_email"  name="new_email" class="form-control" value="{{ Auth::user()->email }}">
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="Reset E-Mail Address">
                                </form>
                            </div>
                            @if(session("email-status"))
                                <div class="alert alert-success">
                                {{ session("email-status") }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


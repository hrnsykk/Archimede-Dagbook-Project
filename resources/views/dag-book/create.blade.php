@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-header">
                       Nieuwe Book
                    </div>

                    <div class="card-body">
                        <form action="{{ route("dag-book.store") }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control d-none" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                             <textarea class="form-control" id="editor" name="content" rows="3"></textarea>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Save">
                        </form>
                    </div>

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger"> {{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

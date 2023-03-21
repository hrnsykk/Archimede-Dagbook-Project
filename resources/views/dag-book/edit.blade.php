@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-header">
                        Dagbook Edit
                    </div>
                    <div class="card-body">
                        <form action="{{ route("dag-book.update", $dagBook->id) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="mb-3 d-none" >
                                <label for="exampleFormControlInput1" class="form-label">User Id</label>
                                <input type="text" class="form-control" name="user_id" id="user_id" value="{{ Auth::user()->id }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="exampleFormControlInput1" value="{{ $dagBook->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                                <textarea class="form-control" id="editor" name="content" rows="3">
                                    {{ $dagBook->content }}
                                </textarea>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Update">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


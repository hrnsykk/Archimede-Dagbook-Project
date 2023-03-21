@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-header d-flex align-items-center justify-content-between">
                        Dagbook van {{ Auth::user()->name }}
                        <a href="{{ route("dag-book.create") }}" class="btn btn-primary btn-sm">Add New Book</a>
                    </div>

                    @if(session("success"))
                        <div class="m-3">
                            <div class="alert alert-success m-0"> {{ session("success") }}</div>
                        </div>
                    @endif

                    <div class="card-body">
                        @foreach($dagbooks as $dagbook)
                            <div class="card mb-2">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="card-title p-0 m-0">{{$dagbook['title']}}</h5>
                                      <span class="text-end">{{ $dagbook['created_at']->format("d/m/Y") }}</span>
                                </div>
                                <div class="card-body">

                                    <p class="card-text">
                                        {!! $dagbook['content'] !!}
                                    </p>
                                    <a href="{{ route("dag-book.edit" , ["dag_book" => $dagbook['id']]) }}"
                                       class="btn btn-primary me-2">Edit</a>
                                    <form action="{{ route("dag-book.destroy" , $dagbook['id']) }}" method="POST"
                                          class="d-inline-flex">
                                        @csrf
                                        @method("DELETE")
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

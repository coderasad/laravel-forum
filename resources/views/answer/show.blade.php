@extends('layouts.app')

@section('content')
    @if(@Auth::user()->role !== 1)
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @foreach($question as $data)
                        <div class="card card-body question-area mb-3">
                            <h4>{{ $data->question_title }}<span class="badge badge-primary ml-2">{{ $data->category->categroy_name }}</span></h4>
                            <p>{{ $data->question_description }}</p>

                            <div>
                                <h5 class="bg-secondary p-2 text-light">Answers</h5>
                                <div class="form-answer">
                                    <form action="{{ route('answer.store') }}" method="post">

                                        @csrf
                                        <textarea type="text" name="answer" placeholder="Write a Answer..." class="form-control @error('answer') is-invalid @enderror"></textarea>
                                        @error('answer')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" name="question_id" value="{{ $data->id }}">
                                        <button class="btn btn-success mt-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection

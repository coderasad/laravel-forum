@extends('layouts.app')

@section('content')
    @if(@Auth::user()->role !== 1)
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card card-body question-area mb-3">
                        <div><a class="btn btn-outline-secondary mb-3" href="{{ url('/') }}">Back</a></div>
                        <h4>{{ $question->question_title }}<span class="badge badge-primary ml-2">{{ $question->category->categroy_name }}</span></h4>
                        <p class="mb-4">{{ $question->question_description }}</p>
                        <div>
                            <h5 class="bg-secondary p-2 text-light">Answers</h5>
                            <div class="form-answer">
                                <form action="{{ route('answer.store') }}" method="post">
                                    @csrf
                                    <textarea type="text" name="answer" placeholder="Write a Answer..." class="form-control @error('answer') is-invalid @enderror"></textarea>
                                    @error('answer')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                                    <button class="btn btn-success mt-2">Submit</button>
                                </form>
                            </div>
                            <div class="answer-list ml-5 mt-4">
                                @foreach($answer as $data)
                                    <div class="row">
                                        <div class="col-2">
                                            <span class="font-weight-bold text-center card card-body">Answer No {{$loop->iteration}}</span>
                                        </div>
                                        <div class="col-10">
                                            <div class="card card-body mb-4">
                                                <h5 class="text-capitalize text-primary">Author Name : {{ $data->user->name }}</h5>
                                                <span class="mb-3 text-secondary"> {{ $data->created_at->diffForHumans()  }}</span>
                                                <p>{{ $data->answer }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

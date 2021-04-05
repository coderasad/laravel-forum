@extends('layouts.app')

@section('content')
    @if(@Auth::user()->role !== 1)
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @foreach($question as $data)
                        <div class="card card-body question-area mb-3">
                            <h4>{{ $data->question_title }}
                                <span class="badge badge-secondary ml-2">{{ $data->category->categroy_name }}</span>
                                <a href="{{ route('like.store') }}" class="like-button badge badge-dark ml-3">&#128077 <span id="like-count">55</span></a>
                            </h4>
                            <p>{{ $data->question_description }}</p>
                            <div>
                                <a href="{{ route('question.show', $data->id) }}" class="btn btn-info my-2">Details</a>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-2">
                        <div class="float-right">{{ $question->links("pagination::bootstrap-4")}}</div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

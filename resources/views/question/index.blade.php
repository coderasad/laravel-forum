@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card col-12 ml-4 py-3">
            <h3>Question List</h3>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Category Name</th>
                        <th>Question Title</th>
                        <th>Question Description</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($question as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->category->categroy_name }}</td>
                            <td><a href="{{ route('question.show', $data->id) }}">{{ Str::of($data->question_title)->words(5, '...') }}</a></td>
                            <td>{{Str::of($data->question_description)->words(15,'...')}}</td>
                            <td>{{ $data->created_at->diffForHumans()  }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                <div class="float-right">{{ $question->links("pagination::bootstrap-4")}}</div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card col-md-6 ml-4 py-3">
            <form action="{{ route('question.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="formGroupExampleInput">Question Name</label>
                    <input name="question_title" type="text" class="form-control @error('question_title') is-invalid @enderror" id="formGroupExampleInput" placeholder="Enter Your Question">
                    @error('question_title')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="question_description">Question Description</label>
                    <textarea name="question_description" type="text" class="form-control @error('question_description') is-invalid @enderror" id="question_description" placeholder="Enter Your Question Description"></textarea>
                    @error('question_description')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Question Description</label>
                    <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror" >
                        <option value="">-- Select Option --</option>
                        @foreach($category as $data)
                            <option value="{{ $data->id }}"> {{ $data->categroy_name }} </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-info shadow">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

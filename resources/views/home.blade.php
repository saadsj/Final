@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Questions
                        <a class="btn btn-primary float-right" href="{{ route('questions.create') }}">
                            Create a Question
                        </a>

                        <div class="card-body">

                            <div class="card-deck">
                                @forelse($questions as $question)
                                    <div class="col-sm-4 d-flex align-items-stretch">
                                        <div class="card mb-3 ">
                                            <div class="card-header">
                                                <small class="text-muted">
                                                    Updated: {{ $question->created_at->diffForHumans() }}
                                                    Answers: {{ $question->answers()->count() }}

                                                </small>
                                            </div>
                                            <div class="card-body">
                                                <div> <p style="float: left;margin-right:15px">
                                                        @if($question->user->avatar == false)
                                                            <img src="https://www.logolynx.com/images/logolynx/d4/d4a80a1f2a0d79a8783d2910f69680cf.png"  height="40" width="40">
                                                        @endif
                                                        @if($question->user->avatar == true)
                                                            <img src="{{$question->user->avatar}}" height="40" width="40">
                                                        @endif
                                                    </p>
                                                    <p class="card-text">{{$question->body}}</p>
                                                </div>

                                            </div>
                                            <div class="card-footer">
                                                <p class="card-text">

                                                    <a class="btn btn-primary float-right" href="{{ route('questions.show', ['id' => $question->id]) }}">
                                                        view
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                               @empty
                                        There are no questions to view,you can create a question.
                                    </a>
                                    @endforelse


                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                {{ $questions->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Question</div>

                    <div class="card-body">


                        <div> <p style="float: left;margin-right:15px">
                                @if($question->user->avatar == false)
                                    <img src="https://www.logolynx.com/images/logolynx/d4/d4a80a1f2a0d79a8783d2910f69680cf.png"  height="40" width="40">
                                @endif
                                @if($question->user->avatar == true)
                                    <img src="{{$question->user->avatar}}" height="40" width="40">
                                @endif
                            </p>
                            <p>{{$question->body}}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary float-right"
                           href="{{ route('questions.edit',['id'=> $question->id])}}">
                            Edit Question
                        </a>

                        {{ Form::open(['method'  => 'DELETE', 'route' => ['questions.destroy', $question->id]])}}
                        <button class="btn btn-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                        </button>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><a class="btn btn-primary float-left"
                                                href="{{ route('answers.create', ['question_id'=> $question->id]) }}">
                            Answer Question
                        </a></div>

                    <div class="card-body">

                        @forelse($question->answers as $answer)
                            <div class="card">

                                

                                <div class="card-body">

                                    <div> <p style="float: left;margin-right:15px">
                                            @if($answer->user->avatar == false)
                                                <img src="https://www.logolynx.com/images/logolynx/d4/d4a80a1f2a0d79a8783d2910f69680cf.png"  height="40" width="40">
                                            @endif
                                            @if($answer->user->avatar == true)
                                                <img src="{{$answer->user->avatar}}" height="40" width="40">
                                            @endif
                                        </p>
                                    <p>{{$answer->body}}</p>
                                </div>
                            </div>

                                <div class="card-footer">

                                    <a class="btn btn-primary float-right"
                                       href="{{ route('answers.show', ['question_id'=> $question->id,'answer_id' => $answer->id]) }}">
                                        View
                                    </a>

                                </div>
                            </div>
                        @empty
                            <div class="card">

                                <div class="card-body"> No Answers</div>
                            </div>
                        @endforelse


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
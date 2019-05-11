@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Answer</div>
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
                        {{ Form::open(['method'  => 'DELETE', 'route' => ['answers.destroy', $question, $answer->id]])}}
                        <button class="btn btn-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                        </button>
                        {!! Form::close() !!}
                        <a class="btn btn-primary float-right" href="{{ route('answers.edit',['question_id'=> $question, 'answer_id'=> $answer->id, ])}}">
                            Edit Answer
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
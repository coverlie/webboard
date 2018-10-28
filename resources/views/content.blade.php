@extends('layouts.app')
@section('content')
<div class='container'>
    <div class="row justify-content-center">
        <div class='col-md-8 col-12'>
            <div class="card">
                <div class="card-body">
                    <h3>{{ $topic->topic }}</h3>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{ $topic->content }}</p>
                        <footer class="blockquote-footer">
                            Post by :  {{ $topic->user->name }}
                            <cite title="Source Title">
                                โพสเมื่อ :  {{ $topic->created_at->diffForHumans() }}
                            </cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    @php
        $i=1;
    @endphp

    @foreach ($topic->comments as $comment)
    <div style='margin-top: 5px;'></div>
        <div class="row justify-content-center">
            <div class='col-md-8 col-12'>
                <div class="card">
                    <div class="card-body">
                        {{ 'ความคิดเห็นที่ :'.$i }}
                        @php
                            $i++;
                        @endphp
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p class="card-text">{{ $comment->comment }}</p>
                            <footer class="blockquote-footer" align='right'>
                                Comment by :{{ $comment->user->name }}
                                <cite title="Source Title">
                                    เมื่อ : {{ $comment->created_at->diffForHumans() }}
                                </cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

        @if (count($errors)>0)
            <div class='alert alert-danger'>
                @foreach ($errors->all() as $row)
                    <p>{{ $row }}</p>
                @endforeach
            </div>
        @endif

    @if (Auth::user())
        <div style='margin-top: 5px;'></div>
        <div class="row justify-content-center">
            <div class='col-md-8 col-12'>
                <div class="card">
                    <div class='col-12'>
                        <form method='post' action='{{ url('comment') }}'>
                             @csrf
                        <div class="form-group">
                            <label for="content">แสดงความคิดเห็น</label>
                            <textarea class="form-control" id="content" rows="5" name='comment' maxlength="1000"></textarea>
                        </div>
                            <input type='hidden' name='user_id' value='{{ Auth::user()->id }}'>
                            <input type='hidden' name='topic_id' value='{{ $topic->id }}'>
                            <input type='submit' value='โพสต์' class='btn btn-success'>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div style='margin-top: 5px;'></div>
        <div class="row justify-content-center">
            <div class='col-md-8 col-12'>
                <div class="card">
                    <div class="card-header">
                        <div style='margin: 10px;'>
                            <p>กรุณาเข้าสู่ระบบ เพื่อแสดงความคิดเห็น</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection


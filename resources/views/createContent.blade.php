@extends('layouts.app')
@section('content')
<div class='container'>

    @if (count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all() as $row)
                <p>{{ $row }}</p>
            @endforeach
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8 col-12">
            <form method='post' action='{{ url('content') }}'>
                @csrf
            <div class="form-group">
                <label for="topic">หัวข้อ</label>
                <textarea class="form-control" id="topic" rows="2" name='topic' maxlength="190"></textarea>
            </div>
            <div class="form-group">
                <label for="content">รายละเอียด</label>
                <textarea class="form-control" id="content" rows="5" name='content' maxlength="1000"></textarea>
            </div>
            <input type='hidden' name='user_id' value='{{ Auth::user()->id }}'>
            <input type='submit' value='โพสต์' class='btn btn-primary'>
            </form>
            <p align='right'>Post By : {{ Auth::user()->name }}</p>
        </div>
    </div>
</div>
@endsection

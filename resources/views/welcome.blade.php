@extends('layouts.app')
@section('content')
<div class='container'>
    <a class='btn btn-outline-primary' href='{{ route("content.create") }}'>
        ตั้งกระทู้
    </a>
    <ul class="list-group">
        @foreach ($topic as $row)
            <li class="list-group-item">
                <a href='content/{{ $row->id }}'>{{ $row->topic }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
@section('js')
<script>
    $(function(){
        $('ul li').hover(function(){
            $(this).addClass('list-group-item-warning');
        },function(){
           $(this).removeClass('list-group-item-warning');
        });
    });
</script>
@endsection

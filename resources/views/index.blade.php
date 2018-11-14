@extends('layouts.app')
@section('content')
<div class='container'>

    <div style='margin-top: 5px;'></div>
    <ul class="list-group">
        @foreach ($topics as $row)
            <li class="list-group-item">
                <h3><a href='content/{{ $row->id }}'>{{ $row->topic }}</a></h3>
                <p>โพสโดย : คุณ {{ $row->user->name }} <span>เมื่อ : {{ $row->created_at->diffForHumans() }}</span></p>
            </li>

        @endforeach
    </ul>

    <div style='margin-top: 10px;'></div>
    {{ $topics->links() }}
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
<style></style>
@endsection

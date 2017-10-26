@extends('layouts.tacostand')
@section('browser_title')
    All the Tacos
@endsection
@section('page_title')
    <h1>🌮Tacos🌮</h1>
    @endsection

@section('content')


    <a href="/create">Add a Taco</a>

    <div class="well">


    <table class="table table-hover">
        <tr>
            <th>Taco #</th>
            <th>Shell</th>
            <th>Meat</th>
            <th>Cheese</th>
            <th>Lettuce</th>
            <th>Sauce</th>
            <th></th>
        </tr>

    @foreach($tacos as $taco)
        <tr>
            <td>{{$taco->id}}</td>
            <td>{{$taco->shell}}</td>
            <td>{{$taco->meat}}</td>
            <td>{{$taco->cheese}}</td>
            <td>{{$taco->lettuce}}</td>
            <td>{{$taco->sauce}}</td>
            <td><a href="/{{$taco->id}}/delete">Delete</a></td>

        </tr>
        @endforeach
    </table>
    </div>
    @endsection
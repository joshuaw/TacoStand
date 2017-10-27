@extends('layouts.tacostand')
@section('browser_title')
    All the Burgers
@endsection
@section('page_title')
    <h1>🍔 Burgers 🍔 </h1>
    @endsection

@section('content')


    <a href="burger/create">Add a Burger</a>

    <div class="well">


    <table class="table table-hover">
        <tr>
            <th>Burger #</th>
            <th>Bun</th>
            <th>Meat</th>
            <th>Cheese</th>
            <th>Lettuce</th>
            <th>Sauce</th>
            <th></th>
        </tr>

    @foreach($burgers as $burger)
        <tr>
            <td>{{$burger->id}}</td>
            <td>{{$burger->bun}}</td>
            <td>{{$burger->meat}}</td>
            <td>{{$burger->cheese}}</td>
            <td>{{$burger->lettuce}}</td>
            <td>{{$burger->sauce}}</td>
            <td><a href="/{{$burger->id}}/delete">Delete</a></td>

        </tr>
        @endforeach
    </table>
    </div>
    @endsection
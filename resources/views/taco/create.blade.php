@extends('layouts.tacostand')
@section('browser_title')
    Add a Taco
    @endsection
@section('page_title')
    <h1>🌮Add a Taco🌮</h1>
@endsection

@section('content')


    <a href="/">Back</a>

    <form class="form-horizontal" action="/" method="post">

        <fieldset>

            <div class="form-group">
                <label for="shell" class="col-lg-2 control-label">Shell</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="shell" name="shell" placeholder="Shell (Soft or Crunchy?)">
                </div>
            </div>
            <div class="form-group">
                <label for="meat" class="col-lg-2 control-label">Meat</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="meat" name="meat" placeholder="Meat (Beef, Chicken, Soylent Green)">
                </div>
            </div>
            <div class="form-group">
                <label for="cheese" class="col-lg-2 control-label">Cheese</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="cheese" name="cheese" placeholder="Cheese">
                </div>
            </div>
            <div class="form-group">
                <label for="lettuce" class="col-lg-2 control-label">Lettuce</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="lettuce" name="lettuce" placeholder="Lettuce">
                </div>
            </div>
            <div class="form-group">
                <label for="sauce" class="col-lg-2 control-label">Sauce</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="sauce" name="sauce" placeholder="Sauce">
                </div>
            </div>
            {{ csrf_field() }}
            <input type="submit" value="Add"/>
        </fieldset>

    </form>


    @endsection
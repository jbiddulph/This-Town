@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="home">Home</a></li>
                        <li class="list-group-item"><a href="home">Home</a></li>
                        <li class="list-group-item"><a href="home">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label for="Title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Description">Description</label>
                            <textarea name="description" id="" cols="30" rows="6" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Image">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Status">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="0">Draft</option>
                                <option value="1">Published</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

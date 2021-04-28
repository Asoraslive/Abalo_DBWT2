@extends('Templates/base_template')
@section('title','Articlecategory')

@section('content')
    <form method="GET" action="{{route('categories.show')}}" class="d-flex justify-content-center">
        <input id="search-text" name="search" class="form-control" type="search" placeholder="Suche nach Artikel" aria-label="Search" style="width: 50vw">
        <button class="btn btn-outline-primary" type="submit">Suchen</button>
    </form>


    @if($categories)
        <table class="table" style="margin:20px 5vw 20px 5vw;width: 90vw">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->ab_name}}</td>

                </tr>
            @endforeach
        </table>
    @endif
@endsection
@section('more_script')

@endsection

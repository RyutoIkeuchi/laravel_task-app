@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" action="{{ route('contact.create') }}">
                     <button type='submit' class="btn btn-primary">
                      新規登録
                     </button>
                    </form>
                    
                     <form method='GET' action="{{route('contact.index')}}" class="d-flex">
                            <input class="form-control me-2" name='search' type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>

                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">氏名</th>
                        <th scope="col">登録日</th>
                        <th scope="col">詳細</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                        <th>{{$contact->id}}</th>
                        <td>{{$contact->your_name}}</td>
                        <td>{{$contact->created_at}}</td>
                        <td><a href="{{route('contact.show',['id'=>$contact->id])}}">詳細をみる</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>

                    {{$contacts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

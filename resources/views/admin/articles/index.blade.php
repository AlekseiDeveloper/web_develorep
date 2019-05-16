@extends('layouts.admin')


@section('content')
    @if($articles)
    <div class="container">
        <div class="row">
            <div class="col-24">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Заголовок</th>
                        <th>Текс</th>
                        <th>Таги</th>
                        <th>Дата создание</th>
                        <th>Функции</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($articles as $article)
                        <tr>
                            <th scope="row">{{ $article->id }}</th>
                            <td><a href="{{ route('admin.articles.show',['article'=> $article->id]) }}">{{ $article->title }}</a></td>
                            <td >{{ mb_strimwidth($article->text, 0, 400, "...") }}</td>
                            <td >
                                @foreach($article->tags as $tag)
                                    @if($article->tags->last()->id === $tag->id)
                                        <span>{{$tag->title }} </span>
                                    @else
                                        <span>{{$tag->title }}, </span>
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $article->created_at }}</td>
                            <td style="
                                        display: flex;
                                        justify-content: space-between;
                                        text-align: center;">
                                <a href="{{ route('admin.articles.show',['article' => $article->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="{{ route('admin.articles.edit',['article' => $article->id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <form action="{{ route('admin.articles.destroy',['article' => $article->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="
                                                                   padding: 0;
                                                                   border: 0;
                                                                   background: none;
                                                                   color: red;
                                        ">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
@endsection
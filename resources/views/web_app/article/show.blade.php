@extends('layouts.main')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-24">
                <div class="title-widget">
                    <h1>{{$article->title}}</h1>
                </div>
            </div>
            <div class="col-xl-18">
                <div class="row">
                    <div class="col-xl-24">
                        <div class="article-detail">
                            <div class="article-detail__date-tags">
                                <span class="date">{{$article->created_at}}</span>
                                <span class="line">/</span>
                                <span class="tags">
                                     @foreach($article->tags as $tag)
                                        @if($article->tags->last()->id === $tag->id)
                                            <span>{{$tag->title }} </span>
                                        @else
                                            <span>{{$tag->title }}, </span>
                                        @endif
                                    @endforeach
                                </span>
                            </div>
                            <div class="article-detail__text">
                               {!! $article->text !!}
                            </div>
                            <div class="link">
                                <a href="{{route('main')}}"> <-- В статьи</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                @guest
                    <div class="to-add-article">
                        <a href="{{ route('login') }}">Редактировать статью</a>
                    </div>

                    @else
                    @if(Auth::user()->role == 'admin')
                        <div class="to-add-article">
                            <a href="{{route('admin.articles.edit',['article' => $article->id])}}">Редактировать статью</a>
                        </div>
                        @else
                        @if($article->user_id == Auth::user()->id )
                            <div class="to-add-article">
                                <a href="{{route('cabinet.articles.edit',['article' => $article->id])}}">Редактировать статью</a>
                            </div>
                            @else
                            <div class="to-add-article">
                                <a href="{{route('cabinet.articles.create')}}">Редактировать статью</a>
                            </div>
                        @endif
                    @endif
                @endguest

                <div class="right-bar">
                    <div class="title-bar">
                        <h3>Теги</h3>
                    </div>
                    <div class="tags">
                        @php
                            $arrayClass = ['tag-big','tag-extra-small','tag-small'];
                            $arrayClass[array_rand($arrayClass)];
                        @endphp
                        @foreach($tags as $tag)
                            @foreach($tag->articles as $article)
                                <a href="{{route('article',['id' => $article->id] )}}" class="{{ $arrayClass[array_rand($arrayClass)] }}">{{$tag->title}}</a>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
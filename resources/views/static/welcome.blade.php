@extends('layouts.forum')
@section('content')
    <div class="columns">
        <div class="column is-4 u-mright-20">
            @include('partials.sidebar')
        </div>
        <div class="column">
            <div id="splash"></div>
            <div id="proposals" {{--style="opacity: 1.0"--}}>
                <div class="column">
                    <div class="content">
                        @foreach($proposals as $proposal)
                            <article class="post">
                                <a href="{{url('proposal/'.$proposal->slug)}}">
                                <span class="subtitle has-text-weight-bold">
                                    {{$proposal->title}}
                                </span>
                                <span
                                  class="tag is-small u-mleft-15 {{$proposal->category_class}}
                                  {{$proposal->category_sub_class}}"
                                >
                                {{substr($proposal->category_short_title,0, 1)}}
                                </span>
                                </a>
                                <p>
                                    {{substr($proposal->body, 0, 220)}}
                                </p>
                                </a>
                                <div class="author controls u-mtop-10 u-mright-10 u-mbottom-10">
                                    <i>Posted by</i>:&nbsp;
                                    <b>
                                        {{$proposal->user_display_name ?? $proposal->user_name }}
                                    </b>
                                    &nbsp;
                                </div>
                                <div class="aggs controls u-mbottom-20">
                            <span class="numVotes">
                                {{$proposal->aggs_total_votes > 0 ? $proposal->aggs_total_votes : ' No'}}
                            </span> votes
                                    <span class="icon u-mleft-20">
                                @if(!isset($proposal->myvote) || $proposal->myvote['vote'] == 0)
                                            <a href="{{route('plainvote')}}?pid={{$proposal->id}}&action=vote">
                                  <i class="fa fa-arrow-alt-circle-up">&nbsp;</i>
                                </a>
                                        @else
                                            <a href="{{route('plainvote')}}?pid={{$proposal->id}}&action=vote">
                                   <i class="fa fa-minus-circle">&nbsp;</i>
                                </a>
                                        @endif
                            </span>
                                    <span className="numDislikes">
                                <span className="icon u-mleft-10 u-mright-5">
                                    @if(isset($proposal->myvote) && $proposal->myvote['dislike'] > 0)
                                        <a href="{{route('plainvote')}}?pid={{$proposal->id}}&action=dislike">
                                            <i class="fas fa-thumbs-up thumb-olive">&nbsp;</i>
                                        </a>
                                    @else
                                        <a href="{{route('plainvote')}}?pid={{$proposal->id}}&action=dislike">
                                            <i class="fas fa-thumbs-down thumb-purple">&nbsp;</i>
                                        </a>
                                    @endif
                                </span>
                                {{$proposal->aggs_total_votes > 0 ? $proposal->aggs_total_dislikes : ' No'}}
                            </span> dislikes
                                    <div class="'icon theworks">
                                        <a class="button" href="#">
                                <span class="icon is-small">
                                   <i class="fas fa-print"> </i>
                                </span>
                                        </a>&nbsp;
                                        <a class="button" href="#">
                                <span class="icon is-small">
                                    <i class="fab fa-twitter"> </i>
                                </span>
                                        </a>&nbsp;
                                        <a class="button" href="#">
                                <span class="icon is-small">
                                    <i class="fab fa-facebook-f"> </i>
                                </span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

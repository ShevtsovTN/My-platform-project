@extends('layouts.layout')

@section('title')

@endsection

@section('content')
    <ul class="nav nav-pills mb-2" id="myTab" role="tablist">
        @foreach($settings as $index => $items)
            <li class="nav-item mr-3" role="presentation">
                <a class="nav-link text-white @if($index == 'base') active @endif bg-dark text-uppercase" id="{{$index}}-tab" data-toggle="tab" href="#{{$index}}" role="tab" aria-controls="{{$index}}" aria-selected="true">{{$index}}</a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content" id="myTabContent">
        @foreach($settings as $index => $items)
            <div class="tab-pane fade @if($index == 'base') show active @endif" id="{{$index}}" role="tabpanel" aria-labelledby="{{$index}}-tab">
                <form action="{{route('setSettings', $id)}}" id="{{$index}}-settings" method="post">
                    @csrf
                    @foreach($items as $item)
                        @switch($item['type'])
                            @case('select')
                            <div class="form-group w-25">
                                <label for="{{$item['name']}}">{{$item['name']}}</label>
                                <select class="form-control" name="{{$item['name']}}" id="{{$item['name']}}">
                                    @foreach($item['options'] as $i => $option)
                                        <option value="{{$i}}">{{$option}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @break

                            @case('checkbox')
                            <div class="form-check">
                                <input class="form-check-input" name="{{$item['name']}}" type="checkbox" value="1" id="{{$item['name']}}">
                                <label class="form-check-label" for="{{$item['name']}}">{{$item['name']}}</label>
                            </div>
                            @break

                            @default
                            <div class="form-group w-25">
                                <label for="{{$item['name']}}">{{$item['name']}}</label>
                                <input type="{{$item['type']}}" class="form-control" name="{{$item['name']}}" id="{{$item['name']}}">
                            </div>
                        @endswitch
                    @endforeach
                    <input type="submit" form="{{$index}}-settings" class="btn btn-dark text-white" value="Save">
                </form>
            </div>
        @endforeach
    </div>
@endsection

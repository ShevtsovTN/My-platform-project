@extends('layouts.layout')

@section('title')

@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('settings', $user) }}
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
                <form action="{{route('setSettings', $user['id'])}}" id="{{$index}}-settings" method="post">
                    @csrf
                    <input type="hidden" name="{{$index}}" value="send">
                    @foreach($items as $item)
                        @switch($item['type'])
                            @case('select')
                            <div class="form-group w-25">
                                <label for="{{$item['name']}}">{{$item['title']}}</label>
                                <select
                                    class="form-control"
                                    name="{{$item['name']}}" id="{{$item['name']}}"
                                >
                                    @foreach($item['options'] as $i => $option)
                                        <option
                                            value="{{$i}}"
                                            @if(!empty($item['value']) && $item['value'] == $i)
                                                selected
                                            @endif
                                        >{{$option}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @break

                            @case('checkbox')
                            <div class="form-check">
                                <input type="hidden" name="{{$item['name']}}" value="0">
                                <input
                                    onchange="changeCheckboxValue(this)"
                                    class="form-check-input"
                                    name="{{$item['name']}}"
                                    type="checkbox"
                                    @if(!empty($item['value']) && $item['value'] == 1)
                                        checked
                                        value="1"
                                    @endif
                                    id="{{$item['name']}}"
                                >
                                <label class="form-check-label" for="{{$item['name']}}">{{$item['title']}}</label>
                            </div>
                            @break

                            @default
                            <div class="form-group w-25">
                                <label for="{{$item['name']}}">{{$item['title']}}</label>
                                <input
                                    type="{{$item['type']}}"
                                    autocomplete="off"
                                    class="form-control"
                                    name="{{$item['name']}}"
                                    id="{{$item['name']}}"
                                    @if(!empty($item['value']))
                                    value="{{$item['value']}}"
                                    @endif
                                >
                            </div>
                        @endswitch
                    @endforeach
                    <input type="submit" form="{{$index}}-settings" class="btn btn-dark text-white" value="Save">
                </form>
            </div>
        @endforeach
    </div>
@endsection

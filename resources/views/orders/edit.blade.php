@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edituj porudzbenicu') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/orders/update/{{ $order->id }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="event" class="col-md-4 col-form-label text-md-right">{{ __('Event') }}</label>

                                <div class="col-md-6">
                                    <select name="event_id" class="form-control" id="exampleFormControlSelect1">
                                        <option value="">- Izaberite event -</option>
                                        @foreach($events as $event)
                                            <option @if($orderEventId == $event->id) selected="selected" @endif value="{{ $event->id }}">{{ $event->naziv }}</option>
                                        @endforeach
                                    </select>
                                    @error('event_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rok_izrade" class="col-md-4 col-form-label text-md-right">{{ __('Rok izrade') }}</label>

                                <div class="col-md-6">
                                    <input id="rok_izrade" type="datetime" class="form-control @error('rok_izrade') is-invalid @enderror" name="rok_izrade" value="{{ old('rok_izrade', $order->rok_izrade) }}" required autocomplete="rok_izrade">

                                    @error('rok_izrade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="napomena" class="col-md-4 col-form-label text-md-right">{{ __('Napomena') }}</label>

                                <div class="col-md-6">
                                    <input id="napomena" type="text" class="form-control @error('napomena') is-invalid @enderror" name="napomena" value="{{ old('napomena', $order->napomena) }}" required autocomplete="napomena">
                                    @error('napomena')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edituj porudzbenicu') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('laravel-translations::app')

@section('content')

    <div class="card mt-5">
        <div class="card-header">
            <h2>Translations of {{ ucfirst($model) }}</h2>
        </div>
        <div class="card-body">
            @foreach($data as $item)
                <hr class="mt-5 mb-5">
                <h5 class="card-title">Item ID: <small>{{ $item->id }}</small></h5>

                @foreach($attributes as $attribute)
                    <form action="{{ route('translations.store', [$model, $item->id, $attribute]) }}" method="post" class="mb-5">
                        <p><strong>Attribute:</strong> {{ $attribute }}</p>

                        <?php
                        $translations = $item->getTranslationsOf
                        ($attribute, $languages, false);
                        ?>

                        @foreach($translations as $key => $translation)
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label">{{ $key}}</label>
                                <div class="col-sm-11">
                                    <input type="text" class="form-control" name="{{ $key }}" value="{{ $translation}}">
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group row">
                            <div class="col offset-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                @endforeach
            @endforeach
        </div>
    </div>

@endsection

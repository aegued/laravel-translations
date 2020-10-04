<?php

namespace Aegued\LaravelTranslations\Controllers;

use Aegued\LaravelTranslations\Translator;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $models = Translator::getTranslatableModels();

        return view('laravel-translations::admin')->with([
            'models' => $models,
        ]);
    }

    public function showTranslations($model)
    {
        $modelFull = "App\\".ucfirst($model);
        $instance = new $modelFull;
        $data = $modelFull::all();
        $attributes = $instance->getTranslatableAttributes();
        $languages = config('translations.locales');

        return view('laravel-translations::translations')->with([
            'model' => $model,
            'data' => $data,
            'attributes' => $attributes,
            'languages' => $languages,
        ]);
    }

    public function saveTranslations(Request $request, $model, $id, $attribute)
    {
        $modelFull = "App\\".ucfirst($model);
        $item = $modelFull::find($id);

        $item->setTranslations($attribute, $request->all(), true);

//        dd($request->all(), $item);
        return back();
    }
}

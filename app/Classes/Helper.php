<?php

use App\Jobs\SendMultiMail;
use App\Mail\SendMailMarkting;
// use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Mail;
use App\Mail\WeHelp;
use App\Models\Notification;
use App\Servicies\Notify;
use Carbon\Carbon;
use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Jobs\SendEmailGifts;
use App\Jobs\sendMailSubscribe;
use App\Mail\BondMail;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\App;

/*curr
|--------------------------------------------------------------------------
| Detect Active Routes Function
|--------------------------------------------------------------------------
|
| Compare given routes with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/

function isActiveRoute($route, $output = "active")
{
    if (\Route::currentRouteName() == $route) return $output;
}

function areActiveRoutes(array $routes, $output = "active show-sub")
{

    foreach ($routes as $route) {
        if (\Route::currentRouteName() == $route) return $output;
    }
}

function areActiveMainRoutes(array $routes, $output = "active")
{

    foreach ($routes as $route) {
        if (\Route::currentRouteName() == $route) return $output;
    }
}

function getSetting($key, $lang = null)
{

    $sittingrepository =  App::make('App\Repositories\Contract\SettingRepositoryInterface');

    if ($lang == null) {

        $setting = $sittingrepository->getWhere([['key', $key]])->first();
    } else {

        $setting = $sittingrepository->getWhere([['key', $key . '_' . $lang]])->first();
    }

    return $setting;
}
function setLang($lang)
{
    if ($lang) {

        app()->setLocale($lang);
    } else {
        app()->setLocale('ar');
    }
    Carbon::setLocale($lang);
}

function transWord($word, $locale = null)
{

    if (!$locale) {
        $locale = app()->getLocale();
    }

    $translationsFile = 'translations.json';

    // Check if the translations file exists, and create it if not
    if (!file_exists($translationsFile)) {
        file_put_contents($translationsFile, json_encode([], JSON_PRETTY_PRINT));
    }

    // Load existing translations from the JSON file
    $translations = json_decode(file_get_contents($translationsFile), true);

    // Check if the translation already exists for the given word and locale
    if (isset($translations[$locale][$word])) {
        $translatedWord = $translations[$locale][$word];
    } else {
        // If not found, translate the word
        $translateClient = new \Stichoza\GoogleTranslate\GoogleTranslate();
        $translatedWord = $translateClient->setSource(null)->setTarget($locale)->translate($word);

        // Save the translated word to the JSON file
        $translations[$locale][$word] = $translatedWord;
        file_put_contents($translationsFile, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    return $translatedWord;
}

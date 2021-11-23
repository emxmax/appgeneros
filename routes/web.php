<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {

    $scopes = 'user-top-read';
    return redirect(
        'https://accounts.spotify.com/authorize' .
        '?response_type=code' .
        '&client_id=' . config('spotify.clientId') .
        ($scopes ? '&scope=' . urlencode($scopes) : '') .
        '&redirect_uri=' . urlencode('http://127.0.0.1:8000/callback')
    );

})->name('login');

Route::get('callback', function()  {
    $code = $_GET['code'];

    $response = Http::withHeaders([
        'Authorization' => 'Basic ' . base64_encode(config('spotify.clientId') . ':' . config('spotify.clientSecret'))
    ])->asForm()
        ->post('https://accounts.spotify.com/api/token', [
            'code' => trim($code),
            'redirect_uri' => 'http://127.0.0.1:8000/callback',
            'grant_type' => 'authorization_code',
        ]);

    if (! $response->ok()) {
        return redirect('/');
    }

    $token = $response->json()['access_token'];

    $profile = Http::withHeaders([
        'Authorization' => 'Bearer ' . $token])
        ->get('https://api.spotify.com/v1/me');

    $responseGenders = Http::withHeaders([
        'Authorization' => 'Bearer ' . $token])
        ->get('https://api.spotify.com/v1/me/top/artists?time_range=long_term&limit=5&offset=0');


    $genders = collect($responseGenders->json()['items'])->map(fn($gender) => $gender['genres']);
    $genders = $genders->flatten(1)->unique()->toArray();

    return view('profile')->with(['profile' => json_encode($profile->json()),'genders' => json_encode($genders)]);
});

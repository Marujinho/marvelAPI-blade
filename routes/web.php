<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('marvelmash', [
        'uses' => 'Character\CharacterController@index'
    ]
)->name('characters.index');

Route::get('update-rank/{win_id}/{lose_id}', [
        'uses' => 'Rank\RankController@updateRank'
    ]
)->name('rank.updateRank');

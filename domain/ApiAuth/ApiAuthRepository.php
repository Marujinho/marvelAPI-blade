<?php

namespace Domain\ApiAuth;


class ApiAuthRepository
{

  public function marvelApiAuth()
  {
    $timestamp = now()->timestamp;
    $pvtKey = env('MARVEL_PVT_KEY');
    $publicKey = env('MARVEL_PUBLIC_KEY');
    $hash = md5($timestamp.$pvtKey.$publicKey);

    return [

      "timestamp" => $timestamp,
      "pvtKey"    => $pvtKey,
      "publicKey" => $publicKey,
      "hash"      => $hash
    ];
  }

}

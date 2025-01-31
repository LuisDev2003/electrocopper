<?php

$baseURL = "http://localhost/electrocopper/";

function buildURL(string $value, string $prefix = ""): string
{
  global $baseURL;

  return $baseURL . $prefix . $value;
}

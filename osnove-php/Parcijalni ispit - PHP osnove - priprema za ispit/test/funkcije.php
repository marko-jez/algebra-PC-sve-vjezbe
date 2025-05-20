<?php

function brojSlova($string) {
  return mb_strlen($string);
}

function sadrziA($string) {
  return mb_strpos(mb_strtolower($string), 'a') !== false ? 'DA' : 'NE';
}

function velikaSlova($string) {
  return mb_strtoupper($string);
}

function malaSlova($string) {
  return mb_strtolower($string);
}
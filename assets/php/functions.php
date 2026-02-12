<?php
function get_server_name()
{
  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')
    $protocol = 'https://';
  else
    $protocol = 'http://';
  return $protocol . $_SERVER['HTTP_HOST'];
}
function header_delay($delay = 10, $url = '')
{
  header("Refresh:" . $delay . "; URL=" . get_server_name() . $url);
}
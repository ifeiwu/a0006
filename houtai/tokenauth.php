<?php
//Copyright (c) 2016 iFeiwu.com
 class TokenAuth implements iAuthenticate { function __isAuthenticated() { $token = $_GET["\164\157\153\145\156"]; return $token && $token == TokenAuth::key() ? TRUE : FALSE; } function key() { return require "\164\x6f\x6b\x65\x6e\56\160\x68\160"; } }

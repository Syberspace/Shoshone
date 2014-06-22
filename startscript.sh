#!/bin/bash
fuser -k 80/tcp
( php server.php &) &

Shoshone
========

A webserver written entirely in PHP

_If you are even thinking about using this anywhere else than in a closed test environment you should never ever ever touch a server again._

#### Why?
because nobody stopped me from doing it  
##### Why the name _Shoshone_?
well, there's that other http server named after some native american tribe, and I am creative as fuck, so that's where the name is coming from

#### What?
just read the second line again.

#### How?
Dependencies:
* __php__ _duh!_ (tested _only_ with 5.5.12 on Manjaro Linux)
* sockets.so (or your platform equivalent) enabled in your php.ini 
* free and open TCP port 80 (or the audacity to change the port number in the code)


run `php server.php` as root (or someone who can open sockets)

#### State of the code
currently __Shoshone__ only can serve -_php_- _html_ and _png_ files (and probably only the ones provided in the `webroot` subdirectory of this repository). The plan is to make it run and serve files like any other webserver with config files, multiple hostnames and whatnot (but that's very far in the future). The code structure is pretty much a first draft, incredibly awful and subject to many and large-scale changes.

#### Contributing
if you really really really want to, i'm not gonna stop you from submitting a pull request.

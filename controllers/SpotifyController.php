<?php

require_once('../class/Spotify.php');
require_once('../model/SpotifyDAO.php');
require_once('../class/Conteudo.php');
require_once('../model/ConteudoDAO.php');
require_once('../config/Connection.php');

class SpotifyController {

    public function selecionaMusica() {

        $spotify = new Spotify();
        $spotifyDAO = new SpotifyDAO();
        $conexao = new Connection();

        $token = $spotifyDAO->authorize($conexao, $spotify);

        $playlists = $spotifyDAO->getPlaylists($conexao, $token->access_token);

        $playlist = $spotifyDAO->list($playlists->items, "A1");

        $result = $spotifyDAO->getMusica($conexao, $token->access_token, $playlist->tracks->href);

        echo '<h1> Playlist </h1>';
        echo '<h3> Total: ' . $result->total . '</h3>';

        $i = rand(0, $result->total - 1);

        echo '<h4> Música Selecionada: </h4>';
        echo '<strong>Nome: ' . $result->items[$i]->track->name . '<br/>';
        echo 'Id: ' . $result->items[$i]->track->id . '<br/>';
        echo '<img src="'.$result->items[$i]->track->album->images[0]->url.'"/><br/>';
        echo 'Spotify URL: ' . $result->items[$i]->track->external_urls->spotify . '</strong><br/><br/>';

    }

}
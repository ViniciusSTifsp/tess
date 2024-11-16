<?php

require_once('../class/Spotify.php');
require_once('../model/SpotifyDAO.php');
require_once('../class/Conteudo.php');
require_once('../model/ConteudoDAO.php');
require_once('../model/UsuarioNivelDAO.php');
require_once('../config/Connection.php');

class SpotifyController
{

    public function selecionaMusica() {

        $spotify = new Spotify();
        $spotifyDAO = new SpotifyDAO();
        $usuarioNivelDAO = new UsuarioNivelDAO();
        $conexao = new Connection();

        $token = $spotifyDAO->authorize($conexao, $spotify);

        $playlists = $spotifyDAO->getPlaylists($conexao, $token->access_token);

        $resultado_usuario_nivel = $usuarioNivelDAO->consultaNivel($conexao);

        $dado_usuario_nivel = $resultado_usuario_nivel->fetch_assoc();

        $playlist = $spotifyDAO->list($playlists->items, $dado_usuario_nivel['nivel']);

        $result = $spotifyDAO->getMusica($conexao, $token->access_token, $playlist->tracks->href);

        $i = rand(0, $result->total - 1);

        echo '<strong>Nome: ' . $result->items[$i]->track->name . '<br/>';
        echo 'Spotify URL: ' . $result->items[$i]->track->external_urls->spotify . '</strong><br/><br/>';
        echo '<img src="' . $result->items[$i]->track->album->images[0]->url . '"/><br/>';
        
    }
}

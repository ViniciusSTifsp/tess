<?php

class SpotifyDAO {

    public function authorize(Connection $con, Spotify $spotify) {
        
        $ch = $con->initCURL();

        $opt = array(  
            CURLOPT_URL => 'https://accounts.spotify.com/api/token',
            CURLOPT_HEADER => 'Authorization: Basic '.base64_encode('"'.$spotify->getClientId().':'.$spotify->getClientSecret().'"'),
            CURLOPT_POSTFIELDS => "grant_type=client_credentials".
                                  "&client_id=".$spotify->getClientId().
                                  "&client_secret=".$spotify->getClientSecret().
                                  "&scope=user-read-private",
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($ch, $opt);

        $response = curl_exec($ch);
        
        curl_close($ch);

        return json_decode($response);

    }

    public function getPlaylists(Connection $con, $token) {

        $ch = $con->initCURL();

        $opt = array(
            CURLOPT_URL => 'https://api.spotify.com/v1/users/31ckcixy6273ah3qyulyu5pqkkdq/playlists',
            CURLOPT_HTTPHEADER => Array('Authorization: Bearer '.$token),
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($ch, $opt);

        $response = curl_exec($ch);

        curl_close($ch);

        return json_decode($response);

    }

    public function list($playlists, $nome_playlist) {
        
        foreach($playlists as $playlist) {
            if (trim($playlist->name) === trim($nome_playlist)) {
                return $playlist;
            }
        }

        return "Playlist não encontrada!";

    }

    public function getMusica(Connection $con, $token, $url) {

        $ch = $con->initCURL();

        $opt = array(
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => Array('Authorization: Bearer '.$token),
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($ch, $opt);

        $response = curl_exec($ch);

        curl_close($ch);

        return json_decode($response);

    }

}
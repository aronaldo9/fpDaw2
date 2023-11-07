<?php

class ListaRepository
{
    static function rellenarCanciones($idLista)
    {
        $bd = Conectar::conexion();
        $result = $bd->query("SELECT * FROM songs WHERE id IN (SELECT id_song FROM song_playlist WHERE id_songPL=$idLista)");

        $canciones = [];
        while ($datos = $result->fetch_assoc()) {
            $canciones[] = new Cancion($datos);
        }
        if (!empty($canciones)) {
            return $canciones;
        } else {
            return null;
        }
    }

    static function crearLista($idUser, $tituloPL)
    {
        $bd = Conectar::conexion();
        $bd->query("INSERT INTO playlists VALUES (null,'" . $idUser . "','" . $tituloPL . "')");
    }

    static function anadirCanPl($idCancion, $idLista, $nombreLista)
    {
        $bd = Conectar::conexion();
        $q = "INSERT INTO song_playlist VALUES (null," . $idCancion . "," . $idLista . ")";
        $bd->query($q);
        header("Location: index.php?c=pl&editar=" . $idLista . "&pl=" . $nombreLista);
    }

    static function mostrarListasDeUsuario($idUser)
    {
        $bd = Conectar::conexion();
        $result = $bd->query("SELECT * FROM playlists WHERE idUser=" . $idUser);

        $listas = [];
        while ($datos = $result->fetch_assoc()) {
            $listas[] = new Lista($datos);
        }
        return $listas;
    }
    static function mostrarListaPorId($idLista)
    {
        $bd = Conectar::conexion();
        $result = $bd->query("SELECT * FROM playlists WHERE id=" . $idLista);

        $lista = null;
        if ($datos = $result->fetch_assoc()) {
            $lista = new Lista($datos);
        }
        return $lista;
    }

    static function eliminarCanPl($idLista, $idCancion, $nombreLista)
    {
        $bd = Conectar::conexion();
        $bd->query('DELETE FROM song_playlist WHERE id_song=' . $idCancion . ' AND id_playlist=' . $idLista . '');
        header("Location: index.php?c=pl&editar=" . $idLista . "&pl=" . $nombreLista);
    }

    static function getCanByTitle($titulo)
    {
        $bd = Conectar::conexion();
        $result = $bd->query('SELECT * FROM songs WHERE title="' . $titulo . '"');

        $cancion = null;
        if ($datos = $result->fetch_assoc()) {
            $cancion = new Cancion($datos);
        }
        return $cancion;
    }

    static function buscarPl($nombrePl)
    {
        $bd = Conectar::conexion();
        $result = $bd->query('SELECT * FROM playlists WHERE name LIKE "%' . $nombrePl . '%"');

        $listas = [];
        while ($datos = $result->fetch_assoc()) {
            $listas[] = new Lista($datos);
        }
        return $listas;
    }

    static function listaFav($idUser, $idLista)
    {
        $bd = Conectar::conexion();
        $bd->query('INSERT INTO user_playlistfav VALUES (null,' . $idUser . ',' . $idLista . ')');
    }

    static function mostrarListasFavByUser($idUser)
    {
        $bd = Conectar::conexion();
        $result = $bd->query('SELECT * FROM playlists WHERE id IN (SELECT id FROM user_playlistfav WHERE idUser=' . $idUser . ')');
        $listas = [];
        while ($datos = $result->fetch_assoc()) {
            $listas[] = new Lista($datos);
        }
        return $listas;
    }
}

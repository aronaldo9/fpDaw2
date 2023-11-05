<?php

class ListaRepository
{
    static function rellenarCanciones($idLista)
    {
        $bd = Conectar::conexion();
        $result = $bd->query("SELECT * FROM cancion WHERE id IN (SELECT idCancion FROM cancionlista WHERE idLista=$idLista)");

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
        $bd->query("INSERT INTO lista VALUES (null,'" . $idUser . "','" . $tituloPL . "')");
    }

    static function anadirCanPl($idCancion, $idLista, $nombreLista)
    {
        $bd = Conectar::conexion();
        $q = "INSERT INTO cancionlista VALUES (null," . $idCancion . "," . $idLista . ")";
        $bd->query($q);
        header("Location: index.php?c=pl&editar=" . $idLista . "&pl=" . $nombreLista);
    }

    static function mostrarListasDeUsuario($idUser)
    {
        $bd = Conectar::conexion();
        $result = $bd->query("SELECT * FROM lista WHERE idUser=" . $idUser);

        $listas = [];
        while ($datos = $result->fetch_assoc()) {
            $listas[] = new Lista($datos);
        }
        return $listas;
    }
    static function mostrarListaPorId($idLista)
    {
        $bd = Conectar::conexion();
        $result = $bd->query("SELECT * FROM lista WHERE id=" . $idLista);

        $lista = null;
        if ($datos = $result->fetch_assoc()) {
            $lista = new Lista($datos);
        }
        return $lista;
    }

    static function eliminarCanPl($idLista, $idCancion, $nombreLista)
    {
        $bd = Conectar::conexion();
        $bd->query('DELETE FROM cancionlista WHERE idCancion=' . $idCancion . ' AND idLista=' . $idLista . '');
        header("Location: index.php?c=pl&editar=" . $idLista . "&pl=" . $nombreLista);
    }

    static function getCanByTitle($titulo)
    {
        $bd = Conectar::conexion();
        $result = $bd->query('SELECT * FROM cancion WHERE title="' . $titulo . '"');

        $cancion = null;
        if ($datos = $result->fetch_assoc()) {
            $cancion = new Cancion($datos);
        }
        return $cancion;
    }

    static function buscarPl($nombrePl)
    {
        $bd = Conectar::conexion();
        $result = $bd->query('SELECT * FROM lista WHERE name LIKE "%' . $nombrePl . '%"');

        $listas = [];
        while ($datos = $result->fetch_assoc()) {
            $listas[] = new Lista($datos);
        }
        return $listas;
    }

    static function listaFav($idUser, $idLista)
    {
        $bd = Conectar::conexion();
        $bd->query('INSERT INTO userlistafav VALUES (null,' . $idUser . ',' . $idLista . ')');
    }

    static function mostrarListasFavByUser($idUser)
    {
        $bd = Conectar::conexion();
        $result = $bd->query('SELECT * FROM lista WHERE id IN (SELECT idLista FROM userlistafav WHERE idUser=' . $idUser . ')');
        $listas = [];
        while ($datos = $result->fetch_assoc()) {
            $listas[] = new Lista($datos);
        }
        return $listas;
    }
}

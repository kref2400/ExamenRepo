<?php


namespace Dao;

class CanditosPanel extends Table
{

    public static function getCandidatoById($idCandidatos)
    {
        $sqlstr = 'SELECT * from candidatos where idCandidatos =:idCandidatos;';
        $parameters = array('idCandidatos' => $idCandidatos);
        $registro = self::obtenerUnRegistro($sqlstr, $parameters);
        return $registro;
    }
    public static function getAllCandidatos()
    {
        $registros = array();
        $registros = self::obtenerRegistros(
            'SELECT * from candidatos;',
            array()
        );
        return $registros;
    }
    public static function addCandidatos($NombreCandidato, $edad)
    {
        $insSQL = 'INSERT INTO candidatos(NombreCandidato,edad) VALUES(:NombreCandidato,:edad)';
        $parameters = array(
            'NombreCandidato'  =>  $NombreCandidato,
            'edad'  =>  $edad
        );
        return self::executeNonQuery($insSQL, $parameters);
    }
    public static function updateCandidato($NombreCandidato, $edad, $idCandidatos)
    {
        $updSQL = 'UPDATE candidatos SET  NombreCandidato = :NombreCandidato,edad = :edad WHERE idCandidatos = :idCandidatos;';
        $parameters = array(
            'NombreCandidato'  =>  $NombreCandidato,
            'edad'  =>  $edad,
            'idCandidatos' => $idCandidatos
        );
        return self::executeNonQuery($updSQL, $parameters);
    }
    public static function deleteCandidato($idCandidatos)
    {
        $delSQL = 'DELETE FROM  candidatos  where idCandidatos =:idCandidatos;';
        $parameters = array('idCandidatos' => $idCandidatos);
        return self::executeNonQuery($delSQL, $parameters);
    }
}

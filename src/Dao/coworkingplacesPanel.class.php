<?php


namespace Dao;

class coworkingplacesPanel extends Table
{

    public static function getcoworkingplacesById($cwp_id)
    {
        $sqlstr = 'SELECT * from coworkingplaces where cwp_id =:cwp_id;';
        $parameters = array('cwp_id' => $cwp_id);
        $registro = self::obtenerUnRegistro($sqlstr, $parameters);
        return $registro;
    }
    public static function getAllcoworkingplaces()
    {
        $registros = array();
        $registros = self::obtenerRegistros(
            'SELECT * from coworkingplaces;',
            array()
        );
        return $registros;
    }
    public static function addcoworkingplaces($cwp_name, $cwp_email, $cwp_phone, $cwp_type, $cwp_status)
    {
        $insSQL = 'INSERT INTO coworkingplaces(cwp_name,cwp_email,cwp_phone,cwp_type,cwp_status) VALUES(:cwp_name,:cwp_email,:cwp_phone,:cwp_type,:cwp_status)';
        $parameters = array(
            'cwp_name'  =>  $cwp_name,
            'cwp_email'  =>  $cwp_email,
            'cwp_phone'  =>  $cwp_phone,
            'cwp_type'  =>  $cwp_type,
            'cwp_status'  =>  $cwp_status
        );
        return self::executeNonQuery($insSQL, $parameters);
    }
    public static function updatecoworkingplaces($cwp_name, $cwp_email, $cwp_phone, $cwp_type, $cwp_status, $cwp_id)
    {
        $updSQL = 'UPDATE coworkingplaces SET  cwp_name = :cwp_name,cwp_email = :cwp_email,cwp_phone = :cwp_phone,cwp_type = :cwp_type,cwp_status = :cwp_status WHERE cwp_id = :cwp_id;';
        $parameters = array(
            'cwp_name'  =>  $cwp_name,
            'cwp_email'  =>  $cwp_email,
            'cwp_phone'  =>  $cwp_phone,
            'cwp_type'  =>  $cwp_type,
            'cwp_status'  =>  $cwp_status,
            'cwp_id' => $cwp_id
        );
        return self::executeNonQuery($updSQL, $parameters);
    }
    public static function deletecoworkingplaces($cwp_id)
    {
        $delSQL = 'DELETE FROM  coworkingplaces  where cwp_id =:cwp_id;';
        $parameters = array('cwp_id' => $cwp_id);
        return self::executeNonQuery($delSQL, $parameters);
    }
}

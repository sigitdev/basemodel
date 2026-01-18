<?php 

namespace BaseModel;

use BaseModel\BaseModel;
use Exception;

require_once('BaseModel.php');

class TransModel extends BaseModel{

    /**
     * function digunakan untuk mengambil mengambil data
     * 
     * contoh pengisian $fields :
     * 
     * $fields = ['id', 'nama'] : berarti menampilkan dengan kriteria field, seperti : "SELECT id, nama FROM".
     * $fields = [] : berarti menampilkan semua field, seperti : "SELECT * FROM".
     */
    public function select($tableName = "", $fields = [], $where = "") : array {
        $conn   = $this->loadConnection();
        $sql    = $this->buildSelectQuery($tableName, $fields, $where);
        $data   = $conn->query($sql);
        if (!$data)
            throw new Exception("[TransModel] " .$tableName. ", " . $conn->error, 1);
        $conn->close();
        return $this->arrayQueryMaping($data);
    }

    /**
     * function untuk store data;
     * $tableName adalah nama dari table,
     * $arrData = ["id" => "1",  "nama" => "ryo"]
     * $who = "Mr. who update"
     * $withTimestamp = true, berarti mengisi secara otomatis created_at & updated_at, dan kolom wajib ada pada table
     * $withTimestamp = false, berarti tidak ada kolom created_at & updated_at, sehingga tidak otomatis diisikan 
     */
    public function store($tableName = "", $arrData = [], $who = "", $withTimestamp = false) : void {
        $conn   = $this->loadConnection();
        $sql    = $this->buildInsertQuery($tableName, $arrData, $who, $withTimestamp);
        $data   = $conn->query($sql);
        if (!$data)
            throw new Exception("[TransModel] " .$tableName. ", " . $conn->error, 1); 
        $conn->close();
    }

      /**
     * function untuk update data;
     * $tableName adalah nama dari table,
     * $arrData = ["id" => "1",  "nama" => "ryo"]
     * $who = "Mr. who update"
     * $arrWhere = memberikan kriteria update, seperti "WHERE id = '1'" dengan bentuk $arrWhere = ['id' => '1']
     * $withTimestamp = true, berarti mengisi secara otomatis created_at & updated_at, dan kolom wajib ada pada table
     * $withTimestamp = false, berarti tidak ada kolom created_at & updated_at, sehingga tidak otomatis diisikan 
     */
    public function update($tableName = "", $arrData = [], $arrWhere = [], $who = "", $withTimestamp = false) : void {
        $conn   = $this->loadConnection();
        $sql    = $this->buildUpdateQuery($tableName, $arrData, $arrWhere, $who, $withTimestamp);
        //die($sql);
        $data   = $conn->query($sql);
        if (!$data)
            throw new Exception("[TransModel] " .$tableName. ", " . $conn->error, 1);
        $conn->close();
    }


      /**
     * function untuk query manual;
     * $sql = isikan dengan query
     */
    public function raw($sql = "") : array {
        $conn   = $this->loadConnection();
        $data   = $conn->query($sql);
        //die($sql);
        if (!$data)
            throw new Exception("[TransModel] " . $conn->error, 1);
        $conn->close();
        return $this->arrayQueryMaping($data);
    }
}

?>
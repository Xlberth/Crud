<?php namespace App\Models;

use CodeIgniter\Model;
class CrudModel extends Model {

    protected $table = 't_info';

    public function listarNombres(){
        $Nombres = $this->db->query("SELECT * FROM t_info");
        return $Nombres->getResult();
    }

    public function insertar($datos) {
        $Nombres = $this->db->table('t_info');
        $Nombres->insert($datos);

        return $this->db->insertID();
    }

    public function obtenerNombre($data) {
        $Nombres = $this->db->table('t_info');
        $Nombres->where ($data);
        return $Nombres->get()->getResultArray();
    }

    public function actualizar($data, $id) {
        $Nombres = $this->db->table('t_info');
        $Nombres->set($data);
        $Nombres->where('id',$id);
        return $Nombres->update();
    }

    public function eliminar($data) {
        $Nombres = $this->db->table('t_info');
        $Nombres->where ($data);
        return $Nombres->delete();
    }

    public function buscarRegistros($query)
    {
        return $this->like('nombre', $query)
                    ->findAll();
    }

    public function obtenerTodosLosRegistros()
    {
        return $this->findAll();
    }


}
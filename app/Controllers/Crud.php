<?php namespace App\Controllers;
use CodeIgniter\Pager\Pager;
use App\Models\CrudModel;
class Crud extends BaseController
{

    
    public function index(): string
    {
        $Crud = new CrudModel();
        $datos = $Crud->listarNombres();
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('listado', $data);
    }

    public function crear() {
        $datos = [
                "nombre" => $_POST['nombre'],
                "edad" => $_POST['edad'],
                "sexo" => $_POST['sexo']
            ];
        $Crud = new CrudModel();
        $respuesta = $Crud->insertar($datos);

        if ($respuesta > 0) {
            return redirect()->to(base_url().'/')->with('mensaje','1');
        } else {
            return redirect()->to(base_url().'/')->with('mensaje','0');
        }

    }

    public function actualizar () {
        $datos = [
            "nombre" => $_POST['nombre'],
            "edad" => $_POST['edad'],
            "sexo" => $_POST['sexo']
        ];
        $id = $_POST['id'];
        $Crud = new CrudModel();

        $respuesta = $Crud->actualizar($datos, $id);

        if ($respuesta) {
            return redirect()->to(base_url().'/')->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/')->with('mensaje','3');
        }
    }

    public function obtenerNombre ($id) {
        $data = ["id" => $id];
        $Crud = new CrudModel();
        $respuesta = $Crud->obtenerNombre($data);
        
        $datos = ["datos" => $respuesta ];

        return view ('actualizar', $datos);
    }

    public function eliminar($id) {
        $Crud = new CrudModel();
        $data = ["id" => $id];
        $respuesta = $Crud->eliminar($data);

        if ($respuesta) {
            return redirect()->to(base_url().'/')->with('mensaje','4');
        } else {
            return redirect()->to(base_url().'/')->with('mensaje','5');
        }
    }

    public function buscar()
{
    $modelo = new CrudModel();
    $query = $this->request->getGet('query');
    $data['resultados'] = $modelo->buscarRegistros($query);
    if (is_array($data['resultados'])) {
        $data['resultados'] = (object)$data['resultados'];
    }
    $data['datos'] = $modelo->obtenerTodosLosRegistros();
    $data['mensaje'] = "";
    return view('listado', $data);
}

}

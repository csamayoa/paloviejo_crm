<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 15/04/2019
 * Time: 07:29 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Prospecto_model');
        $this->load->model('Proceso_model');
        $this->load->model('User');
        $this->load->model('Notificaciones_model');
        $this->load->model('Admin_model');
    }

    public function index()
    {
    }

    //proyectos
    public function administrar_proyectos()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();

        $data['title'] = 'Listado de proyectos';
        echo $this->templates->render('listado_proyectos', $data);
    }

    public function administrar_proyectos_inactivos()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();

        $data['title'] = 'Listado de proyectos';
        echo $this->templates->render('listado_proyectos', $data);
    }

    public function crear_proyecto()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();

        $data['title'] = 'Listado de proyectos';
        echo $this->templates->render('crear_proyecto', $data);
    }

    public function guardar_proyecto()
    {
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'tipo' => $this->input->post('tipo'),
            'descripcion' => $this->input->post('descripcion'),
            'estado' => $this->input->post('estado'),
        );

        $this->Admin_model->guardar_proyecto($data);
        redirect(base_url() . 'admin/administrar_proyectos/');
    }

    public function editar_proyecto()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //datos del proyectop
        $proyecto_id = $this->uri->segment(3);
        //proyectos
        $data['proyecto'] = $this->Admin_model->get_proyecto_by_id($proyecto_id);

        $data['title'] = 'Editar proyecto';
        echo $this->templates->render('editar_proyecto', $data);
    }

    public function actualizar_proyecto()
    {
        $data = array(
            'proyecto_id' => $this->input->post('proyecto_id'),
            'nombre' => $this->input->post('nombre'),
            'tipo' => $this->input->post('tipo'),
            'descripcion' => $this->input->post('descripcion'),
            'estado' => $this->input->post('estado'),
        );

        $this->Admin_model->actualizar_proyecto($data);
        redirect(base_url() . 'admin/administrar_proyectos/');
    }

    public function desactivar_proyecto()
    {
    }

    //tipos de casas
    public function administrar_tipos_casas()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['tipos_de_casa'] = $this->Admin_model->get_tipos_de_casas();

        $data['title'] = 'Listado de tipos de casas';
        echo $this->templates->render('listado_tipos_casa', $data);
    }

    public function crear_tipo_de_casa()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();

        $data['title'] = 'Crear tipo de casa';
        echo $this->templates->render('crear_tipo_casa', $data);
    }

    public function guardar_tipo_de_casa()
    {
        //print_contenido($_POST);
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'proyecto' => $this->input->post('proyecto'),
        );
        $this->Admin_model->guardar_tipo_casa($data);
        redirect(base_url() . 'admin/administrar_tipos_casas/');
    }

    public function editar_tipo_de_casa()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();
        //tipo de casa
        //datos del proyectop
        $tipo_casa_id = $this->uri->segment(3);
        //datos tipo_casa
        $data['datos_tipo_casa'] = $this->Admin_model->get_info_tipo_casa_by_id($tipo_casa_id);
        $data['title'] = 'Crear tipo de casa';
        echo $this->templates->render('editar_tipo_casa', $data);
    }

    public function actualizar_tipo_de_casa()
    {
        $data = array(
            'tipo_casa_id' => $this->input->post('tipo_casa_id'),
            'nombre' => $this->input->post('nombre'),
            'proyecto' => $this->input->post('proyecto'),
            'estado' => $this->input->post('estado'),
        );
        $this->Admin_model->actualizar_tipo_casa($data);
        redirect(base_url() . 'admin/administrar_tipos_casas/');
    }

    public function desactivar_tipo_de_casa()
    {
    }

    //porpiedades
    public function administrar_casas()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['casas'] = $this->Admin_model->get_casas();
        $data['title'] = 'Listado de de casas';
        echo $this->templates->render('listado_casas', $data);
    }

    public function crear_casa()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();
        $data['title'] = 'Crear tipo de casa';
        echo $this->templates->render('crear_casa', $data);
    }

    public function editar_casa()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();
        //datos de la casa
        $casa_id = $this->uri->segment(3);
        $data['casa'] = $this->Admin_model->get_casa_by_id($casa_id);
        $data['title'] = 'Crear tipo de casa';
        echo $this->templates->render('editar_casa', $data);
    }

    public function reservar_casa()
    {
        //datos de la casa
        $casa_id = $this->uri->segment(3);

        $this->Admin_model->reservar_casa($casa_id);
        redirect(base_url() . 'admin/administrar_casas/');
    }
    public function liberar_casa()
    {
        //datos de la casa
        $casa_id = $this->uri->segment(3);

        //$this->Admin_model->liberar_casa($casa_id);

        //procesos con esa casa
        $proceso = $this->Proceso_model->get_proceso_by_lote_id($casa_id);

        if ($proceso){
            $proceso =$proceso->row();
            print_contenido($proceso);
            //pasamos el proceso a inactivo
            $this->Proceso_model->desactivar_proceso($proceso->id);
            $this->Admin_model->liberar_casa($casa_id);
        }else{
            $this->Admin_model->liberar_casa($casa_id);
        }
        redirect(base_url() . 'admin/administrar_casas/');
    }

    public function guardar_casa()
    {
        $data = array(
            'lote' => $this->input->post('lote'),
            'proyecto' => $this->input->post('proyecto'),
            'tipo_casa' => $this->input->post('tipo_casa'),
            'descripcion' => $this->input->post('descripcion'),
        );

        $this->Admin_model->guardar_casa($data);
        redirect(base_url() . 'admin/administrar_casas/');

    }

    public function actualizar_casa()
    {
        $data = array(
            'lote' => $this->input->post('lote'),
            'proyecto' => $this->input->post('proyecto'),
            'tipo_casa' => $this->input->post('tipo_casa'),
            'descripcion' => $this->input->post('descripcion'),
            'casa_id' => $this->input->post('casa_id'),
        );

        $this->Admin_model->actualizar_casa($data);
        redirect(base_url() . 'admin/administrar_casas/');

    }


    public function get_tipos_casa()
    {
        header("Access-Control-Allow-Origin: *");
        //datos del proyectop
        $proyecto_id = $this->uri->segment(3);
        // echo $proyecto_id;
        $tipos_de_casa = $this->Admin_model->get_tipos_casa_by_proyecto_id($proyecto_id);
        //imprimimos en formato json el resultado
        if ($tipos_de_casa) {
            echo json_encode($tipos_de_casa->result_array());
        }
    }

    //usuarios
    public function administrar_usuarios()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['usuarios'] = $this->Admin_model->get_usuarios();
        $data['title'] = 'Listado de usuarios';
        echo $this->templates->render('listado_usuarios', $data);
    }

    public function crear_usuario()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();
        $data['title'] = 'Crear usuario';
        echo $this->templates->render('crear_usuario', $data);
    }

    public function guardar_usuario()
    {
        // print_contenido($_POST);
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'nombre' => $this->input->post('nombre'),
            'rol' => $this->input->post('rol'),
        );
        $this->Admin_model->guardar_usuario($data);
        redirect(base_url() . 'admin/administrar_usuarios/');
    }

    public function desactivar_usuario()
    {
        //datos del prospecto
        $user_id = $this->uri->segment(3);
        $this->Admin_model->desactivar_usuario($user_id);
        redirect(base_url() . 'admin/administrar_usuarios/');
    }

    public function editar_usuario()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        //datos del prospecto
        $user_id = $this->uri->segment(3);
        $data['title'] = 'Editar usuario';
        $data['usuario'] = $this->Admin_model->datos_usuario($user_id);
        echo $this->templates->render('editar_usuario', $data);
    }

    public function borar_usuario()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        //datos del prospecto
        $user_id = $this->uri->segment(3);

        $data['title'] = 'Crear usuario';
        echo $this->templates->render('crear_usuario', $data);
    }

    public function actualizar_usuario()
    {
        // print_contenido($_POST);
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'nombre' => $this->input->post('nombre'),
            'rol' => $this->input->post('rol'),
            'user_id' => $this->input->post('user_id'),
        );
        $this->Admin_model->actualizar_usuario($data);
        redirect(base_url() . 'admin/administrar_usuarios/');
    }

    public function subir_foto_usuario()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        //datos del prospecto
        $user_id = $this->uri->segment(3);
        $data['title'] = 'Editar usuario';
        $data['usuario'] = $this->Admin_model->datos_usuario($user_id);
        echo $this->templates->render('subir_foto_usuario', $data);
    }

    public function procesar_foto()
    {
        echo '<pre>';
        print_r($_FILES);
        echo '</pre>';
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        $image = file_get_contents($_FILES['imagen']['tmp_name']);
        $id_usuario = $_POST['id_usuario'];
        $numero_foto = $_POST['img_number'];
        file_put_contents('/home5/destino7/public_html/pv/crm/uploads/fotos_perfil/' . $id_usuario . '.jpg', $image);
    }


    //parametros
    function parametros(){
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();
        $data['title'] = 'Parametros';
        $data['parametros'] = $this->Admin_model->get_parametros();
        echo $this->templates->render('parametros', $data);
    }
    function actualizar_parametros(){
        //print_contenido($_POST);

        //gerente
        $data = array(
            'valor' => $this->input->post('gerente'),
            'parametro_id' => '1',
        );
        $this->Admin_model->actualizar_parametro($data);

        //fecha_nacimiento_gerente
        $data = array(
            'valor' => $this->input->post('fecha_nacimiento_gerente'),
            'parametro_id' => '2',
        );
        $this->Admin_model->actualizar_parametro($data);

        //    [estado_civil_gerente] => casado
        $data = array(
            'valor' => $this->input->post('estado_civil_gerente'),
            'parametro_id' => '3',
        );
        $this->Admin_model->actualizar_parametro($data);

        //    [nacionalidad_gerente] => guatemalteco
        $data = array(
            'valor' => $this->input->post('nacionalidad_gerente'),
            'parametro_id' => '6',
        );
        $this->Admin_model->actualizar_parametro($data);

        //    [dpi_gerente] => 2672 86546 0101
        $data = array(
            'valor' => $this->input->post('dpi_gerente'),
            'parametro_id' => '6',
        );
        $this->Admin_model->actualizar_parametro($data);

        //    [dpi_amitido] => República de Guatemala
        $data = array(
            'valor' => $this->input->post('dpi_amitido'),
            'parametro_id' => '7',
        );
        $this->Admin_model->actualizar_parametro($data);

        //    [nombre_notaria] => Mirna Liseth Hernández Vásquez
        $data = array(
            'valor' => $this->input->post('nombre_notaria'),
            'parametro_id' => '8',
        );
        $this->Admin_model->actualizar_parametro($data);

        //    [fecha_acta_notarial] => 01/09/2009
        $data = array(
            'valor' => $this->input->post('fecha_acta_notarial'),
            'parametro_id' => '9',
        );
        $this->Admin_model->actualizar_parametro($data);

        //    [registro_acta_notarial] => 319430
        $data = array(
            'valor' => $this->input->post('registro_acta_notarial'),
            'parametro_id' => '10',
        );
        $this->Admin_model->actualizar_parametro($data);

        //    [folio_acta_notarial] => 463
        $data = array(
            'valor' => $this->input->post('folio_acta_notarial'),
            'parametro_id' => '11',
        );
        $this->Admin_model->actualizar_parametro($data);

        //    [libro_acta_notarial] => 246
        $data = array(
            'valor' => $this->input->post('libro_acta_notarial'),
            'parametro_id' => '12',
        );
        $this->Admin_model->actualizar_parametro($data);



        redirect(base_url() . 'admin/parametros/');



    }


}
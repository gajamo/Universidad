<?

    class AreaController extends ControladorBase{
    

        public function __construct()
        {
            parent::__construct();    
        }

        public function index(){
            $area = new Area();
            
            $allAreas= $area->getAll();

            $this->view("index",array(
                "allAreas"=> $allAreas,
                "hola" => "Video ejemplo mcv Victor Robles",
                "title" => "Areas creadas"
            ));
        }

        public function crear(){
            if(isset($_POST["nombre"]))
            {
                $area = new Area();

                $idarea = $_POST["idarea"];
                $nombre = $_POST["nombre"];
                $fkarea = $_POST["fkarea"];

                $area->setIdarea($idarea);
                $area->setNombre($nombre);
                $area->setFkarea($fkarea);

                $save=$area->save();
            }

            $this->redirect("Areas","index");
        }

        public function borrar(){
            if(isset($_GET["idarea"])){
                $id=(int)$_GET["idarea"];

                $area = new Area();
                $area->deleteBy("idarea",$id);
            }
        }
    }



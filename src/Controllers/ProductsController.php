<?php


namespace Rentit\Controllers;


use Rentit\Controller;
use Rentit\Models\Publication;
use Rentit\Session;
use Rentit\Request;

class ProductsController extends Controller
{

    public function __construct($request) {

        parent::__construct($request);

    }
    public function index(){
        $data=['title'=>'products',
            'products'=>Publication::all()];
        $this->render($data);


    }

    public function create () {

      //  $id_owner = Session::get('id');

        $inventory = Publication::create([

            'name'              =>  $_REQUEST['name'],
            'description'       =>  $_REQUEST['description'],
            'price'             =>  $_REQUEST['price'],
            'status'             =>  $_REQUEST['status'],
            'ubicacion'              =>  $_REQUEST['ubicacion'],
            'meters'                =>  $_REQUEST['meters'],
            'contact'           => $_REQUEST['contact'],

        ]);


        echo 'Inventory created';



    }

    public function my_publications () {

        $data = ['title'=>'Les meves publicacions'];
        $this->render($data, "mypublications");

    }

    public function post () {

        $data = ['title'=>'Publicar oferta'];
        $this->render($data, "post_publication");

    }


  public function addproduct() {

      $data = ['title'=>'CREAUN NOU PRODUCTE'];
      $this->render($data,"addproduct");


  }






    public static function show_all_publications() {

        $elements = Publication::allInventory();
        $content = "<div><h3>Producto</h3></div><div id='posts'>";

        foreach ($elements as $element) {

           // $dades_propietari = \Rentit\Models\User::userData($element['id_owner']);

           // $tipus = self::text_offer_type($element['id_offertype']);
           // $producte = self::text_product_type($element['id_producttype']);
           $content.= self::build_content($element);

        }

        $content.="</div>";
        return $content;

    }

    public static function get_inventory_with_user() {

        return Publication::with('user') -> get() -> toArray();
        //return Question::with('User') -> get() -> toJson();

    }

    public static function get_my_publications() {

        $id = Session::get('id');
        return Publication::where('id_owner', $id)->get()->all();

    }

    public static function show_my_publications() {

        $elements = self::get_my_publications();
        $content = "<div><h3>Les meves publicacions</h3></div><div id='posts'>";

        foreach ($elements as $element) {

            $dades_propietari = \Rentit\Models\User::userData($element['id_owner']);

            $tipus = self::text_offer_type($element['id_offertype']);
            $producte = self::text_product_type($element['id_producttype']);
            $content.= self::build_content($element);

        }

        $content.="</div>";
        return $content;

    }




    public static function build_content ($element) {

        $content2 = "<div id='caja_oferta'>
                <table>
                    <tr><th colspan='4' style='display: flex; align-items: center;'><h4>".$element['name']."</h4>";
        $content2.="</th></tr>
               
                    <tr><th colspan='4'>Descripció</th></tr>
                    <tr><td colspan='4'>".$element['description']."</td></tr>
                    <tr><td><b>Preu</b>: </td><td>".$element['price']."</td><td><b>m2</b>: </td><td>".$element['meters']."</td></tr>
                    <tr><td><b>Provincia</b>: </td><td>".$element['status']."</td><td><b>Ciutat</b>: </td><td>".$element['ubicacion']."</td></tr>
                  
                </table>
            </div>";

        $content.="
    <div class=\"col-md-2\" style='border-box:1px solid black'>
          <div class=\"card mb-4 shadow-sm\">
          <img src='".$element['image']."' class=\"bd-placeholder-img card-img-top\" width=\"100%\" height=\"225\" >
            <text x=\"50%\" y=\"50%\" fill=\"#eceeef\" dy=\".3em\"></text></svg>
            <div class=\"card-body\">
              <p class=\"card-text\">".$element['description']."</p>
              <p class=\"card-text\"><b>".$element['price']."</b></p>
                <p class=\"card-text\"><b>".$element['name']."</b>".$element['meters']."</p>
                   <p class=\"card-text\"><b>".$element['ubicacion']."</b></p>
              <div class=\"d-flex justify-content-between align-items-center\">
                <div class=\"btn-group\">
                  <button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Buy now</button>
                  <!--<button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Edit</button>-->
                </div>
                <small class=\"text-muted\"></small>
              </div>
            </div>
          </div>
        </div>";
        return $content;

    }

    public function editproduct () {

        $data = ['title'=>'Editar oferta',
        'products'=>Publication::all()];
        $this->render($data, "editproduct");

    }

    public static function get_publication_data () {

        $id = Session::get('id');
        $inventory = Publication::where('id_owner', $id) -> where('id', $_REQUEST['id'])->get()->all();
        return $inventory;

    }
    public function edited(){

        $data = ['title'=>'Editar oferta',
            'id'=>$_REQUEST['id']];

        $this->render($data, "editformproduct");
    }
    public function save(){

        $data = Publication::where('id','=',$_REQUEST['id']);
        $product=[

            'name'              =>  $_REQUEST['name'],
            'description'       =>  $_REQUEST['description'],
            'price'             =>  $_REQUEST['price'],
            'status'             =>  $_REQUEST['status'],
            'ubicacion'              =>  $_REQUEST['ubicacion'],
            'meters'                =>  $_REQUEST['meters'],
            'contact'           => $_REQUEST['contact'],

        ];

        $data->update($product);
        echo "Producto actualizado";
    }
    public function delete_publication () {

        try {

            Publication::destroy($_REQUEST['id']);
            echo "producto eliminado correctamente";

        } catch (\Exception $e) {

            $data = ['title' => 'Les meves publicacions', 'error' => 'NO ha sigut possible eliminar la publicació'];
            $this->render($data, "mypublications");


        }



    }

}
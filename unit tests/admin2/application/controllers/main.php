<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
 
    }
 
    public function index()
    {
        //echo "<h1>Welcome to the world of Codeigniter</h1>";//Just an example to ensure that we get into the function
          //      die();
				$this->load->view('ci_simplicity/welcome');
    }
 
    public function employees()
    {
        $this->grocery_crud->set_table('employees');
        $output = $this->grocery_crud->render();
 
        $this->_example_output($output);        
    }
 
    function _example_output($output = null)
 
    {
        $this->load->view('our_template.php',$output);    
    }
	
	public function offres()
    {
        $this->grocery_crud->set_table('offres');			
		$this->grocery_crud->field_type('offre', 'string');
		$this->grocery_crud->field_type('offre_titre', 'string');
		$this->grocery_crud->field_type('offre_description', 'text');
		$this->grocery_crud->set_field_upload('offre_image','assets/uploads/files');
		$this->grocery_crud->field_type('offre_titre_image', 'string');
		$this->grocery_crud->field_type('offre_debut', 'string');
		$this->grocery_crud->field_type('offre_duree', 'string');
 
		$this->grocery_crud->columns('offre_langue','offre_type','offre_categorie','offre_titre','offre_prix','offre_type_prix','offre_prix_minimum','offre_increment','offre_achat_direct','offre_debut','offre_fin','offre_id_membre');		
		$this->grocery_crud->display_as('offre_langue','Langue');
        $this->grocery_crud->display_as('offre_type','Type');
		$this->grocery_crud->callback_column('offre_type_prix',array($this,'fixed_auction'));
		$this->grocery_crud->set_relation('offre_categorie','categories','{categorie_de}');
        $this->grocery_crud->display_as('offre_categorie','Categorie');
		$this->grocery_crud->display_as('offre_titre','Titre');
        $this->grocery_crud->display_as('offre_prix','Prix');
        $this->grocery_crud->display_as('offre_type_prix','Type prix');
		$this->grocery_crud->display_as('offre_prix_minimum','Prix minimum');
        $this->grocery_crud->display_as('offre_increment','Increment');
        $this->grocery_crud->display_as('offre_achat_direct','Achat direct');
		$this->grocery_crud->display_as('offre_debut','Start Date');
        $this->grocery_crud->display_as('offre_fin','End Date');
	
		$this->grocery_crud->set_relation('offre_id_membre','membres','{membre_nom} {membre_prenom}');
		//$this->grocery_crud->display_as('membre_id','membres');
        $this->grocery_crud->display_as('offre_id_membre','Membre');
        $output = $this->grocery_crud->render();
 
        $this->_example_output($output);        
    }
	
	public function packs()
    {
        $this->grocery_crud->set_table('packs');		
        $this->grocery_crud->display_as('nbr_domains','Number Domains');
		$this->grocery_crud->display_as('nbr_websites','Number Websites');
        $this->grocery_crud->display_as('nbr_apps','Number Apps');
        $this->grocery_crud->display_as('nbr_expert','Number Hosting');
		$this->grocery_crud->display_as('nbr_hosting','Number Experts');        
        $this->grocery_crud->display_as('durer','Duration');
	
		$output = $this->grocery_crud->render();
 
        $this->_example_output($output);        
    }
	
	public function achats()
    {
        $this->grocery_crud->set_table('achats');
		$this->grocery_crud->columns('achat_membre','achat_offre','achat_date','achat_prix','achat_type','achat_statut');		
	 	 	 	 	 	 	 	 	
		$this->grocery_crud->set_relation('achat_membre','membres','{membre_nom_utilisateur}');
		$this->grocery_crud->set_relation('achat_offre','offres','{offre_titre}');
		//$this->grocery_crud->set_relation('offre_id_membre','membres','{membre_nom_utilisateur}');
        $this->grocery_crud->display_as('achat_membre','Username');
		$this->grocery_crud->display_as('achat_offre','Offers');
		$this->grocery_crud->display_as('achat_date','Date');
        $this->grocery_crud->display_as('achat_prix','Price');
        $this->grocery_crud->display_as('achat_type','Fixed price/Auction');
		$this->grocery_crud->display_as('achat_statut','State');
		$this->grocery_crud->callback_column('achat_type',array($this,'fixed_auction'));
		
	
		$output = $this->grocery_crud->render();
 
        $this->_example_output($output);        
    }

	function fixed_auction($value)
	{
		$tmp = array(''=>'','prix_fixe'=>'Fixed price','enchere'=>'Auction','direct'=>'Direct');
		$type = $tmp[$value];
		return $type;
	}
	
	public function commandes()
    {        
		$this->grocery_crud->set_table('commandes');
		$this->grocery_crud->columns('commande_membre_id','commande_packs_id','commande_nbr_domains_consommer','commande_nbr_websites_consommer','commande_nbr_apps_consommer','commande_nbr_hosting_consommer','commande_nbr_expert_consommer','commande_date_vente','commande_dlc');		
	 	 	 	 	 	 	 	 	
		$this->grocery_crud->set_relation('commande_membre_id','membres','{membre_nom_utilisateur}');
		$this->grocery_crud->set_relation('commande_packs_id','packs','{packs_titre}');
        $this->grocery_crud->display_as('commande_membre_id','Username');
		$this->grocery_crud->display_as('commande_packs_id','Packs');
		$this->grocery_crud->display_as('commande_nbr_domains_consommer','Nbr Domains consume');
		$this->grocery_crud->display_as('commande_nbr_websites_consommer','Nbr Websites consume');
        $this->grocery_crud->display_as('commande_nbr_apps_consommer','Nbr Apps consume');
        $this->grocery_crud->display_as('commande_nbr_hosting_consommer','Nbr Hosting consume');
		$this->grocery_crud->display_as('commande_nbr_expert_consommer','Nbr Experts consume');        
        $this->grocery_crud->display_as('commande_date_vente','Date');
		$this->grocery_crud->display_as('commande_dlc','Deadline');
		
		
        
	
		$output = $this->grocery_crud->render();
 
        $this->_example_output($output);        
    }
	
	public function pays()
    {
        $this->grocery_crud->set_table('countries');
        $output = $this->grocery_crud->render();
 
        $this->_example_output($output);        
    }
	
	public function villes()
    {
        $this->grocery_crud->set_table('states_subdivisions');
        $output = $this->grocery_crud->render();
 
        $this->_example_output($output);        
    }
	
	public function categories()
    {
        
		$this->grocery_crud->set_table('categories');
		$this->grocery_crud->display_as('categorie_de','Categorie DE');
        $this->grocery_crud->display_as('categorie_fr','Categorie FR');
        $this->grocery_crud->display_as('categorie_eng','Categorie EN');
        $output = $this->grocery_crud->render();
 
        $this->_example_output($output);        
    }
	public function membres()
    {
		$this->grocery_crud->columns('membre_nom_utilisateur','membre_nom','membre_prenom','membre_mail','membre_ville','membre_pays','membre_canton','membre_langue');		
        $this->grocery_crud->set_table('membres');
		$this->grocery_crud->set_relation('membre_pays','countries','country_code_char3');   	    
		$this->grocery_crud->set_relation('membre_canton','states_subdivisions','{state_subdivision_name}');
		$this->grocery_crud->set_relation('membre_pays','countries','{country_name}');
		$this->grocery_crud->display_as('membre_pays','Country');
        $this->grocery_crud->display_as('membre_canton','Canton');
        $this->grocery_crud->display_as('membre_ville','City');
		
        $output = $this->grocery_crud->render();
 
        $this->_example_output($output);        
    }
	
	public function users(){
	
		$crud = new grocery_CRUD();
		$crud->set_table('users');
		$crud->set_subject('User');
		$crud->required_fields('username');
		$crud->required_fields('password');
	 
		$crud->columns('username','password');
		$crud->fields('username','password');
	 
		$crud->callback_edit_field('password',array($this,'set_password_input_to_empty'));
    	$crud->callback_add_field('password',array($this,'set_password_input_to_empty'));
		
		$crud->callback_before_insert(array($this,'encrypt_password'));
		$crud->callback_before_update(array($this,'encrypt_password'));
	 
		$output = $crud->render();
		$this->_example_output($output);
	}
	
	function encrypt_password_callback($post_array, $primary_key) {
		$this->load->library('encrypt');
	 
		//Encrypt password only if is not empty. Else don't change the password to an empty field
		if(!empty($post_array['password']))
		{
			$key = 'super-secret-key';
			$post_array['password'] = $this->encrypt->encode($post_array['password'], $key);
		}
		else
		{
			unset($post_array['password']);
		}
	 
	  return $post_array;
	}
	 
	function set_password_input_to_empty() {
		return "<input type='password' name='password' value='' />";
	}
	
	function encrypt_password($post_array, $primary_key = null)
    {
	  
	    $this->load->helper('security');
	    $post_array['password'] = do_hash($post_array['password'], 'md5');
	    return $post_array;
	   
    }
	
	function news() {

	$crud = new grocery_CRUD();
 
    $this->load->config('grocery_crud');
    $this->config->set_item('example_callback_after_upload','gif|jpeg|jpg|png');
    $crud->set_table('news');    
    $crud->set_subject('news');
    $crud->set_field_upload('picture','assets/uploads/images/');
 
    //$crud->callback_after_upload(array($this,'example_callback_after_upload'));
	$crud->callback_after_upload(array($this,'example_callback_after_upload'));
 
    $output = $crud->render();
 
    $this->_example_output($output);
	 
 	}
 
 function example_callback_after_upload($uploader_response,$field_info, $files_to_upload)
	{
		
		$this->load->library('image_moo');
 
    //Is only one file uploaded so it ok to use it with $uploader_response[0].
    $file_uploaded = $field_info->upload_path.'/'.$uploader_response[0]->name; 
 
    $this->image_moo->load($file_uploaded)->resize(800,600)->save($file_uploaded,true);
 
    return true;
		

	}
	
	
 
	 
	/* function create_thumbnails($uploader_response,$field_info, $files_to_upload)
	{

		$file_uploaded = $field_info->upload_path.'/'.$uploader_response[0]->name;
		$thumbnail1 = $field_info->upload_path.'/thumbs1/'.$uploader_response[0]->name;
		$thumbnail2 = $field_info->upload_path.'/thumbs2/'.$uploader_response[0]->name;
		$thumbnail3 = $field_info->upload_path.'/thumbs3/'.$uploader_response[0]->name;

	} */  

	
}
/* End of file main.php */
/* Location: ./application/controllers/main.php */
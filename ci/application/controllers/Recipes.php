	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class of Recipe controller
 * 
 * @author: Tero Pelkonen, Larissa Sepperer
 */

class Recipes extends CI_Controller 
{

	/**
     * Initialise by calling parent constructor of parent class. Create
     * database connection and load models and helpers. 
     */
    public function __construct() 
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'url_helper'));
        $this->load->database();
        $this->load->model('category_model');
        $this->load->model('recipe_model');
    }

	/**
     * Call Recipe and Category models in order to get categories and recipes
     * from the database to be displayed in the home page. Then load
     * corresponding views (index.php) including header and footer views. 
     */
	public function index() 
	{
		$data['category'] = $this->category_model->get_categories();
		$data['title']= "Recipes Archive";
		$data['recipe'] = $this->recipe_model->get_recipes();
		
		$this->load->view('templates/header',$data);
		$this->load->view('categories/index',$data);
		$this->load->view('recipes/index',$data);
		$this->load->view('templates/footer');
	}
	
	/**
     * Call Recipe and Category models in order to get category and recipes
     * of that category from the database to be displayed in category page. 
     * Then load corresponding views including header and footer views. 
     */
	public function get($category_id = NULL) 
	{
		$data['title']= "Recipes Archive";
		$data['category'] = $this->category_model->get_categories();
		$data['recipe'] = $this->recipe_model->get_recipes($category_id);
		
		$this->load->view('templates/header',$data);
		$this->load->view('categories/index',$data);
		$this->load->view('recipes/category',$data);
		$this->load->view('templates/footer');
	}
	
	/**
     * Call Recipe and Category models in order to get certain category and 
     * certain recipe from the database to be displayed in recipe view page. 
     * Then load corresponding views (view) including header and footer. 
     */
	public function view($id = NULL) 
	{
		$data['title']= "Recipes Archive";
		$data['recipe'] = $this->recipe_model->get_recipe($id);
		
		$this->load->view('templates/header',$data);
		$this->load->view('recipes/view',$data);
		$this->load->view('templates/footer');
	}
	
	/**
     * Call helpers/libraries and Category model in order to display data in edit form.
     * Do form validations. 
     * Call image upload function that uploads the image and calls model for adding the recipe.
     */
	public function add() 
	{
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 600;
        $config['max_width']            = 2024;
        $config['max_height']           = 2768;
		
		$this->load->helper('form');
    	$this->load->library('form_validation');
    	$this->load->library('upload', $config);
    	
		$data['title']= "Recipes Archive";
		$data['category'] = $this->category_model->get_categories();
		
		$this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('category_id','Category_id','required');
        $this->form_validation->set_rules('ingredients','Ingredients','required');
        $this->form_validation->set_rules('production_method','Production_method','required');
        $this->form_validation->set_rules('production_time','Production_time','required');
        
		if ($this->form_validation->run() === FALSE)
		{
	        $this->load->view('templates/header',$data);
			$this->load->view('recipes/add',$data);
			$this->load->view('templates/footer');
    	}
    	else 
    	{
    		$this->image_upload();
	    	$data['recipe'] = $this->recipe_model->get_recipes();
			$data['title']= "Recipes Archive";
			$this->load->view('templates/header',$data);
			$this->load->view('recipes/upload_success');
	        $this->load->view('recipes/add',$data);
	        $this->load->view('templates/footer');
    	}
		
	}
	
	
	/**
	 * Load library, check if filename (for picture) is empty, do image upload, 
	 * call insert function of Recipe_model to send the recipe to database. 
	 * 
	 */
	private function image_upload()
	{
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 600;
        $config['max_width']            = 2024;
        $config['max_height']           = 2768;

        $this->load->library('upload', $config);
        
        $this->upload->do_upload('userfile');
        
        $data = $this->upload->data();
        
        //Checks if the filename is empty or not
        if($data['raw_name'] === '' or $data['file_ext'] ==='')
        {
        	$image_path = NULL;
        }
        else
        {
	        $image_path = base_url('uploads/' . $data['raw_name'] . $data['file_ext']);
        }
        
        $this->recipe_model->insert_recipe($image_path);
		
	}
	
	/**
     * Load helpers, call Category and Recipe model in order to display data in 
     * edit form. Do form validations, call Recipe model in order to update 
     * recipe to database. After successful update, forward back to homepage. 
     * Checks if the shown recipe has already an image and updates it if new image is added to the form.
     */
	public function edit($id = NULL) 
	{
		//NEWLY ADDED FOR FILE
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 600;
        $config['max_width']            = 2024;
        $config['max_height']           = 2768;
		
    	$this->load->library('upload', $config);
    	//
		
		$this->load->helper('form');
    	$this->load->library('form_validation');
    	
		$data['title']= "Recipes Archive";
		$data['recipe'] = $this->recipe_model->get_recipe($id);
		$recipe = $this->recipe_model->get_recipe($id);
		$data['category'] = $this->category_model->get_categories($recipe['category_id']);
		
		$this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('category_id','Category_id','required');
        $this->form_validation->set_rules('ingredients','Ingredients','required');
        $this->form_validation->set_rules('production_method','Production_method','required');
        $this->form_validation->set_rules('production_time','Production_time','required');
		
		if ($this->form_validation->run() === FALSE) 
		{
	        $this->load->view('templates/header',$data);
			$this->load->view('recipes/edit',$data);
			$this->load->view('templates/footer');
    	}
    	else 
    	{
    		//DOES THE IMAGE UPLOAD
    		$this->upload->do_upload('userfile');
    		
    		$dataupload = $this->upload->data();
        
	        //This is chosen if new image is missing and earlier image is missing
	        if($dataupload['raw_name'] === '' and $dataupload['file_ext'] ==='' and $this->input->post('imgvalue') == NULL)
	        {
	        
	        	$image_path = NULL;
	        }
	        //This is chosen if earlier image exists and the new image is missing
	        elseif($this->input->post('imgvalue') != NULL and $dataupload['raw_name'] === '')
	        {
	        	$image_path = $this->input->post('imgvalue');
	        }
	        //otherwise new image is uploaded
	        else 
	        {
		        $image_path = base_url('uploads/' . $dataupload['raw_name'] . $dataupload['file_ext']);
	        }
		      
    		$data['title']= "Recipes Archive";
    		$this->recipe_model->update_recipe($id,$image_path);
    		$data['category'] = $this->category_model->get_categories();
	    	$data['recipe'] = $this->recipe_model->get_recipes();
	        $this->load->view('templates/header',$data);
	        $this->load->view('categories/index');
	        $this->load->view('recipes/index',$data);
	        $this->load->view('templates/footer');
    	}
	}
	
	/**
     * Call Recipe model in order to delete recipe from database. After
     * successful delete forward back to homepage. 
     */
	public function delete_recipe($id = NULL) 
	{
		$this->recipe_model->delete_recipe($id);
		$data['category'] = $this->category_model->get_categories();
		$data['recipe'] = $this->recipe_model->get_recipes();
		$data['title']= "Recipes Archive";
		
		$this->load->view('templates/header',$data);
		$this->load->view('recipes/index',$data);
		$this->load->view('templates/footer');
	}
	
}

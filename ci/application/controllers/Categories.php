<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class of Category controller
 * 
 * @author: Tero Pelkonen, Larissa Sepperer
 */
 
class Categories extends CI_Controller 
{
    
    /**
     * Initialise by calling parent constructor of parent class. Create
     * database connection and load Category_model, library and helpers. 
     */
    public function __construct() 
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'url_helper'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('category_model');
    }
    
    /**
     * Call Category model in order to get categories from the database
     * to be displayed in the dropdown list of form. Then load the view for
     * adding new recipe. 
     */
    public function index() 
    {
        $this->load->model("Category_model", '', TRUE); 
	    $data['category'] = $this->category_model->get_categories();  
	    $data['categories'] = $this->category_model->get_category(); 
	    $this->load->view('recipes/add', $data);
	}
}
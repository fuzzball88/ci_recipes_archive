<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class of Category model
 * 
 * @author: Reetta Tanskanen, Larissa Sepperer, Tero Pelkonen
 */
 
class Category_model extends CI_Model 
{
    /**
     * Initialise by calling parent constructor of parent class. 
     * Create database connection and load database. 
     */
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    /**
    * Get categories from the database for the top line of the page. 
    */
    public function get_categories($categoryid = FALSE) 
    {
        if ($categoryid === FALSE)
        {
                $query = $this->db->order_by('id', 'ASC');
                $query = $this->db->get('category');
                return $query->result_array();
        }
        $query = $this->db->get_where('category', array('id' => $categoryid));
        return $query->row_array();
    }
    
    
    /**
    * Get categories from the database for the dropdown list
    */
    function get_category() 
    {
        $query = $this->db->get('category'); 
        return $query; 
    }
}
?>
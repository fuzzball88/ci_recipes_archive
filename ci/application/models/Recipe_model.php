<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class of Recipe model
 * 
 * @author: Reetta Tanskanen, Larissa Sepperer, Tero Pelkonen, Aleksi Suominen
 */

class Recipe_model extends CI_Model 
{
    
    /**
     * Initialise by calling parent constructor of parent class. Create
     * database connection.
     */
    public function __construct() 
    {
        parent::__construct();
        $this->load->database('c9');
    }

    /**
    * this function is getting the recipe/s from the database 
    * 
    * @param int, user id
    * @return array
    */
    public function get_recipe($id = NULL) 
    {
        $query = $this->db->get_where('recipe', array('id' => $id));
        return $query->row_array();
    }
    
    
    /**
    * this function is getting the recipe from the database by category
    * 
    * @param category_id (int not null)
    * @return array
    */
    public function get_recipes($category_id = NULL) 
    {
        if(!empty($category_id))
        {
            $this->db->order_by("title", "asc");
            $query = $this->db->get_where('recipe', array('category_id' => $category_id));
            return $query->result_array();
        }
        else
        {
            $this->db->order_by("title", "asc");
            $query = $this->db->get('recipe');
            return $query->result_array();
        }
    }
    
    /**
    * this function is reading entered data and adds the new recipe to 
    * the database. 
    * 
    * @param    string(path of the upload image)
    * @return   boolean
    */
    public function insert_recipe($imagepath = NULL) 
    {
        $data = array(
            'title' => $this->input->post('title'),
            'category_id' => $this->input->post('category_id'),
            'ingredients' => $this->input->post('ingredients'),
            'production_method' => $this->input->post('production_method'),
            'production_time' => $this->input->post('production_time'),
            'image_path' => $imagepath
            );
        return $this->db->insert('recipe', $data);
    }
    
    /**
    * this function is reading the new entered data and updates the recipe 
    * to the database. 
    * 
    * @param    id(int  user id), image_path(string path of the upload image)
    * @return   boolean
    */
    public function update_recipe($id = NULL,$image_path = NULL) 
    {
        $data = array(
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'ingredients' => $this->input->post('ingredients'),
            'production_method' => $this->input->post('production_method'),
            'production_time' => $this->input->post('production_time'),
            'category_id' => $this->input->post('category_id'),
            'image_path' => $image_path
            );
        
        $this->db->where('id', $data['id']);
        $this->db->update('recipe', $data);
    }
    
    /**
    * this function is deleting the recipe from the database
    * 
    * @param int, user id
    * @return boolean
    */
    public function delete_recipe($id) 
    {
        $delete = $this->db->delete('recipe',array('id'=>$id));
        return $delete?true:false;
    }
}
<?php 


class Viewmodel extends CI_Model
{
    public function __construct() {
        $this->load->database();
    }
   public function get_page($limit)
    {
        foreach ($limit as $lim){
            $a= $lim->description;
        }
      $this->db->from('page'); 
       $this->db->limit($a);
       $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();  
    }
    function get_event_news(){
        $this->db->order_by('id', 'DESC');
        $this->db->where('type', 'news');
        $this->db->limit(2);
        $query = $this->db->get("events");
        return $query->result();
    }
    public function get_latest_post()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get("post");
        return $query->result();
    }
    public function get_latest_page()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get("page");
        return $query->result();
    }
            function get_event_events(){
        $this->db->order_by('id', 'DESC');
        $this->db->where('type', 'event');
        $this->db->limit(2);
        $query = $this->db->get("events");
        return $query->result();
    }
    public function count_events()
    {
         return $this->db->count_all("events");
    }
    public function get_event_for_all_event($limit, $start) {
        $this->db->limit($limit, $start);      
        $this->db->where('type','event');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('events');   
        return $query->result();
    }
     public function count_events_news()
    {
         return $this->db->count_all("events");
    }
    public function get_event_for_all_news($limit, $start) {
        $this->db->limit($limit, $start);      
        $this->db->where('type','news');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('events');   
        return $query->result();
    }
    public function get_event_by_id($id)
    {
       $this->db->where('type','event');
        $this->db->where('id', $id);
        $query = $this->db->get('events'); 
         return $query->result();
    }
    public function get_event_by_id_for_news($id)
    {
       $this->db->where('type','news');
        $this->db->where('id', $id);
        $query = $this->db->get('events'); 
         return $query->result();
    }
    
public function get_post_for_testimonials()
{
        $this->db->where('post_category', '2');
        $this->db->limit('4');
        $this->db->order_by("id", "desc");
        $query = $this->db->get('post');
        return $query->result();
}


    public function get_max_post_to_show(){
        $this->db->select('description');
         $this->db->from('misc_setting');
        $this->db->where('name', 'max_post_to_show');
        $query = $this->db->get();
        return $query->result(); 
    }
    public function get_max_page_to_show(){
        $this->db->select('description');
         $this->db->from('misc_setting');
        $this->db->where('name', 'max_page_to_show');
        $query = $this->db->get();
        return $query->result(); 
    }
    
    public function get_post($limit)
    {
        foreach ($limit as $lim){
            $a= $lim->description;
        }
      $this->db->from('post'); 
       $this->db->limit($a);
       $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();  
    }
    
    public function get_post_all()
    {
        
        $this->db->select("image,post_title,post_content");
		$this->db->from('post');
               // $this->db->group_by(RAND());
              //  $this->db->limit($limit);
		$query = $this->db->get();		
		return $query->result();
    }
    
    public function recentpost_get_post($post)
    {
      
      $this->db->from('post'); 
       $this->db->limit($post);
       $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();  
    }
   
    
    public function get_all_post()
    {
        
        $this->db->from('post');
        $query = $this->db->get();
        return $query->result();  
    }
    
    public function get_all_pages()
    {
        
        $this->db->from('page');
        $query = $this->db->get();
        return $query->result();  
    }
    
    public function get_comments($assc_id)
    {
        
        $this->db->from('comment_store');
        $this->db->where('comment_association_id', $assc_id);
        $this->db->limit($limit=5);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();  
    }
    
    public function get_slider()
    {
        $this->db->from('slide');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_design_setup()
    {
        $this->db->from('design_setup');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_header_title()
    {
        $this->db->select('description');
        $this->db->from('design_setup');
        $this->db->where('name', 'header_title');
        $query = $this->db->get();
        return $query->result();
        
    }
    
     public function get_sidebar_color()
    {
        $this->db->select('description');
        $this->db->from('design_setup');
        $this->db->where('name', 'sidebar_bgcolor');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function get_header_color()
    {
        $this->db->select('description');
        $this->db->from('design_setup');
        $this->db->where('name', 'header_bgcolor');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    
    public function get_header_logo()
    {
        $this->db->select('description');
        $this->db->from('design_setup');
        $this->db->where('name', 'header_logo');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function get_favicon_icon()
    {
        $this->db->select('value');
        $this->db->from('meta_data');
        $this->db->where('name', 'favicon_icon');
        $query = $this->db->get();
        return $query->result();
        
    }
    public function get_header_description()
    {
        $this->db->select('description');
        $this->db->from('design_setup');
        $this->db->where('name', 'header_description');
        $query = $this->db->get();
        return $query->result();
        
    }
    public function get_comment_allow()
    {
        $this->db->select('description');
        $this->db->from('misc_setting');
        $this->db->where('name', 'show_comment');
        $query = $this->db->get();
        return $query->result();
        
    }
    public function get_like_allow()
    {
        $this->db->select('description');
        $this->db->from('misc_setting');
        $this->db->where('name', 'show_like');
        $query = $this->db->get();
        return $query->result();
        
    }public function get_share_allow()
    {
        $this->db->select('description');
        $this->db->from('misc_setting');
        $this->db->where('name', 'show_share');
        $query = $this->db->get();
        return $query->result();
        
    }
    public function get_desired_page($id)
    {
        
        $this->db->from('page');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function get_desired_post($id)
    {
        
        $this->db->from('post');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
        
    }
    public function get_selected_album($id)
    {
        
        $this->db->from('media');
        $this->db->where('media_association_id', $id);
        $query = $this->db->get();
        return $query->result();
        
    }
     public function get_desired_category($id)
    {
        
        $this->db->from('category');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
        
    }
    public function get_album()
    {  
        $this->db->from('album');
        $query = $this->db->get();
        return $query->result();  
    }
    
    function get_media_image($aid)
        {
                        
            $this->db->select();            
            $this->db->where('media_association_id',$aid);
            
            $this->db->limit(1);
                    $query = $this->db->get('media');
           if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
        }
        public function get_album_name_by_id($id)
        {
            $this->db->where('id', $id);
             $query = $this->db->get('album');
        return $query->result();  
        }

        

        public function get_all_media(){
        $this->db->from('media');
        $query=$this->db->get();
        return $query->result();
    }
        
    
 
        
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admintemp {
    
                
		var $admintemp_data = array();
		
		function set($name, $value)
		{
			$this->admintemp_data[$name] = $value;
		}
	
		function load($admintemp = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($admintemp, $this->admintemp_data, $return);
		}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */
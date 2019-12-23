<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membertemp {
    
                
		var $membertemp_data = array();
		
		function set($name, $value)
		{
			$this->membertemp_data[$name] = $value;
		}
	
		function load($membertemp = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($membertemp, $this->membertemp_data, $return);
		}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */
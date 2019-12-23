<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengurustemp {
    
                
		var $pengurustemp_data = array();
		
		function set($name, $value)
		{
			$this->pengurustemp_data[$name] = $value;
		}
	
		function load($pengurustemp = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($pengurustemp, $this->pengurustemp_data, $return);
		}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */
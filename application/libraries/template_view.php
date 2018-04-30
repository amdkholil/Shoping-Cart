<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Template_view
{
  var $template_data = array();

  public function set($name, $value)
  {
    $this->templat_data[$name] = $value;
  }

  public function load($template='', $view='', $view_data = array(), $return = false)
  {
    $this->CI =& get_instance();
    $this->set('contents', $this->CI->load->view($view, $view_data, true));
    return $this->CI->load->view($template, $this->templste_data, $return);
  }
}

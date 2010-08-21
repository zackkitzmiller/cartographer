<?php

class Cartographer {

    private $addon;
    
    public function __construct()
    {
        $this->addon =& get_instance();
        
        $this->addon->load->helper('xml');
        $this->addon->load->model('page_model', 'pages');
        $this->addon->load->database();
    }
    
    public function sitemap()
    {
        // define an empty array
        $data = array();
        
        // get all available pages
        // get_pages_exporter returns a db object, so we need the result
        $raw = $this->addon->pages->get_pages_exporter();
        
        $data['pages'] = $raw->result();

        /// the next few lines allows us to use views in CI2 Packages
        $orig_view_path = $this->addon->load->_ci_view_path;
        $this->addon->load->_ci_view_path = APPPATH . 'third_party/cartographer/views/';
        
        $this->addon->output->set_header('Content-Type: text/xml;charset=iso-8859-1');
                    
        exit($this->addon->load->view('sitemap', $data, TRUE));

    }


}
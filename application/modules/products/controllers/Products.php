<?php

if (!defined('BASEPATH'))
{exit('No direct script access allowed');}

class Products extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Products_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'products/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'products/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'products/index.html';
            $config['first_url'] = base_url() . 'products/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Products_model->total_rows($q);
        $products = $this->Products_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'products_data' => $products,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('main/template/header');
        $this->load->view('front');
        $this->load->view('products_list', $data);
        $this->load->view('main/template/footer');
    }

    public function read($id) 
    {
        $row = $this->Products_model->get_by_id($id);
        if ($row) {
            $data = array(
		'productCode' => $row->productCode,
		'productName' => $row->productName,
		'productLine' => $row->productLine,
		'productScale' => $row->productScale,
		'productVendor' => $row->productVendor,
		'productDescription' => $row->productDescription,
		'quantityInStock' => $row->quantityInStock,
		'buyPrice' => $row->buyPrice,
		'MSRP' => $row->MSRP,
	    );
            $this->load->view('main/template/header');
            $this->load->view('products/products_read', $data);
            $this->load->view('main/template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('products'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('products/create_action'),
	    'productCode' => set_value('productCode'),
	    'productName' => set_value('productName'),
	    'productLine' => set_value('productLine'),
	    'productScale' => set_value('productScale'),
	    'productVendor' => set_value('productVendor'),
	    'productDescription' => set_value('productDescription'),
	    'quantityInStock' => set_value('quantityInStock'),
	    'buyPrice' => set_value('buyPrice'),
	    'MSRP' => set_value('MSRP'),
	);
        $this->load->view('main/template/header');
        $this->load->view('products/products_form', $data);
        $this->load->view('main/template/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'productName' => $this->input->post('productName',TRUE),
		'productLine' => $this->input->post('productLine',TRUE),
		'productScale' => $this->input->post('productScale',TRUE),
		'productVendor' => $this->input->post('productVendor',TRUE),
		'productDescription' => $this->input->post('productDescription',TRUE),
		'quantityInStock' => $this->input->post('quantityInStock',TRUE),
		'buyPrice' => $this->input->post('buyPrice',TRUE),
		'MSRP' => $this->input->post('MSRP',TRUE),
	    );

            $this->Products_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('products'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Products_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('products/update_action'),
		'productCode' => set_value('productCode', $row->productCode),
		'productName' => set_value('productName', $row->productName),
		'productLine' => set_value('productLine', $row->productLine),
		'productScale' => set_value('productScale', $row->productScale),
		'productVendor' => set_value('productVendor', $row->productVendor),
		'productDescription' => set_value('productDescription', $row->productDescription),
		'quantityInStock' => set_value('quantityInStock', $row->quantityInStock),
		'buyPrice' => set_value('buyPrice', $row->buyPrice),
		'MSRP' => set_value('MSRP', $row->MSRP),
	    );
            $this->load->view('main/template/header');
            $this->load->view('products/products_form', $data);
            $this->load->view('main/template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('products'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('productCode', TRUE));
        } else {
            $data = array(
		'productName' => $this->input->post('productName',TRUE),
		'productLine' => $this->input->post('productLine',TRUE),
		'productScale' => $this->input->post('productScale',TRUE),
		'productVendor' => $this->input->post('productVendor',TRUE),
		'productDescription' => $this->input->post('productDescription',TRUE),
		'quantityInStock' => $this->input->post('quantityInStock',TRUE),
		'buyPrice' => $this->input->post('buyPrice',TRUE),
		'MSRP' => $this->input->post('MSRP',TRUE),
	    );

            $this->Products_model->update($this->input->post('productCode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('products'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Products_model->get_by_id($id);

        if ($row) {
            $this->Products_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('products'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('products'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('productName', 'productname', 'trim|required');
	$this->form_validation->set_rules('productLine', 'productline', 'trim|required');
	$this->form_validation->set_rules('productScale', 'productscale', 'trim|required');
	$this->form_validation->set_rules('productVendor', 'productvendor', 'trim|required');
	$this->form_validation->set_rules('productDescription', 'productdescription', 'trim|required');
	$this->form_validation->set_rules('quantityInStock', 'quantityinstock', 'trim|required');
	$this->form_validation->set_rules('buyPrice', 'buyprice', 'trim|required|numeric');
	$this->form_validation->set_rules('MSRP', 'msrp', 'trim|required|numeric');

	$this->form_validation->set_rules('productCode', 'productCode', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-01 12:10:38 */
/* http://harviacode.com */
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: ProductController
 */
class ProductController extends Controller
{
    /**
     * @var Session
     */
    private $session;

    public function __construct()
    {
        parent::__construct();

        // Actual auth gate is AuthMiddleware, attached in routes.php.
        // We just grab the session here to read the logged-in username.
        $this->session = load_class('Session', 'libraries');

        $this->call->model('ProductModel');
    }

    /**
     * READ - GET /products
     */
    public function index()
    {
        $data['products'] = $this->ProductModel->get_all_products();
        $data['username'] = $this->session->userdata('username');
        $this->call->view('products/index', $data);
    }

    /**
     * CREATE - GET /products/create shows the form,
     *          POST /products/create saves the new product.
     */
    public function create()
    {
        if ($_POST) {
            $this->ProductModel->create_product([
                'product_name' => filter_io('string', $this->io->post('product_name')),
                'description'  => filter_io('string', $this->io->post('description')),
                'price'        => (float) $this->io->post('price'),
                'quantity'     => (int) $this->io->post('quantity'),
                'created_at'   => date('Y-m-d H:i:s'),
            ]);

            redirect('products');
        } else {
            $this->call->view('products/create');
        }
    }

    /**
     * UPDATE - GET /products/edit/{id} shows the form pre-filled,
     *          POST /products/edit/{id} saves the changes.
     */
    public function edit($id)
    {
        if ($_POST) {
            $this->ProductModel->update_product($id, [
                'product_name' => filter_io('string', $this->io->post('product_name')),
                'description'  => filter_io('string', $this->io->post('description')),
                'price'        => (float) $this->io->post('price'),
                'quantity'     => (int) $this->io->post('quantity'),
            ]);

            redirect('products');
        } else {
            $data['product'] = $this->ProductModel->get_product($id);

            if (!$data['product']) {
                redirect('products');
                return;
            }

            $this->call->view('products/edit', $data);
        }
    }

    /**
     * DELETE - GET /products/delete/{id}
     */
    public function delete($id)
    {
        $this->ProductModel->delete_product($id);
        redirect('products');
    }
}
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: ProductModel
 */
class ProductModel extends Model
{
    protected $table = 'products';
    protected $primary_key = 'id';
    protected $fillable = ['product_name', 'description', 'price', 'quantity', 'created_at'];
    protected $guarded = ['id'];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * READ - get every product, ordered by ID ascending.
     */
    public function get_all_products()
    {
        $products = $this->all();

        if ($products) {
            usort($products, function ($a, $b) {
                return $a['id'] <=> $b['id'];
            });
        }

        return $products;
    }

    /**
     * READ - get a single product by id.
     */
    public function get_product($id)
    {
        return $this->find($id);
    }

    /**
     * CREATE - insert a new product.
     */
    public function create_product($data)
    {
        return $this->insert($data);
    }

    /**
     * UPDATE - update an existing product by id.
     */
    public function update_product($id, $data)
    {
        return $this->update($id, $data);
    }

    /**
     * DELETE - remove a product by id.
     */
    public function delete_product($id)
    {
        return $this->delete($id);
    }
}
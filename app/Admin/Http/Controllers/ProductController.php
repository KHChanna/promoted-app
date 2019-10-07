<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Requests\CreateProductRequest;
use App\Admin\Http\Requests\UpdateProductRequest;
use App\Admin\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Admin\Models\Category;
use App\Admin\Models\Unit;
use App\Admin\Models\ProductImage;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $products = $this->productRepository->all();

        return view('admin::products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::pluck('default_name', 'id')->toArray();
        $units = Unit::pluck('name','id')->toArray();
        return view('admin::products.create', compact('categories','units'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        $product = $this->productRepository->create($input);

        //dd($request->hasFile('images'));
        if($request->hasFile('images')) {
          foreach ($request->images as $image) {
              //$filename = $image->store('images');

              $filename = uniqid().time().'.'.$image->getClientOriginalExtension();
              $path = public_path('/uploads/images/products');
              $image->move($path, $filename);

              ProductImage::create([
                  'product_id' => $product->id,
                  'image_name' => $filename
              ]);
          }
        }


        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('admin::products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        $categories = Category::pluck('default_name', 'id')->toArray();
        $units = Unit::pluck('name','id')->toArray();
        $edit = 1;

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('admin::products.edit', compact('product', 'categories', 'units', 'edit'));
    }

    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $product = $this->productRepository->update($request->all(), $id);


        //dd($request->chk_delete);
        if($request->chk_delete) {
          foreach($request->chk_delete as $key=>$val) {

              $product_image = ProductImage::find($val);
              $image_path = public_path('/uploads/images/products/'.$product_image->image_name);
              if(file_exists($image_path)){

                  //dd($image_path);
                  unlink($image_path);
              }

              $product_image->delete();
          }
        }


        //dd($request->images);
        if($request->hasFile('images')) {
          foreach ($request->images as $image) {
              //$filename = $image->store('images');

              $filename = uniqid().time().'.'.$image->getClientOriginalExtension();
              $path = public_path('/uploads/images/products');
              $image->move($path, $filename);

              ProductImage::create([
                  'product_id' => $product->id,
                  'image_name' => $filename
              ]);
          }
        }

        Flash::success('Product updated successfully.');
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        //dd($product->images);

        if($product->images) {
          foreach($product->images as $image) {
              //$product_image = ProductImage::find($val);
              $image_path = public_path('/uploads/images/products/'.$image->image_name);
              if(file_exists($image_path)){
                  unlink($image_path);
              }
              $image->delete();
          }
        }


        $this->productRepository->delete($id);





        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }
}

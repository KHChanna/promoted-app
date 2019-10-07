<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Requests\CreateCategoryRequest;
use App\Admin\Http\Requests\UpdateCategoryRequest;
use App\Admin\Repositories\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Admin\Models\Category;

class CategoryController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $categories = $this->categoryRepository->all();

        return view('admin::categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create()
    {

        $categories = Category::pluck('default_name', 'id')->toArray();

        return view('admin::categories.create', compact('categories'));
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();

        if($request->hasFile('image')) {
            $filename = uniqid().time().'.'.$request->image->getClientOriginalExtension();
            $path = public_path('/uploads/images/categories');
            $request->image->move($path, $filename);
            $input = $input + ['image_name' => $filename];
        }

        $category = $this->categoryRepository->create($input);

        Flash::success('Category saved successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('admin::categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $edit = 1;

        $categories = Category::pluck('default_name', 'id')->toArray();

        return view('admin::categories.edit', compact('categories','category','edit'));
    }

    /**
     * Update the specified Category in storage.
     *
     * @param int $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }





        $input = $request->all();
        if($request->hasFile('image')) {
            $filename = uniqid().time().'.'.$request->image->getClientOriginalExtension();
            $path = public_path('/uploads/images/categories');
            $request->image->move($path, $filename);
            $input = $input + ['image_name'=>$filename];
        }


        if($request->chk_delete) {

              $image_path = public_path('/uploads/images/categories/'.$category->image_name);
              if(file_exists($image_path)){
                  unlink($image_path);
              }
              $input = $input + ['image_name'=>''];
        }



        $category = $this->categoryRepository->update($input , $id);

        Flash::success('Category updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        if($category->image_name != "") {
          $image_path = public_path('/uploads/images/categories/'.$category->image_name);
          if(file_exists($image_path)){
              unlink($image_path);
          }
        }

        $this->categoryRepository->delete($id);

        Flash::success('Category deleted successfully.');

        return redirect(route('categories.index'));
    }
}

<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Requests\CreateShopRequest;
use App\Admin\Http\Requests\UpdateShopRequest;
use App\Admin\Repositories\ShopRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Admin\Models\Shop;

class ShopController extends AppBaseController
{
    /** @var  ShopRepository */
    private $shopRepository;

    public function __construct(ShopRepository $shopRepo)
    {
        $this->shopRepository = $shopRepo;
    }

    /**
     * Display a listing of the Shop.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shops = $this->shopRepository->all();

        return view('admin::shops.index')
            ->with('shops', $shops);
    }

    /**
     * Show the form for creating a new Shop.
     *
     * @return Response
     */
    public function create()
    {
        $shops = Shop::pluck('name', 'id')->toArray();
        return view('admin::shops.create', compact('shops'));
    }

    /**
     * Store a newly created Shop in storage.
     *
     * @param CreateShopRequest $request
     *
     * @return Response
     */
    public function store(CreateShopRequest $request)
    {
        $input = $request->all();

        $shop = $this->shopRepository->create($input);

        Flash::success('Shop saved successfully.');

        return redirect(route('shops.index'));
    }

    /**
     * Display the specified Shop.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shop = $this->shopRepository->find($id);

        if (empty($shop)) {
            Flash::error('Shop not found');

            return redirect(route('shops.index'));
        }

        return view('admin::shops.show')->with('shop', $shop);
    }

    /**
     * Show the form for editing the specified Shop.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shop = $this->shopRepository->find($id);

        if (empty($shop)) {
            Flash::error('Shop not found');

            return redirect(route('shops.index'));
        }

        $shops = Shop::pluck('name', 'id')->toArray();

        return view('admin::shops.edit', compact('shops','shop','edit'));
    }

    /**
     * Update the specified Shop in storage.
     *
     * @param int $id
     * @param UpdateShopRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShopRequest $request)
    {
        $shop = $this->shopRepository->find($id);

        if (empty($shop)) {
            Flash::error('Shop not found');

            return redirect(route('shops.index'));
        }

        $shop = $this->shopRepository->update($request->all(), $id);

        Flash::success('Shop updated successfully.');

        return redirect(route('shops.index'));
    }

    /**
     * Remove the specified Shop from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shop = $this->shopRepository->find($id);

        if (empty($shop)) {
            Flash::error('Shop not found');

            return redirect(route('shops.index'));
        }

        $this->shopRepository->delete($id);

        Flash::success('Shop deleted successfully.');

        return redirect(route('shops.index'));
    }
}

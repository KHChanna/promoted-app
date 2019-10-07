<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Requests\CreateBannerRequest;
use App\Admin\Http\Requests\UpdateBannerRequest;
use App\Admin\Repositories\BannerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Admin\Models\Banner;

class BannerController extends AppBaseController
{
    /** @var  BannerRepository */
    private $bannerRepository;

    public function __construct(BannerRepository $bannerRepo)
    {
        $this->bannerRepository = $bannerRepo;
    }

    /**
     * Display a listing of the banner.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $banners = $this->bannerRepository->all();

        return view('admin::banners.index')
            ->with('banners', $banners);
    }

    /**
     * Show the form for creating a new banner.
     *
     * @return Response
     */
    public function create()
    {

        $banners = banner::pluck('title', 'id')->toArray();

        return view('admin::banners.create', compact('banners'));
    }

    /**
     * Store a newly created banner in storage.
     *
     * @param CreatebannerRequest $request
     *
     * @return Response
     */
    public function store(CreatebannerRequest $request)
    {
        $input = $request->all();

        if($request->hasFile('image')) {
            $filename = uniqid().time().'.'.$request->image->getClientOriginalExtension();
            $path = public_path('/uploads/images/banners');
            $request->image->move($path, $filename);
            $input = $input + ['image_name' => $filename];
        }

        $banner = $this->bannerRepository->create($input);

        Flash::success('banner saved successfully.');

        return redirect(route('banners.index'));
    }

    /**
     * Display the specified banner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            Flash::error('banner not found');

            return redirect(route('banners.index'));
        }

        return view('admin::banners.show')->with('banner', $banner);
    }

    /**
     * Show the form for editing the specified banner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            Flash::error('banner not found');

            return redirect(route('banners.index'));
        }

        $edit = 1;

        $banners = banner::pluck('title', 'id')->toArray();

        return view('admin::banners.edit', compact('banners','banner','edit'));
    }

    /**
     * Update the specified banner in storage.
     *
     * @param int $id
     * @param UpdatebannerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebannerRequest $request)
    {
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            Flash::error('banner not found');

            return redirect(route('banners.index'));
        }

        $input = $request->all();
        if($request->hasFile('image')) {
            $filename = uniqid().time().'.'.$request->image->getClientOriginalExtension();
            $path = public_path('/uploads/images/banners');
            $request->image->move($path, $filename);
            $input = $input + ['image_name'=>$filename];
        }


        if($request->chk_delete) {

              $image_path = public_path('/uploads/images/banners/'.$banner->image_name);
              if(file_exists($image_path)){
                  unlink($image_path);
              }
              $input = $input + ['image_name'=>''];
        }



        $banner = $this->bannerRepository->update($input , $id);

        Flash::success('banner updated successfully.');

        return redirect(route('banners.index'));
    }

    /**
     * Remove the specified banner from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            Flash::error('banner not found');

            return redirect(route('banners.index'));
        }

        if($banner->image_name != "") {
          $image_path = public_path('/uploads/images/banners/'.$banner->image_name);
          if(file_exists($image_path)){
              unlink($image_path);
          }
        }

        $this->bannerRepository->delete($id);

        Flash::success('banner deleted successfully.');

        return redirect(route('banners.index'));
    }
}

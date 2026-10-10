<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slider\SliderRequest;
use App\Models\ProductGroup;
use App\Models\Slider;
use App\service\imageService\ImageService;
use Exception;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliderCollections=collect();
        $sliders = Slider::class;
        $sliderCollections->put('total',$sliders::count());
        $sliderCollections->put('totalActive',$sliders::where('is_active','active')->count());
        $sliderCollections->put('totalInactive',$sliders::where('is_active','inactive')->count());
        $sliders=$sliders::search()->paginate(15)->withQueryString();
        return view('admin.slider.index', compact('sliders','sliderCollections'));
    }
    public function create()
    {
        $groups = ProductGroup::where('is_active', '1')->whereHas('products', function ($query) {
            $query->whereHas('productVariant', function ($query) {
                $query->where('stock', ">", 1);
            });
        })->cursor();
        $groups = $groups->map(function ($item) {
            $item->text = $item->name ?? '';
            return $item;
        });
        return view('admin.slider.create', compact('groups'));
    }

    public function edit(Slider $slider)
    {
        $groups = ProductGroup::where('is_active', '1')->whereHas('products', function ($query) {
            $query->whereHas('productVariant', function ($query) {
                $query->where('stock', ">", 1);
            });
        })->cursor();
        $groups = $groups->map(function ($item) {
            $item->text = $item->name ?? '';
            return $item;
        });
        return view('admin.slider.edit', compact('groups', 'slider'));
    }

    public function store(SliderRequest $request, ImageService $imageService)
    {

        try {
            $inputs = $request->all();

            $name = uniqid('', true);

            $path = $imageService->setFile($request->file('image'))->basePath(public_path())->setName($name)->setRootPath('slider')->generator();
            $size = $imageService->getFile()->getSize();
            $slider = Slider::create($inputs);
            $slider->image()->create(
                [
                    'path' => $path,
                    'size' => $size
                ]
            );
            return redirect()->route('admin.slider.index')->with(['success' => 'اسلایدر شما با موفقیت ساخته شد']);
        } catch (Exception $e) {
            return redirect()->route('admin.slider.index')->withErrors(['error' => "متاسفانه خطایی رخ داد با پشتیبانی تماش حاصل فرمایید."]);
        }
    }

    public function update(Slider $slider, SliderRequest $request, ImageService $imageService)
    {

        try {
            $inputs = $request->all();

            $name = uniqid('', true);
            if ($slider->image()->exists()) {
                $image = $slider->image;
                $imageService->basePath(public_path())->removeFile($image->path);
                $image->forceDelete();
            }

            $path = $imageService->setFile($request->file('image'))->basePath(public_path())->setName($name)->setRootPath('slider')->generator();
            $size = $imageService->getFile()->getSize();
            $slider->update($inputs);
            $slider->image()->create(
                [
                    'path' => $path,
                    'size' => $size
                ]
            );
            return redirect()->route('admin.slider.index')->with(['success' => 'اسلایدر شما با موفقیت ساخته شد']);
        } catch (Exception $e) {
            return redirect()->route('admin.slider.index')->withErrors(['error' => "متاسفانه خطایی رخ داد با پشتیبانی تماش حاصل فرمایید."]);
        }
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.slider.index')->with(['success' => 'اسلایدر با موفقیت حذف شد']);
    }
}

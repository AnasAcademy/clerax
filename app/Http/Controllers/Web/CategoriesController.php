<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Bundle;
use App\Models\Category;
use App\Models\FeatureWebinar;
use App\Models\Sale;
use App\Models\Ticket;
use App\Models\Translation\CategoryTranslation;
use App\Models\Webinar;
use App\Models\WebinarFilterOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index(Request $request, $categorySlug, $subCategorySlug = null)
    {

        if (!empty($categorySlug)) {

            $categoryQuery = Category::query()->where('slug', $categorySlug);

            if (!empty($subCategorySlug)) {
                $categoryQuery = Category::query()->where('slug', $subCategorySlug);
            }

            $category = $categoryQuery->withCount('webinars')
                ->with(['filters' => function ($query) {
                    $query->with('options');
                }])->first();

            if (!empty($category)) {
                $categoryIds = [$category->id];

                if (!empty($category->subCategories) and count($category->subCategories)) {
                    $categoryIds = array_merge($categoryIds, $category->subCategories->pluck('id')->toArray());
                }

                $featureWebinars = FeatureWebinar::whereIn('page', ['categories', 'home_categories'])
                    ->where('status', 'publish')
                    ->whereHas('webinar', function ($q) use ($categoryIds) {
                        $q->where('status', Webinar::$active);
                        $q->whereHas('category', function ($q) use ($categoryIds) {
                            $q->whereIn('id', $categoryIds);
                        });
                    })
                    ->with(['webinar' => function ($query) {
                        $query->with(['teacher' => function ($qu) {
                            $qu->select('id', 'full_name', 'avatar');
                        }, 'reviews', 'tickets', 'feature']);
                    }])
                    ->orderBy('updated_at', 'desc')
                    ->get();


                $webinarsQuery = Webinar::where('webinars.status', 'active')
                    ->where('private', false)
                    ->whereIn('category_id', $categoryIds);

                $classesController = new ClassesController();
                $moreOptions = $request->get('moreOptions');
                $tableName = 'webinars';

                if (!empty($moreOptions) and is_array($moreOptions) and in_array('bundles', $moreOptions)) {
                    $webinarsQuery = Bundle::where('bundles.status', 'active')
                        ->whereIn('category_id', $categoryIds);

                    $tableName = 'bundles';
                    $classesController->tableName = 'bundles';
                    $classesController->columnId = 'bundle_id';
                }

                $webinarsQuery = $classesController->handleFilters($request, $webinarsQuery);

                $sort = $request->get('sort', null);

                if (empty($sort)) {
                    $webinarsQuery = $webinarsQuery->orderBy("{$tableName}.created_at", 'desc');
                }

                $webinars = $webinarsQuery->with(['tickets'])
                    ->paginate(6);

                $seoSettings = getSeoMetas('categories');
                $pageTitle = !empty($seoSettings['title']) ? $seoSettings['title'] : trans('site.categories_page_title');
                $pageDescription = !empty($seoSettings['description']) ? $seoSettings['description'] : trans('site.categories_page_title');
                $pageRobot = getPageRobot('categories');

                $data = [
                    'pageTitle' => $pageTitle,
                    'pageDescription' => $pageDescription,
                    'pageRobot' => $pageRobot,
                    'category' => $category,
                    'webinars' => $webinars,
                    'featureWebinars' => $featureWebinars,
                    'webinarsCount' => $webinars->total(),
                    'sortFormAction' => $category->getUrl(),
                ];

                return view(getTemplate() . '.pages.categories', $data);
            }
        }

        abort(404);
    }


    public function index_2(){
        $structuredCategories = Category::whereNull('parent_id')
            ->with([
                'subCategories' => function ($query) {
                    $query->orderBy('order', 'asc')
                        ->with([
                            'webinars' => function ($query) {
                                $query->orderBy('created_at', 'desc')
                                    ->with(['creator.organization']);
                            }
                        ]);
                }
            ])
            ->orderBy('order', 'asc')
            ->get();

            $latestsubCategories = Category::whereNotNull('parent_id')
            ->with([
                'webinars' => function ($query) {
                    $query->orderBy('created_at', 'desc')
                        ->with(['creator.organization']);
                }
            ])
            ->orderBy('order', 'asc')
            ->get();
 
        $featureSubCategories = Category::whereNotNull('parent_id')
            ->whereHas('webinars', function ($query) {
                $query->whereHas('feature', function ($q) {
                    $q->whereIn('page', ['home', 'home_categories'])
                        ->where('status', 'publish');
                });
            })
            ->with([
                'webinars' => function ($query) {
                    $query->whereHas('feature', function ($q) {
                        $q->whereIn('page', ['home', 'home_categories'])
                            ->where('status', 'publish');
                    })
                        ->orderBy('created_at', 'desc')
                        ->with('creator.organization');
                }
            ])
            ->orderBy('order', 'asc')
            ->get();
               $featureWebinars = FeatureWebinar::whereIn('page', ['home', 'home_categories'])
                ->where('status', 'publish')
                ->whereHas('webinar', function ($query) {
                    $query->where('status', Webinar::$active);
                })
                ->with([
                    'webinar' => function ($query) {
                        $query->with([
                            'teacher' => function ($qu) {
                                $qu->select('id', 'full_name', 'avatar');
                            },
                            'reviews' => function ($query) {
                                $query->where('status', 'active');
                            },
                            'tickets',
                            'feature'
                        ]);
                    }
                ])
                ->orderBy('updated_at', 'desc')
                ->get();
           $data = [
                    'categories'=>$structuredCategories,
                    'featureSubCategories' => $featureSubCategories,
                    'latestsubCategories' => $latestsubCategories,
                    'featureWebinars' => $featureWebinars,
                ];

        return view(getTemplate() . '.category.index', $data);


    }

    public function show($slug)
{
   $category = Category::with([
        'subCategories' => function ($query) {
            $query->orderBy('order', 'asc')
                ->with([
                    'webinars' => function ($query) {
                        $query->orderBy('created_at', 'desc')
                              ->with(['creator.organization']);
                    }
                ]);
        }
    ])->where('slug', $slug)->firstOrFail();

        $latestsubCategories = Category::whereNotNull('parent_id')
            ->with([
                'webinars' => function ($query) {
                    $query->orderBy('created_at', 'desc')
                        ->with(['creator.organization']);
                }
            ])
            ->orderBy('order', 'asc')
            ->get();

            $data = [
                    'latestsubCategories' => $latestsubCategories,
                    'category' => $category,
                ];
    
    return view(getTemplate() . '.category.show', $data);
}

}

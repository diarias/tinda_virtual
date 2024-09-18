@php
    $categoryProductSliderSectionOne = json_decode($categoryProductSliderSectionOne->value);
    $lastKey = [];
    $category = null;
    $products = collect(); // Inicializar como una colección vacía para evitar errores en el foreach

    foreach($categoryProductSliderSectionOne as $key => $category){
        if($category === null ){
            break;
        }
        $lastKey = [$key => $category];
    }

    if(array_keys($lastKey)[0] === 'category'){
        $category = \App\Models\Category::find($lastKey['category']);
        if ($category) {
            $products = \App\Models\Product::withAvg('reviews', 'rating')->withCount('reviews')
                ->with(['variants', 'category', 'productImageGalleries'])
                ->where('category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
        }
    } elseif(array_keys($lastKey)[0] === 'sub_category'){
        $category = \App\Models\SubCategory::find($lastKey['sub_category']);
        if ($category) {
            $products = \App\Models\Product::withAvg('reviews', 'rating')->withCount('reviews')
                ->with(['variants', 'category', 'productImageGalleries'])
                ->where('sub_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
        }
    } else {
        $category = \App\Models\ChildCategory::find($lastKey['child_category']);
        if ($category) {
            $products = \App\Models\Product::withAvg('reviews', 'rating')->withCount('reviews')
                ->with(['variants', 'category', 'productImageGalleries'])
                ->where('child_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
        }
    }
@endphp
<section id="wsus__electronic">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    @if ($category)
                        <h3>{{$category->name}}</h3>
                        <a class="see_btn" href="{{route('products.index', ['category' => $category->slug])}}">see more <i class="fas fa-caret-right"></i></a>
                    @else
                        <h3>Categoría no encontrada</h3>
                    @endif
                </div>
            </div>
        </div>
        <div class="row flash_sell_slider">
            @if ($category)
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            @else
                <p>No se encontraron productos para esta categoría.</p>
            @endif
        </div>
    </div>
</section>

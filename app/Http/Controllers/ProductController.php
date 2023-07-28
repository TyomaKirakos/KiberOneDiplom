<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidation;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Фукнция показа панели управления товарами
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showProductsPanel()
    {
        $products = DB::table('products')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.products.products', ['products' => $products]);
    }

    /**
     * Фукнция показа страницы добавления товара
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showProductsCreation()
    {
        return view('admin.products.createProduct');
    }

    /**
     * Фукнция добавления товара
     * @param ProductValidation $productValidation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createProduct(ProductValidation $productValidation)
    {
        $validation = $productValidation->validated();
        Product::create($validation);
        return redirect()->route('products-panel');
    }

    /**
     * Фукнция показа страницы редактирования товара
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showUpdateProduct($id)
    {
        $product = Product::find($id);
        return view('admin.products.updateProduct', compact('product'));
    }

    /**
     * Фукнция редактирования товара
     * @param Product $product
     * @param ProductValidation $productValidation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProduct(Product $product, ProductValidation $productValidation)
    {
        $product->update($productValidation->validated());
        return redirect()->route('products-panel');
    }

    /**
     * Фукнция удаления товара
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProduct($id)
    {
        DB::table('products')->where('id', '=', $id)->delete();
        return redirect()->route('products-panel');
    }
}

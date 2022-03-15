<?php
namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\Category;
use App\Models\ComputerCompany;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $pageSize = 10;
        $column_names = [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá',
        ];

        $order_by = [
            'asc' => 'Tăng dần',
            'desc' => 'Giảm dần'
        ];


        $keyword = $request->has('keyword') ? $request->keyword : "";
        $cate_id = $request->has('category_id') ? $request->cate_id : "";
        $rq_order_by = $request->has('order_by') ? $request->order_by : 'asc';
        $rq_column_names = $request->has('column_names') ? $request->column_names : "id";

        // dd($keyword, $cate_id, $rq_column_names, $rq_order_by);
        $query = Product::where('name', 'like', "%$keyword%");
        if ($rq_order_by == 'asc') {
            $query->orderBy($rq_column_names);
        } else {
            $query->orderByDesc($rq_column_names);
        }

        if (!empty($cate_id)) {
            $query->where('category_id', $cate_id);
        }
        $products = $query->paginate($pageSize);
        $categories = ComputerCompany::all();
        $products->load('category');
        $searchData = compact('keyword', 'cate_id');
        $searchData['order_by'] = $rq_order_by;
        $searchData['column_names'] = $rq_column_names;
        return view('admin.products.index', compact('products', 'categories', 'column_names', 'order_by', 'searchData'));
        // return response()->json($products);
    }

    public function remove($id)
    {
        $model = Product::find($id);
        if(!empty($model->image)){
            $imgPath = str_replace('storage/', '', $model->image);
            Storage::delete($imgPath);
        }
        $model->delete();
        return redirect(route('product.index'))->with('success','Xóa thành công');
    }
    public function addForm()
    {

        $categories = ComputerCompany::all();
        return view('admin.products.add', compact('categories'));
    }
    public function saveAdd(Request $request)
    {
        $model = new Product();
        if($request->hasFile('image')){
            $imgPath = $request->file('image')->store('public/products');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->image = $imgPath;
        }
        
        $model->fill($request->all());
        $model->save();
        return redirect(route('product.index'));
    }

    public function editForm($id)
    {
        $pro = Product::find($id);
        if (!$pro) {
            return back();
        }
        $categories = Category::all();
        return view(
            'admin.products.edit',
            compact('pro', 'categories')
        );
    }
    public function saveEdit(Request $request,$id)
    {   
        // $request la gui du lieu len
        // dd($request->name)
        $model = Product::find($id);

        if (!$model) {
            return back();
        }
        if($request->hasFile('image')){
            // $oldImg = str_replace('storage/', 'public/', $model->image);
            Storage::delete($model->image);

            $imgPath = $request->file('image')->store('public/products');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->image = $imgPath;
        }
        
        $model->fill($request->all());
        $model->save();
        return redirect(route('product.index'));
    }
    
}


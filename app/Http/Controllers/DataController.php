<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\bill_detail;
use App\Models\ComputerCompany;
use App\Models\User;
use App\Models\DetailProduct;
use App\Models\Booking;
use App\Models\BillDetail;
use App\Models\CategoryComponent;
use App\Models\Component;
use App\Models\list_bill;
use App\Models\Product;
use App\Models\UserRepair;
use Illuminate\Http\Request;
use Nette\Schema\Expect;
use PhpParser\Node\Stmt\TryCatch;
use SebastianBergmann\Environment\Console;
use Svg\Tag\Rect;

class DataController extends Controller
{
    public function searchproduct(Request $request)
    {
        $name = $request->only('name');
        $products = Product::where('name', 'like', '%' . $name['name'] . '%')->get();
        return response()->json(['products' => $products], 200);
    }
    public function LayDuLieuTheoNgay(SearchRequest $request)
    {
        $input = $request->only('timestart', 'timeend');
        $start = $input['timestart'];
        $end = $input['timeend'];
        $total_category = ComputerCompany::whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->count('id');
        $total_product = Product::whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->count('id');
        $total_user = User::whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->count();
        $total_mua_hang = list_bill::whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->count('id');
        $total_danh_muc_linh_kien = CategoryComponent::whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->count('id');
        $total_linh_kien = Component::whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->count('id');
        $total_dat_lich = Booking::whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->count('id');

        //data sản phẩm
        $datasanphamban = [];
        $socacsanphamdaban = bill_detail::whereNotNull('product_id')->whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->distinct()->limit(10)->pluck('product_id');
        foreach ($socacsanphamdaban as $sanpham) {
            try {
                $product = Product::whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->where('id', $sanpham)->get();
                array_push($datasanphamban, [['name' => $product[0]->name, 'quaty' => bill_detail::where('product_id', $sanpham)->count()]]);
            } catch (\Throwable $th) {
                continue;
            }
        }
        //data nhân viên
        $datanhanvien = [];
        $socacnhanvien = UserRepair::where('status', 2)->whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->distinct()->limit(10)->pluck('user_id');
        foreach ($socacnhanvien as $nhanvien) {
            try {
                $profile = User::whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->where('id', $nhanvien)->get();
                array_push($datanhanvien, [['name' => $profile[0]->name, 'quaty' => UserRepair::where('user_id', $nhanvien)->count()]]);
            } catch (\Throwable $th) {
                continue;
            }
        }

        return response()->json([
            'total_category' => $total_category,
            'total_product' => $total_product,
            'total_user' => $total_user,
            'total_mua_hang' => $total_mua_hang,
            'total_danh_muc_linh_kien' => $total_danh_muc_linh_kien,
            'total_linh_kien' => $total_linh_kien,
            'total_dat_lich' => $total_dat_lich,
            'datasanphamban' => $datasanphamban,
            'datanhanvien' => $datanhanvien,

        ]);
    }
    public function bieudo(Request $request)
    {
        $input = $request->only('timestart', 'timeend');
        return $this->laydatadoanhthu($input['timestart'], $input['timeend']);
    }
    public function bieudosuachua(Request $request)
    {
        $input = $request->only('timestart', 'timeend');
        return $this->doanhthusuachua($input['timestart'], $input['timeend']);
    }
    public function bieudoban(Request $request)
    {
        $input = $request->only('timestart', 'timeend');
        return $this->databan($input['timestart'], $input['timeend']);
    }
    public function databan($start, $end)
    {
        $doanhthutong = list_bill::where('type', 2)->whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->sum('total_price');
        $sotiennhap = bill_detail::whereNotNull('product_id')->whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->sum('nhap');
        $sotienban = bill_detail::whereNotNull('product_id')->whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->sum('ban');
        $sotienlai = $sotienban - $sotiennhap;
        return [
            'doanhthutong' => $doanhthutong,
            'sotiennhap' => $sotiennhap,
            'sotienban' => $sotienban,
            'sotienlai' => $sotienlai
        ];
    }
    public function laydatadoanhthu($start, $end)
    {
        $doanhthutong = list_bill::whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->sum('total_price');
        $sotiennhap = bill_detail::whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->sum('nhap');
        $sotienban = bill_detail::whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->sum('ban');
        $sotienlai = $sotienban - $sotiennhap;
        return [
            'doanhthutong' => $doanhthutong,
            'sotiennhap' => $sotiennhap,
            'sotienban' => $sotienban,
            'sotienlai' => $sotienlai
        ];
    }
    public function doanhthusuachua($start, $end)
    {
        $doanhthutong = list_bill::where('type', 1)->whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->sum('total_price');
        $sotiennhap = bill_detail::whereNotNull('component_id')->whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->sum('nhap');
        $sotienban = bill_detail::whereNotNull('component_id')->whereDate('created_at', '>', $start)->WhereDate('created_at', '<=', $end)->sum('ban');
        $sotienlai = $sotienban - $sotiennhap;
        return [
            'doanhthutong' => $doanhthutong,
            'sotiennhap' => $sotiennhap,
            'sotienban' => $sotienban,
            'sotienlai' => $sotienlai
        ];
    }
}

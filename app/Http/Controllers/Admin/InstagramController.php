<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class InstagramController extends Controller
{
    public function index()
    {
        $api = DB::table('db_instagram')->select('*')->get();
        return view('admin/api/instagram_index', compact('api'));
    }
    public function edit($id)
    {
        //Lấy dữ liệu từ Database với các trường được lấy và với điều kiện id = $id
        $getData = DB::table('db_instagram')->select('*')->where('id',$id)->get();
        
        
        return view('admin/api/instagram_edit')->with('getSanphamById',$getData);
    }

    public function update(Request $request)
    {
        //Cap nhat 
        //Set timezone
       
    
        //Thực hiện câu lệnh update với các giá trị $request trả về
        $updateData = DB::table('db_instagram')->where('id', $request->id)->update([
            'id_user' => $request->id_user,
            'token' => $request->token, 
        ]);
        
        //Kiểm tra lệnh update để trả về một thông báo
       
        
        //Thực hiện chuyển trang
        return redirect('hrm/api/instagram');
    } 
}

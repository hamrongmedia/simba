<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
class ContactphoneController extends Controller
{
    public function index()
    {
        $phone = DB::table('contactphone')->select('*')->get();
        return view('admin/pages/customer_contact/contact_phone_index', compact('phone'));
    }
    public function delete($id)
    {
       
        DB::table('contactphone')->where('id','=', $id)->delete();
        
        return redirect('hrm/contact/phone');
    }
    public function edit($id)
    {
        //Lấy dữ liệu từ Database với các trường được lấy và với điều kiện id = $id
        $getData = DB::table('contactphone')->select('*')->where('id',$id)->get();
        
        
        return view('admin/pages/customer_contact/contact_phone_edit')->with('getPhoneById',$getData);
    }

    public function update(Request $request)
    {
        //Cap nhat 
        //Set timezone
       
    
        //Thực hiện câu lệnh update với các giá trị $request trả về
        $updateData = DB::table('contactphone')->where('id', $request->id)->update([
            'phone' => $request->phone, 
        ]);
        
        //Kiểm tra lệnh update để trả về một thông báo
       
        
        //Thực hiện chuyển trang
        return redirect('hrm/contact/phone');
    } 
    public function create()
    {
        return view('admin/pages/customer_contact/contact_phone_create');
    }
    public function store(Request $request)
    {
        //Lấy giá trị đã nhập
        $allRequest  = $request->all();
        $phone = $allRequest['phone'];
        //Gán giá trị vào array
        $dataInsertToDatabase = array(
            'phone' => $phone,
        );
        
        //Insert vào bảng
        $insertData = DB::table('contactphone')->insert($dataInsertToDatabase);
        Session::put('message','Thêm số điện thoại thành công !');
        return redirect()->back()->withInput();
    }
}

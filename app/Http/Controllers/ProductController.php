<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    private $products = [
    ['id' => 1, 'name' => 'Laptop',
   'description' => 'เร็ว แรง บางเบา ตอบทุกโจทย์การทำงานและความบันเทิง',
   'price' => 1500 ,'image' =>'https://i.pinimg.com/236x/79/9f/6d/799f6dded9a4c35ced3d1ff12c613e9b.jpg'],
    ['id' => 2, 'name' => 'Smartphone',
   'description' => 'กล้องชัดจนต้องระวัง อย่าเซลฟี่ตอนหน้าโทรม!',
   'price' => 800,'image' =>'https://i.pinimg.com/236x/bf/ec/f2/bfecf2b0a771b425f056381be43e084c.jpg'],
    ['id' => 3, 'name' => 'Tablet',
   'description' => 'บาง เบา พกสะดวก แต่พลังเหลือล้นเกินตัว!',
   'price' => 500,'image' =>'https://i.pinimg.com/236x/a3/22/cf/a322cf6818888e34e89902d472d9d8e9.jpg'],
   ['id' => 4, 'name' => 'Laptop',
   'description' => 'เครื่องเดียวทำได้ทุกอย่าง งาน เกม ความบันเทิง ครบจบ!',
   'price' => 1300,'image' =>'https://i.pinimg.com/236x/64/f2/91/64f2914c7cabbbd876bc260cad5fa5bd.jpg'],
    ['id' => 5, 'name' => 'Smartphone',
   'description' => 'ดีไซน์พรีเมียม ฟีเจอร์จัดเต็ม ตอบทุกความต้องการของคุณ',
   'price' => 750,'image' =>'https://i.pinimg.com/236x/24/22/32/24223258deb2711a6cfb6ffe2ba3b5e9.jpg'],
    ['id' => 6, 'name' => 'Tablet',
   'description' => 'พกพาง่าย ใช้งานคล่อง ตัวจริงเรื่องไลฟ์สไตล์ดิจิทัล',
   'price' => 550,'image' =>'https://i.pinimg.com/236x/94/be/c0/94bec0ec1263d81dee96e83d7d678ce2.jpg'],
   ['id' => 7, 'name' => 'Laptop',
   'description' => 'ดีไซน์เรียบหรู ฟังก์ชันครบ ตอบโจทย์มือโปรทุกคน',
   'price' => 1700,'image' =>'https://i.pinimg.com/236x/27/53/3d/27533de5cf096e588baf5e4ace6e0d46.jpg'],
    ['id' => 8, 'name' => 'Smartphone',
   'description' => 'แบตอึด เล่นเกมแรง เซลฟี่สวย ครบทุกฟังก์ชันที่ต้องการ',
   'price' => 950,'image' =>'https://i.pinimg.com/236x/72/a0/fc/72a0fc380325949f5c0f54e867e08fb3.jpg'],
    ['id' => 9, 'name' => 'Tablet',
   'description' => 'ใหญ่กว่ามือถือ เล็กกว่าคอมพ์ ตอบโจทย์ทุกความต้องการ',
   'price' => 450,'image' =>'https://i.pinimg.com/236x/7a/4d/1f/7a4d1f8f2a5a5387115ac167c1780737.jpg'],
   ['id' => 10, 'name' => 'Laptop',
   'description' => 'เล่นเกมก็เทพ ทำงานก็โปร เบาแต่ไม่ธรรมดา',
   'price' => 1550,'image' =>'https://i.pinimg.com/236x/7e/d8/a6/7ed8a67549da41a56022b969f5b501e9.jpg'],
    ['id' => 11, 'name' => 'Smartphone',
   'description' => 'กล้องชัด หน้าจอสวย ใช้งานลื่น ตอบสนองทุกไลฟ์สไตล์',
   'price' => 950,'image' =>'https://i.pinimg.com/236x/01/2c/c1/012cc1ac6bf35e514a761ff852f22d6e.jpg'],
    ['id' => 12, 'name' => 'Tablet',
   'description' => 'เหมาะทั้งเรียน เล่น หรือทำงาน พร้อมทุกสถานการณ์',
   'price' => 700,'image' =>'https://i.pinimg.com/236x/80/dc/3b/80dc3bf3cd2e9679c0f481873c4997d1.jpg'],
    ];
   
    /**
     * Display a listing of the resource.
     */
    public function index() :Response
    {
        // ส่งข้อมูลสินค้าไปยังหน้า Products/Index โดยใช้ Inertia.js
        return Inertia::render('Products/Index', [
            'products' => $this->products // ส่งข้อมูลสินค้าทั้งหมดให้กับ  React ที่ใช้ในการแสดงผล
        ]);
    }

    /**
     * แสดงฟอร์มสำหรับสร้างสินค้ารายการใหม่
     */
    public function create()
    {

    }

    /**
     * บันทึกสินค้าที่สร้างใหม่ลงในฐานข้อมูล
     */
    public function store(Request $request)
    {
    
    }

    /**
     * แสดงรายละเอียดสินค้าที่เลือกตาม ID
     */
    public function show(string $id)
    {
        // ค้นหาสินค้าตาม ID ที่ได้รับ
        $product = collect($this->products)->firstWhere('id', $id);

        // ถ้าไม่พบสินค้าให้แสดง error 404
        if (!$product) {
            abort(404, 'Product not found'); // ใช้ abort เพื่อส่งสถานะ error 404
        }

        // ส่งข้อมูลสินค้าที่พบไปยังหน้า Products/Show
        return Inertia::render('Products/Show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

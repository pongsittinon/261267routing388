import React from 'react'; // นำเข้า React
import { Link, Head } from '@inertiajs/react'; // นำเข้า Link สำหรับการทำ routing และ Head สำหรับการตั้งชื่อหัวเรื่องของหน้า
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'; // นำเข้า Layout สำหรับจัดการเลย์เอาต์
import './index.css'; // นำเข้าไฟล์ CSS สำหรับการตกแต่ง
export default function Index({ products, auth }) { // คอมโพเนนต์ Index รับ props ที่ชื่อว่า products และ auth
    return (
        <AuthenticatedLayout> {/* ส่ง auth ไปที่ AuthenticatedLayout */}
            <Head title="Products" /> {/* กำหนดชื่อหัวข้อของหน้าเป็น "Products"อันนี้ไม่ใส่ก็ได้ */}
            <div className="container"> {/* div หลักที่เก็บเนื้อหาทั้งหมด */}
                <h1 className="page-title">Product สินค้า</h1> {/* แสดงชื่อหน้า */}
                <ul className="product-list"> {/* รายการสินค้าทั้งหมด */}
                    {products.map((product) => ( // ใช้ map เพื่อวนลูปรายการสินค้าใน products
                        <li key={product.id} className="product-item"> {/* ใช้ id ของสินค้าเป็น key */}
                            <div className="product-card"> {/* การ์ดของสินค้า */}
                                <div className="product-image-container"> {/* div สำหรับแสดงรูปสินค้า */}
                                    <img
                                        src={product.image} // แสดงรูปภาพของสินค้า
                                        alt={product.name} // ชื่อสินค้าสำหรับ alt text
                                        className="product-image" // ใช้ class สำหรับตกแต่ง CSS
                                    />
                                </div>
                                <div className="product-info"> {/* div สำหรับข้อมูลสินค้า */}
                                    <h2 className="product-name">{product.name}</h2> {/* แสดงชื่อสินค้า */}
                                    <p className="product-price">${product.price}</p> {/* แสดงราคาสินค้า */}
                                    <Link
                                        href={`/products/${product.id}`} // ลิงก์ไปยังหน้ารายละเอียดของสินค้านั้นๆ
                                        className="product-button" // ใช้ class สำหรับตกแต่งปุ่ม
                                    >
                                        View Details 
                                    </Link>
                                </div>
                            </div>
                        </li>
                    ))}
                </ul>
            </div>
        </AuthenticatedLayout>
    );
}
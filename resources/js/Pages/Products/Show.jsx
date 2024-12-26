import React from 'react'; // นำเข้า React
import { Link } from '@inertiajs/react'; // นำเข้า Link จาก Inertia.js เพื่อใช้สำหรับการทำ routing

export default function Show({ product }) { // คอมโพเนนต์ Show รับ props ที่ชื่อว่า product
    return (
        <div className="product-detail-container"> {/* กำหนด div หลักที่เก็บเนื้อหาทั้งหมด */}
            <div className="product-detail"> {/* div ที่เก็บรายละเอียดของสินค้า */}
                <div className="product-image-container"> {/* div ที่ใช้เก็บรูปภาพสินค้า */}
                    <img
                        src={product.image} // ใช้รูปภาพจากข้อมูลของสินค้า
                        alt={product.name} // ใช้ชื่อของสินค้าสำหรับ alt text ของรูปภาพ
                        className="product-detail-image" // ใช้ class สำหรับการตกแต่ง CSS
                    />
                </div>
                <div className="product-detail-info"> {/* div สำหรับแสดงข้อมูลรายละเอียดของสินค้า */}
                    <h1 className="product-name">{product.name}</h1> {/* แสดงชื่อสินค้า */}
                    <p className="product-description">{product.description}</p> {/* แสดงคำอธิบายของสินค้า */}
                    <div className="product-price">${product.price}</div> {/* แสดงราคา */}
                    <Link href="/products" className="back-button"> {/* Link ที่เชื่อมไปยังหน้าผลิตภัณฑ์ทั้งหมด */}
                        Back to Products {/* ข้อความในปุ่ม */}
                    </Link>
                </div>
            </div>
        </div>
    );
}
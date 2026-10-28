# Đối chiếu giao diện Chương 2 — BT03

## Bảng chuyển đổi

| Giao diện Chương 2 | Đường dẫn PHP mới | Chức năng và truy vấn | Bảng dữ liệu | Thành viên thực hiện |
|---|---|---|---|---|
| Trang chủ HB Home | `index.php?page=home` | Danh sách nhà trọ nổi bật bằng `SELECT`, `JOIN phong`, lặp `foreach`; liên kết sang danh sách phòng | `nha_tro`, `phong` | Nhóm trưởng cập nhật theo phân công |
| Tìm phòng | `index.php?page=rooms` | Lọc phòng theo từ khóa, loại, giá, trạng thái; `SELECT` với `JOIN` 3 bảng; lặp `foreach` | `phong`, `nha_tro`, `loai_phong` | Nhóm trưởng cập nhật theo phân công |
| Admin tổng quan | `admin/index.php?page=dashboard` | Tổng hợp số phòng theo trạng thái | `phong` | Nhóm trưởng cập nhật theo phân công |
| Admin quản lý phòng | `admin/index.php?page=rooms` | Danh sách phòng từ MySQL; thêm phòng qua POST, kiểm tra đầu vào, Prepared Statement và Post/Redirect/Get | `phong`, `nha_tro`, `loai_phong` | Nhóm trưởng cập nhật theo phân công |
| Admin lịch sử thao tác (đổi thành danh sách hợp đồng) | `admin/index.php?page=history` | Danh sách hợp đồng thật bằng `JOIN`, lặp `foreach` | `hop_dong`, `khach_thue`, `phong`, `nha_tro` | Nhóm trưởng cập nhật theo phân công |

## Ảnh minh chứng

> Lưu ảnh chụp thực tế vào `evidence/` bằng đúng tên dưới đây trước khi nộp. Ảnh cũ phải là ảnh chụp trước khi chuyển dữ liệu mảng mô phỏng sang MySQL; ảnh mới là ảnh sau khi import CSDL và chạy localhost.

| Trước chuyển đổi (Chương 2) | Sau chuyển đổi (BT03) |
|---|---|
| `evidence/cu-public-rooms.png` — trang Tìm phòng cũ | `evidence/moi-public-rooms.png` — `index.php?page=rooms`, dữ liệu MySQL |
| `evidence/cu-admin-rooms.png` — Quản lý phòng cũ | `evidence/moi-admin-rooms.png` — `admin/index.php?page=rooms`, danh sách và form POST |

## Xác nhận phân công

Không thay đổi phân công trong lần chuyển đổi này. Trước khi nộp, nhóm trưởng điền tên thành viên vào cột trên và xác nhận: `Nhóm trưởng: ____________________  Ngày: __________`.

Nếu có thay đổi phân công, bổ sung ngay dưới đây lý do, phần việc chuyển giao và chữ ký/xác nhận của nhóm trưởng.

## Cách chạy để chụp ảnh mới

1. Import `database/quan_ly_phong_tro.sql` vào MySQL và bật Apache/MySQL trong XAMPP.
2. Mở `http://localhost/<thu-muc-du-an>/index.php?page=rooms` và `http://localhost/<thu-muc-du-an>/admin/index.php?page=rooms`.
3. Chụp hai trang, lưu theo các tên ảnh ở trên.

Khu Admin là mô phỏng phục vụ BT03, chỉ thao tác trên localhost; không được xem là hệ thống quản trị an toàn để triển khai Internet.

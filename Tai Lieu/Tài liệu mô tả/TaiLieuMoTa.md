Tài Liệu Phân Tích Quản Lý Câu Lạc Bộ

1. **Giới Thiệu**
1. Vấn đề và ý tưởng
- Hiện nay ở các trường đa số trường đại học đều có rất nhiều các câu lạc bộ được thành lập ra để cho các bạn sinh viên trường mình được giao lưu kết nối với nhau.
- Tuy nhiên đối với các bạn sinh viên mới, thì việc tìm hiểu về một câu lạc bộ thì khá là khó khăn. Do các bạn nhút nhát và cũng không có nhiều thông tin về các câu lạc bộ 
- Mặt khác thì nhà trường cũng khá khó khăn trong việc quản lý các câu lạc bộ. 
- Trang web quản lý câu lạc bộ ra đời với mục đích giải quyết các vấn đề trên.
1. Nền tảng
- Web (Windows, linux, macos, mobie,..)
1. **Đối Tượng Sử Dụng**
1. Người Sử dụng
- Có 3 đối tượng chính: Người Dùng, Quản lý Câu lạc bộ, Admin
  1. Khách vãn lai (Người dùng chưa có tài khoản):
- Xem thông tin về trường, câu lạc bộ, đọc báo, …
- Đăng kí 
  1. Người Dùng:
- Có tất cả chức năng của Khách vãn lai
- Đăng nhập, đăng xuất
- Làm đơn xin vào các câu lạc bộ
- Nhận thông báo từ câu lạc bộ (email, trên web).
- Quản lý các nhóm câu lạc bộ mà mình đã tham gia 



1. Quản Lý câu lạc bộ:
- Đăng nhập, đăng xuất
- Viết bài báo, thông báo
- Chỉnh sửa thông tin của câu lạc bộ
- Xem các đơn xin vào clb của người dùng. 
- Duyệt thành viên vào câu lạc bộ
- Duyệt thành viên rời câu lạc bộ
- Xóa thành viên khỏi câu lạc bộ 
  1. Admin:
- Đăng nhập, đăng xuất.
- Tạo tài khoản quản lý câu lạc bộ
- Xóa câu lạc bộ
1. Mối Quan hệ giữa các đối tượng sử dụng
   1. Người dùng và quản lý Câu lạc bộ:
- Người dùng xin vào, ra câu lạc bộ, Quản lý CLB có thể duyệt trực tiếp
- Quản lý CLB có thể xóa thành viên ra khỏi câu lạc bộ
- Quản lý CLB câu lạc bộ có thể liên lạc trực tiếp với người dùng
  1. Quản lý câu lạc bộ với admin:
- Admin tạo tài khoản cho Quản lý câu lạc bộ.
- Admin có thể trực tiếp xóa tài khoản Quản lý câu lạc bộ 

1. **Phân Tích chức năng của người dùng**
1. Tính năng chung
   1. Tổng quan về Trang (trang chủ):
- Giới thiệu về trang quản lý câu lạc bộ, thời gian làm việc, …
- Giới thiệu về nhóm quản lý câu lạc bộ
- Thông báo mới, các thông báo, bài báo của các câu lạc bộ
- Xem các hoạt động của Các câu lạc bộ
  1. Thông tin thông báo
- Xem và đọc các thông tin và bài báo mới

1. Câu lạc bộ và nhóm
- Hiện các thông tin cơ bản của câu lạc bộ (Tên, chủ nhiệm). có đường dẫn để xem chi tiết câu lạc bộ
- Có phần tìm kiếm theo tên hoặc chủ nhiệm
  1. Chi tiết câu lạc bộ.
     1. Tổng quan
- Hiện đầy đủ thông tin của câu lạc bộ
- Có phần thông báo và phần hoạt động của nhóm
- Phần cuối cùng có phần xin gia nhập câu lạc bộ (Người dùng có tài khoản)
  1. Thông báo:
- Bao gồm các thông báo công khai và đặc quyền của người trong clb (Đối với những người đã tham gia)
  1. Hoạt Động
- Bao gồm các hoạt động của câu lạc bộ đã tham gia
1. Tính năng về tài khoản
- Đối với các sinh viên có tài khoản sẽ có thêm chức năng quản lý bao gồm
- Quản lý tài khoản
- Quản lý các câu lạc bộ
- Và phần chat 



- Sô Đồ phần người dùng

![Diagram

Description automatically generated with medium confidence](Aspose.Words.b8d9374e-a387-4247-b0f0-72ee251145df.001.png)



1. **Phân tích chức năng của quản lý câu lạc bộ**
1. Tổng Quan
- Tổng quan về số người tham gia clb
- Số người xin vào
1. Quản lý thành viên:
- Xác nhận thành viên vào clb
- Quản lý đuổi cấm thành viên
1. Quản lý bài đăng thông báo
1. Nhắn tin 
1. Chỉnh sửa thông tin của clb
1. **Phân tích chức năng admin**
1. Tổng quan
- Số lượng user mới
- Số bài đăng mới
1. Nhắn tin
- Chỉ với các quản trị viên quản lý câu lạc bộ
1. Quản lý các câu lạc bộ
- Xem các câu lạc bộ
- Khởi tạo câu lạc bộ mới
- Từ chối quyền truy cập câu lạc bộ
1. Quản lý bài đăng
- Xác nhận, hoặc xóa các bài đăng
1. Quản lý Thành viên nữa
- Reset token



- Sơ đồ trang web

![Timeline

Description automatically generated](Aspose.Words.b8d9374e-a387-4247-b0f0-72ee251145df.002.png)



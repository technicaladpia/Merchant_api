# merchant_api
### 1. Api getMerchantConversions
-Api: `` http://event.adpia.vn/apiv2/getMerchantConversions``;
-method: POST;
- Api này trả về các trường sau:
```bash
`sdate`: lấy dữ liệu từ ngày;
`fdate` :lấy đến ngày;
`count` :tổng số bản ghi được lấy ra;
`page`: phân trang
`status`: trạng thái với 5 trạng thái: 100, 200, 210, 300, 310;
`data`: {
	`ymd` : ngày tạo ở dạng string, ví dụ:20190612;
	`his` : giờ tạo cũng ở dạng string, ví dụ:120302;
	`conversion_id`;
	`ocd` : mã đặt hàng;
	`pcd`: mã sản phẩm;
	`ccd`: mã của danh mục;
	`pname`: tên của sản phẩm;
	`sales` :tổng giá giảm;
	`cnt` : số;
	`customer`: tên khách hàng;
	`ip` : địa chỉ ip đăng nhập; 
}

```
 - Api yêu cầu các trường sau:
```bash
token: đoạn mã này được mã hóa dạng base64 từ tài khoản và mật khẩu và bắt buộc phải có ,ví dụ: 
	$token = base64_encode('merchant_id:password'); 
sdate: giới hạn ngày , ví dụ: 20190612, bắt buộc phải có;
edate: giới hạn ngày đầu trên, bắt buộc phải có; 
affiliate: Mã Affiliate phát sinh kết quả;
status: trạng thái chỉ để lọc kết quả:  100 - Pending, 200/210 - Finished, 300/310 - Cancel;
order_code: mã đặt hàng lọc kết quả;
limit: giới hạn số bản ghi lấy ra, mặc định là 300;
page: phân trang cho dữ liệu;	
```

### 2. Api updateConversions
-Api: `` http://event.adpia.vn/apiv2/updateConversion``;
-method: POST;
 #### Authen: 
 + Token: base64encode(merchant_id:password)
 + Header('authorization':'Basic {Token}')
 #### Request
 ```bash
- conversion_id: ID conversion trên hệ thống Adpia; //Ưu tiên tìm theo Conversion đầu tiên,nếu không có 
sẽ tìm theo order code 
- ocd: Mã đơn hàng trên hệ thống Adpia;  
- pcd: Mã sản phẩm trên hệ thống Adpia;
* Nếu không nhập `pcd` sẽ lấy toàn bộ đơn hàng theo ocd
- status: Trạng thái cập nhật // cancel: hủy, confirm: xác nhận
- cancel_reason:  Lý do hủy  // Phải nhập khi status=cancel
* Các đơn hàng đã duyệt hoặc hủy trên hệ thống Adpia sẽ không thay đổi.
```

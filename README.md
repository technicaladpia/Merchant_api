# MERCHANT API
## 1.GET CONVERSIONS API
[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)
### Request
```http
POST /v2/merchant/get_conversions
```
```http
curl -X POST https://api.adpia.vn/v2/merchant/get_conversions
    -H "Content-Type: application/json"
    -H "Authorization: Basic $(echo -n username:password | base64)"
    -d '{"sdate":"20210101", "edate":"20210130", "limit":10, "page":3, "affiliate":"A100041316", "status":"confirm", "ocd":"14678483812"}'
```
### Common Request Parameters
| Parameter | Type | Required | Description |
| ------ | ------ | ------ | ------ |
| `sdate` | String | true | Filter orders that have been updated from this date. Format is yyyymmdd. Example: 20210101. |
| `edate` | String | true | Filter orders that have been updated to this date. Format is yyyymmdd. Example: 20210130. |
| `limit` | Int | false | Rows return per request. Default 300 |
| `page` | Int | false | Page return request. Default 1 |
| `affiliate` | String | false | Affiliate ID generates results |
| `status` | String | false | State of orders: pending - approve - confirm - reject - cancel |
| `ocd` | String | false | Order Code : ID of order |
### Responses
```javascript
{
    "message": "OK",
    "description": "Success!",
    "code": 200,
    "data": {
        "sdate": "20210101",
        "edate": "20210130",
        "count": "4267",
        "limit": "10",
        "page": "3",
        "data": [
            {
                "ymd": "20210101",
                "his": "141012",
                "conversion_id": "13000008336867",
                "ocd": "14678483812",
                "pcd": "31326453",
                "ccd": "1019",
                "pname": "COMBO 20 ?ÔI ??a inox b?n ??p",
                "sales": "59000",
                "commission": "79",
                "cnt": "1",
                "offer_id": "sendo",
                "aid": "A100041316",
                "status": "210",
                "aff_sub": null,
                "ip": "172.16.2.144"
            }
        ]
    }
}
```
| Parameter | Type | Description |
| ------ | ------ | ------ |
| `ymd` | String | Date of order received. Format will be yyyymmdd. |
| `his` | String | Time of order received. |
| `conversion_id` | String | Id of single conversion |
| `ocd` | String | Order code : ID of order | 
| `pcd` | String | Product code: ID of product |
| `ccd` | String | Category code: ID of category |
| `pname` | String | Product name |
| `sales` | Float64 | The total amount of products. Currency VND |
| `commission` | Float64 | Commission fee of product. Currency VND |
| `cnt` | Int | Quantity of product |
| `offer_id` | String | ID of offer |
| `aid` | String | Affiliate ID generates order |
| `status` | String | State of orders: pending - approve - confirm - reject - cancel |
| `aff_sub` | String | Sub Affiliate ID |
| `ip` | String | Purchase device ip address |
### Status Codes
| Status Code | Description |
| ------ | ------ |
| `200` | OK |
| `400` | Bad request |
| `401` | Authentication failed |
| `404` | Missing params |
| `500` | internal server error |

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
 #### Response
 ```bash
 1. Lỗi: 
 - Thông báo lỗi, vd:  Not authorized, Conversion not found
 2. Success:
 {
    "code": 200,
    "result": [
        {
            "conversion_id": "12000002575860",
            "order_code": "20190410150306368",
            "product_code": "prod_b",
            "update_stat": "Failed",
            "reason": "Conversion is cancelled"
        },
	{
            "conversion_id": "1200000123860",
            "order_code": "20190410150306368",
            "product_code": "prod_a",
            "update_stat": "cancel success",
        },
	{
            "conversion_id": "120000234575860",
            "order_code": "20190410150306368",
            "product_code": "prod_a",
            "update_stat": "confirm success",
        }
    ]
}
 ```

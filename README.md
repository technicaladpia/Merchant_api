# MERCHANT API
## Table of contents
> <sub>✨[1. GET CONVERSIONS API](#menu1)</sub><br />
> <sub>✨[2. UPDATE CONVERSIONS API](#menu2)</sub>
<a name="menu1"></a>
## 1. GET CONVERSIONS API
![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)
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
                "pname": "COMBO 20 ĐÔI Đũa inox bền đẹp",
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
| `500` | Internal server error |

<a name="menu2"></a>
## 2. UPDATE CONVERSIONS API
![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)
### Request
```http
POST /v2/merchant/update_conversions
```
```http
curl -X POST https://api.adpia.vn/v2/merchant/update_conversions
    -H "Content-Type: application/json"
    -H "Authorization: Basic $(echo -n username:password | base64)"
    -d '{"ocd":"14424827977", "pcd":"26158215", "status":"reject", "reason":"Policy violation"}'
```
### Common Request Parameters
| Parameter | Type | Required | Description |
| ------ | ------ | ------ | ------ |
| `ocd` | String | true | Order Code : ID of order |
| `pcd` | String | true | Product code: ID of product |
| `status` | String | true | State of orders: pending - approve - reject |
| `reason` | String | true/false | Reason for rejecting results. If the status is reject, this field is required |
### Responses
```javascript
{
    "message": "OK",
    "description": "Success!",
    "code": "200",
    "data": []
}
```
### Status Codes
| Status Code | Description |
| ------ | ------ |
| `200` | OK |
| `400` | Bad request |
| `401` | Authentication failed |
| `403` | Update faild |
| `404` | Missing params |
| `500` | Internal server error |

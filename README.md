# Laravel 과제

### Version
* PHP 8.1
* Laravel 9.1


## API

### 체중 솔루션 조회
#### [GET] /v1/how-to-lose-weight
* 고객 성향에 대한 라이프스타일 태그 1개 이상을 포함한 요청 수신시 체중 조절 솔루션을 리턴하는 API
* 고객이 선호하는 솔루션 타입을 제시할 경우 해당 타입을 우선순위로 전달함


### Request Query
| 이름 | 타입 | 필수 | 설명           |
|---|---|----|--------------|
| life_style[] | array | O | 라이프스타일 태그 배열 |
|prefer_solution_type|string| X | 선호하는 솔루션 타입  |

#### 선택 가능한 라이프스타일 태그 (1개 이상 필수)
* enough_money
* strong_will
* enough_time  

#### 선호 솔루션 타입
* DIET
* FITNESS  


### Response

|응답|에러코드|설명|
|---|---|---|
|200| |조회 성공|
|422|VALIDATION_FAILED|요청 유효성 검증 실패|

#### [200] 성공  
선호 솔루션 타입을 우선으로, 추천 솔루션 이름을 문자열 배열로 리턴
##### 예시
``` json
[
    "Intermittent Fasting",
    "Cardio Exercise"
]
```

#### [422] 유효성 검증 실패
##### 예시
``` json
{
    "code": "VALIDATION_FAILED",
    "message": "유효성 검증 실패 메시지",
    "detail": {
        //각 유효성 검증 실패 항목에 대한 내용
    }
}
```

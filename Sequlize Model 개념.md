## 1. Sequlize Model Define

```js
sequelize.define('Post', {
    pub_id: {
        type: DataTypes.INTEGER, 
        primaryKey: true, 
        autoIncrement: true},
    name: {
        type: DataTypes.STRING(32), 
        allowNull: false
    },
    established_date: {type: DataTypes.DATE, defaultValue: DataTypes.NOW}
}, {
    classMethods: {},
    tableName: 'Post',
    freezeTableName: true,
    underscored: true,
    timestamps: false
});
```

- define 메소드의 첫번째 파라미터는 model의 name이다. 
- 두 번째 파라미터가 실제로 Table Schema와 맵핑되는 정보이다.
  - type : Data type (STRING, TEXT, DOUBLE, DATE, BOOLEAN, JSON 등등)
  - primaryKey : 기본키 인지 아닌지 설정 (default: false)
  - autoIncrement : SERIAL(auto increment)인지 아닌지 (default: false)
  - allowNull : NOT NULL 조건인지 아닌지 (default: true)
  - unique : Unique조건인지 아닌지에 대한 옵션. column하나로만 이루어진 unique라면 true/false로 지정한다. 복수개의 column이라면 동일한 문자열을 각 column의 unique속성에 넣어준다.
  - validate : 각 column에 대한 validation check옵션을 넣어준다.
- 세 번째 파라미터는 config 옵션이다.
  - timestamps : Sequelize는 테이블을 생성한 후 자동적으로 createdAt, updatedAt column을 생성한다. Database에 해당 테이블이 언제 생성되었고 가장 최근에 수정된 시간이 언제인지 추적할 수 있도록 해준다. 기능을 끄려면 false로 설정한다.
  - paranoid : paranoid가 true이면 deletedAt column이 table에 추가된다. 해당 row를 삭제시 실제로 데이터가 삭제되지 않고 deletedAt에 삭제된 날짜가 추가되며 deletedAt에 날짜가 표기된 row는 find작업시 제외된다. 즉 데이터는 삭제되지 않지만 삭제된 효과를 준다. timestamps 옵션이 true여야만 사용할 수 있다.
  - freezeTableName : Sequelize는 define method의 첫번째 파라미터 값으로 tablename을 자동변환하는데 true이면 이작업을 하지 않도록 한다.
  - tableName : 실제 Table name

## 2. 

### 1. sync()

-   db.Post.sync({force: true});
-   force를 true로 놓고 sync를 실행하면 publisher테이블은 먼저 drop된 이후에 새로 생성이 된다.

### 2.SELECT:  findAll(), find() ...

- 해당 db에 있는 내용을 모두 가져오는 쿼리이다.

- models.Post.find(All()) 형식

- 모든 쿼리 결과는 promise로 리턴 되기 때문에 findAll메소드 역시 promise를 리턴한다.

-   findAll([options]) -> Promise.<Array.<Instance>>

  - where : where옵션은 SQL문에서 where에 해당하는 부분을 기술하는 옵션이다.

  - attributes: table의 특정 column만 select할 때 사용

  - order: SQL문의 order by에 해당하는 부분을 기술하는 옵션이다.

  - limit, offset: SQL문의 limit, offset에 해당하는 부분을 기술하는 옵션

  - ```javascript
    // 첫 10개 항목은 반환받지 않고 넘긴 뒤, 2개 항목만 반환한다
    Project.findAll({ offset: 10, limit: 2 })
    ```

  - include 를 지원합니다. required 옵션이 true 인 경우에 대하여서만 찾는다.

    - 연결된 모델의 모든 컬럼을 포함한 결과를 얻으려면, include 옵션에 all: true 만 전달하면 된다.

### 3.  INSERT: create()

- create(values, [options]) -> Promise.<Instance>
- models.Post.create() 형식

### 4. findOrCreat()

- 특정 요소를 검색하고, 해당 인스턴스를 반환하거나, 존재하지 않으면 새로 생성한다.



## 3. 기타

- **toJSON()** 메서드는 [`Date`](https://developer.mozilla.org/ko/docs/Web/JavaScript/Reference/Global_Objects/Date) 객체의 문자열 표현을 반환합니다.

  - ```js
    const event = new Date();
    
    const jsonDate = event.toJSON();
    
    console.log(jsonDate);
    // expected output: "2019-12-24T06:33:00.673Z"
    ```

- **Object.assign()** 메소드는 열거할 수 있는 하나 이상의 출처 객체(source)로부터 대상 객체(target)로 속성을 복사할 때 사용합니다. 대상 객체를 반환합니다.

  - ```js
    const target = { a: 1, b: 2 };
    const source = { b: 4, c: 5 };
    
    const returnedTarget = Object.assign(target, source);
    
    console.log(target);
    // expected output: Object { a: 1, b: 4, c: 5 }
    
    console.log(returnedTarget);
    // expected output: Object { a: 1, b: 4, c: 5 }
    ```

- **addHours**: Add the specified number of hours to the given date.

  - ```js
    var addHours = require('date-fns/add_hours')
    ```

- **async function** 선언은 AsyncFunction객체를 반환하는 하나의 비동기 함수를 정의합니다. 비동기 함수는 이벤트 루프를 통해 비동기적으로 작동하는 함수로, 암시적으로 Promise를 사용하여 결과를 반환합니다

  - ```js
    function resolveAfter2Seconds() {
      return new Promise(resolve => {
        setTimeout(() => {
          resolve('resolved');
        }, 2000);
      });
    }
    
    async function asyncCall() {
      console.log('calling');
      var result = await resolveAfter2Seconds();
      console.log(result);
      // 2000ms 후에 expected output: 'resolved'
    }
    
    asyncCall();
    ```


- **callback** 
  - 호출하는 함수(calling function)가 호출되는 함수(called 함수)로 전달하는 함수로 callback 함수의 제어권은 호출되는 함수에게 있다. 
  - 비동기 코드를 동기식으로 처리하기 위해 사용한다.

- ### promise

  - promise 는 함수 실행이 성공했을때 then() 함수의 함수가 단 한번만 호출이 된다.
  - 실패했을 경우(reject)에도 catch()함수를 통해서 실패 이후의 작업을 처리할 수 있다.

- ### async & await

  - function 키워드 앞에 async를 붙이고, 비동기로 처리되는 부분 앞에 await를 작성한다.
  - async & await를 사용할 때는 try, catch를 같이 작성한다.
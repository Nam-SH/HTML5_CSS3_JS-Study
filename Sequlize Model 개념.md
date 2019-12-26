## 1. Sequlize Model Define

```js
sequelize.define('Publisher', {
    pub_id: {type: DataTypes.INTEGER, primaryKey: true, autoIncrement: true},
    name: {type: DataTypes.STRING(32), allowNull: false},
    established_date: {type: DataTypes.DATE, defaultValue: DataTypes.NOW}
}, {
    classMethods: {},
    tableName: 'publisher',
    freezeTableName: true,
    underscored: true,
    timestamps: false
});
```

- define 메소드의 첫번째 파라미터는 model의 name이다. 
- 두번째 파라미터가 실제로 Table Schema와 맵핑되는 정보이다.
  - type : Data type
  - primaryKey : 기본키 인지 아닌지 설정 (default: false)
  - autoIncrement : SERIAL(auto increment)인지 아닌지 (default: false)
  - allowNull : NOT NULL 조건인지 아닌지 (default: true)
  - unique : Unique조건인지 아닌지에 대한 옵션. column하나로만 이루어진 unique라면 true/false로 지정한다. 복수개의 column이라면 동일한 문자열을 각 column의 unique속성에 넣어준다.
  - comment : column에 대한 comment
  - validate : 각 column에 대한 validation check옵션을 넣어준다.
- 세번째 파라미터는 config 옵션이다.
  - timestamps : Sequelize는 테이블을 생성한 후 자동적으로 createdAt, updatedAt column을 생성한다. Database에 해당 테이블이 언제 생성되었고 가장 최근에 수정된 시간이 언제인지 추적할 수 있도록 해준다. 기능을 끄려면 false로 설정한다.
  - paranoid : paranoid가 true이면 deletedAt column이 table에 추가된다. 해당 row를 삭제시 실제로 데이터가 삭제되지 않고 deletedAt에 삭제된 날짜가 추가되며 deletedAt에 날짜가 표기된 row는 find작업시 제외된다. 즉 데이터는 삭제되지 않지만 삭제된 효과를 준다. timestamps 옵션이 true여야만 사용할 수 있다.
  - underscored : true이면 column이름을 camalCase가 아닌 underscore방식으로 사용한다.
  - freezeTableName : Sequelize는 define method의 첫번째 파라미터 값으로 tablename을 자동변환하는데 true이면 이작업을 하지 않도록 한다.
  - tableName : 실제 Table name
  - comment : table 에 대한 comment

## 2. 

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

    